<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{
    public function setUserAvatar(Request $request) {
        $validator = Validator::make($request->all(), [
            "avatar" => "required",
            "user_id" => "required"
        ]);

        if ($validator->fails()) {
            $this->viewParams['error'] = "One or more fields were missing information.";
            return redirect()->back()->with($this->viewParams);
        }

        $avatar_path = $request->file('avatar')->store('public/avatars');

        User::where('id', Auth::user()->id)->update(['avatar' => Storage::disk('local')->url($avatar_path)]);

        $this->viewParams['info'] = "Avatar has been updated successfully.";
        return redirect()->back()->with($this->viewParams);
    }

    public function setPodAvatar(Request $request) {
        $validator = Validator::make($request->all(), [
            "avatar" => "required",
            "pod_id" => "required"
        ]);

        if ($validator->fails()) {
            $this->viewParams['error'] = "One or more fields were missing information.";
            return redirect()->back()->with($this->viewParams);
        }

        $avatar_path = $request->file('avatar')->store('public/avatars');

        Pod::where('id', $request->get('pod_id'))->update(['avatar' => Storage::disk('local')->url($avatar_path)]);

        $this->viewParams['info'] = "Avatar has been updated successfully.";
        return redirect()->back()->with($this->viewParams);
    }
}
