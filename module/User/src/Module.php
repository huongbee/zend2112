<?php
namespace User;
use Zend\Mvc\MvcEvent;
use User\Service\AuthManager;
use Zend\Mvc\Controller\AbstractActionController;
use User\Controller\AuthController;


class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getAutoloaderConfig(){
        return [
            'Zend\Loader\StandardAutoloader'=>[
                'namespaces'=>[
                    __NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__
                ]
            ]
        ];
    }
}


?>