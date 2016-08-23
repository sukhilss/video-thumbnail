<?php

/*
 * Video thumbnail class for implementing FFMpeg Features
 */

namespace Sukhilss\VideoThumbnail;

use Illuminate\Http\Request;
use App\Http\Requests;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate;
use Exception;

/**
 * @author     sukhilss <emailtosukhil@gmail.com>
 * @package    Video Thumbnail
 * @version    1.0.0
 */
class VideoThumbnail {

    protected $videoObject = NULL;
    protected $videoURL = NULL;
    protected $storageURL = NULL;
    protected $thumbName = NULL;
    protected $height = -1;
    protected $width = -1;
    protected $screenShotTime = 1;
    protected $isWaterMark = FALSE;
    protected $waterMarkURL = NULL;

    public function createThumbnail($videoUrl, $storageUrl, $fileName, $second) {
        $this->videoURL = $videoUrl;
        $this->storageURL = $storageUrl;
        $this->thumbName = $fileName;
        $this->screenShotTime = $second;

        $this->create();
        $this->thumbnail();
    }

    private function create() {
        $this->videoObject = FFMpeg::create();
        $this->videoObject->open($this->videoURL);
        return $this->videoObject;
    }

    private function thumbnail() {
        $this->videoObject->frame(Coordinate\TimeCode::fromSeconds($this->screenShotTime));
        $this->videoObject->save($this->storageURL."/".$this->thumbName);
        return $this->videoObject;
    }

}
