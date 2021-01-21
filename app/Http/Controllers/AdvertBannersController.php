<?php
namespace App\Http\Controllers;

use App\Http\Requests\AdvertBanner\AdvertBannerRequest;
use App\Models\Advert;
use App\Models\AdvertBanner;
use App\Models\Banner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class AdvertBannersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert_banners = AdvertBanner::paginate();
        return view("advert-banners.index", compact("advert_banners"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $advert_banner = new AdvertBanner();
        $adverts = Advert::where("status", 1)->pluck("title", "code");
        $banners = Banner::where("status", 1)->pluck("title", "id");
        return view('advert-banners.create', compact("advert_banner", "banners", "adverts"));
    }


    public function downloadBanner($id) {
        $advert_banner = $this->getRecord($id);
        if (!$advert_banner) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }

        if (!$advert_banner->banner()->exists()) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Banner Record not found."));
        }

        if (!Storage::exists($advert_banner->banner->filepath)) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Banner Image/Asset not found."));
        }

        return Storage::download($advert_banner->banner->filepath);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertBannerRequest $request)
    {
        $advert_banner = new AdvertBanner();
        $data = $request->validated();

        $advert_banner->create($data);
        return redirect("admin/advert-banners")->with(self::MESSAGE_TYPE_SUCCESS, __("Record created successfully"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertBannerRequest $request, $id)
    {
        $advert_banner = $this->getRecord($id);
        if (!$advert_banner) {
            back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }
        $data = $request->validated();
        $advert_banner->fill($data);

        if (!$advert_banner->save()) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Sorry, could not update record."));
        }
        return redirect("admin/advert-banners")->with(self::MESSAGE_TYPE_SUCCESS, __("Record updated successfully."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert_banner = $this->getRecord($id);
        if (!$advert_banner) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found"));
        }
        return view('advert-banners.view', compact("advert_banner"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $advert_banner = $this->getRecord($id);
        if (!$advert_banner) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }
        $adverts = Advert::pluck("title", "code")->where("status", 1);
        $banners = Banner::pluck("title", "id");
        return view('advert-banners.edit', compact("advert_banner", "banners", "adverts"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert_banner = $this->getRecord($id);
        if (!$advert_banner) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }
        if (!$advert_banner->delete()) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Sorry, could not delete record."));
        }
        return back()->with(self::MESSAGE_TYPE_SUCCESS, __("Record successfully deleted."));
    }

    public function getRecord($id) {
        try {
            $record = AdvertBanner::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }
        return $record;
    }

}