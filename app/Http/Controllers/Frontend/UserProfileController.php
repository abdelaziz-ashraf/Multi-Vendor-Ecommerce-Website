<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\ChangePassword;
use App\Http\Requests\User\Profile\UpdateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function index() {
        return view('frontend.dashboard.profile');
    }

    public function update(UpdateProfile $request) {
        $user = auth()->user();
        $data = $request->validated();
        $data['image'] = $this->uploadImage($request, 'image', 'uploads/users', $user->image);
        $user->update($data);
        toastr()->success('Profile Updated Successfully');
        return redirect()->back();
    }

    public function changePassword(ChangePassword $request) {
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        toastr()->success('Password Changed Successfully');
        return redirect()->back();
    }
}
