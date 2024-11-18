<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Member;
use Exception;

class Members extends Controller
{

    private Member $member;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->member = new Member();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $member = $this->model('Member');

        $members = $member->all();

        $this->view('admin/members/index', compact('members'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {

        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'job_title' => 'فیلد عنوان شغلی الزامی است.',
            ]);

            $linkedin = isset($_POST['linkedin']) ? trim($_POST['linkedin']) : null;
            $facebook = isset($_POST['facebook']) ? trim($_POST['facebook']) : null;
            $twitter = isset($_POST['twitter']) ? trim($_POST['twitter']) : null;
            $instagram = isset($_POST['instagram']) ? trim($_POST['instagram']) : null;

            if (request_has_file('profile')) {

                if (!check_extension($_FILES['profile']['name'])) {

                    set_error('profile', 'پسوند فایل برای آپلود مجاز نمی باشد.');
                } elseif (check_size($_FILES['profile']['size'], 2)) {

                    set_error('profile', 'محدودیت حجم آپلود 2 مگابایت می باشد.');
                } else {

                    $profile = $_FILES['profile'];
                }

            } else {

                set_error('profile', 'فیلد پروفایل الزامی است.');
            }

            if (validate()) {

                $file = upload_file($profile['tmp_name'], Member::$DIR, $profile['name']);

                if ($file['status']) {

                    $this->member->create([
                        'profile' => $file['name'],
                        'name' => $inputs['name'],
                        'job_title' => $inputs['job_title'],
                        'linkedin' => $linkedin,
                        'facebook' => $facebook,
                        'twitter' => $twitter,
                        'instagram' => $instagram
                    ]);

                    redirect(admin_uri('/members'));
                } else {

                    set_error('profile', 'مشکلی در ارسال عکس وجود دارد.');
                }
            }
        }

        $this->view('admin/members/create');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $member = $this->member->find($id);

        if (!$member) {
            redirect(admin_uri('/members'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'job_title' => 'فیلد عنوان شغلی الزامی است.',
            ]);

            $linkedin = isset($_POST['linkedin']) ? trim($_POST['linkedin']) : null;
            $facebook = isset($_POST['facebook']) ? trim($_POST['facebook']) : null;
            $twitter = isset($_POST['twitter']) ? trim($_POST['twitter']) : null;
            $instagram = isset($_POST['instagram']) ? trim($_POST['instagram']) : null;

            if (request_has_file('profile')) {

                if (!check_extension($_FILES['profile']['name'])) {

                    set_error('profile', 'پسوند فایل برای آپلود مجاز نمی باشد.');
                } elseif (check_size($_FILES['profile']['size'], 2)) {

                    set_error('profile', 'محدودیت حجم آپلود 2 مگابایت می باشد.');
                } else {
                    $profile = $_FILES['profile'];

                    $file = upload_file($profile['tmp_name'], Member::$DIR, $profile['name']);
                }
            } else {

                $file = ['name' => $member->profile];
            }

            if (validate()) {

                $this->member->update([
                    'profile' => $file['name'],
                    'name' => $inputs['name'],
                    'job_title' => $inputs['job_title'],
                    'linkedin' => $linkedin,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'instagram' => $instagram
                ], $member->id);

                redirect(admin_uri('/members'));
            }
        }

        $this->view('admin/members/edit', compact('member'));
    }

    public function delete(int $id): void
    {
        $article = $this->member->find($id);

        delete_file($article->profile, Member::$DIR);

        $this->member->destroy($article->id);

        redirect(admin_uri('/members'));
    }
}
