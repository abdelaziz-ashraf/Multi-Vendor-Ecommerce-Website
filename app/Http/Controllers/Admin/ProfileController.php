<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdatePasswordRequest;
use App\Http\Requests\Admin\Profile\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index() {
        return view('admin.profile.index');
    }

    public function update(UpdateProfileRequest $request) {
        $data = $request->validated();
        $user = Auth::user();

        if($request->hasFile('image')) {
            if(File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admins'), $filename);
            $data['image'] = 'uploads/admins/' . $filename;
        }

        $user->update($data);
        toastr()->success('Profile updated successfully!');
        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request) {
        Auth::user()->update([
            'password' => bcrypt($request->new_password)
        ]);
        toastr()->success('Password Updated Successfully');
        return redirect()->back();
    }
}
