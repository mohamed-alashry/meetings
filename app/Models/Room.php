<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'google_location',
        'capacity',
        'attachment',
        'status', // default(1) => Available, 2 => Under maintenance, 3 => Closed
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name'              => 'string',
        'location'          => 'string',
        'google_location'   => 'string',
        'attachment'        => 'string',
        'capacity'          => 'integer',
        'status'            => 'integer',
    ];

    public function setAttachmentAttribute($file)
    {
        try {
            if ($file) {
                $fileName = $file->store('uploads/files', 'public');
                $this->attributes['attachment'] = $fileName;
            }
        } catch (\Throwable $th) {
            $this->attributes['attachment'] = $file;
        }
    }
    protected $appends = ['attachment_path'];

    public function getAttachmentPathAttribute()
    {
        return $this->attachment ? asset('uploads/file/' . $this->attachment) : null;
    }

    /**
     * Get all of the meetings for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class);
    }

    /**
     * Get all of the meetings for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function upcoming_meetings(): HasMany
    {
        return $this->hasMany(Meeting::class)->whereDate('start_date', '>=', now()->format('Y-m-d'))
        ->orderBy('start_date')
        ->orderBy('start_time');
    }

    /**
     * Get all of the media for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media(): HasMany
    {
        return $this->hasMany(RoomMedia::class, 'room_id', 'id');
    }

    /**
     * Get all of the features for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features(): HasMany
    {
        return $this->hasMany(RoomFeature::class);
    }
}
