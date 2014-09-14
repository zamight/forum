<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

class Language
{

    private $data = array();

    public function __get($name)
    {
        if(array_key_exists($name, $this->data))
        {
            return $this->data[$name];
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}

$lang = new Language();

$lang->cant_connect_db = "Can't connect to database.";
$lang->is_banned = "You have been banned from the forums. Please contact an admin.";
$lang->already_logged_in = "You are already logged in.";
$lang->login_successful = "You successfully login the fuck in!";
$lang->login_unsuccessful = "You login didn't work. How about enter a correct pw.";