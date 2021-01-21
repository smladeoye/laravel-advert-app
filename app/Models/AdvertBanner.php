<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;

/**
 * @mixin Eloquent\Builder
 * @property Advert advert
 **/
class AdvertBanner extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'advert_code',
        'banner_id',
        'max_total_impression',
        'max_total_display_per_impression',
        'status',
    ];

    public function advert() {
        return $this->belongsTo(Advert::class, "advert_code", "code");
    }

    public function banner() {
        return $this->belongsTo(Banner::class);
    }

    public function getFilenameAttribute() {
        $exploded_image_fullname = explode("/", $this->image);
        return $exploded_image_fullname[1];
    }
}
