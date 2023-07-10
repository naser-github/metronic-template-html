<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\UserProfile;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = User::query()->where('id', Auth::id())->first();

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

       try {
            $user = User::query()->where('id', Auth::id())->first();
            $user->name = $validated['name'];
            if ($validated['password']) $user->password = Hash::make($validated['password']);
            $user->save();

            $user_profile = UserProfile::query()->where('user_id', Auth::id())->first();
            $user_profile->phone = $validated['phone'];
            $user_profile->save();

            DB::commit();
       } catch (Exception $error) {
           DB::rollback();
           return redirect()->back()->with('error', 'Process failed try again!!');
       }

        Session::flash('success', 'Profile has been updated');
        return Redirect::back();
    }
}
