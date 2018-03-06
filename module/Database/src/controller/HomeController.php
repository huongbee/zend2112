<?php
namespace Database\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Expression;


class HomeController extends AbstractActionController{
    function connectDB(){
        return new Adapter([
            'driver'   => 'Pdo_Mysql',
            'database' => 'furniture_2',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ]);
    }
    //Liệt kê danh sách sản phẩm gồm có tên Tên sp,Đơn giá, Hình. Sắp xếp giảm theo cột đơn giá
    function index01Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from('products');
        $select->columns([
            'ten'=>'name',
            'dongia'=>'price',
            'hinh'=>'image'
        ]);
        $select->order('price DESC');
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);

        foreach($results as $product){
            echo "<pre>";
            print_r($product);
            echo "</pre>";
        }
        return false;
    }

    function index02Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from('customers');
        $select->columns([
            'ten'=>'name',
            'gioitinh'=>'gender',
            'dienthoai'=>'phone'
        ]);
        $select->order('name ASC');
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);

        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }

    //Liệt kê danh sách sản phẩm gồm có: Tên sp, Mô tả, Đơn giá. Chỉ liệt kê các Sản phẩm "Sofa" và giá lớn hơn > 1.000.0000
    function index03Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from('products');
        $select->columns([
            'ten'=>'name',
            'dongia'=>'price',
            'mota'=>'detail'
        ]);
        $select->where(function (Where $where) {
            $where->like('name', '%Sofa%');
        });
        $select->where([
            'price > 1000000'
        ]);
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        
        //echo count($results);
        //echo $selectString; 
        // SELECT `products`.`name` AS `ten`, `products`.`price` AS `dongia`, `products`.`detail` AS `mota` FROM `products` WHERE `name` LIKE '%Sofa%' AND price > 1000000

        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }
    //Cho biết tên sản phẩm, Mô tả, đơn giá của 10 sản phẩm có đơn giá cao nhất.
    function index04Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from('products');
        $select->columns([
            'ten'=>'name',
            'dongia'=>'price',
            'mota'=>'detail'
        ]);
        $select->order('price DESC')->limit(10)->offset(0);

        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        echo count($results);
        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }

    //Cho biết đơn giá trung bình của các sp hiện có trong cửa hàng
    function index05Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from('products');
        $select->columns([
            'DGTB'=>new Expression('avg(price)')
        ]);
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        echo $selectString; //SELECT avg(price) AS `DGTB` FROM `products`
        
        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }

    //Liệt kê danh sách sản phẩm gồm có tên Tên loại, Tên sp, Mô tả, Đơn giá và sắp xếp Tên loại theo chiều tăng dần.
    function index06Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(['p'=>'products']);

        $select->columns(['name', 'detail','price']);

        $select->join(
            ['m'=>'menu'],
            'p.id_type = m.id',
            ['name_type'=>'name']
        );
        $select->order('m.name ASC');
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        echo $selectString; //SELECT avg(price) AS `DGTB` FROM `products`
        
        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }

    //Thống kê tổng số sản phẩm theo Loại, gồm các thông tin: Tên Loại sản phẩm, tổng số sản phẩm, có sắp tăng theo tổng số sản phẩm
    function index07Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(['m'=>'menu']);

        $select->columns(['name']);

        $select->join(
            ['p'=>'products'],
            'p.id_type = m.id',
            ['tongSP'=>new Expression('count(p.id)')]
        );
        $select->group('m.name');
        $select->order('tongSP ASC');
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        echo $selectString; //SELECT avg(price) AS `DGTB` FROM `products`
        
        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }

    //Cho biết đơn giá trung bình/min/max của sản phẩm theo từng Loại sản phẩm.
    function index08Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(['m'=>'menu']);

        $select->columns(['name']);

        $select->join(
            ['p'=>'products'],
            'p.id_type = m.id',
            [
                'trungbinh'=>new Expression('avg(p.price)'),
                'nhonhat'=>new Expression('min(p.price)'),
                'lonnhat'=>new Expression('max(p.price)')
            ]
        );
        $select->group('m.name');
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        echo $selectString; //SELECT avg(price) AS `DGTB` FROM `products`
        
        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }


    //Cho biết tổng giá tiền và số sản phẩm của sản phẩm có đơn giá trong khoảng 1.000.000đ đến 3.000.000đ theo từng loại sản phẩm.
    function index09Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(['m'=>'menu']);

        $select->columns(['name']);

        $select->join(
            ['p'=>'products'],
            'p.id_type = m.id',
            [
                'tongtien'=>new Expression('sum(p.price)'),
                'tongSP'=>new Expression('count(p.price)')
            ]
        );
        $select->where(function(Where $where){
            $where->between(
                'price',
                1000000,
                3000000
            );
        });
        $select->group('m.name');
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        echo $selectString; //SELECT avg(price) AS `DGTB` FROM `products`
        
        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }

    //Cho biết đơn giá trung bình sản phẩm thuộc loại sản phẩm là "Tủ bếp"
    function index10Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from(['m'=>'menu']);

        $select->columns(['name']);

        $select->join(
            ['p'=>'products'],
            'p.id_type = m.id',
            [
                'trungbinh'=>new Expression('avg(p.price)')
            ]
        );
        $select->where('m.name = "Tủ bếp"');
        $select->group('m.name');
        $selectString = $sql->buildSqlString($select);
        $results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);
        echo $selectString; //SELECT avg(price) AS `DGTB` FROM `products`
        
        foreach($results as $cus){
            echo "<pre>";
            print_r($cus);
            echo "</pre>";
        }
        return false;
    }

    //Thêm thông tin user mới là thông tin của bạn
    function index11Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $insert = $sql->insert('users');
        $insert->values([
            'email'=>'huong01@gmail.com',
            'password'=>'23232323',
            'fullname'=>'Huong Huong'
        ]);
        $stmt = $sql->prepareStatementForSqlObject($insert);
        $result = $stmt->execute();
        //print_r($result);   
        echo "inserted";
        return false;
    }


    //Thêm hoá đơn mới cho khách hàng có mã số là 16, mua 8 chiếc "Ghế văn phòng JONES"

    function index12Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $insert = $sql->insert('bills');
        $insert->values([
            'id_customer'=>16,
            'date_order'=>date('Y-m-d',time()),
            'total'=>8*2790000
        ]);
        $stmt = $sql->prepareStatementForSqlObject($insert);
        $result = $stmt->execute();
        //print_r($result);   
        echo "inserted";
        return false;
    }

    //Xoá sp có đơn giá < 50.000 //khoa ngoai
    function index13Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $delete =  $sql->delete('products')
                    ->where('price<50000');
        
        $stmt = $sql->prepareStatementForSqlObject($delete);
        $result = $stmt->execute();
        //print_r($result);   
        echo "deleted";
        return false;
    }

    //Xoá sp có đơn giá < 50.000
    function index132Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $update =  $sql->update('products')
                    ->set([
                        'deleted'=>1
                    ])
                    ->where('price<50000');
        
        $stmt = $sql->prepareStatementForSqlObject($update);
        $result = $stmt->execute();
        //print_r($result);   
        echo "deleted";
        return false;
    }

    //Xoá token và token_date của những đơn hàng đã xác nhận 
    function index14Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $update =  $sql->update('bills')
                    ->set([
                        'token'=>'',
                        'token_date'=>''
                    ])
                    ->where('status = 1');
        
        $stmt = $sql->prepareStatementForSqlObject($update);
        $result = $stmt->execute();
        //print_r($result);   
        echo "updated";
        return false;
    }


    //Cập nhật lại đơn giá khuyến mãi cho sp "Giường ALBANY" biết rằng sp được khuyến mãi 10%
    function index15Action(){
        $adapter = $this->connectDB();

        $sql = new Sql($adapter);
        $update =  $sql->update('products')
                    ->set([
                        'promotion_price'=>0.9*6990000
                    ])
                    ->where('name = "Giường ALBANY"');
        
        $stmt = $sql->prepareStatementForSqlObject($update);
        $result = $stmt->execute();
        //print_r($result);   
        echo "updated";
        return false;
    }
}