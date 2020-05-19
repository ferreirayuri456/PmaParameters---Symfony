<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PmaParametersControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/pma');

        $this->assertResponseIsSuccessful();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testGetById()
    {
        $client = static::createClient();
        $client->request('GET', '/pma/1');

        $this->assertResponseIsSuccessful();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreateParameter()
    {
        $client = static::createClient();
        $client->request('POST', '/pma', [], [],['CONTENT_TYPE' => 'application_json'],'{
        "partner":"Prefeitura do Jaboatão dos Guararapes",
	    "reason_code" : "Gestão estadual",
	    "description_code" : "Escolas, creches, hospitais",
	    "action_pma" : "Submit_Order",
	    "livpnr" : "Prefeitura do Jaboatão",
	    "value" : ""}'
        );

        $this->assertResponseIsSuccessful();
        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    public function testRemoveParameter()
    {
        $client = static::createClient();
        $client->request('DELETE', '/pma/7', [], [], []);

        $this->assertResponseIsSuccessful();
        $this->assertEquals(204, $client->getResponse()->getStatusCode());

    }

    public function testUpdateParameter()
    {
        $client = static::createClient();
        $client->request('PUT', '/pma/8',[],[],['CONTENT_TYPE' => 'application_json'], '{
        "partner":"Prefeitura do Jaboatão dos Guararapes",
	    "reason_code" : "Gestão estadual",
	    "description_code" : "Escolas, creches, hospitais, presídios",
	    "action_pma" : "Update",
	    "livpnr" : "Prefeitura do Jaboatão",
	    "value" : "UOL"
        }');

        $this->assertResponseIsSuccessful();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());


    }
}
