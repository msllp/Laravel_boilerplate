<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MasterModule extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response=\B\MAS\B::testAllModRoutes($this);
        //dd($response);
        if(gettype($response) == "array"){
            var_dump($response);
            $this->assertTrue(false);
        }



        //return $response;

       // $response = $this->get('/MAS');

       // $response->assertStatus(200);
    }
}
