@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">Display all animals</div>
                    <div style="background-color: rgb(243, 147, 103)" class="card-body">
                        <table style="background-color: rgb(255, 255, 255)" class="table table" border="1">
                            <tr>
                                <td><b>Name </th>
                                <td> {{ $animal['name'] }}</td>
                            </tr>
                            <tr>
                                <th><b>Date of birth </th>
                                <td>{{ $animal->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <td><b>Type of animal </th>
                                <td>{{ $animal->type_of_animal }}</td>
                            </tr>
                            <tr>
                                <td><b>Specie </th>
                                <td>{{ $animal->species }}</td>
                            </tr>
                            <tr>
                                <th><b>Description </th>
                                <td style="max-width:150px;">{{ $animal->description }}</td>
                            </tr>
                            <tr>
                                <td colspan='2'><img style="width:550px; height:500px" src="{{ asset('storage/images/' . $animal['image1']) }}"></td>
                            </tr>
                            <tr>
                                <td colspan='2'><img style="width:550px; height:500px" src="{{ asset('storage/images/' . $animal['image2']) }}"></td>
                            </tr>
                            <tr>
                                <td colspan='2'><img style="width:550px; height:500px" src="{{ asset('storage/images/' . $animal['image3']) }}"></td>
                            </tr>
                        </table>
                        @if (Gate::denies('displayall') == false)
                            <table>
                                <tr>
                                    <td><a href="{{ route('animals.index') }}" class="btn btn-primary" role="button">Back to the list</a></td>
                                    <td><a style="background-color:  rgb(243, 229, 202)" href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn">Edit</a></td>
                                    <td>
                                        <form action="{{ route('animals.destroy', ['animal' => $animal['id']]) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
