<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
        'parent_id',
        'title',
        'brief',
        'description',
        'minutes',
        'minutes_attach',
        'start_date',
        'start_time',
        'end_time',
        'repeatable', // 1 => No repeat, 2 => Daily, 3 => Weekly, 4 => Monthly
        'end_date',
        'alert_date',
        'status', // default(1) => Active, 2 => Cancelled
        'send_user_location',
        'send_room_attach',
        'send_room_properties',
        'reminder_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'start_date'   => 'format:H:i/a',
    ];


    public $appends = ['event_json', 'type_date', 'start_date_format', 'start_time_format', 'end_time_format', 'minutes_attach_path'];

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
            'end'           => $this->start_date . ' ' . $this->end_time,
            // 'description'   => $this->brief,
            'open_calendar' => $this->open_calendar,
            'bg_color'     => 'fc-event-danger fc-event-solid-warning',
            'background' => 'red'
        ];

        return $data;
    }

    public function getTypeDateAttribute()
    {
        $start = Carbon::parse($this->start_date . ' ' . $this->start_time);

        switch (true) {
            case $start->isPast():
                return 'due';

            case $start->isToday():
                return 'today';

            case $start->isTomorrow():
                return 'tomorrow';

            default:
                return 'upcoming';
        }
    }

    public function getStartDateFormatAttribute()
    {

        return \Carbon\Carbon::parse($this->start_date)->format('d M Y');
    }

    public function getStartTimeFormatAttribute()
    {

        return \Carbon\Carbon::parse($this->start_time)->format('h:i a');
    }

    public function getEndTimeFormatAttribute()
    {

        return \Carbon\Carbon::parse($this->end_time)->format('h:i a');
    }

    function generateGoogleCalendarLink()
    {
        $from = \Carbon\Carbon::parse($this->start_date . ' ' . $this->start_time)->format('Ymd\THis');
        $to = \Carbon\Carbon::parse($this->start_date . ' ' . $this->end_time)->format('Ymd\THis');
        $title = $this->title;
        $brief = $this->brief;
        $location = $this->room->name;
        $attendees = $this->invitations->pluck('userable.email')->toArray();

        // Base Google Calendar event URL
        $baseUrl = 'http://www.google.com/calendar/event?action=TEMPLATE';

        // Encode event details
        $encodedParams = http_build_query([
            'text' => $title,
            'dates' => $from . '/' . $to,
            'details' => $brief,
            'location' => $location
        ]);

        // Add attendees' email addresses
        foreach ($attendees as $attendee) {
            $encodedParams .= '&add=' . urlencode($attendee);
        }

        // Build full URL
        $url = $baseUrl . '&' . $encodedParams;

        return $url;
    }


    public function setMinutesAttachAttribute($file)
    {
        try {
            if ($file) {
                $fileName = $file->store('uploads/files', 'public');
                $this->attributes['minutes_attach'] = $fileName;
            }
        } catch (\Throwable $th) {
            $this->attributes['minutes_attach'] = $file;
        }
    }

    public function getMinutesAttachPathAttribute()
    {
        return $this->minutes_attach ? asset($this->minutes_attach) : null;
    }

    public function getStatusTextAttribute()
    {

        if ($this->status == 1) {
            return "Active";
        } else if ($this->status == 2) {
            return "Cancelled";
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
        return $query->whereDate('start_date', '>=', now()->format('Y-m-d'))
            ->whereDate('start_date', '<=', now()->addWeek()->format('Y-m-d'))
            ->where('status', 1)
            ->orderBy('start_date')
            ->orderBy('start_time');
    }

    /**
     * Scope a query to only include guests meetings.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGuests($query)
    {
        return $query->where(function (Builder $query) {
            $query->where('user_id', auth()->id())
                ->orWhereHas('invitations.userable', function (Builder $query) {
                    $query->where('email', auth()->user()->email);
                });
        });
    }

    public function isGuest()
    {
        if (auth()->id() == 1) {
            return true;
        }
        return $this->where('user_id', auth()->id())
            ->orWhereHas('invitations.userable', function (Builder $query) {
                $query->where('email', auth()->user()->email);
            })->exists();
    }

    public function isCreator()
    {
        if (auth()->id() == 1) {
            return true;
        }
        return $this->user_id == auth()->id();
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

    /**
     * Get the user that owns the Meeting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
