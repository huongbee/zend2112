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
        $select->order('name_type ASC');
        $statement = $sql->prepareStatementForSqlObject($select);
        return $results = $statement->execute();
    }

    
}


?>