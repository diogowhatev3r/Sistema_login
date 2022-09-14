<?php

/*

function url_redirect($values = [])

{
$buildQueryString = http_build_query($values);
header('Location: '.PAGE_URL.'?' . $buildQueryString);
}
*/

function url_generate($values)
{

    $urlQueryString = array_merge($_GET, $values);
    return '?' . http_build_query($urlQueryString);
}

function url_redirect($values = [])
{

    header('Location: ' . PAGE_URL . url_generate($values));


    exit;
}
