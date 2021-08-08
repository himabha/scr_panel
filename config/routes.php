<?php
$routes['default'] = 'student/index';
$routes['students'] = 'student/index';
$routes['students/add'] = 'student/add';
$routes['students/edit/(:any)'] = 'student/edit/$1';
$routes['students/save'] = 'student/save';
$routes['students/search'] = 'student/search';
$routes['courses'] = 'course/index';
$routes['courses/add'] = 'course/add';
$routes['courses/edit/(:any)'] = 'course/edit/$1';
$routes['courses/save'] = 'course/save';
$routes['courses/search'] = 'course/search';
$routes['subscriptions'] = 'subscription/index';
$routes['subscriptions/edit/(:any)'] = 'subscription/edit/$1';
$routes['subscriptions/save'] = 'subscription/save';
$routes['subscriptions/search'] = 'subscription/search';
$routes['subscriptions/subscribe'] = 'subscription/subscribe';
?>