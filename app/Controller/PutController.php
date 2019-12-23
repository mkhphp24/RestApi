<?php


namespace App\Controller;


use App\Model\Product;

class PutController
{
    private $dataput;
    public function __construct($dataput)
    {
        $this->dataput=$dataput;
    }

    public function update(){
        $product=new Product();
        $attributes = [];
        $attributes['name'] =$this->dataput['name'] ?? null;
        $attributes['cost'] =  $this->dataput['cost'] ?? null;
        $attributes['location'] = $this->dataput['location'] ?? null;
        $attributes['id'] = $this->dataput['id'] ?? null;

        $check=$product->update(['name' => $attributes['name'], 'cost' => $attributes['cost'], 'location' =>  $attributes['location'], 'id' =>  $attributes['id']]);
        if( $check ) return "success";
        else return "unsuccess";
    }
}
