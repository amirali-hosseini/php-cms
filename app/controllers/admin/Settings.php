<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Setting;
use Exception;

class Settings extends Controller
{

    private Setting $setting;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->setting = new Setting();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $settings = $this->setting->all();

        $this->view('admin/settings/index', compact('settings'));
    }

    /**
     * @throws Exception
     */
    public function edit(int $id): void
    {

        $setting = $this->setting->find($id);

        if (!$setting) {
            redirect(admin_uri('/settings'));
        }

        if (request_is_post()) {

            $inputs = validation([
                'name' => 'فیلد نام الزامی است.',
                'value' => 'فیلد مقدار الزامی است.',
                'description' => 'فیلد توضیحات الزامی است.',
            ]);

            if (validate()) {

                $this->setting->update([
                    'name' => $inputs['name'],
                    'value' => $inputs['value'],
                    'description' => $inputs['description'],
                ], $setting->id);

                redirect(admin_uri('/settings'));
            }

        }

        $this->view('admin/settings/edit', compact('setting'));
    }
}