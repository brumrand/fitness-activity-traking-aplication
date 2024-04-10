<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use App\Models\ActivityDetail;

class ActivityDetailsTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_post(): void
    {
        $response = $this->post('api/activity',
        [
            'user_id'                           => 1,
            'activity_type_id'              => 2,
            'distance_unit_id'              => 2,
            'elapsed_time_unit_id'      => 2,
            'name'                              => 'Morning walk',
            'distance'                          => 5.2,
            'elapsed_time'                  => 30,
            'date'                                => '2024-05-10',
        ]);

        $response->assertJson([
            'user_id'                           => 1,
            'activity_type_id'              => 2,
            'distance_unit_id'              => 2,
            'elapsed_time_unit_id'      => 2,
            'name'                              => 'Morning walk',
            'distance'                          => 5.2,
            'elapsed_time'                  => 30,
            'date'                                => '2024-05-10',
        ]);
    }
    /**
    * @depends test_post
    */
    public function test_fail_post(): void
    {
        $response = $this->post('api/activity',
        [
            'user_id'                           => 1,
            'activity_type_id'              => 2,
            'distance_unit_id'              => 2,
            'date'                                => '2024-05-10',
        ]);
        $response->assertStatus(302);


        $response = $this->post('api/activity',
        [
            'user_id'                           => 1,
            'activity_type_id'              => 23444,
            'distance_unit_id'              => 2,
            'elapsed_time_unit_id'      => 2,
            'name'                              => 'Morning walk',
            'distance'                          => 5.2,
            'elapsed_time'                  => 30,
            'date'                                => '2024-05-10',
        ]);
        $response->assertStatus(302);
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

    /**
    * @depends test_post
    */
    public function test_delete(): void
    {
        $data = ActivityDetail::latest()->first();
        $response = $this->delete('api/activity',["id" => $data->id]);
        $response->assertStatus(200);
        $check=ActivityDetail::find($data->id);
        $this->assertNull($check);
    }
    /**
    * @depends test_post
    */
    public function test_fail_delete(): void
    {
        $data = ActivityDetail::latest()->first();
        $response = $this->delete('api/activity',["id" => 0]);

        $response->assertStatus(302);

        $response = $this->delete('api/activity',["id" => "sdsdsdds"]);

        $response->assertStatus(302);

        $response = $this->delete('api/activity',["iddd" => $data->id]);

        $response->assertStatus(302);
    }

    public function test_get(): void
    {
        $response = $this->get('api/activites');
        $response->assertStatus(200);
        $response->assertJsonStructure([[
            'id',
            'user_id',
            'activity_type_id',
            'distance_unit_id',
            'elapsed_time_unit_id',
            'name',
            'distance',
            'elapsed_time',
            'date'
        ]]);
    }

    public function test_fail_get(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }



    public function test_get_by_activity_type(): void
    {
        $data = ActivityDetail::first();
        $response = $this->get('api/activites/byType?activity_type_id='.$data->activity_type_id);
        $response->assertStatus(200);
        $response->assertJsonStructure([[
            'id',
            'user_id',
            'activity_type_id',
            'distance_unit_id',
            'elapsed_time_unit_id',
            'name',
            'distance',
            'elapsed_time',
            'date'
        ]]);

    }

    public function test_fail_get_by_activity_type(): void
    {
        $data = ActivityDetail::latest()->first();
        $response = $this->get('api/activites/byType?activity_typfffe_id='.$data->activity_type_id);

        $response->assertStatus(302);

        $response = $this->get('api/activites/byType');

        $response->assertStatus(302);

        $response = $this->get('api/activites/byType?activity_type_id=fdfd'.$data->activity_type_id);

        $response->assertStatus(302);



    }


    public function test_get_distance_by_activity_type(): void
    {
        $data = ActivityDetail::first();
        $response = $this->get('api/activites/byType/distance?activity_type_id='.$data->activity_type_id);
        $response->assertStatus(200);
        $response->assertJsonStructure([["activity_type_id", "distance_unit_id","total_distance"]]);
    }

    public function test_fail_get_distance_by_activity_type(): void
    {
        $data = ActivityDetail::latest()->first();
        $response = $this->get('api/activites/byType/distance?activity_typfffe_id='.$data->activity_type_id);

        $response->assertStatus(302);

        $response = $this->get('api/activites/byType/distance');

        $response->assertStatus(302);

        $response = $this->get('api/activites/byType/distance?activity_type_id=fdfd'.$data->activity_type_id);

        $response->assertStatus(302);
    }


    public function test_get_elapsed_time_by_activity_type(): void
    {
        $data = ActivityDetail::first();
        $response = $this->get('api/activites/byType/elapsedTime?activity_type_id='.$data->activity_type_id);
        $response->assertStatus(200);
        $response->assertJsonStructure([["activity_type_id", "elapsed_time_unit_id","total_time"]]);
    }

    public function test_fail_get_elapsed_time_by_activity_type(): void
    {
        $data = ActivityDetail::latest()->first();
        $response = $this->get('api/activites/byType/elapsedTime?activity_typfffe_id='.$data->activity_type_id);

        $response->assertStatus(302);

        $response = $this->get('api/activites/byType/elapsedTime');

        $response->assertStatus(302);

        $response = $this->get('api/activites/byType/elapsedTime?activity_type_id=fdfd'.$data->activity_type_id);

        $response->assertStatus(302);
    }
}
