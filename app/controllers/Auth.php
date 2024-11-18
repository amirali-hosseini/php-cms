<?php

namespace app\controllers;

use app\libraries\Controller;

class Auth extends Controller
{
    public function index(): void
    {
        redirect(uri('/auth/login'));
    }

    /**
     * @throws \Exception
     */
    public function login(): void
    {

        if (!is_logged_in()) {

            if (request_is_post()) {

                if (input('email')) {
                    $email = input('email');
                } else {
                    set_error('email', 'فیلد ایمیل اجباری می باشد.');
                }

                if (input('password')) {
                    $password = input('password');
                } else {
                    set_error('password', 'حداقل تعداد کاراکتر، 8 کاراکتر می باشد.');
                }

                if (validate()) {

                    $user = $this->model('User');

                    $userInfo = $user->where('email', $email)->fetch();

                    if ($userInfo) {

                        if (password_verify($password, $userInfo->password)) {

                            $_SESSION['is_logged_in'] = true;
                            $_SESSION['user_id'] = $userInfo->id;

                            redirect(admin_uri('/'));

                        } else {
                            set_error('email', 'اطلاعات وارد شده صحیح نمی باشد.');
                        }

                    } else {
                        set_error('email', 'ایمیل وارد شده معتبر نمی باشد.');
                    }

                }

            }

            $this->view('auth/login');

        } else {
            redirect(admin_uri('/'));
        }
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        if (request_is_post()) {
            unset($_SESSION['is_logged_in']);
            unset($_SESSION['user_id']);

            session_unset();
            session_destroy();

        }

        redirect(uri('/auth/login'));
    }
}