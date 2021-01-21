<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;

/**
 * @mixin Eloquent\Builder
 * @property Advert advert
 **/
class Banner extends BaseModel
{
    use HasFactory;

    const DEFAULT_FILE_LOCATION = "banners";

    const IMAGE_TYPE_FILE = "file";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'image_location_type_code',
        'status',
    ];

    public function advertBanners() {
        return $this->hasMany(AdvertBanner::class, "banner_id");
    }

    public function getFilenameAttribute() {
        $exploded_image_fullname = explode("/", $this->image);
        return $exploded_image_fullname[1];
    }

    public function getFilepathAttribute() {
        switch ($this->image_location_type_code) {
            case self::IMAGE_TYPE_FILE:
                return self::DEFAULT_FILE_LOCATION . DIRECTORY_SEPARATOR . $this->image;
                break;
            default:
                return $this->image;
        }
    }
}
