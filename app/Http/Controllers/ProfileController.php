<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {   
        $request->user()->fill($request->validated());
        //todo : check email update
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        //todo : update pfp
        $newImage = $request->file('image');
         // get the the old pfp
         $user = User::where("id",$request->user()->id)->first();
         $oldpfp=$user->image;

        if ($newImage != null) {
            // dans database
            $request->user()->image = $newImage->hashName();
            $request->user()->save();
            //enregister the new image dans le dossier images_users
            $newImage->storePublicly('images_users/', 'public');

            if ($oldpfp != "admin_image.png") { 
                // delete image from le dossier images_users if it is different from the one in the seeder
                Storage::disk("public")->delete('images_users/'. $oldpfp);
            }
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
}
