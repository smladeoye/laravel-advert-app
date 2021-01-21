<?php


namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertBanner;
use App\Models\Banner;

class DashboardController extends Controller
{

    public function index() {
        $total_adverts = Advert::all()->count();
        $total_banners = Banner::all()->count();
        $total_advert_banners = AdvertBanner::all()->count();

        return view('dashboard', compact("total_adverts", "total_banners", "total_advert_banners"));
    }

}