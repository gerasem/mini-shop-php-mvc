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

function confirm($typ, $link)
{
    if ($typ == 'delete') {
        return "javascript:confirmDelete('{$link}')";
    }
}