<?php
namespace Products\Model;


class Products{
    /**
     * `id`, `id_type`, `id_url`, `name`, `summary`, `detail`, `price`, `promotion_price`, `image`, `size`, `material`, `color`, `update_at`, `unit`, `noibat`, `deleted`
     */

    public $id; 
    public $id_type; 
    public $id_url; 
    public $name; 
    public $summary; 
    public $detail; 
    public $price; 
    public $promotion_price; 
    public $image; 
    public $size; 
    public $material; 
    public $color; 
    public $update_at; 
    public $unit; 
    public $noibat; 
    public $deleted;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->id_type = !empty($data['id_type']) ? $data['id_type'] : null;
        $this->id_url  = !empty($data['id_url']) ? $data['id_url'] : null;
        $this->name  = !empty($data['name']) ? $data['name'] : null;
        $this->summary  = !empty($data['summary']) ? $data['summary'] : null;
        $this->detail  = !empty($data['detail']) ? $data['detail'] : null;
        $this->price  = !empty($data['price']) ? $data['price'] : 0;
        $this->promotion_price  = !empty($data['promotion_price']) ? $data['promotion_price'] : 0;
        $this->image  = !empty($data['image']) ? $data['image'] : null;
        $this->size  = !empty($data['size']) ? $data['size'] : null;
        $this->material  = !empty($data['material']) ? $data['material'] : null;
        $this->color  = !empty($data['color']) ? $data['color'] : null;
        $this->update_at  = !empty($data['update_at']) ? $data['update_at'] : null;
        $this->unit  = !empty($data['unit']) ? $data['unit'] : null;
        $this->noibat  = !empty($data['noibat']) ? $data['noibat'] : 0;
        $this->deleted  = !empty($data['deleted']) ? $data['deleted'] : 0;
    }

    function getArrayCopy(){
        return get_object_vars($this);
    }
}

?>