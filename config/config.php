<?php

return [
	'settings' => [
		'httpVersion' => '1.1',
		'responseChunkSize' => 4096,
		'outputBuffering' => 'append',
		'determineRouteBeforeAppMiddleware' => false,
		'displayErrorDetails' => false,
		'addContentLengthHeader' => true,
		'routerCacheFile' => false,
		'environment' => 'development', // production|development
		'database' => [
			'active' => 'default',
			'default' => [
				'type'        => 'pdo',
				'connection'  => [
					'dsn'        => 'sqlite::memory:',
					'username'   => '',
					'password'   => '',
					'persistent' => false,
				],
				'identifier'   => '`',
				'table_prefix' => '',
				'charset'      => 'utf8mb4',
				'collation'    => 'utf8mb4_unicode_ci',
				'enable_cache' => true,
			],
			'doctrine2' => [
				'proxy_dir'       => ROOTPATH.'cache'.DS.'doctrine2_proxies',
				'entity_pathes'   => [
					ROOTPATH.'src'.DS.'Model',
				],
				'migrations'      => [
					'migrations_namespace' => 'Art4\YouthwebEvent\DoctrineMigrations',
					'table_name' => 'doctrine_migration_versions',
					'migrations_directory' => ROOTPATH.'migrations'.DS.'doctrine2'.DS,
				],
			],
		],
		'youthweb_client' => [
			'client_id'     => '{client_id}',
			'client_secret' => '{client_secret}',
			'redirect_url'  => 'http://localhost:8080/auth',
		],
		'site' => [
			// how much entries can be created by an user
			'max_entries' => 5,
			// Ids of Admins
			'admin_ids' => [
				// 1, 234, ...
			],
		],
		'views' => [
			'twig' => [
				'template_path' => ROOTPATH.'templates'.DS,
				'environment' => [
					'auto_reload' => false,
					'cache_path' => ROOTPATH.'cache'.DS.'twig'.DS,
				],
			],
		],
		'cachepool' => [
			'cache_path' => ROOTPATH.'cache'.DS.'cachepool'.DS,
		],
		'routes' => [
			'/' => [
				'GET' => '\Art4\YouthwebEvent\Controller:getIndex',
			],
			'/auth' => [
				'GET' => '\Art4\YouthwebEvent\Controller:getAuth',
			],
			'/join' => [
				'GET' => '\Art4\YouthwebEvent\Controller:getJoin',
				'POST' => '\Art4\YouthwebEvent\Controller:postJoin',
			],
			'/delete_post/{id:[0-9]+}' => [
				'POST' => '\Art4\YouthwebEvent\Controller:deletePost',
			],
			'/delete_user/{id:[0-9]+}' => [
				'POST' => '\Art4\YouthwebEvent\Controller:deleteUser',
			],
			'/logout' => [
				'GET' => '\Art4\YouthwebEvent\Controller:getLogout',
			],
		],
	],
];
