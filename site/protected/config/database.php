<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'mysql:host=percona;dbname=' . getenv('DB_NAME'),
	'emulatePrepare' => true,
	'username' => getenv('DB_LOGIN'),
	'password' => getenv('DB_PASS'),
	'charset' => 'utf8',
);