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
                ],
            ],
        ],
        // 'driver' => [
        //     // defines an annotation driver with one path, and names it `my_annotation_driver`
        //     'my_annotation_driver' => [
        //         'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
        //         'cache' => 'array',
        //         'paths' => [
        //             __NAMESPACE__
        //         ],
        //     ],

        //     // default metadata driver, aggregates all other drivers into a single one.
        //     // Override `orm_default` only if you know what you're doing
        //     'orm_default' => [
        //         'drivers' => [
        //             // register `my_annotation_driver` for any entity under namespace `My\Namespace`
        //             'User' => 'my_annotation_driver',
        //         ],
        //     ],
        // ],

    ],
];
