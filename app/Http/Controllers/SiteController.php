<?php
namespace App\Http\Controllers;

use App\Models\AdvertBanner;

class SiteController extends Controller
{

    public function home() {
        $advert_banners = AdvertBanner::all()->take(5);
        return view("site.welcome", compact("advert_banners"));
    }

}