<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

$settings['db']['host'] = 'localhost';
$settings['db']['username'] = 'root';
$settings['db']['password'] = '';
$settings['db']['table'] = 'forum';

$settings['isSuperAdmin'] = '1';
$settings['db_prefix'] = 'forum_';