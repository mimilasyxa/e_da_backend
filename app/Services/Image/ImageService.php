<?php

namespace App\Services\Image;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;


class ImageService
{
    private string $tempPath;

    public function __construct()
    {
        $this->tempPath = config('storage.temp_path');
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file): string
    {
        $name = Str::uuid();

        $filename = $name . '.' . $file->getClientOriginalExtension();

        return $file->move(public_path($this->tempPath), $filename)
            ? $this->tempPath . '/' .  $filename
            : '';
    }
}
