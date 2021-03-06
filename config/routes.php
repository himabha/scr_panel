<?php
$routes['index'] = 'student/index';
$routes['login'] = 'auth/login';
$routes['logout'] = 'auth/logout';
$routes['students'] = 'student/index';
$routes['students'] = 'student/index';
$routes['students/add'] = 'student/add';
$routes['students/edit/(:any)'] = 'student/edit/$1';
$routes['students/delete/(:any)'] = 'student/delete/$1';
$routes['students/save'] = 'student/save';
$routes['students/search'] = 'student/search';
$routes['students/sort'] = 'student/sort';
$routes['courses'] = 'course/index';
$routes['courses/add'] = 'course/add';
$routes['courses/edit/(:any)'] = 'course/edit/$1';
$routes['courses/delete/(:any)'] = 'course/delete/$1';
$routes['courses/save'] = 'course/save';
$routes['courses/search'] = 'course/search';
$routes['courses/sort'] = 'course/sort';
$routes['subscriptions'] = 'subscription/index';
$routes['subscriptions/edit/(:any)'] = 'subscription/edit/$1';
$routes['subscriptions/delete/(:any)'] = 'subscription/delete/$1';
$routes['subscriptions/save'] = 'subscription/save';
$routes['subscriptions/search'] = 'subscription/search';
$routes['subscriptions/subscribe'] = 'subscription/subscribe';
$routes['subscriptions/sort'] = 'subscription/sort';
?>