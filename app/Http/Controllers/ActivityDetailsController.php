<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\ActivityDetail;

class ActivityDetailsController extends Controller
{
    public function create () : object
    {
        return response()->json();
    }

    public function update () : object
    {
        return response()->json();
    }

    public function partialUpdate () : object
    {
        return response()->json();
    }

    public function delete () : object
    {
        return response()->json();
    }
    public function getActivitiesDetails () : object
    {
        return response()->json();
    }

    public function getActivitiesDetailsByActivityType () : object
    {
        return response()->json();
    }

    public function getDistanceByActivityType () : object
    {
        return response()->json();
    }

    public function getElapsedTimeByActivityType () : object
    {
        return response()->json();
    }
}
