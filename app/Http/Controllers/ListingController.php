<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    public function index(){
        $tag = request("tag");
        return view('listings.index', [
            'listings' =>DB::select("SELECT * FROM listings
            WHERE tags LIKE ?", ['%'.$tag.'%']), 
            // "listings" => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    public function show(Listing $listing){
        return view('listings.show', [
            "listing" => $listing
        ]);
    }

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'title' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        Listing::create($validate);
        return redirect('/');
        dd(request());
    }
}
