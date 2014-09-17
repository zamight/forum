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

$plugin->run_plugins('index_start');

//TODO: Show forums.
showCategory();

$plugin->run_plugins('index_end');

function showCategory()
{
    global $db, $template, $plugin;

    $categorys = $db->fetch_array('category', 'id,title,description');
    $category_template = $template->get('category');
    $columns = array();
    $start = true;
    $content = '';

    foreach($categorys as $key => $category)
    {
        $plugin->run_plugins('category_start');

        $forum = showForum($category['id']);

        $plugin->run_plugins('category_end');

        eval('$columns[] = "'.$category_template.'";');
    }

    foreach($columns as $value)
    {
        if($start)
        {
            $content .= '<table border="0"><tr><td valign="top">' . $value . '</td>';
            $start = false;
        }
        else
        {
            $content .= '<td valign="top">' . $value . '</td></tr></table>';
            $start = true;
        }
    }

    $indexPage = $template->get('index');
    $whoisonline = showOnline();

    eval('$template->html .= "'.$indexPage.'";');
    $template->display();

}

function showForum($id)
{
    global $db, $template, $plugin;

    $forums = $db->fetch_array('forum', 'title, description', "WHERE categoryid = '{$id}' ORDER BY sort DESC");
    $content = '';

    foreach($forums as $key => $forum)
    {
        $plugin->run_plugins('forum_start');

        $output = $template->get('category_forum');

        $plugin->run_plugins('forum_end');

        eval('$content .= "'.$output.'";');
    }

    return $content;

}

function showOnline()
{
    global $db, $template;
    $fetch_users = $db->fetch_array('users', 'username');
    $output = $template->get('whoisonline');
    $online_users = '';

    foreach($fetch_users as $users)
    {
        $online_users .= " ,{$users['username']}";
    }
    eval('$output = "'.$output.'";');

    return $output;
}