<?php
global $routes;
$routes = array();
$routes['/sitemap'] = '/home/sitemap';
$routes['/{id}/{title}'] = '/posts/read/:id';
