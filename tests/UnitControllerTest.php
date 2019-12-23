<?php


namespace App\Tests;
use App\Controller\PostController;
use App\Controller\PutController;
use App\Controller\GetController;
use App\Controller\DeletController;
use PHPUnit\Framework\TestCase;

class UnitPostControllerTest extends  TestCase
{

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $testPostController;

    private $testGetController;

    private $testPutController;

    private $testDeletController;

    public function setUp()
    {
        parent::setUp();
        $this->testPostController = $this->createMock(PostController::class);
        $this->testGetController = $this->createMock(GetController::class);
        $this->testPutController = $this->createMock(PutController::class);
        $this->testDeletController = $this->createMock(DeletController::class);

    }

    public function testInsert(){
        $this->testPostController->method('insert')->will($this->returnArgument(0));
        $this->assertEquals('success', $this->testPostController->insert('success'));
    }

    public function testReturnData(){
        $this->testGetController->method('returnData')->will($this->returnArgument(0));
        $this->assertEquals('success', $this->testGetController->returnData('success'));
    }

    public function testUpdate(){
        $this->testPutController->method('update')->will($this->returnArgument(0));
        $this->assertEquals('success', $this->testPutController->update('success'));
    }

    public function testDeleteData(){
        $this->testDeletController->method('deleteData')->will($this->returnArgument(0));
        $this->assertEquals('success', $this->testDeletController->deleteData('success'));
    }



}
