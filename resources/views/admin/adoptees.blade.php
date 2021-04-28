@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    {{-- Admin view page of users that adopted --}}
                    <div style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">Adoptees</div>
                    <div class="card-body">
                        <table class="table table">
                            <thead style="background-color: rgb(243, 229, 202)">
                                <tr style="text-align: center">
                                    <th>Adopter name</th>
                                    <th>Animal name</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach ($animal_requests as $animal_request)
                                @if($animal_request['status'] == 'approved')
                                    <tr>
                                        <td>{{ $animal_request['user_name'] }}</td>
                                        <td>{{ $animal_request['animal_name'] }}</td>
                                        <td>{{ $animal_request['status'] }}</td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
