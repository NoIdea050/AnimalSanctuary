@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div  style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">Edit and update the animal</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('animals.update', ['animal' => $animal['id']]) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="col-md-8">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$animal->name}}" />
                        </div>
                        <div class="col-md-8">
                            <label>Available</label>
                            <select name="available" value="{{$animal->available}}">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Species</label>
                            <select name="species" value="{{$animal->species}}">
                                <option name="species" value="mammals">Mammals</option>
                                <option name="species" value="fish">Fish</option>
                                <option name="species" value="birds">Birds</option>
                                <option name="species" value="reptiles">Reptiles</option>
                                <option name="species" value="amphibians">Amphibians</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Type of animal</label>
                            <select name="type_of_animal" value="{{$animal->type_of_animal}}">
                                <option name="type_of_animal" value="Dog">Dog</option>
                                <option name="type_of_animal" value="Cat">Cat</option>
                                <option name="type_of_animal" value="Rabbit">Rabbit</option>
                                <option name="type_of_animal" value="Snake">Snake</option>
                                <option name="type_of_animal" value="Salamander">Salamander</option>
                                <option name="type_of_animal" value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Date of birth</label>
                            <input type="date" name="date_of_birth" value="{{$animal->date_of_birth}}" />
                        </div>
                        <div class="col-md-8">
                            <label>Description</label>
                            <textarea rows="4" cols="50" name="description"> {{$animal->description}}
                            </textarea>
                        </div>
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
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
