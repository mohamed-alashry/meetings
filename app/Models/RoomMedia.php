<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomMedia extends Model
{
    use HasFactory, ImageUploaderTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room_media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_id',
        'type', // default(1) Image, 2 => Video, 3 => Audio, 4 => Document
        'file_name'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'room_id'      => 'integer',
        'type'         => 'string',
        'file_name'    => 'string'
    ];

    public function setFileNameAttribute($file)
    {
        // try {
        if ($file) {

            $fileName = $this->createFileName($file);
            if ($this->attributes['type'] == 1) {
                $this->originalImage($file, $fileName);
                $this->thumbImage($file, $fileName, 200, 200);
            }

            $this->attributes['file_name'] = $fileName;
        }
        // } catch (\Throwable $th) {
        //     $this->attributes['file_name'] = $file;
        // }
    }
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
}
