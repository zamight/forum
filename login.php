<?php

define("MY_FORUM", true);

require_once('lang/en.php');
require_once('inc/settings.php');
require_once('inc/class_plugin.php');
require_once('inc/functions.php');
require_once('inc/class_mysqli.php');
require_once('inc/class_user.php');
require_once('inc/class_template.php');
require_once('plugintest.php');

$plugin->run_plugins('login_start');

if($_POST)
{
    if(validate_login(clean_str($_POST['username']), clean_str($_POST['password'])))
    {
        die("correct");
    }
    else
    {
        die("Incorrect Username & Password");
    }
}
else
{
    //Is User Already Logged in?
    if(isset($user->settings['uid']))
    {
        //Is User Banned?
        if($user->settings['banned'])
        {
            error($lang->is_banned);
        }
        else
        {
            error($lang->already_logged_in);
        }
    }
    else
    {
        if(isset($_POST['username']) AND isset($_POST['password']))
        {
            $username = clean_str($_POST['username']);
            $password = clean_str($_POST['password']);

            if(validate_login($username, $password))
            {
                create_user_session($username, $password);
                $plugin->run_plugins('login_successful');
                $template->build('login_successful');
            }
            else
            {
                $plugin->run_plugins('login_unsuccessful');
                $template->build('login_unsuccessful');
            }
        }
        else
        {
            $plugin->run_plugins('login_form');
            $template->build('login');
        }
    }

    $plugin->run_plugins('login_end');

    $template->display();
}