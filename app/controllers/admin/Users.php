<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\User;
use Exception;

class Users extends Controller
{
    private User $user;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->user = new User();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $users = $this->user->all();

        $this->view('admin/users/index', compact('users'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {
        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'email' => 'فیلد ایمیل الزامی است.',
                'password' => 'فیلد پسوورد الزامی است.'
            ]);

            if (validate()) {

                $this->user->create([
                    'name' => $inputs['name'],
                    'email' => $inputs['email'],
                    'password' => $inputs['password']
                ]);

                redirect(admin_uri('/users'));
            }
        }

        $this->view('admin/users/create');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {
        $user = $this->user->find($id);

        if (!$user) {
            redirect(admin_uri('/users'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'email' => 'فیلد ایمیل الزامی است.'
            ]);

            $inputs['password'] = isset($_POST['password']) ? password_hash(trim($_POST['password']),PASSWORD_BCRYPT) : $user->password;

            if (validate()) {

                $this->user->update([
                    'name' => $inputs['name'],
                    'email' => $inputs['email'],
                    'password' => $inputs['password']
                ], $user->id);

                redirect(admin_uri('/users'));
            }
        }

        $this->view('admin/users/edit', compact('user'));
    }

    public function delete(int $id): void
    {
        $user = $this->user->find($id);

        $this->user->destroy($user->id);

        redirect(admin_uri('/users'));
    }
}