<?php
namespace Products\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\Sql\Sql;

class ProductsTable {
    private $tabelGateway;

    function __construct(TableGatewayInterface $table){
        $this->tabelGateway = $table;
    }

    function testConnect(){//get table name
        return $this->tabelGateway->getTable();
    }

    function getAllProducts(){
        //return $this->tabelGateway->select();//select all
        return $this->tabelGateway->select('deleted = 0');
    }

    function fetchAll(){
        $adapter = $this->tabelGateway->getAdapter();

        $sql = new Sql($adapter);
        $select = $sql->select(['p'=>'products']);
        $select->join(
            ['m'=>'menu'],
            'm.id = p.id_type',
            [
                'name_type'=>'name'
            ]
        );
        $select->where('deleted = 0');
        $select->order('p.id DESC');
        $statement = $sql->prepareStatementForSqlObject($select);
        return $results = $statement->execute();
    }

    function getAllType(){
        $adapter = $this->tabelGateway->getAdapter();

        $sql = new Sql($adapter);
        $select = $sql->select('menu')->where('hide<>2');
        // echo $sql->getSqlStringForSqlObject($select);
        // die;
        $statement = $sql->prepareStatementForSqlObject($select);
        return $results = $statement->execute();
    }

    function saveUrl($alias){
        $adapter = $this->tabelGateway->getAdapter();

        $sql = new Sql($adapter);
        $insert = $sql->insert('page_url');
        $insert->values(
            ['url'=>$alias]
        );
        $statement = $sql->prepareStatementForSqlObject($insert);
        $statement->execute();
        return $adapter->getDriver()->getConnection()->getLastGeneratedValue();
    }

    function saveProduct(Products $data){
        //print_r($data);die;
        $product = [
            'id_type' => $data->id_type,
            'id_url'=>$data->id_url,
            'name'=>$data->name,
            'summary'=>$data->summary,
            'detail'=>$data->detail,
            'price'=>$data->price,
            'promotion_price'=>$data->promotion_price,
            'image'=>$data->image,
            'size'=>$data->size,
            'material'=>$data->material,
            'color'=>$data->color,
            'update_at'=>$data->update_at,
            'unit'=>$data->unit,
            'noibat'=>$data->noibat
        ];
        $this->tabelGateway->insert($product);
        return;
    }

    
}


?>