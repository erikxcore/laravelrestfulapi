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

        $user = User::find(1);
        $this->actingAs($user);

    }

    public function testMustBeAuthenticated()
    {
        $response = $this->call('GET', '/ordermanagement');
        $this->assertInstanceOf('Illuminate\Http\RedirectResponse', $response);
        $this->assertEquals($this->baseUrl . '/login' , $response->getTargetUrl());
    }

   // public function test_search_index()
   //  {
   //      $response = $this->call('GET', '/ordermanagement');
   //      View::shouldReceive('make')->with('app.ordermanagement');
   //  }

   // public function test_post_find_account()
   //  {
   //      $data = [
   //          'billingSystemAccountNumber' => '3000300030003000'
   //      ];

   //      $response = $this->call('POST', '/ordermanagement/findaccount', $data);

   //      $data = $this->parseJson($response);
   //      $this->assertIsJson($data);
   //  }

   // public function test_post_find_account_products()
   //  {
   //      $data = [
   //          'billingSystemAccountNumber' => '3000300030003000'
   //      ];

   //      $response = $this->call('POST', '/ordermanagement/findaccountproducts', $data);

   //      $data = $this->parseJson($response);
   //      $this->assertIsJson($data);
   //  }

   // public function test_post_find_account_orders()
   //  {
   //      $data = [
   //          'billingSystemAccountNumber' => '3000300030003000'
   //      ];

   //      $response = $this->call('POST', '/ordermanagement/findaccountorders', $data);

   //      $data = $this->parseJson($response);
   //      $this->assertIsJson($data);
   //  }

   // public function test_post_find_account_history()
   //  {
   //      $data = [
   //          'billingSystemAccountNumber' => '3000300030003000'
   //      ];

   //      $response = $this->call('POST', '/ordermanagement/findaccounthistory', $data);

   //      $data = $this->parseJson($response);
   //      $this->assertIsJson($data);
   //  }

   protected function parseJson(Illuminate\Http\JsonResponse $response)
    {
        return json_decode($response->getContent());
    }

    protected function assertIsJson($data)
    {
        $this->assertEquals(0, json_last_error());
    }

}
