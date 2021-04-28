@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <div style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">Animals to adopt</div>
                    <div style="background-color: rgb(243, 147, 103)" class="card-body">
                        <table class="table table-hover" cellspacing="0" width="100%">
                            <thead style="background-color:  rgb(243, 229, 202)">
                                <tr style="text-align: center">
                                    <th>Image</th>
                                    <th style="white-space: nowrap;">@sortablelink('name', 'Name')</th>
                                    <th style="white-space: nowrap">Date of birth</th>
                                    <th>Available</th>
                                    <th style="white-space: nowrap">Type of animal</th>
                                    <th>Species</th>
                                    <th style="width: 200px">Description</th>
                                    <th colspan="3"></th>
                                </tr>
                            </thead>
                            <tbody style="background-color: rgb(255, 255, 255)">
                                @foreach ($animals as $animal)
                                    <tr>
                                        <td><img style="padding: 5px; width: 150px; height: 95px" onerror="this.onerror=null;this.src='noimage.jpg';" src="{{ asset('storage/images/' . $animal['image1']) }}"></td>
                                        <td>{{ $animal['name'] }}</td>
                                        <td>{{ $animal['date_of_birth'] }}</td>
                                        <td style="text-align: center">{{ $animal['available'] }}</td>
                                        <td style="text-align: center">{{ $animal['type_of_animal'] }}</td>
                                        <td>{{ $animal['species'] }}</td>
                                        <td>{{ $animal['description'] }}</td>

                                        @if (Gate::denies('displayall') == true)
                                            <td>
                                                <form
                                                    action="{{ action([App\Http\Controllers\AnimalController::class, 'image'], ['animal' => $animal['id']]) }}"
                                                    method="post">
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{ $animal['id'] }}">
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button class="btn btn-success" type="submit">images</button>
                                                </form>
                                            </td>
                                        @endif

                                        @if (Gate::denies('displayall') == false)
                                            <td><a href="{{ route('animals.show', ['animal' => $animal['id']]) }}" class="btn btn-secondary">Details</a></td>
                                            <td><a style="background-color:  rgb(243, 229, 202)" href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn">Edit</a></td>
                                        @endif


                                        @if (Gate::denies('displayall') == false)

                                            <td>
                                                <form
                                                    action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['animal' => $animal['id']]) }}"
                                                    method="post">
                                                    @csrf

                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>

                                        @elseif(Gate::denies('displayall') == true)
                                            <td>
                                                @if (\App\Models\AnimalRequest::where('animalid', $animal['id'])->exists() == false)
                                                    <form
                                                        action="{{ action([App\Http\Controllers\AnimalRequestController::class, 'store'], ['animal' => $animal['id']]) }}"
                                                        method="post">
                                                        @csrf

                                                        <input type="hidden" name="user_name"
                                                            value="{{ App\Models\User::where('id', Auth::id())->first()['name'] }}">
                                                        <input type="hidden" name="animalid" value="{{ $animal['id'] }}">
                                                        <input type="hidden" name="animal_name"
                                                            value="{{ $animal['name'] }}">
                                                        <input type="hidden" name="status" value="pending">
                                                        <button class="btn btn-primary" type="submit">Adopt</button>
                                                    </form>

                                                @elseif(\App\Models\AnimalRequest::where('animalid', $animal['id'])->get()->first()['status'] != 'approved')
                                                    @if (\App\Models\AnimalRequest::where('animalid', $animal['id'])->exists() != true)
                                                        <form
                                                            action="{{ action([App\Http\Controllers\AnimalRequestController::class, 'store'], ['animal' => $animal['id']]) }}"
                                                            method="post">
                                                            @csrf

                                                            <input type="hidden" name="user_name" value="{{ App\Models\User::where('id', Auth::id())->first()['name'] }}">
                                                            <input type="hidden" name="animalid" value="{{ $animal['id'] }}">
                                                            <input type="hidden" name="animal_name" value="{{ $animal['name'] }}">
                                                            <input type="hidden" name="status" value="pending">
                                                            <button class="btn btn-primary" id="adopt" type="submit">Adopt</button>
                                                        </form>
                                                    @elseif(\App\Models\AnimalRequest::where('animalid', $animal['id'])->get()->first()['status'] == 'denied')
                                                        <div><b>Denied</div>
                                                    @else
                                                        <div><b>Pending</div>
                                                    @endif
                                                @else
                                                    <div><b>Adopted</div>
                                                @endif

                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <span>
                            {{-- Pagination --}}
                            {{ $animals->links() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

