<?php

namespace App\Helpers;

use File;
use Image;
use Throwable;

trait ImageUploaderTrait
{
    public function createFileName($file)
    {
        try {
            $originalName = $file->getClientOriginalName();

            $fileName = time() . '_' . $originalName;

            return $fileName;
        } catch (Throwable $e) {

            return $file;
        }
    }

    public function saveFile($file, $fileName)
    {
        try {
            $file->move('uploads/files/', $fileName);
        } catch (Throwable $e) {
        }
    }

    /**
     * Save different sizes for images
     */
    public function originalImage($file, $current_name)
    {
        try {

            $accountOriginalDestination = 'uploads/images/original/';

            Image::make($file)
                ->save($accountOriginalDestination . $current_name);
        } catch (Throwable $e) {
        }
    }

    public function mediumImage($file, $current_name, $width = 600, $height = 300)
    {
        try {

            $accountMediumDestination = 'uploads/images/medium/';

            Image::make($file)
                ->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($accountMediumDestination . $current_name);
        } catch (Throwable $e) {
        }
    }

    public function thumbImage($file, $current_name, $width = 100, $height = 100)
    {
        try {

            $accountThumbnailDestination = 'uploads/images/thumbnail/';

            Image::make($file)
                ->resize($width, $height)
                ->save($accountThumbnailDestination . $current_name);
        } catch (Throwable $e) {
        }
    }

    public function base64Image($file, $fileName)
    {
        try {

            $accountOriginalDestination = 'uploads/images/original/';

            Image::make(file_get_contents($file))
                ->save($accountOriginalDestination . $fileName);
        } catch (Throwable $e) {
        }
    }
}
