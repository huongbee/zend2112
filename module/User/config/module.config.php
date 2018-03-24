<?php

namespace User;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '[/:controller][/:action]',
                    'defaults' => [
                        'controller'=>'user',
                        'action'=>'index'
                    ],
                    'constraints'=>[
                        //'page'=>'[0-9]+'
                    ]
                ],
            ],
            
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\UserController::class => InvokableFactory::class
        ],
        'aliases'=>[
            'user'=>Controller\UserController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
