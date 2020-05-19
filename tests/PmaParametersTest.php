<?php

namespace App\Tests;

use App\Controller\PmaParametersController;
use App\Entity\PmaParameters;
use App\Service\PmaParametersService;
use Monolog\Test\TestCase;

class PmaParametersTest extends TestCase
{
    /**
     * @var PmaParametersService
     */
    private $service;

    /**
     * @var PmaParametersController
     */
    private $controller;
    /**
     * @var PmaParameters
     */
    private $parameter;

    public function testSomething()
    {
        $this->assertTrue(true);
    }

    public function testCreateParameters()
    {
        $pma = new PmaParameters();
        $pma->setDescriptionCode('Uol');
        $pma->setValue('Compasso Diveo');
        $pma->setActionPma('Update');
        $pma->setLivpnr('Compasso Diveo UOL');
        $pma->setReasonCode('Unificação Diveo e Compasso');
        $pma->setPartner('UOL');

        $this->assertEquals('Uol',$pma->getDescriptionCode());
        $this->assertNotEquals('UOL',$pma->getDescriptionCode());
        $this->assertEquals('Compasso Diveo',$pma->getValue());
        $this->assertNotEquals('COMPASSO DIVEO',$pma->getValue());
        $this->assertEquals('Update',$pma->getActionPma());
        $this->assertNotEquals('Submit_Order',$pma->getActionPma());
        $this->assertEquals('Compasso Diveo UOL',$pma->getLivpnr());
        $this->assertNotEquals('COMPASSO Diveo UOL',$pma->getLivpnr());
        $this->assertEquals('Unificação Diveo e Compasso',$pma->getReasonCode());
        $this->assertNotEquals('Unificação Diveo e COMPASSO',$pma->getReasonCode());
        $this->assertEquals('UOL',$pma->getPartner());
        $this->assertNotEquals('',$pma->getPartner());
    }
}
