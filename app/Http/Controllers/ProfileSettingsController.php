<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileSettingsController extends Controller
{
    public function profilePage()
    {
        $getUserData = auth()->user(); // Directly fetch the authenticated user
        return view('backend.pages.profile-page', compact('getUserData'));
    }

    public function profileUpdate(Request $request)
    {
        try {
            $user = auth()->user();

            $dataToUpdate = [
                'name' => $request->input('name'),

                'email' => $request->input('email'),
              
            ];

            // If there’s a new profile image, process and save it
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $imgName = time() . '-' . $img->getClientOriginalName();
                $imgPath = public_path("frontend/assets/images/user/{$imgName}");

                // Delete old image if it exists
                if ($user->image && File::exists(public_path($user->image))) {
                    File::delete(public_path($user->image));
                }

                // Save the new image
                $img->move(public_path('frontend/assets/images/user'), $imgName);
                $dataToUpdate['image'] = "frontend/assets/images/user/{$imgName}";
            }

            // Update user data
            User::where('id', $user->id)->update($dataToUpdate);

            return response()->json(['status' => 'success', 'message' => 'Profile Updated Successfully']);

        } catch (Exception $e) {
            return response()->json(['status' => 'failed', 'message' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }
    public function changePassword(Request $request)
{
    $request->validate([
        'currentPassword' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    // Check if the current password matches
    if (!Hash::check($request->currentPassword, auth()->user()->password)) {
        throw ValidationException::withMessages([
            'currentPassword' => 'Your current password is incorrect.',
        ]);
    }

    // Update the password
    auth()->user()->update([
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['status' => 'success', 'message' => 'Password changed successfully.']);
}


}
