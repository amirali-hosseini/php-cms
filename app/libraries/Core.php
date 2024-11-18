<?php

namespace app\libraries;

class Core
{

    /**
     * @param string $namespace
     * @param object|string $controller
     * @param string $method
     * @param array $params
     */
    public function __construct(
        protected string        $namespace = '',
        protected object|string $controller = 'Pages',
        protected string        $method = 'index',
        protected array         $params = []
    )
    {
        session_start();

        $url = $this->getUrl();

        // Check if the client is in the admin routes or not.
        if (isset($url[0]) && $url[0] == 'admin') {

            // Change the name of the default controller and namespace if the user is in admin routes.
            $this->namespace = Controller::$ADMIN_NAMESPACE;
            $this->controller = 'Admin';

            /*
             * Check if the route has a controller, then the key 0 is removed from $url.
             * if user is in admin routes, the key 0 is admin keyword.[0 => 'admin', 1 => 'controller_name', ...]
            */
            if (isset($url[1])) {
                array_shift($url);
            }

        } else {
            $this->namespace = Controller::$NAMESPACE;
        }

        if (isset($url[0]) && class_exists($this->namespace . ucwords($url[0]))) {

            $this->controller = $this->namespace . ucwords($url[0]);
            unset($url[0]);

        } else {
            $this->controller = $this->namespace . $this->controller;
        }

        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        return call_user_func_array([$this->controller, $this->method], $this->params);

    }

    /**
     * @return array
     */
    public function getUrl(): array
    {
        if ($_SERVER['REQUEST_URI']) {

            $url = trim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);

        } else {

            return [];

        }
    }

}