<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

function error($string)
{
    global $plugin;

    $plugin->run_plugins('error_start');

        print $string;

    $plugin->run_plugins('error_end');

    die();

}

function validate_login($username, $password)
{
    return false;
}