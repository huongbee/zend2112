<?php

namespace Form;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'form' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/form[/:controller][/:action]',
                    'defaults' => [
                        'controller' => 'index',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\ContactController::class => InvokableFactory::class,
        ],
        'aliases'=>[
            'index'=>Controller\IndexController::class,
            'contact'=>Controller\ContactController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
