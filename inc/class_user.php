<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

class User
{

    public $settings;

    function __construct()
    {
        global $db;

        $guest_settings = $db->fetch_row('users', 'permission', "WHERE id = 1");

        if(isset($_COOKIE['session']))
        {
            $get_session = $db->fetch_row('session', 'session', "WHERE id = {$_COOKIE['session']}");

            if($get_session)
            {
                //TODO: Fixed this stuff.
                $this->add_settings($db->fetch_row('users', 'users', "WHERE uid = {$get_session['uid']}"));
                $this->add_settings($db->fetch_row('permission', '*', "WHERE id = {$this->settings['uid']}"));
            }
            else
            {
                //Destory The bad session.
                $db->delete_row('session', "WHERE id = {$_COOKIE['session']}");

                $this->add_settings($guest_settings);
            }
        }
        else
        {
            $this->add_settings($guest_settings);
        }
    }

    private function add_settings($array)
    {
        if(is_array($array))
        {
            foreach($array as $a)
            {
                $this->settings[] = $a;
            }
        }
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->settings))
        {
            return $this->settings[$name];
        }
    }

    public function __set($name, $value)
    {
        $this->settings[$name] = $value;
    }

}

$user = new User();














