<?php

return array(
	'default' => 'sqlsrv',
	'connections' => array(
		'sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'     => 'localhost',
			'database' => 'ameis',
			'username' => 'sa',
			'password' => 'mz.120712',
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
