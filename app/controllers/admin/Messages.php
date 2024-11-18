<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Message;
use Exception;

class Messages extends Controller
{

    private Message $message;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->message = new Message();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $message = $this->model('Message');

        $messages = $message->all();

        $this->view('admin/messages/index', compact('messages'));
    }

    public function delete(int $id): void
    {
        $message = $this->message->find($id);

        $this->message->destroy($message->id);

        redirect(admin_uri('/messages'));
    }
}
