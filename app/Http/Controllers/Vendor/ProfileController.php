<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\ChangePasswordRequest;
use App\Http\Requests\Vendor\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard.profile');
    }

    public function update(UpdateProfileRequest $request) {
        $user = auth()->user();
        $data = $request->validated();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/vendors/'), $filename);
            $data['image'] = 'uploads/vendors/' . $filename;

            if(File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
        }

        $user->update($data);
        toastr()->success('Profile Updated Successfully');
        return redirect()->back();
    }

    public function changePassword(ChangePasswordRequest $request) {
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        toastr()->success('Password Changed Successfully');
        return redirect()->back();
    }
}
