<?php
namespace Products\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Products\Model\ProductsTable;

class ProductController extends AbstractActionController{
    
    public $table;
    function __construct(ProductsTable $table){
        $this->table = $table;
    }

    function testDbAction(){
        //echo $this->table->testConnect();
        $result = $this->table->getAllProducts();
        foreach($result as $product){
            echo "<pre>";
            print_r($product);
            echo "</pre>";
        }
        return false;
    }

    function indexAction(){
        //    $products = $this->table->getAllProducts();
        $products = $this->table->fetchAll();
        return new ViewModel(['products'=>$products]);
    }

    function addAction(){

    }
    
    function editAction(){

    }

    function deleteAction(){

    }
}





?>