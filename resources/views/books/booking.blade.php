@extends('layouts.apps')

@section('main')
<style>
    .fixed-height {
        width: 100%; 
        height: 300px; 
        object-fit: cover;
    }
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .text-deco {
        text-decoration: none;
        color: black;
    }
    .text-deco:hover, .text-deco:focus {
        color: black;
        text-decoration: none;
    }
</style>

<div class="container py-5">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Properties and Booking</title>
    </head>
    <header class="text-center mb-5" style="margin-top: 50px">
        <h2 class="font-weight-bold mb-2" style="margin-top: 100px">From the Shop</h2>
        <a href="{{ route('properties.property') }}" id="add-property" class="btn btn-primary mb-4">Add</a>
    </header>
    <body class="body">
        <div class="row">
            @foreach ($properties as $item)
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card property-card" data-id="{{ $item->id }}">
                        <a class="text-deco property-link" href="{{ route('books.book', $item->id) }}">
                            @if($item->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $item->images->first()->image_path) }}" alt="Property Image" class="fixed-height">
                            @else
                                <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image" style="width: 100%; height: auto;">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ $item->type }}
                                    <span>
                                        @auth
                                            @if($item->status === 'rented')
                                                <button type="button" class="btn btn-outline-danger btn-sm" disabled>Rented</button>
                                            @elseif($item->status === 'sold')
                                                <button type="button" class="btn btn-outline-danger btn-sm" disabled>Sold</button>
                                            @elseif($item->status === 'available')
                                                <button type="button" class="btn btn-outline-success btn-sm" disabled>Available</button>
                                            @endif
                                        @endauth
                                    </span>
                                </h3>
                                <h5 style="color:orange">{{ $item->penggunaan }}</h5>
                                <h5 class="card-text text-truncate">{{ $item->description }}</h5>
                                <p style="color:darkgrey">{{ $item->address }}</p>
                                <h2 style="color:deepskyblue">Rp. {{ $item->harga_jual }}</h2>
                            </div>
                        </a>
                    </div>
                    <br>
                </div>
            @endforeach
        </div>
    </body>
</div>

@endsection

