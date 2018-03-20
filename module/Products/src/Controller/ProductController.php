<?php
namespace Products\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Products\Model\ProductsTable;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Products\Form\ProductForm;
use Zend\Filter\File\Rename;
use Products\Model\Products;
use Zend\Mvc\Plugin\FlashMessenger;

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

        $types = $this->table->getAllType();

        $arrayType = [];
        foreach($types as $type){
            $arrayType[$type['id']] = $type['name'];
        }
        $form->get('id_type')->setValueOptions($arrayType);

        $request = $this->getRequest();
        if($request->isGet()){
            return new ViewModel(['form'=>$form]);
        }
        //luu db
        $data = $request->getPost()->toArray();
        $file = $request->getFiles()->toArray();
        $data = array_merge($data,$file);
        // print_r($data);
        $form->setData($data);
        if(!$form->isValid()){
            return new ViewModel(['form'=>$form]);
        }

        //upload file
        $arrayImage = [];
        foreach($data['image'] as $image){
            $newName = time().'-'.$image['name'];
            $arrayImage[] = $newName;
            $rename = new Rename([
                'target'=>FILE_PATH.'images/'.$newName,
                'overwrite'=>true
            ]);
            $rename->filter($image);
        }
        $jsonImage = json_encode($arrayImage);
        $data['image'] = $jsonImage;
        $data['update_at'] = date('Y-m-d',time());
        
        $alias = changeTitle($data['name']);
        $data['id_url'] = $this->table->saveUrl($alias);
        
        $product = new Products;
        $product->exchangeArray($data);
        $this->table->saveProduct($product);

        $this->flashMessenger()->addSuccessMessage('Thêm thành công');
        return $this->redirect()->toRoute('products',[
            'controller'=>'product',
            'action'=>'index'
        ]);

    }
    
    function editAction(){
        $id = (int)$this->params()->fromRoute('page'); //id
        $flag = true;
        if($id===0) $flag = false;

        $product = $this->table->findProduct($id);
        if(!$product) $flag = false;

        if(!$flag){
            $this->flashMessenger()->addWarningMessage('Không tìm thấy sản phẩm');
            return $this->redirect()->toRoute('products',[
                'controller'=>'product',
                'action'=>'index'
            ]);
        }
        //print_r($product);return false;
        $form = new ProductForm('edit');

        $types = $this->table->getAllType();

        $arrayType = [];
        foreach($types as $type){
            $arrayType[$type['id']] = $type['name'];
        }
        $form->get('id_type')->setValueOptions($arrayType);


        $form->bind($product);
        return new ViewModel(['form'=>$form,'product'=>$product]);
    }

    function deleteAction(){

    }
}





?>