<?php

namespace app\controllers\admin;

use app\libraries\Controller;
use app\models\Comment;
use Exception;

class Comments extends Controller
{

    private Comment $comment;

    public function __construct()
    {
        if (!is_logged_in()) {
            redirect(uri('/auth/login'));
        }

        $this->comment = new Comment();
    }

    /**
     * @throws Exception
     */
    public function index(): void
    {
        $comments = $this->comment->join();

        $this->view('admin/comments/index', compact('comments'));
    }

    /**
     * @throws Exception
     */
    public function status(int $id): void
    {
        $comment = $this->comment->find($id);

        if (request_is_post() && $comment) {

            $status = $comment->is_approved ? 0 : 1;

            $this->comment->update(['is_approved' => $status], $id);

        }

        redirect(admin_uri('/comments'));
    }

    public function delete(int $id): void
    {
        $this->comment->destroy($id);

        redirect(admin_uri('/comments'));
    }
}