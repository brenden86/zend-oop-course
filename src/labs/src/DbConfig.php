<?php
define('DB_HOSTNAME', 'localhost:63088'); // local mariadb container
define('DB_USERNAME', 'vagrant');
define('DB_PASSWORD', 'vagrant');
define('DB_NAME', 'phpcourse');
define('DB_DSN', 'mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_NAME);