<?php
namespace User\Controller\Factory;
use User\Controller\AuthController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use User\Service\UserManager;
use User\Service\AuthManager;
use Zend\Authentication\AuthenticationService;


class AuthControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $userManager = $container->get(\User\Service\UserManager::class);
        $authManager = $container->get(AuthManager::class);
        $authService = $container->get(AuthenticationService::class);

        return new AuthController($entityManager, $userManager, $authManager, $authService);
    }
}




?>