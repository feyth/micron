<?php
global $routes;
$routes = array();
$routes['/sitemap'] = '/home/sitemap';
$routes['/posts'] = '/posts';
$routes['/posts/novo'] = '/posts/write';
$routes['/posts/lixeira'] = '/posts/trash';
$routes['/posts/editar/{id}'] = '/posts/update/:id';
$routes['/posts/mover/{id}'] = '/posts/delete/:id';
$routes['/posts/restaurar/{id}'] = '/posts/restore/:id';
$routes['/todos-posts'] = '/posts/all';
$routes['/configuracoes'] = '/settings';
$routes['/conta/sair'] = '/user/logout';
$routes['/403'] = '/error/E403';
$routes['/404'] = '/error/E404';
$routes['/{id}/{title}'] = '/posts/read/:id';