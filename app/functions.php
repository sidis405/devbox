<?php

function prepareLocalisedUrl($lang)
{
    $segments = request()->segments();
    $segments[0] = $lang;

    return '/' . join('/', $segments);
}
