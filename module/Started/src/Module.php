<?php



namespace Started;

class Module
{
    public function getConfig()
    {
        //echo __DIR__;
        return include __DIR__ . '/../config/module.config.php';
    }
}


?>