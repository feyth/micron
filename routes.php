<?php
global $routes;
$routes = array();
$routes['/sitemap'] = '/home/sitemap';
$routes['/{title}'] = '/posts/read/:titulo';
