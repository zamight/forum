<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

class Template
{
    public $html;

    function build($template_name)
    {
        global $db;

        $template = $db->fetch_row('template', 'template', "WHERE title = '{$template_name}'");
        $this->html = $template[0];

    }

    function get($template_name)
    {
        global $db;

        $template = $db->fetch_row('template', 'template', "WHERE title = '{$template_name}'");
        return($template[0]);
    }

    function display()
    {
        echo $this->html;
    }

}

$template = new Template();