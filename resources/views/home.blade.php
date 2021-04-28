@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: rgb(37, 37, 37); color:rgb(255, 255, 255)" class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Gate::denies('displayall') == false)
                    {{ __('Admin login!') }}
                    @else
                    {{ __('User login!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
