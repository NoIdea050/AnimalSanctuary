@extends('layouts.app')
@section('content')
@if (Gate::denies('displayall') == false)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">Add a new animal</div>
                <!-- display the errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> @endforeach
                    </ul>
                </div><br /> @endif
                <!-- display the success status -->
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br /> @endif
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{url('animals') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8">
                            <label>Name</label> <br>
                            <input type="text" name="name" placeholder="Animal name" />
                        </div> <br>
                        <div class="col-md-8">
                            <label>Date Of Birth</label> <br>
                            <input type="date" name="date_of_birth" placeholder="date_of_birth" />
                        </div> <br>
                        <div class="col-md-8">
                            <label>Description</label> <br>
                            <textarea rows="4" cols="50" name="description" placeholder="Animal description"> </textarea>
                        </div> <br>
                        <div class="col-md-8">
                            <label>Available</label>
                            <select name="available">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Species</label>
                            <select name="species">
                                <option value="mammals">Mammals</option>
                                <option value="fish">Fish</option>
                                <option value="birds">Birds</option>
                                <option value="reptiles">Reptiles</option>
                                <option value="amphibians">Amphibians</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Type of animal</label>
                            <select name="type_of_animal">
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Rabbit">Rabbit</option>
                                <option value="Snake">Snake</option>
                                <option value="Salamander">Salamander</option>
                                <option value="Other">Other</option>
                            </select>
                        </div> <br>
                        <div class="col-md-8">
                            <label class="form-label" for="customFile">Image</label>
                            <p style="font-size: 10px" for="customFile"><i>Upload at least one image</p>
                            <input type="file" required class="form-control" name="image1" >
                            <input type="file" class="form-control" name="image2" >
                            <input type="file" class="form-control" name="image3" >
                        </div>
                        <br>
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" />
                            <input type="reset" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div style="text-align: center; font-size: 50px"><b>NOT ALLOWED</div>
@endif
@endsection
