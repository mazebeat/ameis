<?php

return array(
	'default' => 'sqlsrv',
	'connections' => array(
		'sqlsrv' => array(
			'driver'   => 'sqlsrv',
			'host'     => '190.44.200.136',
			'database' => 'AMEIS',
			'username' => 'sa',
			'password' => 'Ameis*2015',
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
