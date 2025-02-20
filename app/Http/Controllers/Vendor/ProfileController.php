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
        $data['image'] = $this->uploadImage($request, 'image', 'uploads/vendors', $user->image);
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
