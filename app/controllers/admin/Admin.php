<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use Exception;

class Admin extends Controller
{

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $subscribersCount = $this->model('Subscriber')->count();
        $articlesCount = $this->model('Article')->count();
        $usersCount = $this->model('User')->count();
        $plansCount = $this->model('Plan')->count();

        $this->view('admin/index',compact('subscribersCount','articlesCount','usersCount','plansCount'));
    }
}