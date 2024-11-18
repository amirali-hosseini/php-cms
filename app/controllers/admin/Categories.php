<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Category;
use Exception;

class Categories extends Controller
{
    private Category $category;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->category = new Category();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $category = $this->model('Category');

        $categories = $category->all();

        $this->view('admin/categories/index', compact('categories'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {
        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'slug' => 'فیلد اسلاگ الزامی است.'
            ]);

            if (validate()) {

                $this->category->create([
                    'name' => $inputs['name'],
                    'slug' => $inputs['slug'],
                ]);

                redirect(admin_uri('/categories'));
            }
        }

        $this->view('admin/categories/create');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $category = $this->category->find($id);

        if (!$category) {
            redirect(admin_uri('/categories'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'slug' => 'فیلد اسلاگ الزامی است.'
            ]);

            if (validate()) {

                $this->category->update([
                    'name' => $inputs['name'],
                    'slug' => $inputs['slug'],
                ], $id);

                redirect(admin_uri('/categories'));
            }
        }

        $this->view('admin/categories/edit', compact('category'));
    }

    public function delete(int $id): void
    {
        $this->category->destroy($id);

        redirect(admin_uri('/categories'));
    }
}