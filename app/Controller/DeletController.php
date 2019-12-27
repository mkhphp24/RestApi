<?php


namespace App\Controller;

use App\Model\Product;
use Exception;

class DeletController
{
    private $idGet;
    public function __construct($id)
    {
        $this->idGet=$id;
    }

    public  function deleteData(){
        $product=new Product();
        $check=$product->delete($this->idGet);
        if( $check ) return "success";
        else    {throw new Exception("Cannot Delete Data ");}
    }


}
