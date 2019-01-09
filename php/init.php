<?php

include 'php/class/controller_class.php';
include 'php/class/explorer_class.php';
include 'php/class/navpanel_class.php';
include 'php/modules.php';

$url = str_replace('%20', ' ', rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '/'));
$path = substr(getcwd(), 0, -7) . $url;
$dirs = scandir($path);
$opened = explode('/', $url);
$explorer = new Explorer($url, $path, $dirs);
$navpanel = new NavPanel($url, $path, $dirs, $opened);