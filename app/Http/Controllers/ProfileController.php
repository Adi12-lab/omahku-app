<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function viewInFrontend() {
           
    }

    public function viewInAdmin() {
        $agent = Agent::firstWhere("user_id", Auth::user()->id);
        return view("admin.profile", compact("agent"));
    }

    public function createOrUpdateAgent(Request $request) {
        $rules = [
            "name" => ["required","string","min:3"],
            "facebook" => ["string"],
            "twitter" => ["string"],
            "instagram" => ["string"],
            "whatsapp" => ["numeric"],
            "description" => ["required","string", "min:5"],
        ];

        $validatedData = $request->validate($rules);
        $agent = Agent::firstWhere("user_id", Auth::user()->id);
        if($request->hasFile("image")) {
            $uploadPath = "uploads/agents/";
            $imageFile = $request->file("image");
            $extension = $imageFile->getClientOriginalExtension();
            $filename = $request->user()->username."-".time().".".$extension;
            $imageFile->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath.$filename;
            //hapus foto terdahulu

            if(File::exists($agent->image)) {
                File::delete($agent->image);
            }

            $validatedData["image"] = $finalImagePathName;
        }
        $validatedData["user_id"] = Auth::user()->id;

        if($agent) {
            $agent->update($validatedData);
        } else {
            Agent::create($validatedData);
        }

        return redirect()->back()->with('status', 'Profil Agen Berhasil di Update');

    }
    /**
     * Update the user's profile information.
     */
    public function update( Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'username' => ['string', 'max:255', Rule::unique(User::class)->ignore(Auth::user()->id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore(Auth::user()->id)],
        ]);

        $request->user()->fill($validator->validated());

        if ($request->user()->isDirty('email')) {//jika terjadi perbedaan pada database
            $request->user()->email_verified_at = null;
        }

        if($request->hasFile("image")) {
            $uploadPath = "uploads/users/";
            $imageFile = $request->file("image");
            $extension = $imageFile->getClientOriginalExtension();
            $filename = $request->user()->username."-".time().".".$extension;
            $imageFile->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath.$filename;
            //hapus foto terdahulu

            if(File::exists($request->user()->image)) {
                File::delete($request->user()->image);
            }

            //ganti dengan baru
            $request->user()->image = $finalImagePathName;

                
            }
        $request->user()->save();
        return redirect()->back()->with('status', 'Profil User Berhasil di Update');
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
