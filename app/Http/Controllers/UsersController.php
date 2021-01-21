<?php


namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index() {
        $users = User::paginate();
        return view("users.index", compact("users"));
    }

    public function create() {
        $user = new User();
        return view("users.create", compact("user"));
    }

    public function edit($id) {
        $user = $this->getRecord($id);
        if (!$user) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }
        return view("users.edit", compact("user"));
    }

    public function store(UserCreateRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        if (!$user) {
            return back()->with('message', __("Sorry, could not create record"));
        }

        event(new Registered($user));
        return redirect("/admin/users");
    }

    public function update(UserUpdateRequest $request, $id) {
        $user = $this->getRecord($id);
        if (!$user) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }
        $data = $request->validated();
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->fill($data);
        if (!$user->save()) {
            return back()->with('message', __("Sorry, could not update record"));
        }
        return redirect("/admin/users");
    }

    public function show($id) {
        $user = $this->getRecord($id);
        if (!$user) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }
        return view('users.view', compact("user"));
    }

    private function getRecord($id) {
        try {
            $record = User::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return false;
        }
        return $record;
    }

}