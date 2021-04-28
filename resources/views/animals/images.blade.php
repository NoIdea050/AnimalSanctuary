@extends('layouts.app')
@section('content')

    <div id="image" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#image" data-slide-to="0" class="active"></li>
            <li data-target="#image" data-slide-to="1"></li>
            <li data-target="#image" data-slide-to="2"></li>
        </ul>

        <!-- Carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="width:100%; height:100%" src="{{ asset('storage/images/' . $animal['image1']) }}">
            </div>
            <div class="carousel-item">
                <img style="width:100%; height:100%" src="{{ asset('storage/images/' . $animal['image2']) }}">
            </div>
            <div class="carousel-item">
                <img style="width:100%; height:100%" src="{{ asset('storage/images/' . $animal['image3']) }}">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#image" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#image" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>


@endsection
