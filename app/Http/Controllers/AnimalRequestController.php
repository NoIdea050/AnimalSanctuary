<?php

namespace App\Http\Controllers;

use App\Models\AnimalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animal;
use Gate;

class AnimalRequestController extends Controller
{
    /**
     * Making sure login is required to view pages
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @return index page in animal request
     */
    public function show()
    {
        $animal_requests = AnimalRequest::all()->toArray();
        return view('animalRequests.index', compact('animal_requests'));
    }

    /**
     * Approve button function
     * Making sure a single request of animal is approved.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $animal_request = AnimalRequest::where('animalid', $request->input('animalid'))->where('user_name', $request->input('user_name'))->get()->first();
        $animal_request->status = 'approved';
        $id = $request->input('animalid');
        foreach (AnimalRequest::where('animalid', $id)->get() as $denier) {
            if($animal_request ->userid != Auth::id()) {
                $denier -> status = 'denied';
                $denier -> save();
            }
        }

        $animals = Animal::all();
        foreach($animals as $animal){
            if($animal->id == $request -> input('animalid')){
                $animal->available = 'no';
                $animal->save();
            }
        }

        $animal_request->save();
        return back()->with('success', 'This animal has been approved');
    }

    /**
     * Deny button function
     *
     */
    public function edit(Request $request, $id)
    {
        $animal_request = AnimalRequest::where('animalid', $request->input('animalid'))->where('user_name', $request->input('user_name'))->get()->first();
        if ($animal_request->status == 'pending') {
            $animal_request->status = $request->input('status');
            $animal_request->save();

            return back()->with('success', 'Denied');
        } else {
            return back()->with('fail', 'This animal has already been modified');
        }
    }

    public function store(Request $request)
    {

        $animal_request = new AnimalRequest;
        $animal_request->user_name = $request->input('user_name');
        $animal_request->userid = Auth::id();
        $animal_request->animalid = $request->input('animalid');
        $animal_request->animal_name = $request->input('animal_name');
        $animal_request->status = $request->input('status');
        $animal_request->created_at = now();
        $animal_request->save();


        return redirect('animals');
    }

    /**
     * Displaying animal requests page of users
     *
     */
    public function myrequests()
    {
        $animal_requests = AnimalRequest::all()->toArray();
        return view('animalRequests.myrequests', compact('animal_requests'));
    }

    /**
     * Displaying adoptees page of admin
     *
     */
    public function adoptees()
    {
        $animal_requests = AnimalRequest::all()->toArray();
        return view('admin.adoptees', compact('animal_requests'));
    }

}
