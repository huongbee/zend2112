<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Started;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'started' => [ //name route
                'type' => Literal::class, //type route
                'options' => [
                    'route'    => '/started/index', //url
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'index', //function chạy mặc định
                    ],
                ],
            ],
            'started_2' => [ //name route
                'type' => Literal::class, //type route
                'options' => [
                    'route'    => '/started/admin/index', //url
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action'     => 'index', //function chạy mặc định
                    ],
                ],
            ]
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\UserController::class => InvokableFactory::class,
            Controller\AdminController::class => InvokableFactory::class
        ],
    ]
];
