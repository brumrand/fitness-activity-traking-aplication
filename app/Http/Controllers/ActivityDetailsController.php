<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\ActivityDetail;
use App\Http\Requests\ActivityDetailsByActivityTypeIdRequest;
use App\Http\Requests\ActivityDetailsDeleteRequest;
use App\Http\Requests\ActivityDetailsPostRequest;
use Illuminate\Support\Facades\DB;

class ActivityDetailsController extends Controller
{
    public function create (ActivityDetailsPostRequest $request) : object
    {
        $validatedData = $request->validated();
        $actividad = ActivityDetail::create([
            'user_id'                       =>  $validatedData["user_id"],
            'activity_type_id'          =>  $validatedData["activity_type_id"],
            'distance_unit_id'         =>  $validatedData["distance_unit_id"],
            'elapsed_time_unit_id' =>  $validatedData["elapsed_time_unit_id"],
            'name'                          =>  $validatedData["name"],
            'distance'                      =>  $validatedData["distance"],
            'elapsed_time'              =>  $validatedData["elapsed_time"],
            'date'                            =>  $validatedData["date"],
        ]);
        return response()->json( $actividad);
    }

    // public function update () : object
    // {
    //     return response()->json();
    // }

    // public function partialUpdate () : object
    // {
    //     return response()->json();
    // }

    public function delete (ActivityDetailsDeleteRequest $request) : object
    {
        $validatedData = $request->validated();
        $activity = ActivityDetail::find($validatedData["id"]);
        $activity->delete();
        return response()->json(['message' => 'Activity detail deleted successfully']);
    }


    public function getActivitiesDetails (Request $request ) : object
    {
        $activities = ActivityDetail::select(
            [
                'id',
                'user_id',
                'activity_type_id',
                'distance_unit_id',
                'elapsed_time_unit_id',
                'name',
                'distance',
                'elapsed_time',
                'date',
            ])
            ->get();
        return response()->json($activities);
    }

    public function getActivitiesDetailsByActivityType (ActivityDetailsByActivityTypeIdRequest $request) : object
    {
        $validatedData = $request->validated();
        $activities = ActivityDetail::select(
            [
                'id',
                'user_id',
                'activity_type_id',
                'distance_unit_id',
                'elapsed_time_unit_id',
                'name',
                'distance',
                'elapsed_time',
                'date',
            ])
            ->where('activity_type_id', $validatedData["activity_type_id"])
            ->get();
        return response()->json($activities);
    }

    public function getDistanceByActivityType (ActivityDetailsByActivityTypeIdRequest $request) : object
    {
        $validatedData = $request->validated();
        $activities = ActivityDetail::select(DB::raw("activity_type_id, distance_unit_id,  sum(distance) as total_distance"))
            ->where('activity_type_id', $validatedData["activity_type_id"])
            ->groupBy("activity_type_id", "distance_unit_id")
            ->get();
        return response()->json($activities);
    }

    public function getElapsedTimeByActivityType (ActivityDetailsByActivityTypeIdRequest $request) : object
    {
        $validatedData = $request->validated();
        $activities = ActivityDetail::select(DB::raw("activity_type_id, elapsed_time_unit_id,  sum(elapsed_time) as total_time"))
            ->where('activity_type_id', $validatedData["activity_type_id"])
            ->groupBy("activity_type_id", "elapsed_time_unit_id")
            ->get();
        return response()->json($activities);
    }
}

