<?php

namespace App\Services;

use App\Filesystem\Filesystem;
use App\Constants\SettingUser;
use App\Constants\Directory;
/**
 * Class UploadService
 *
 * @package App\Services\Upload
 */
class UploadService
{
    /**
     * @var Filesystem
     */
    private $fileUpload;

    /**
     * UploadService constructor.
     *
     * @param Filesystem $fileUpload
     */
    public function __construct(Filesystem $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }

    /**
     * @param $path , $file
     *
     * @return array $images
     */
    public function uploadImage($path, $file)
    {
        $images = $this->fileUpload->uploadImage($path, $file);

        return $images;
    }

    /**
     * @param $path
     *
     * @return bool
     */
    public function removeImage($path)
    {
        $remove = $this->fileUpload->remove($path);

        return $remove;
    }

    /**
     * @param \Illuminate\Http\UploadedFile $files
     *
     * @return array
     */
    public function uploadImageTemp($files)
    {
        $images = $this->fileUpload->uploadTemp($files);
        return $images;
    }

    /**
     * @param string $path
     * @param string $url
     *
     * @return array
     */
    public function moveImage($path, $url)
    {
        $images = $this->fileUpload->moveTempUpload($path, $url);
        return $images;
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    // public function updateImage($id, $url)
    // {
    //     $user = User::find($id);
    //     $urlImageTemplate = SettingUser::BANNER_SHOP;

    //     if ($user->image != $urlImageTemplate) {
    //         $this->fileUpload->remove($user->image);
    //     }
    //     $image = $this->fileUpload->moveTempUpload(Directory::IMAGE_USERS, $url);

    //     return $image;
    // }

    /**
     * @param string $path
     *
     * @return bool
     */
    // public function updateImageNews($id, $url)
    // {
    //     $news = News::find($id);
    //     if ($news->image) {
    //         $this->fileUpload->remove($news->image);
    //     }
    //     $image = $this->fileUpload->moveTempUpload(Directory::IMAGE_NEWS, $url);

    //     return $image;
    // }
}