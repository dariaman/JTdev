<?php

return [
    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=127.0.0.1;dbname=jt',    
//    'username' => 'root',
//    'password' => 'C3ntos@2017',
    
    'dsn' => 'mysql:host=localhost;dbname=jt',    
    'username' => 'root',
    'password' => '',

	'enableSchemaCache' => true,
	// Name of the cache component used to store schema information
	'schemaCache' => 'cache',
	// Duration of schema cache.
	'schemaCacheDuration' => 86400, // 24H it is in seconds
	'charset' => 'utf8', 
];
