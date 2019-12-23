<?php


namespace App\Controller;

use App\Model\Product;
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
        else return "unsuccess";
    }


}
