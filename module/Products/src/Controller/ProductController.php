<?php
namespace Products\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Products\Model\ProductsTable;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Products\Form\ProductForm;

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
        $page = $this->params()->fromRoute('page');
        
        $products = $this->table->fetchAll();

        $arrProducts = [];
        foreach($products as $p){
            $arrProducts[] = $p; 
        }
        $paginator = new Paginator(new ArrayAdapter($arrProducts));
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage(5);
        $paginator->setPageRange(5);

        return new ViewModel(['products'=>$paginator]);
    }

    function addAction(){
        $form = new  ProductForm();
        $request = $this->getRequest();
        if($request->isGet()){
            return new ViewModel(['form'=>$form]);
        }
        //luu db
    }
    
    function editAction(){

    }

    function deleteAction(){

    }
}





?>