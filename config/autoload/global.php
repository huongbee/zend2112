<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
use Zend\Session\Validator\RemoteAddr;
use Zend\Session\Validator\HttpUserAgent;
use Zend\Session\Storage\SessionArrayStorage;

return [
    'db' => [
        'driver' => 'Pdo',
        'dsn'    => 'mysql:dbname=zend2112;host=localhost;charset=utf8',
        'username' => 'root',
        'password' => ''
    ],
    'doctrine' => [
        'connection' => [
            // default connection name
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '',
                    'dbname'   => 'zend2112',
                    'charset'  => 'utf8',
                    'default_timezone'=> 'Asia/Ho_Chi_Minh'
                ],
            ],
        ],
    ],
    'session_config'=>[
        'cookie_lifetime'=> 86400*2,
        'gc_maxlifetime'=>2*86400
    ],
    'session_manager'=>[
        'validators'=>[
            RemoteAddr::class,
            HttpUserAgent::class
        ]
    ],
    'session_storage'=>[
        'type'=>SessionArrayStorage::class
    ]
];
