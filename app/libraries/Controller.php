<?php

namespace app\libraries;

use Exception;

class Controller
{

    public static string $NAMESPACE = 'app\\controllers\\';
    public static string $ADMIN_NAMESPACE = 'app\\controllers\\admin\\';

    /**
     * @param string $model
     * @return object
     * @throws Exception
     */
    public function model(string $model): object
    {
        $model = Model::$NAMESPACE . $model;

        if (class_exists($model)) {
            return new $model();
        } else {
            throw new Exception('Model ' . $model . ' does not exist');
        }
    }

    /**
     * @param string $view
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function view(string $view, array $data = []): void
    {
        $file = dirname(__DIR__) . '/views/' . $view . '.php';

        if (file_exists($file)) {
            include $file;

            die();
        } else {
            throw new Exception('View ' . $view . ' does not exist');
        }
    }
}