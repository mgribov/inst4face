<?php

namespace i\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex() {
        $client = static::createClient();        
        $client->request('GET', 'http://inst4face.com');
        
        $this->assertTrue($client->getResponse()->isSuccessful());        
    }
    
    public function testLikeSuccess() {
        $client = static::createClient();
        
        $client->request('GET', 'http://inst4face.com/pic/1/like');

        $this->assertTrue($client->getResponse()->isSuccessful());        
        $this->assertRegExp('/msg": "success"/',$client->getResponse()->getContent());        
    }

    public function testLikeFail() {
        $client = static::createClient();
        
        $client->request('GET', 'http://inst4face.com/pic/1234234234/like');

        $this->assertEquals(500, $client->getResponse()->getStatusCode());
        $this->assertRegExp('/msg": "no such pic"/', $client->getResponse()->getContent());        
    }    
}
