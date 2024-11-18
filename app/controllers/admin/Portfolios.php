<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Portfolio;
use Exception;

class Portfolios extends Controller
{

    private Portfolio $portfolio;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->portfolio = new Portfolio();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $portfolios = $this->portfolio->all();

        $this->view('admin/portfolios/index', compact('portfolios'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {

        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'description' => 'فیلد توضیحات الزامی است.',
                'slug' => 'فیلد توضیحات الزامی است.',
                'date' => 'فیلد تاریخ الزامی است.',
                'client_name' => 'فیلد نام مشتری الزامی است.',
                'location' => 'فیلد لوکیشن الزامی است.',
                'website' => 'فیلد وبسایت الزامی است.',
            ]);

            if (request_has_file('cover')) {

                if (!check_extension($_FILES['cover']['name'])) {

                    set_error('cover', 'پسوند فایل برای آپلود مجاز نمی باشد . ');
                } elseif (check_size($_FILES['cover']['size'], 2)) {

                    set_error('cover', 'محدودیت حجم آپلود 2 مگابایت می باشد . ');
                } else {
                    $cover = $_FILES['cover'];
                }

            } else {

                set_error('cover', 'فیلد تصویر الزامی است . ');
            }

            if (validate()) {

                $file = upload_file($cover['tmp_name'], Portfolio::$DIR, $cover['name']);

                if ($file['status']) {

                    $this->portfolio->create([
                        'cover' => $file['name'],
                        'title' => $inputs['title'],
                        'description' => $inputs['description'],
                        'slug' => $inputs['slug'],
                        'client_name' => $inputs['client_name'],
                        'date' => $inputs['date'],
                        'location' => $inputs['location'],
                        'website' => $inputs['website'],
                    ]);

                    redirect(admin_uri('/portfolios'));
                } else {

                    set_error('cover', 'مشکلی در اپلود عکس وجود دارد . ');
                }
            }
        }

        $this->view('admin/portfolios/create');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $portfolio = $this->portfolio->find($id);

        if (!$portfolio) {
            redirect(admin_uri('/portfolios'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'description' => 'فیلد توضیحات الزامی است.',
                'slug' => 'فیلد توضیحات الزامی است.',
                'date' => 'فیلد تاریخ الزامی است.',
                'client_name' => 'فیلد نام مشتری الزامی است.',
                'location' => 'فیلد لوکیشن الزامی است.',
                'website' => 'فیلد وبسایت الزامی است.',
            ]);

            if (validate()) {

                if (request_has_file('cover')) {

                    if (!check_extension($_FILES['cover']['name'])) {

                        set_error('cover', 'پسوند فایل برای آپلود مجاز نمی باشد . ');
                    } elseif (check_size($_FILES['cover']['size'], 2)) {

                        set_error('cover', 'محدودیت حجم آپلود 2 مگابایت می باشد . ');
                    } else {

                        $cover = $_FILES['cover'];

                        $file = upload_file($cover['tmp_name'], Portfolio::$DIR, $cover['name']);

                        if ($file['status']) {
                            delete_file($portfolio->cover, Portfolio::$DIR);
                        }

                    }
                } else {
                    $file = ['name' => $portfolio->cover];
                }

                $this->portfolio->update([
                    'cover' => $file['name'],
                    'title' => $inputs['title'],
                    'description' => $inputs['description'],
                    'slug' => $inputs['slug'],
                    'client_name' => $inputs['client_name'],
                    'date' => $inputs['date'],
                    'location' => $inputs['location'],
                    'website' => $inputs['website'],
                ], $portfolio->id);

                redirect(admin_uri('/portfolios'));
            }
        }

        $this->view('admin/portfolios/edit', compact('portfolio'));
    }

    public function delete(int $id): void
    {
        $portfolio = $this->portfolio->find($id);

        delete_file($portfolio->cover, Portfolio::$DIR);

        $this->portfolio->destroy($portfolio->id);

        redirect(admin_uri('/portfolios'));
    }
}