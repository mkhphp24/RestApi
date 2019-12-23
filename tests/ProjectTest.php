<?php
namespace App\Tests;
use App\Model\Product;
use GuzzleHttp;
use PHPUnit\Framework\TestCase;


class ProjectTest extends  TestCase
{

    private $client;
    private $product;
    private $urlPath="http://localhost:8005";
    public function setUp()
    {
        parent::setUp();

        $this->client = new \GuzzleHttp\Client();
        $this->product=new Product();
        $this->product->create(['name' => 'CD', 'cost' => 2000, 'location' => 'Berlin','id'=>1]);
        $this->product->create(['name' => 'Tablet', 'cost' => 3000, 'location' => 'munich','id'=>2]);
        $this->product->create(['name' => 'Monitor', 'cost' => 4000, 'location' => 'Dresden','id'=>3]);
        $this->product->create(['name' => 'Tv', 'cost' => 5000, 'location' => 'hannover','id'=>4]);

    }
    public function testGEt()
    {

        $response =  $this->client->request('GET', $this->urlPath.'/getproduct/1');

        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals('{"result":{"name":"CD","cost":"2000","location":"Berlin","id":"1"}}',$response->getBody()->getContents());
    }

    public function testPost()
    {

        $response =  $this->client->request('POST', $this->urlPath.'/getproduct/', [
            'body' => '{"name": "testDAta","cost":400,"location":"Berlin","id":5}'
        ]);

        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals('{"result":"success"}',$response->getBody()->getContents());
    }

    public function testPut()
    {

        $response =  $this->client->request('PUT', $this->urlPath.'/getproduct/', [
            'body' => '{"name": "change city","cost":300,"location":"citychange","id":1}'
        ]);

        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals('{"result":"success"}',$response->getBody()->getContents());
    }

    public function testDelete()
    {

        $response =  $this->client->request('DELETE', $this->urlPath.'/getproduct/2');

        $this->assertEquals(200,$response->getStatusCode());
        $this->assertEquals('{"result":"success"}',$response->getBody()->getContents());
    }

    public function tearDown()
    {
        parent::tearDown();

        $this->product->delete('1');
        $this->product->delete('2');
        $this->product->delete('3');
        $this->product->delete('4');


    }



}
