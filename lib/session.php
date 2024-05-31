<?php

session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => 'localhost',
    'httponly' => true
]);

session_start();

$_SESSION['id_user_key_one'] = '?'; // on créé des variables sessions
$_SESSION['name'] = '?';
$_SESSION['email'] = '?';
$_SESSION['password'] = '?';

function isUserConnected():bool
{
    return isset($_SESSION['users']);
}