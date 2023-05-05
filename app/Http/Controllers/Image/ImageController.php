<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\UploadImageRequest;
use App\Http\Resources\File\FileUrlResource;
use App\Services\Image\ImageService;

class ImageController extends Controller
{
    /**
     * @param UploadImageRequest $imageRequest
     * @param ImageService $uploadService
     * @return FileUrlResource
     */
    public function upload(UploadImageRequest $imageRequest, ImageService $uploadService): FileUrlResource
    {
        return new FileUrlResource($uploadService->upload($imageRequest->getImage()));
    }
}
