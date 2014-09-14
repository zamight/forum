<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

class Template
{
    private $html;

    function build($get)
    {
        global $lang;

        if($get == 'login')
        {
            $this->html = "
            <form action='login.php' method='post'>
            Username: <input type='text' name='username'><br />
            Password: <input type='password' name='password'><br />
            <input type='submit' name='Login' value='Login'>
            </form>
            ";
        }
        if($get == 'login_successful')
        {
            $this->html = "
            {$lang->login_successful}
            ";
        }
        if($get == 'login_unsuccessful')
        {
            $this->html = "
            {$lang->login_unsuccessful}
            ";
        }
    }

    function get($template_name)
    {

    }

    function display()
    {
        echo $this->html;
    }

}

$template = new Template();