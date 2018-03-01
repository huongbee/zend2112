<?php
namespace Database\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;

class IndexController extends AbstractActionController{

    function indexAction(){
        $adapter = new Adapter([
            'driver'   => 'Pdo_Mysql',
            'database' => 'zend2112',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ]);

        $sql = "SELECT * FROM User where id=? and name=?";
        //$stmt = $adapter->query($sql);
        $stmt = $adapter->createStatement($sql,[1,'Huong2']);
        $result = $stmt->execute();

        foreach($result as $user){
            echo "<pre>";
            print_r($user);
            echo "</pre>";
        }
        return false;
    }
}

?>