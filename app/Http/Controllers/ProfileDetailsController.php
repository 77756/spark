<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Auth;
use App\User;
use File;
use Hash;
use Redirect;

class ProfileDetailsController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Update the user's profile details.
     *
     * @return Response
     */
    public function profileUpdate() {
        //assign logged in user as variable to work with
        $user = Auth::user();
        
        //validate user profile data
        $this->validate(request(), [
            'type'        => 'required',
            'firstName'   => 'required|max:50',
            'lastName'    => 'required|max:50',
            'companyName' => 'required|max:100',
            'email'       => 'email|required|max:255|unique:users,email,' . $user->id,
            'pic'         => 'file|image',
        ]);
        
        //if type is admin or guest empty the kvk, btw and ending fields in the database
        if (request()->type == "Admin" || request()->type == "Guest") {
            request()->user()->forceFill([
                'kvk'       => null,
                'btw'       => null,
                'ending_on' => null
            ])->update();
        }
        
        //update database fields
        $user->update(request()->all());
        
        
        //if profile picture has been uploaded
        if (request()->pic) {
            //store profile picture on disk
            $pic = request()->pic->store('/img/' . $user->id, 'public');
            
            //store profile picture location on DB
            request()->user()->forceFill([
                'pic' => $pic
            ])->update();
        }
        
        //set tab variable where the form came from
        $tabName = request()->tabName;
        
        //redirect back to tab
        return view('auth.settings', compact('tabName', 'user'));
    }
    
    public function contactUpdate() {
        //assign logged in user as variable to work with
        $user = Auth::user();
        
        //validate contact data
        $this->validate(request(), [
            'ending_on'   => 'required_if:type,Company,Contact person|date',
            'streetName'  => 'max:100',
            'houseNumber' => 'max:11|required_with:streetName',
            'zipCode'     => 'max:10',
            'city'        => 'max:100',
            'country'     => 'max:100',
            'phone'       => 'max:15',
            'mobile'      => 'max:15',
            'kvk'         => 'required_if:type,Company|digits:8|unique:users,kvk,' . $user->id,
            'btw'         => 'required_if:type,Company|max:15|unique:users,btw,' . $user->id,
        ]);
        
        //update database fields
        $user->update(request()->all());
        
        //set tab variable where the form came from
        $tabName = request()->tabName;
        
        //redirect back to tab
        return view('auth.settings', compact('tabName', 'user'));
    }
    
    public function edit() {
        //assign logged in user as variable to work with
        $user = Auth::user();
        
        //set default tab
        $tabName = 'tab-1';
        
        //direct to settings page
        return view('auth.settings', compact('user', 'tabName'));
    }
    
    public function securityUpdate() {
        //assign logged in user as variable to work with
        $user = Auth::user();
        
        //set tab variable where the form came from
        $tabName = request()->tabName;
        
        if (!Hash::check(request()->currentpass, $user->password))
            $errorpass = "Incorrect current password!";
        elseif (empty(request()->currentpass))
            $errorpass = "Current password field is required!";
        elseif (strlen(request()->currentpass) < 5)
            $errorpass = "Current password must be longer than 5 characters";
        else {
            //validate password
            $this->validate(request(), [
                'password' => 'required|min:5|confirmed',
            ]);
            
            //update database fields
            request()->user()->forceFill([
                'password' => bcrypt(request()->password),
            ])->save();
            
            //redirect back to tab
            return view('auth.settings', compact('tabName', 'user'));
        }
        
        return view('auth.settings', compact('tabName', 'user', 'errorpass'));
    }
    
    public function delete() {
        //get user
        $user = Auth::user();
    
        //log user out
        Auth::logout();
        
        //delete profile images belonging to user
        \Storage::deleteDirectory('/public/img/' . $user->id);
        
        //delete customers made by user
        Customer::where('user_id', $user->id)->delete();
        
        //delete user
        if ($user->delete()) {
            return Redirect::route('login')->with('global', 'Your account has been deleted!');
        }
        
        return redirect('/settings/');
    }
}