<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Plan;
use Exception;

class Plans extends Controller
{

    private Plan $plan;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->plan = new Plan();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $plan = $this->model('Plan');

        $plans = $plan->all();

        $this->view('admin/plans/index', compact('plans'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {
        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'price' => 'فیلد قیمت الزامی است.',
                'items' => 'فیلد توضیحات الزامی است.',
            ]);

            if (validate()) {

                $this->plan->create([
                    'title' => $inputs['title'],
                    'price' => $inputs['price'],
                    'items' => $inputs['items']
                ]);

                redirect(admin_uri('/plans'));
            }
        }

        $this->view('admin/plans/create');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $plan = $this->plan->find($id);

        if (!$plan) {
            redirect(admin_uri('/plans'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'price' => 'فیلد قیمت الزامی است.',
                'items' => 'فیلد توضیحات الزامی است.',
            ]);

            if (validate()) {

                $this->plan->update([
                    'title' => $inputs['title'],
                    'price' => $inputs['price'],
                    'items' => $inputs['items']
                ], $plan->id);

                redirect(admin_uri('/plans'));
            }
        }

        $this->view('admin/plans/edit', compact('plan'));
    }

    public function delete(int $id): void
    {
        $message = $this->plan->find($id);

        $this->plan->destroy($message->id);

        redirect(admin_uri('/plans'));
    }
}