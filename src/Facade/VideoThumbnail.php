<?php

namespace Sukhilss\VideoThumbnail\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @author     sukhilss <emailtosukhil@gmail.com>
 * @package    Video Thumbnail
 * @version    1.0.0
 */
class Thumbnail extends Facade {

    protected static function getFacadeAccessor() {
        return 'VideoThumbnail';
    }

}