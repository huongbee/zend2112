<?php
namespace User\Controller\Factory;
use User\Controller\UserController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


class UserControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get(\Doctrine\ORM\EntityManager::class);
        $userManager = $container->get(\User\Service\UserManger::class);
        return new UserController($entityManager, $userManager );
    }
}




?>