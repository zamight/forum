<?php

if(!MY_FORUM)
{
    die("Direct Access Isn't Allowed.");
}

class Plugin {

    public $plugin_list = array();


    //Adds
    function add_plugin($plugin, $function)
    {
        $this->plugin_list[$plugin][] = $function;
    }

    function run_plugins($plugin)
    {
        if(isset($this->plugin_list[$plugin]) AND is_array($this->plugin_list[$plugin]))
        {
            foreach($this->plugin_list[$plugin] as $function)
            {
                if(function_exists($function))
                {
                    call_user_func($function);
                }
            }
        }
    }


}

$plugin = new Plugin();