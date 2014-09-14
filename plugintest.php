<?php

$plugin->add_plugin('index_start', 'plugintest');

function plugintest()
{
    print generate_salt();
}