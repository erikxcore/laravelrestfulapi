<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class APITest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate:refresh', [
          '--seed' => '1'
        ]);

    }


public function test_unauth()
{

    $response = $this->json('GET', '/api/v1/getAllProducts');

    $response   ->assertStatus(401);
    
}

public function test_get_all_products(){

    $user = User::find(1);

    $response= $this->get('api/v1/getAllProducts', 
      [
      'Authorization' => 'Bearer ' . $user->api_token,
      'Accept' => 'application/json',
      'Content-Type' => 'application/json'
      ]);

    $response   ->assertStatus(200);

}

public function test_get_product(){

    $user = User::find(1);

    $jsonObj = array();
    $jsonObj['product'] = array();
    $jsonObj['product']['id'] = 1;

    $response = $this->call('POST', 'api/v1/getProduct',[],[],[], 
      [
      'HTTP_Authorization' => 'Bearer ' . $user->api_token,
      'Accept' => 'application/json',
      'Content-Type' => 'application/json'
      ],
      $json = json_encode($jsonObj)
      );

    $response   ->assertStatus(200);

}


   protected function parseJson(Illuminate\Http\JsonResponse $response)
    {
        return json_decode($response->getContent());
    }

    protected function assertIsJson($data)
    {
        $this->assertEquals(0, json_last_error());
    }

}
