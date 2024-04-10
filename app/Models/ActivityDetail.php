<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'activity_type_id',
        'distance_unit_id',
        'elapsed_time_unit_id',
        'name',
        'distance',
        'elapsed_time',
        'date',
    ];


    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function activityType () : BelongsTo
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function distanceUnit () : BelongsTo
    {
        return $this->belongsTo(DistanceUnit::class);
    }

    public function elapsedTimeUnit () : BelongsTo
    {
        return $this->belongsTo(ElapsedTimeUnit::class);
    }
}
