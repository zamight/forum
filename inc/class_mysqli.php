<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

class Mysqli_db
{
    private $MySQLI = null;

    function __construct($host, $username, $password, $table)
    {
        global $lang;

        $this->MySQLI = new mysqli($host, $username, $password, $table);

        if($this->MySQLI->connect_error)
        {
            error($lang->cant_connect_db);
        }
    }

    function fetch_row($table, $column, $where)
    {

    }
}

$db = new Mysqli_db($settings['db']['host'],
                    $settings['db']['username'],
                    $settings['db']['password'],
                    $settings['db']['table']);