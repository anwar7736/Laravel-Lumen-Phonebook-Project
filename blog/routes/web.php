<?php


$router->post('/signup', 'RegistrationController@Registration');
$router->post('/login', 'LoginController@Login');


$router->post('/select', ['middleware'=>'auth', 'uses'=>'StudentController@select']);
$router->post('/insert', ['middleware'=>'auth', 'uses'=>'StudentController@insert']);
$router->post('/update', ['middleware'=>'auth', 'uses'=>'StudentController@update']);
$router->post('/delete', ['middleware'=>'auth', 'uses'=>'StudentController@delete']);