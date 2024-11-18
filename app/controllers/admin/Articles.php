<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Article;
use Exception;

class Articles extends Controller
{

    private Article $article;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->article = $this->model('Article');
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $articles = $this->article->join();

        $this->view('admin/articles/index', compact('articles'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {

        if (request_is_post()) {

            $inputs = validation([
                'category_id' => 'فیلد دسته بندی الزامی است.',
                'title' => 'فیلد عنوان الزامی است.',
                'description' => 'فیلد متن مقاله الزامی است.',
                'slug' => 'فیلد اسلاگ الزامی است.'
            ]);

            if (request_has_file('cover')) {

                if (!check_extension($_FILES['cover']['name'])) {

                    set_error('cover', 'پسوند فایل برای آپلود مجاز نمی باشد.');

                } elseif (check_size($_FILES['cover']['size'], 2)) {

                    set_error('cover', 'محدودیت حجم آپلود 2 مگابایت می باشد.');
                } else {
                    $cover = $_FILES['cover'];
                }

            } else {

                set_error('cover', 'فیلد کاور الزامی است.');
            }

            if (validate()) {

                $file = upload_file($cover['tmp_name'], Article::$DIR, $cover['name']);

                if ($file['status']) {

                    $is_publish = isset($_POST['is_publish']) ? 1 : 0;

                    $this->article->create([
                        'user_id' => $_SESSION['user_id'],
                        'category_id' => $inputs['category_id'],
                        'title' => $inputs['title'],
                        'description' => $inputs['description'],
                        'cover' => $file['name'],
                        'slug' => $inputs['slug'],
                        'is_publish' => $is_publish
                    ]);

                    redirect(admin_uri('/articles'));

                } else {

                    set_error('cover', 'مشکلی در ارسال عکس وجود دارد.');

                }
            }
        }

        $category = $this->model('Category');
        $categories = $category->all();
        $this->view('admin/articles/create', compact('categories'));
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $article = $this->article->find($id);

        if (!$article) {
            redirect(admin_uri('/articles'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'category_id' => 'فیلد دسته بندی الزامی است.',
                'title' => 'فیلد عنوان الزامی است.',
                'description' => 'فیلد متن مقاله الزامی است.',
                'slug' => 'فیلد اسلاگ الزامی است.'
            ]);

            if (validate()) {

                if (request_has_file('cover')) {

                    $cover = $_FILES['cover'];

                    $file = upload_file($cover['tmp_name'], Article::$DIR, $cover['name']);

                    if ($file['status']) {
                        delete_file($article->cover, Article::$DIR);

                        $cover = $file['name'];
                    }
                } else {

                    $cover = $article->cover;
                }

                $is_publish = isset($_POST['is_publish']) ? 1 : 0;

                $this->article->update([
                    'category_id' => $inputs['category_id'],
                    'title' => $inputs['title'],
                    'description' => $inputs['description'],
                    'cover' => $cover,
                    'slug' => $inputs['slug'],
                    'is_publish' => $is_publish
                ], $id);

                redirect(admin_uri('/articles'));
            }
        }

        $category = $this->model('Category');
        $categories = $category->all();
        $this->view('admin/articles/edit', compact('categories', 'article'));
    }

    public function delete(int $id): void
    {
        $article = $this->article->find($id);

        delete_file($article->cover, Article::$DIR);

        $this->article->destroy($article->id);

        redirect(admin_uri('/articles'));
    }
}