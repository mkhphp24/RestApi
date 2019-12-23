<?php


namespace App\Controller;

use App\Model\Product;

/**
 * Class PostController
 * @package App\Controller
 */
class PostController
{

    private $dataPost;

    public function __construct($datapost)
    {
        $this->dataPost=$datapost;
    }

    /**
     * @return string
     */
public function insert(){
    $product=new Product();
    $attributes = [];
    $attributes['name'] =$this->dataPost['name'] ?? null;
    $attributes['cost'] =  $this->dataPost['cost'] ?? null;
    $attributes['location'] = $this->dataPost['location'] ?? null;

    $check=$product->create(['name' => $attributes['name'], 'cost' => $attributes['cost'], 'location' =>  $attributes['location']]);
    if( $check ) return "success";
    else return "unsuccess";
}

}
