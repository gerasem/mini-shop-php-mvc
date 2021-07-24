<?php

function pr($var)
{
    if (DEBUG) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    } else {
        echo 'Debug false';
    }

}

function bold($text)
{
    return "<strong>{$text}</strong>";
}

/*function icon($name, $params = [])
{
    $title = isset($params['title']) ? "title='{$params['title']}'" : '';
    $typ = isset($params['typ']) ? $params['typ'] : 'fas';
    $class = isset($params['class']) ? 'has-text-' . $params['class'] : '';

    return "<span {$title} class='icon is-medium'><i class='{$typ} fa-{$name} fa-lg {$class}'></i></span>";
}*/

function confirm($typ, $link)
{
    if ($typ == 'delete') {
        return "javascript:confirmDelete('{$link}')";
    }
}