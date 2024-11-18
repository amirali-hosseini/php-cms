<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Subscriber;
use Exception;

class Subscribers extends Controller
{

    private Subscriber $subscriber;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->subscriber = new Subscriber();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $subscribers = $this->subscriber->all();

        $this->view('admin/subscribers/index', compact('subscribers'));
    }

    public function status(int $id): void
    {
        $subscriber = $this->subscriber->find($id);

        if (!$subscriber) {
            redirect(admin_uri('/subscribers'));
        }

        $status = $subscriber->status ? 0 : 1;

        $this->subscriber->update([
            'status' => $status,
        ], $subscriber->id);

        redirect(admin_uri('/subscribers'));
    }

    public function delete(int $id): void
    {
        $subscriber = $this->subscriber->find($id);

        $this->subscriber->destroy($subscriber->id);

        redirect(admin_uri('/subscribers'));
    }
}