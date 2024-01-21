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
        'repeatable', // 1 => No repeat, 2 => Daily, 3 => Weekly, 4 => Monthly
        'duration',
        'person_capacity',
        'end_date',
        'status', // default(1) => Draft, 2 => Scheduled, 3 => Active, 4 => Cancelled, 5 => Finished
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'start_date'   => 'format:H:i/a',
    ];


    public $appends = ['event_json', 'type_date'];

    public function getEventJsonAttribute()
    {
        $from = \Carbon\Carbon::parse($this->attributes['start_date'])->format('Ymd His');
        $to = \Carbon\Carbon::parse($this->attributes['end_date'])->addHour()->format('Ymd His');
        //   {
        //    id:A(),
        //     title:"All Day Event",
        //     start:I+"-01",
        //     end:I+"-02",
        //     description:"Toto lorem ipsum dolor sit incid idunt ut",
        //     className:"border-success bg-success text-inverse-success",
        //     location:"Federation Square"
        // }
        $data = (object)[
            'id'            => $this->id,
            'title'         => $this->title,
            // 'link'       => "https://calendar.google.com/calendar/u/0/r/eventedit?dates=$from/$to&text=$this->title",
            'start'         => $this->start_date . ' ' . $this->start_time,
            'end'           => $this->end_date,
            'description'   => $this->description,
            'open_calendar' => $this->open_calendar,
            'className'     => 'fc-event-danger fc-event-solid-warning'
        ];

        return $data;
    }

    public function getTypeDateAttribute()
    {
        $tomorrow = strtotime(\Carbon\Carbon::tomorrow());
        $start = strtotime(\Carbon\Carbon::parse($this->start_date));

        if ($start > $tomorrow) {
            return 'upcoming';
        } elseif ($start < $tomorrow && $this->start_time < now()->format('H:i:s')) {
            return 'due';
        } elseif ($start < $tomorrow) {
            return 'today';
        } else {
            return 'tomorrow';
        }
    }

    /**
     * Scope a query to only include upcoming meetings.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpcoming($query)
    {
        return$query->whereDate('start_date', '>=', now()->format('Y-m-d'))
        ->orderBy('start_date')
        ->orderBy('start_time');
    }

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
