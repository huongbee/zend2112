<?php

namespace Products;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'products' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '[/:controller][/:action][/:page]',
                    'defaults' => [
                        'page'=>1
                    ],
                    'constraints'=>[
                        'page'=>'[0-9]+'
                    ]
                ],
            ],
            
        ],
    ],
    'controllers' => [
        // 'factories' => [
        //     Controller\ProductController::class => InvokableFactory::class
        // ],
        'aliases'=>[
            'product'=>Controller\ProductController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
