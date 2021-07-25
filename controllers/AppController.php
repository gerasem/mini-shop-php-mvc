<?php

class AppController
{
    protected function clearData($data)
    {
        return trim(stripslashes(htmlspecialchars($data)));
    }


    /**
     * GET View
     * @param $function
     * @return bool|string
     */
//    protected function render($function)
//    {
//        if (!empty($function)) {
//            $class = get_class($this);
//            $class = substr($class, 0, -10);
//            $class = lcfirst($class);
//
//            $function = substr($function, 6);
//            $function = lcfirst($function);
//
//            return ROOT . "/views/{$class}/{$function}.php";
//        }
//        return false;
//    }
}