<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use RealRashid\SweetAlert\Toaster;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $title = 'Profile';
        return view('profile.edit', [
            'user' => $request->user(),
            'title' => $title,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        dd($user, $request->all());

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|different:current_password',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['status' => 'error', 'errors' => ['current_password' => ['Current password does not match']]]);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success('Password change successfully');
        return response()->json(['status' => 'success', 'message' => 'Password changed successfully']);


    }
}
