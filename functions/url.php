<?php

function url_redirect($values = [])

{
$buildQueryString = http_build_query($values);
    header('Location: http://localhost/exercicios_1/minha_segunda_app?' . $buildQueryString);
    exit;
}
