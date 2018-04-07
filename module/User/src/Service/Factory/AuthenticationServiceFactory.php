<?php
namespace User\Service\Factory;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\Factory\FactoryInterface;
use User\Service\AuthAdapter;
use Zend\Session\SessionManager;
use Zend\Authentication\Storage\Session;



class AuthenticationServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $authAdapter = $container->get(AuthAdapter::class);

        $sessionManager = $container->get(SessionManager::class);
        $authStorage = new Session('Zend_Auth','session',$sessionManager);
        
        return new AuthenticationService($authStorage, $authAdapter);
    }
}

?>