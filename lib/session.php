<?php
ini_set('session.gc_maxlifetime', 30);

session_set_cookie_params([
    'lifetime'=>'3600',
    'path'=>'/',
    'domain'=>'.000webhostapp.com',
    'secure'=>'secure',
    'httponly'=>true,
]);

session_start();

function isUserConnected():bool
{
    return isset($_SESSION['users']);
}

  if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3600) {
             session_unset(); 
             session_destroy(); 
             header("Location: login.php"); 
            }
            $_SESSION['last_activity'] = time(); 