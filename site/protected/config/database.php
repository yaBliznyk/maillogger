<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'mysql:host=localhost;dbname=' . getenv('DB_NAME'),
	'emulatePrepare' => true,
	'username' => getenv('DB_USER'),
	'password' => getenv('DB_PASS'),
	'charset' => 'utf8',
);