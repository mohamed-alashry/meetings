<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meetings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_id',
        'user_id',
        'title',
        'brief',
        'description',
        'minutes',
        'start_date',
        'start_time',
        'repeatable',
        'duration',
        'person_capacity',
        'end_date',
        'status', // default(1) => Draft, 2 => Scheduled, 3 => Active, 4 => Cancelled, 5 => Finished
    ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'title'        => 'string',
    //     'brief'        => 'string',
    //     'description'  => 'string',
    //     'start_date'   => 'datetime',
    //     'end_date'     => 'datetime',
    //     'duration'     => 'integer',
    // ];

    /**
     * Get the room that owns the Meeting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }


    /**
     * Get all of the invitations for the Meeting
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invitations(): HasMany
    {
        return $this->hasMany(MeetingInvitation::class);
    }
}
