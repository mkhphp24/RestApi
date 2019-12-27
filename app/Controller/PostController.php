<?php


namespace App\Controller;

use App\Model\Product;
use Exception;

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
    $attributes['description'] = $this->dataPost['description'] ?? null;
    $attributes['id'] = $this->dataPost['id'] ?? null;


    $check=$product->create(['name' => $attributes['name'], 'cost' => $attributes['cost'], 'location' =>  $attributes['location'] , 'description' =>  $attributes['description'], 'id' =>  $attributes['id'] ]);
    if( $check ) {return "success";}
    else    {throw new Exception("Cannot insert Data to an error");}
}

}
