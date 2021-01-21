<?php
namespace App\Http\Controllers;

use App\Http\Requests\Account\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{

    public function changePassword() {
        $account = $this->getRecord(Auth::id());
        return view("accounts.change-password", compact("account"));
    }

    public function updatePassword(PasswordUpdateRequest $request) {
        $account = $this->getRecord(Auth::id());
        if (!$account) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Record not found."));
        }
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $account->fill($data);
        if (!$account->save()) {
            return back()->with('message', __("Sorry, could not update password"));
        }
        return redirect("admin/accounts/profile")->with(self::MESSAGE_TYPE_SUCCESS, __("Password updated successfully."));
    }

    public function profile() {
        $account = $this->getRecord(Auth::id());
        if (!$account) {
            return back()->with(self::MESSAGE_TYPE_ERROR, __("Profile not found."));
        }
        return view('accounts.profile', compact("account"));
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