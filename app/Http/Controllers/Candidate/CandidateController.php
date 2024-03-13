<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CandidateController extends Controller
{

    public function dashboard()
    {
        
        return view('frontend.candidate.dashboard');
    }

    public function myProfile()
    {
        $user = Auth::user()->load('profile');
        return view('frontend.candidate.my-profile', compact('user'));
    }

    public function myProfileStore(Request $request)
    {
         if ($request->hasFile('profileImage')) {
            deleteImage(Auth::user()->profile->profileImage);
            $image = saveImage($request->file('profileImage'), 'uploads/profile/');
        } else {
            $image = Auth::user()->profile->profileImage;
        }

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            // 'mobile' => 'required|numeric|unique:users,mobile,' . Auth::id(),
            'gender' => 'required',
            'country' => 'required',
            'dateOfBirth' => 'required',
            'salary' => 'required',
            'address' => 'required',
        ]);

        if (Auth::user()->profile) {
            Auth::user()->update([
                'name' => $request->firstName . ' ' . $request->lastName,
                'mobile' => $request->mobile,
            ]);
            Auth::user()->profile->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'title' => $request->title,
                'profileImage' => $image,
                'dateOfBirth' => Carbon::parse($request->dateOfBirth)->format('m-d-Y'),
                'gender' => $request->gender,
                'country' => $request->country,
                'salary' => $request->salary,
                'address' => $request->address,
                'socialFacebook' => $request->socialFacebook,
                'socialTwitter' => $request->socialTwitter,
                'socialLinkedin' => $request->socialLinkedin,
                'details' => $request->details,
            ]);
        } else {
            Auth::user()->update([
                'name' => $request->firstName . ' ' . $request->lastName,
                'mobile' => $request->mobile,
            ]);
            Auth::user()->profile()->create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'title' => $request->title,
                 'profileImage' => $image,
                'dateOfBirth' => Carbon::parse($request->dateOfBirth)->format('m-d-Y'),
                'gender' => $request->gender,
                'country' => $request->country,
                'salary' => $request->salary,
                'address' => $request->address,
                'socialFacebook' => $request->socialFacebook,
                'socialTwitter' => $request->socialTwitter,
                'socialLinkedin' => $request->socialLinkedin,
                'details' => $request->details,
            ]);
        }
         notyf()->addSuccess('Profile has been update successfully.');
        return redirect()->route('candidate.my-profile');
    }

    public function changePasswordPage()
    {
        return view('frontend.candidate.change-password');
    }
      public function changePassword(Request $request)
    {
        $request->validate([
        'current_password' => ['required', 'string'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

      $user = auth()->user();

      if (!Hash::check($request->current_password, $user->password)) {
        notyf()->addError('Current password does not match.');
            return redirect()->back();
       }

      $user->update([
        'password' => Hash::make($request->password),
      ]);
       notyf()->addSuccess('Password has been changed successfully.');
      return redirect()->route('candidate.dashboard');
      
    }

    public function myResume()
    {
        return view('frontend.candidate.my-resume');
    }
    public function myResumeStore(Request $request)
    {
        

        
        
         notyf()->addSuccess('Resume has been create successfully.');
        return redirect()->route('candidate.my-profile');
    }

 public function resumePerview(){
        return view('frontend.candidate.my-resume-preview');
 }
    public function manageJobs()
    {
        return view('frontend.candidate.manage-jobs');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('web.home');
    }

    public function applyJob()
    {
        return view('frontend.candidate.apply-job');
    }
}
