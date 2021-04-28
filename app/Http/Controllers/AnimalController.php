<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::sortable()->paginate(5);
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    public function image(Request $request)
    {
        $id=$request->input('id');
        $animal = Animal::find($id);
        return view('animals.images', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = $this->validate(request(), [
            'name' => 'required',
            'date_of_birth' => 'required',
            'description' => 'required',
            'available' => 'required',
            'image1' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image2' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image3' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        //Handles the uploading of the image
        $image1 = 'image1';
        $image2 = 'image2';
        $image3 = 'image3';

        if ($request->hasFile($image1)) {

            //Gets the filename with the extension
            $fileNameWithExt1 = $request->file($image1)->getClientOriginalName();

            //just gets the filename
            $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);

            //Just gets the extension
            $extension1 = $request->file($image1)->getClientOriginalExtension();

            $fileNameToStore1 = $filename1 . '_' . time() . '.' . $extension1;

            //Uploads the image
            $path1 = $request->file($image1)->storeAs('public/images', $fileNameToStore1);

        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }

        if ($request->hasFile($image2)) {

            //Gets the filename with the extension
            $fileNameWithExt2 = $request->file($image2)->getClientOriginalName();

            //just gets the filename
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);

            //Just gets the extension
            $extension2 = $request->file($image2)->getClientOriginalExtension();

            $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;

            //Uploads the image
            $path2 = $request->file($image2)->storeAs('public/images', $fileNameToStore2);

        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }

        if ($request->hasFile($image3)) {

            //Gets the filename with the extension
            $fileNameWithExt3 = $request->file($image3)->getClientOriginalName();

            //just gets the filename
            $filename3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);

            //Just gets the extension
            $extension3 = $request->file($image3)->getClientOriginalExtension();

            $fileNameToStore3 = $filename3 . '_' . time() . '.' . $extension3;

            //Uploads the image
            $path3 = $request->file($image3)->storeAs('public/images', $fileNameToStore3);

        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }


        // create a animal object and set its values from the input
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->available = $request->input('available');
        $animal->type_of_animal = $request->input('type_of_animal');
        $animal->species = $request->input('species');
        $animal->created_at = now();
        $animal->image1 = $fileNameToStore1;
        $animal->image2 = $fileNameToStore2;
        $animal->image3 = $fileNameToStore3;
        // save the animal object
        $animal->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'date_of_birth' => 'required',
            'image1' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image2' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'image3' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->available = $request->input('available');
        $animal->type_of_animal = $request->input('type_of_animal');
        $animal->species = $request->input('species');
        $animal->updated_at = now();

        //Handles the uploading of the image
        $image1 = 'image1';
        $image2 = 'image2';
        $image3 = 'image3';

        if ($request->hasFile($image1)) {

            //Gets the filename with the extension
            $fileNameWithExt1 = $request->file($image1)->getClientOriginalName();

            //just gets the filename
            $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);

            //Just gets the extension
            $extension1 = $request->file($image1)->getClientOriginalExtension();

            $fileNameToStore1 = $filename1 . '_' . time() . '.' . $extension1;

            //Uploads the image
            $path1 = $request->file($image1)->storeAs('public/images', $fileNameToStore1);

        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }

        if ($request->hasFile($image2)) {

            //Gets the filename with the extension
            $fileNameWithExt2 = $request->file($image2)->getClientOriginalName();

            //just gets the filename
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);

            //Just gets the extension
            $extension2 = $request->file($image2)->getClientOriginalExtension();

            $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;

            //Uploads the image
            $path2 = $request->file($image2)->storeAs('public/images', $fileNameToStore2);

        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }

        if ($request->hasFile($image3)) {

            //Gets the filename with the extension
            $fileNameWithExt3 = $request->file($image3)->getClientOriginalName();

            //just gets the filename
            $filename3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);

            //Just gets the extension
            $extension3 = $request->file($image3)->getClientOriginalExtension();

            $fileNameToStore3 = $filename3 . '_' . time() . '.' . $extension3;

            //Uploads the image
            $path3 = $request->file($image3)->storeAs('public/images', $fileNameToStore3);

        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }

        $animal->image1 = $fileNameToStore1;
        $animal->image2 = $fileNameToStore2;
        $animal->image3 = $fileNameToStore3;

        $animal->save();
        return redirect('animals');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('animals');
    }
}
