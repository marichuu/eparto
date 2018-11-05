<?php
if (!function_exists('twig_render'))
{

    function twig_render()
    {
        $args = func_get_args();
        $route = array_shift($args);
        $controller = APPPATH . 'controllers/' . substr($route, 0, strrpos($route, '/'));

        $explode = explode('/', $route);
        if (count($explode) < 2)
        {
            show_error("twig_render: A twig route is made from format: path/to/controller/action.");
        }

        if (!is_file($controller . '.php'))
        {
            show_error("twig_render: Controller not found: {$controller}");
        }
        if (!is_readable($controller . '.php'))
        {
            show_error("twig_render: Controller not readable: {$controller}");
        }
        require_once($controller . '.php');

        $class = ucfirst(reset(array_slice($explode, count($explode) - 2, 1)));
        if (!class_exists($class))
        {
            show_error("twig_render: Controller file exists, but class not found inside: {$class}");
        }

        $object = new $class();
        if (!($object instanceof CI_Controller))
        {
            show_error("twig_render: Class {$class} is not an instance of CI_Controller");
        }

        $method = $explode[count($explode) - 1];
        if (!method_exists($object, $method))
        {
            show_error("twig_render: Controller method not found: {$method}");
        }

        if (!is_callable(array($object, $method)))
        {
            show_error("twig_render: Controller method not visible: {$method}");
        }

        call_user_func_array(array($object, $method), $args);

        $ci = &get_instance();
        return $ci->output->get_output();
    }

}