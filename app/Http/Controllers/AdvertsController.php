<?php
namespace App\Http\Controllers;

use App\Http\Requests\Advert\AdvertRequest;
use App\Models\Advert;
use Illuminate\Support\Str;

class AdvertsController extends Controller
{

    public function index() {
        $adverts = Advert::paginate();
        return view("adverts.index", compact("adverts"));
    }

    public function create() {
        $advert = new Advert();
        return view('adverts.create', compact("advert"));
    }

    public function edit($id) {
        $advert = Advert::findOrFail($id);
        return view('adverts.edit', compact("advert"));
    }

    public function store(AdvertRequest $request) {
        $data = $request->validated();
        $data['code'] = Str::slug($data['title']);
        $advert = Advert::create($data);
        if ($advert) {
            return redirect("/admin/adverts");
        }
        return redirect(back())->with('message', __("Sorry, error occurred, could not process request"));
    }

    public function update(AdvertRequest $request, $id) {
        $data = $request->validated();
        $data['code'] = Str::slug($data['title']);
        $advert = Advert::find($id)->fill($data);
        if ($advert->save()) {
            return redirect("/admin/adverts");
        }
        return redirect(back())->with('message', __("Sorry, error occurred, could not process request"));
    }

    public function view($id) {
        $advert = Advert::with(['creator','updater'])->findOrFail($id);
        return view('adverts.view', compact("advert"));
    }

}