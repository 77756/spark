<?php
namespace App\Http\Controllers;

use DB;
use App\Customer;
use App\User;
use Auth;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller {
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function show() {
        $user = Auth::user();
        
        return view('customers.show', compact('user'));
    }
    
    public function add() {
        return view('customers.add');
    }
    
    public function store() {
        $customer = new Customer;
        
        $this->validate(request(), [
            'companyName' => 'required|unique:customers|max:100|filled',
            'email'       => 'email|required|unique:customers|max:255|filled',
            'phone'       => 'required|max:20|filled',
            'ending_on'   => 'required|date|filled',
            
            'street'    => 'required|max:100|filled',
            'streetNum' => 'required|max:11|filled',
            'zip'       => 'required|max:10|filled',
            'city'      => 'required|max:100|filled',
            'country'   => 'required|max:100|filled',
            'kvk'       => 'required|unique:customers|digits:8|filled',
            'btw'       => 'required|unique:customers|max:25|filled',
            
            'pic' => 'file|image',
        ]);
        
        $customer->fill(request()->all());
        $customer->forceFill([
            'user_id' => Auth::user()->id
        ])->save();
        
        //if profile picture has been uploaded
        if (request()->pic) {
            //store profile picture on disk
            $pic = request()->pic->store('/img/customers/' . $customer->id, 'public');
            
            //store profile picture location on DB
            $customer->forceFill([
                'pic' => $pic
            ])->save();
        }
        
        Auth::user()->customers()->save($customer);
        
        return redirect('/customers/show');
    }
    
    public function edit(Customer $customer) {
        return view('customers.edit', compact('customer'));
    }
    
    public function more(Customer $customer) {
        $user = Auth::user();
        
        if ($user->type == "Contact person" && $user->companyName == $customer->name)
            $person = Auth::user();
        else
            $person = null;
        
        return view('customers.more', compact('customer', 'person'));
    }
    
    public function update(Customer $customer) {
        $this->validate(request(), [
            'name'      => 'required|unique:customers,name,' . $customer->id . '|max:100|filled',
            'email'     => 'email|required|unique:customers,email,' . $customer->id . '|max:255|filled',
            'phone'     => 'required|max:20|filled',
            'street'    => 'required|max:100|filled',
            'streetNum' => 'required|max:11|filled',
            'zip'       => 'required|max:10|filled',
            'city'      => 'required|max:100|filled',
            'country'   => 'required|max:100|filled',
            'kvk'       => 'required|unique:customers,kvk,' . $customer->id . '|digits:8|filled',
            'btw'       => 'required|unique:customers,btw,' . $customer->id . '|max:25|filled',
            'ending_on' => 'required|date|filled',
            'pic'       => 'file|image',
        ]);
        
        $customer->update(request()->all());
        
        //if profile picture has been uploaded
        if (request()->pic) {
            //store profile picture on disk
            $pic = request()->pic->store('/img/customers/' . $customer->id, 'public');
            
            //store profile picture location on DB
            $customer->forceFill([
                'pic' => $pic
            ])->update();
        }
        
        return redirect('/customers/show');
    }
    
    
    public function delete(Customer $customer) {
        $customer->delete();
        
        return redirect('/customers/show');
    }
}




