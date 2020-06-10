<?php
// rutas sobre el modulo de Acceso
$router->post('/auth/login','Web\Auth\LoginController');
$router->post('/auth/forgot','Web\Auth\ForgotController');
$router->post('/auth/change','Web\Auth\ChangeController');
// $router->post('/auth/reset','Admin\Auth\SendResetPasswordController');
// $router->post('/auth/change','Admin\Auth\ChangePasswordController');