<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory, ImageUploaderTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'forable_id',
        'forable_type',
        'file_type', // default(1) Image, 2 => Video, 3 => Audio, 4 => Document
        'file_name'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'forable_id'      => 'integer',
        'forable_type'    => 'string',
        'file_type'       => 'integer',
        'file_name'       => 'string'
    ];


    /**
     * Get the forable of the Media.
     */
    public function forable(): MorphTo
    {
        return $this->morphTo();
    }

    public function setFileNameAttribute($file)
    {
        try {
            if ($file) {

                $fileName = $this->createFileName($file);
                if ($this->attributes['file_type'] == 1) {
                    $this->originalImage($file, $fileName);
                    $this->thumbImage($file, $fileName, 200, 200);
                }

                $this->attributes['file_name'] = $fileName;
            }
        } catch (\Throwable $th) {
            $this->attributes['file_name'] = $file;
        }
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['file_path'];

    public function getFilePathAttribute()
    {
        if ($this->file_type == 1) {
            return (object) [
                'original'     => asset('uploads/image/original/' . $this->file_name),
                'thumbnail'    => asset('uploads/image/thumbnail/' . $this->file_name)
            ];
        }
        return $this->file_name ? asset('uploads/file/' . $this->file_name) : null;
    }

    /**
     * Get all of the media for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'forable');
    }
}
