<?php
define('DB_HOST', { $secrets.DB_HOST } : 'db');
define('DB_USER', { $secrets.DB_USER } : 'sopro_user');
define('DB_PASS', { $secrets.DB_PASS } : 'sopro_pass');
define('DB_NAME', { $secrets.DB_NAME } : 'sopro_db');

session_start();
?>
