@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- View page for user to see their requests --}}
            <div class="col-md-12 ">
                <div class="card">
                    <div style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">Adoption requests</div>
                    <div class="card-body">
                        <table class="table table">
                            <thead style="background-color:  rgb(243, 229, 202)">
                                <tr style="text-align: center">
                                    <th>Animal name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach ($animal_requests as $animal_request)
                                @if($animal_request['userid'] == Auth::id())
                                    <tr>
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
