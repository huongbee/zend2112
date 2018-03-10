<?php
namespace Products\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ProductsTable {
    private $tabelGateway;

    function __construct(TableGatewayInterface $table){
        $this->tabelGateway = $table;
    }

    function testConnect(){//get table name
        return $this->tabelGateway->getTable();
    }

    function getAllProducts(){
        return $this->tabelGateway->select();
    }
}


?>