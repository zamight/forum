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

function rand_str($length)
{
    $list = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
                    'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9',
                    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
                    't', 'u', 'v', 'w', 'x', 'y', 'z');
    $str = '';

    for($i = 0; $i <= $length; ++$i)
    {
        $char = mt_rand(0, count($list)-1);
        $str .= $list[$char];
    }

    return $str;
}

function generate_salt()
{
    return rand_str(15);
}