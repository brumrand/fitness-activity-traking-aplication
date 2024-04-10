<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityDetailsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_post(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_fail_post(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }




    // public function test_update(): void
    // {
    //     $response = $this->get('/');
    //     $response->assertStatus(200);
    // }

    // public function test_fail_update(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }


    // public function test_partial_update(): void
    // {
    //     $response = $this->get('/');
    //     $response->assertStatus(200);
    // }

    // public function test_fail_partial_update(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_partial_delete(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_fail_partial_delete(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_fail_get(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }



    public function test_get_by_activity_type(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_fail_get_by_activity_type(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_get_distance_by_activity_type(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_fail_get_distance_by_activity_type(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_get_elapsed_time_by_activity_type(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_fail_get_elapsed_time_by_activity_type(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
