<?php
namespace Database\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Ddl;
use Zend\Db\Sql\Ddl\Column;
use Zend\Db\Sql\Ddl\Constraint;


class DdlController extends AbstractActionController{

    function setAdapter(){
        return new Adapter([
            'driver'   => 'Pdo_Mysql',
            'database' => 'zend2112',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ]);
    }
    // id: int, PK, AI
    // email: varchar(100), unique
    // name: varchar(100)
    // password: varchar(100)
    // address: varchar(100)
    
    function createTableAction(){
        $table = new Ddl\CreateTable('customers');

        $column = new Column\Integer('id');
        $column->setOption('AUTO_INCREMENT', true);
        $table->addColumn($column);
        $table->addConstraint(new Constraint\PrimaryKey('id'));
        
        $table->addColumn(new Column\Varchar('email',100));
        $table->addConstraint(
            new Constraint\UniqueKey(['email'], 'my_unique_key')
        );
        
        $table->addColumn(new Column\Varchar('name',100));
        $table->addColumn(new Column\Varchar('password',100));
        $table->addColumn(new Column\Varchar('address',100));

        $adapter = $this->setAdapter();
        $sql = new Sql($adapter);

        $query = $sql->getSqlStringForSqlObject($table);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );

        echo "Created";
        echo "<hr>";
        echo $query; 
        /**
         * CREATE TABLE `customers` ( `id` INTEGER NOT NULL AUTO_INCREMENT, `email` VARCHAR(100) NOT NULL, `name` VARCHAR(100) NOT NULL, `password` VARCHAR(100) NOT NULL, `address` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`), CONSTRAINT `my_unique_key` UNIQUE (`email`) )

         */

        return false;
        
    }

    function alterTableAction(){
        $table = new Ddl\AlterTable('Book');
        $table->addConstraint(
            new Constraint\ForeignKey(
                'book_user',
                'user_id',
                'User',
                'id',
                'CASCADE',
                'CASCADE'
            )
        );
        $table->changeColumn('content', new Column\Text('description', 500));

        $adapter = $this->setAdapter();
        $sql = new Sql($adapter);

        $query = $sql->getSqlStringForSqlObject($table);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );

        echo "Updated";
        echo "<hr>";
        echo $query;
        /**
         * ALTER TABLE `Book` CHANGE COLUMN `content` `description` TEXT(500) NOT NULL, 
         * ADD CONSTRAINT `book_user` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

         */

        return false;
    }

    function dropTableAction(){
        $table = new Ddl\DropTable('customers');

        $adapter = $this->setAdapter();
        $sql = new Sql($adapter);

        $query = $sql->getSqlStringForSqlObject($table);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );

        echo "Deleted";
        echo "<hr>";
        echo $query;
        /**
         *DROP TABLE `customers`
         */

        return false;
    }
}