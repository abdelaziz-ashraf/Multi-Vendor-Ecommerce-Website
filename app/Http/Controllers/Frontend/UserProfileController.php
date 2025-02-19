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

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users/'), $filename);
            $data['image'] = 'uploads/users/' . $filename;

            if(File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
        }

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
