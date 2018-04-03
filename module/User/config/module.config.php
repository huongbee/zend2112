<?php

namespace User;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
//use Zend\ServiceManager\Factory\InvokableFactory;
use User\Controller\Factory\UserControllerFactory;
return [
    'router' => [
        'routes' => [
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '[/:controller][/:action][/:id]',
                    'defaults' => [
                        //'controller'=>'user',
                        //'action'=>'index'
                    ],
                    'constraints'=>[
                        //'page'=>'[0-9]+'
                    ]
                ],
            ],
            'forget-password' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/forget-password',
                    'defaults' => [
                        'controller'=>'user',
                        'action'=>'forgetPassword'
                    ],
                    'constraints'=>[
                        //'page'=>'[0-9]+'
                    ]
                ],
            ],
            'set-password' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/set-password[/:token]',
                    'defaults' => [
                        'controller'=>'user',
                        'action'=>'setPassword'
                    ],
                    'constraints'=>[
                        'token'=>'[a-zA-Z0-9]+'
                    ]
                ],
            ],
            
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\UserController::class => UserControllerFactory::class
        ],
        'aliases'=>[
            'user'=>Controller\UserController::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ]
    ],
    'doctrine'=>[
        'driver' => [
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'my_annotation_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__.'/../src/Entity'
                ],
            ],
    
            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => [
                'drivers' => [
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    __NAMESPACE__.'\Entity' => 'my_annotation_driver',
                ],
            ],
        ],
    ],

    'service_manager'=>[
        'factories'=>[
            Service\UserManager::class => Service\Factory\UserManagerFactory::class
        ]
    ],
];
