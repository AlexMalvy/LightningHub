<?php

function redirectAndExit(string $url)
{
    redirect($url);
    exit();
}


function redirect(string $url)
{
    header("Location: $url");
}
