<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Service;
use Exception;

class Services extends Controller
{

    private Service $service;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->service = new Service();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $services = $this->service->all();

        $this->view('admin/services/index', compact('services'));
    }

    /**
     * @throws Exception
     */
    public function create(): void
    {

        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'description' => 'فیلد توضیحات الزامی است.'
            ]);

            if (validate()) {

                $this->service->create([
                    'title' => $inputs['title'],
                    'description' => $inputs['description'],
                ]);

                redirect(admin_uri('/services'));
            }
        }

        $this->view('admin/services/create');
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $service = $this->service->find($id);

        if (!$service) {
            redirect(admin_uri('/services'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'title' => 'فیلد عنوان الزامی است.',
                'description' => 'فیلد توضیحات الزامی است.'
            ]);

            if (validate()) {

                $this->service->update([
                    'title' => $inputs['title'],
                    'description' => $inputs['description'],
                ], $service->id);

                redirect(admin_uri('/services'));
            }

        }

        $this->view('admin/services/edit', compact('service'));
    }

    public
    function delete(int $id): void
    {
        $service = $this->service->find($id);

        $this->service->destroy($service->id);

        redirect(admin_uri('/services'));
    }
}