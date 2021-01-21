<?php
namespace App\Http\Controllers;

use App\Http\Requests\Banner\BannerRequest;
use App\Models\Banner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate();
        return view("banners.index", compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $banner = new Banner();
        return view('banners.create', compact("banner"));
    }


    public function download($id) {
        $banner = Banner::findOrFail($id);
        return Storage::download("{$banner->filepath}");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $data = $request->validated();

        $file_path = $request->file('image')->store('banners');

        if ($file_path) {
            $filename = pathinfo($file_path, PATHINFO_FILENAME);
            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
            $full_filename = $filename . "." . $file_extension;
            $data['image'] = $full_filename;

            $banner = Banner::create($data);
            if ($banner) {
                return redirect("/admin/banners")->with("message.success", __("Banner") . " " . __("successfully created."));
            }
        }
        return back()->with('message', __("Sorry, error occurred, could not process request"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        try {
            $banner = Banner::findOrFail($id);
        } catch (\Exception $ex) {
            return back()->with("message.error", __("Record not found."));
        }

        $data = $request->validated();

        if ($request->image) {
            $file_path = $request->file('image')->store(Banner::DEFAULT_FILE_LOCATION);
            if ($file_path) {
                $previous_file_deleted = Storage::delete($banner->filepath);
                if (!$previous_file_deleted) {
                    Session::flash("message.info", __("Sorry, failed to remove previous image from storage."));
                }
                $filename = pathinfo($file_path, PATHINFO_FILENAME);
                $fil_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                $data['image'] = $filename . "." . $fil_extension;
            }
        }

        $banner = $banner->fill($data);
        if ($banner->save()) {
            return redirect("/admin/banners")->with("message.success", __("Record updated successfully"));
        }
        return back()->with("message.error", __("Sorry, could not process request."));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $banner = Banner::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return back()->with("message.error", __("Record not found."));
        }
        return view('banners.view', compact("banner"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        try {
            $banner = Banner::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return redirect(back())->with("message.error", __("Record not found."));
        }
        return view("banners.edit", compact("banner"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $banner = Banner::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return redirect(back())->with("message.error", __("Record not found."));
        }

        if ($banner->delete()) {
            return redirect(back())->with("message.success", __("Record deleted successfully."));
        }
        redirect(back())->with("message.error", __("Sorry, failed to delete Record."));
    }

}