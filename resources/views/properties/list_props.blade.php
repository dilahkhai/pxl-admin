@extends('layouts.apps')
@section('main')
<style>
    .fixed-height{
        height: 300px; 
        object-fit: cover;
    }
</style>
    <div class="container py-5">
        <header class="text-center mb-5" style="margin-top: 50px">
            <!-- <h1 class="display-4 font-weight-bold">Happy People Are The Prettiest</h1>
            <p class="font-italic text-muted mb-0">People whose smile is open and whose expression is glad has a kind of</p>
            <p class="font-italic text-muted mb-0">beauty no matter what they wears.</p>
            <p class="font-italic text-muted">Beauty is whatever gives joy.</p>
            <img src="https://i.pinimg.com/564x/52/60/37/52603746586bf0568cfa6781dfe91498.jpg" alt="" srcset="">
            <img src="https://i.pinimg.com/564x/f7/75/1b/f7751ba2250fd2cf500770f2b1cb11cd.jpg" alt=""
                srcset="">
            <img src="https://i.pinimg.com/564x/a2/45/f3/a245f379a2f2c7f7730b1c3bd6ead721.jpg" alt="" srcset=""
                style="margin-top: 20px">
            <img src="https://i.pinimg.com/564x/75/c6/f9/75c6f966e331a8a39861f706cee35a84.jpg" alt="" srcset=""
                style="margin-top: 20px">
            <img src="https://i.pinimg.com/564x/58/18/29/5818297a947b80110b807d319872ae43.jpg" alt="" srcset=""
                style="margin-top: 20px">
            <img src="https://i.pinimg.com/564x/b8/21/6f/b8216fcea865cd3c924a236752d06fa3.jpg" alt="" srcset=""
                style="margin-top: 20px"> -->
        </header>
        <!-- First Row [Prosucts]-->
        <body class="body">
            <h2 class="font-weight-bold mb-2" style="margin-top: 100px">From the Shop</h2>
            <a href="{{ route('properties.store') }}" class="btn btn-primary mb-4">add</a>
            <div class="row">
                @foreach ($properties as $item)
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0" onclick="window.location.href='{{ route('properties.detail', $item->id) }}'">
                        <div class="card">
                            <img src="{{ asset('storage/' . $item->photo_path) }}" class="card-img-top fixed-height" alt="...">
                            <div class="card-body">
                                <h3 class="card-title">{{ $item->type }}</h3>
                                <h6 style="color:orange">{{ $item->penggunaan }}</h6>
                                <h5 class="card-text">{{ $item->description }}</h5>
                                <p style="color:darkgrey">{{ $item->address }}</p>
                                <h5 style="color:deepskyblue">Rp. {{ $item->harga_jual }}</h5>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </body>
    </div>
@endsection
