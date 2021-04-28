@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- Approving and denying user adoption requests --}}
            <div class="col-md-12 ">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
                @if (\Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{ \Session::get('fail') }}</p>
                    </div><br />
                @endif
                <div class="card">
                    <div style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">Adoption requests</div>
                    <div class="card-body">
                        <table class="table table">
                            <thead style="background-color:  rgb(243, 229, 202)">
                                <tr style="text-align: center">
                                    <th>User Name</th>
                                    <th>Animal name</th>
                                    <th>User ID</th>
                                    <th>Animal ID</th>
                                    <th>Status</th>
                                    <th colspan="3" style="text-align: center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animal_requests as $animal_request)
                                    <tr style="text-align: center">
                                        <td>{{ $animal_request['user_name'] }}</td>
                                        <td>{{ $animal_request['animal_name'] }}</td>
                                        <td>{{ $animal_request['userid'] }}</td>
                                        <td>{{ $animal_request['animalid'] }}</td>
                                        <td>{{ $animal_request['status'] }}</td>


                                        <td>
                                            @if ($animal_request['status'] == 'pending')
                                                <form
                                                    action="{{ action([App\Http\Controllers\AnimalRequestController::class, 'update'], ['animal_request' => $animal_request['status'], $animal_request['id']]) }}"
                                                    method="post">
                                                    @csrf

                                                    <input type="hidden" name="user_name"
                                                        value="{{ $animal_request['user_name'] }}">
                                                    <input type="hidden" name="animalid"
                                                        value="{{ $animal_request['animalid'] }}">
                                                    <input type="hidden" name="animal_name"
                                                        value="{{ $animal_request['animal_name'] }}">
                                                    <input type="hidden" name="status" value="approved">
                                                    <input type="hidden" name="_method" value="PATCH">
                                                    <button class="btn btn-primary" type="submit">Approve</button>
                                                </form>
                                            @endif
                                        </td>

                                        <td style="width: 10%">
                                            @if ($animal_request['status'] == 'pending')
                                                <form
                                                    action="{{ action([App\Http\Controllers\AnimalRequestController::class, 'edit'], ['animal_request' => $animal_request['status'], $animal_request['id']]) }}"
                                                    method="get">
                                                    @csrf

                                                    <input type="hidden" name="user_name"
                                                        value="{{ $animal_request['user_name'] }}">
                                                    <input type="hidden" name="animalid"
                                                        value="{{ $animal_request['animalid'] }}">
                                                    <input type="hidden" name="animal_name"
                                                        value="{{ $animal_request['animal_name'] }}">
                                                    <input type="hidden" name="status" value="denied">
                                                    <button class="btn btn-danger" type="submit"
                                                        style="padding-left: 25px; padding-right: 25px;">Deny</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
