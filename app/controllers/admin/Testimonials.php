<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Testimonial;
use Exception;

class Testimonials extends Controller
{
    private Testimonial $testimonial;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->testimonial = new Testimonial();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $testimonials = $this->testimonial->all();

        $this->view('admin/testimonials/index', compact('testimonials'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {

        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'client_name' => 'فیلد نام مشتری الزامی است.',
                'client_job_title' => 'فیلد عنوان شغلی مشتری الزامی است.',
                'description' => 'فیلد توضیحات الزامی است.',
            ]);

            if (request_has_file('client_photo')) {

                if (!check_extension($_FILES['client_photo']['name'])) {

                    set_error('client_photo', 'پسوند فایل برای آپلود مجاز نمی باشد . ');
                } elseif (check_size($_FILES['client_photo']['size'], 2)) {

                    set_error('client_photo', 'محدودیت حجم آپلود 2 مگابایت می باشد . ');
                } else {

                    $cover = $_FILES['client_photo'];
                }

            } else {
                set_error('client_photo', 'فیلد تصویر الزامی است . ');
            }

            if (validate()) {

                $file = upload_file($cover['tmp_name'], Testimonial::$DIR, $cover['name']);

                if ($file['status']) {

                    $this->testimonial->create([
                        'title' => $inputs['title'],
                        'description' => $inputs['description'],
                        'client_name' => $inputs['client_name'],
                        'client_job_title' => $inputs['client_job_title'],
                        'client_photo' => $file['name'],
                    ]);

                    redirect(admin_uri('/testimonials'));
                } else {

                    set_error('client_photo', 'مشکلی در اپلود عکس وجود دارد . ');
                }
            }
        }

        $this->view('admin/testimonials/create');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $testimonial = $this->testimonial->find($id);

        if (!$testimonial) {
            redirect(admin_uri('/testimonials'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'client_name' => 'فیلد نام مشتری الزامی است.',
                'client_job_title' => 'فیلد عنوان شغلی مشتری الزامی است.',
                'description' => 'فیلد توضیحات الزامی است.',
            ]);

            if (validate()) {

                if (request_has_file('client_photo')) {

                    if (!check_extension($_FILES['client_photo']['name'])) {

                        set_error('client_photo', 'پسوند فایل برای آپلود مجاز نمی باشد . ');
                    } elseif (check_size($_FILES['client_photo']['size'], 2)) {

                        set_error('client_photo', 'محدودیت حجم آپلود 2 مگابایت می باشد . ');
                    } else {

                        $cover = $_FILES['client_photo'];

                        $file = upload_file($cover['tmp_name'], Testimonial::$DIR, $cover['name']);

                        if ($file['status']) {
                            delete_file($testimonial->client_photo, Testimonial::$DIR);
                        }

                    }
                } else {
                    $file = ['name' => $testimonial->client_photo];
                }

                $this->testimonial->update([
                    'title' => $inputs['title'],
                    'description' => $inputs['description'],
                    'client_name' => $inputs['client_name'],
                    'client_job_title' => $inputs['client_job_title'],
                    'client_photo' => $file['name'],
                ], $testimonial->id);

                redirect(admin_uri('/testimonials'));
            }
        }

        $this->view('admin/testimonials/edit', compact('testimonial'));
    }

    public function delete(int $id): void
    {
        $testimonial = $this->testimonial->find($id);

        delete_file($testimonial->client_photo, Testimonial::$DIR);

        $this->testimonial->destroy($testimonial->id);

        redirect(admin_uri('/testimonials'));
    }
}