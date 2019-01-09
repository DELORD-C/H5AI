<?php

include 'php/class/controller_class.php';
include 'php/class/explorer_class.php';
include 'php/class/navpanel_class.php';

$url = str_replace('%20', ' ', rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '/'));
$path = 'C:/Users/Zulgard/AppData/Local/Packages/CanonicalGroupLimited.Ubuntu18.04onWindows_79rhkp1fndgsc/LocalState/rootfs/home/zulgard/www/' . $url;
$dirs = scandir($path);
$opened = explode('/', $url);

$explorer = new Explorer($url, $path, $dirs);
$navpanel = new NavPanel($url, $path, $dirs, $opened);

