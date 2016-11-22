<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Branches;
use DB;
use Illuminate\Support\Facades\Input;
use Faker\Provider\DateTime;

class BrancheController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $branches = Branches::all();
        return view('Branches.index', compact('branches','categories'));
    }

    public function show(Branches $branche)
    {   $categories = Branches::find($branche->id)->categories()->orderBy('name')->get();
        $categories2 = DB::table('categories')->get();
        $all_in_branche = array();
        foreach ($categories as $category)
        {
            $all_in_branche[] = $category->id;
        }
        return view('Branches.show', compact('branche', 'categories', 'categories2', 'all_in_branche'));
    }

    public function store(Category $category)
    {
        $branche = new Branches();
        $branche->name = request()->name;
        $category->branches()->save($branche);
        return back();
    }
    public function edit (Branches $branche) {
        return view('Branches.edit', compact('branche'));
    }
    public function update (Branches $branche) {
        $this->validate(request(), [
            'name' => 'required|unique:branches,name,' . $branche->id . '|filled',
        ]);

        $branche->name = request()->name;

        $branche->update();

        return redirect('/branches');
    }
    public function delete (Branches $branche) {
        DB::table('branches')->where('id', '=', $branche->id)->delete();

        return back();
    }
}
