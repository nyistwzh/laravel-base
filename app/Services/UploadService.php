<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Services;

use App\Repositories\FileRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;
use App\Traits\SizeUtilTrait;

class UploadService extends BaseService
{

    use SizeUtilTrait;

    public function __construct(FileRepository $fileRepository)
    {
        parent::__construct($fileRepository);
    }

    /**
     * 文件上传
     * 文件上传.
     *
     * @param $type
     * @param UploadedFile $file
     *
     * @return mixed
     *
     * @throws \App\Exceptions\CustomException
     *
     * @author 王志豪
     */
    public function upload($type, UploadedFile $file)
    {
        $fileConfigInfo = config('upload.' . $type);
        $filePath       = $file->getRealPath();
        if (isset($fileConfigInfo['limit']) && (int) (filesize($filePath) / 1024) >= $fileConfigInfo['limit']) {
            $size = $this->unitUpgrade($fileConfigInfo['limit'], 2);
            customError(trans('upload.max_error', [':max' => $size]));
        }
        list($width, $height) = getimagesize($filePath);
        $newWidth             = $width;
        $newHeight            = $height;
        $widthConfig          = $fileConfigInfo['width']  ?? '';
        $heightConfig         = $fileConfigInfo['height'] ?? '';
        if ($widthConfig) {
            $newWidth  = $widthConfig < 1 ? $width  * $widthConfig : $widthConfig;
            $newHeight = $widthConfig < 1 ? $height * $widthConfig : number_format($widthConfig / $width, 2, '.', '') * $height;
        }
        if ($heightConfig) {
            $newHeight = $heightConfig < 1 ? $height * $heightConfig : $heightConfig;
            if (!$newWidth) {
                $newWidth = $heightConfig < 1 ? $width * $heightConfig : number_format($heightConfig / $height, 2, '.', '') * $width;
            }
        }
        $savePath = config('back-system.' . $type . '.save_path');
        $saveName = time() . str_random(8) . '.' . $file->getClientOriginalExtension();
        switch ($fileConfigInfo['way']) {
            case 'local':
                $size = $this->uploadLocal($filePath, $newWidth, $newHeight, $savePath, $saveName);

                break;
            default:
                customError(trans('upload.config_error'));

                break;
        }

        return $this->baseRepository->store(array_merge(['type' => $type], ['name' => $saveName, 'path' => '/storage' . $savePath . $saveName, 'size' => $size]));
    }

    /**
     * 上传至本地
     * 上传至本地.
     *
     * @param $filePath
     * @param $width
     * @param $height
     * @param $savePath
     * @param $saveName
     *
     * @return int
     *
     * @throws \App\Exceptions\CustomException
     *
     * @author 王志豪
     */
    public function uploadLocal($filePath, $width, $height, $savePath, $saveName)
    {
        $saveFullPath = storage_path('app/public' . $savePath);
        $image = Image::make($filePath)->resize($width, $height)->save($saveFullPath . $saveName);

        return intval($this->unitUpgrade($image->filesize()));
    }
}
