<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeetingInvitation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meeting_invitations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'meeting_id',
        'userable_id',
        'userable_type',
        'type', // 1 => Admin, default(2) => Invitee, 3 => Guest
        'status', // default(1) => Pending, 2 => Accepted, 3 => Rejected
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'meeting_id'      => 'integer',
        'userable_id'     => 'integer',
        'userable_type'   => 'string',
        'type'            => 'integer',
        'status'          => 'integer',
    ];

    /**
     * Get the meeting that owns the MeetingInvitation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meeting::class);
    }

    /**
     * Get the user of the MeetingInvitation.
     */
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

}
