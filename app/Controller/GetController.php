<?php


namespace App\Controller;
use App\Model\Product;
use Exception;
class GetController
{
    private $idGet;

    public function __construct($id)
    {
    $this->idGet=$id;
    }

    public  function returnData(){
        $product=new Product();
        $check=$product->find('id',$this->idGet);

        if ($check) {
            return $check;
        }
        else   {throw new Exception("Cannot fetch data due to an error");}


    }
}
