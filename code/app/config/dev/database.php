<?php

return array(
	'default' => 'mysql',
	'connections' => array(
		'sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'     => 'localhost',
			'database' => 'ameis',
			'username' => 'test',
			'password' => 'test',
			'prefix'   => '',
			),

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'ameis',
			'username'  => 'test',
			'password'  => 'test',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			),

		),

	);
