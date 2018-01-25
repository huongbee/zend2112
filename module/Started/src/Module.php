<?php



namespace Started;

class Module
{
    public function getConfig()
    {
       // echo __DIR__; //Applications/XAMPP/xamppfiles/htdocs/zend2112/module/Started/src
        return include __DIR__ . '/../config/module.config.php';
    }
}


?>