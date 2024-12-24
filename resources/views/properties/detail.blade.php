@extends('layouts.apps')
@section('main')
<style>
    .fixed-height{
        height: 500px; 
        object-fit: cover;
        width: 850px;
    }

    .small-ver{
        height: 235px;
        object-fit: cover;
    }
</style>

    <div class="container-xxl py-5" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="row">
                                <img src="{{ asset('storage/' . $properties->photo_path) }}" class="card-img-top fixed-height mb-4" alt="Responsive image">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $properties->photo_path) }}" class="card-img-top small-ver mb-4" alt="Responsive image">
                                    <img src="{{ asset('storage/' . $properties->photo_path) }}" class="card-img-top small-ver mb-4" alt="Responsive image">
                                </div>
                            </div>
                            <h1>
                                {{ $properties->type }} 
                                <span class="display-4" style="font-size: 18px;">{{ $properties->address }}</span>
                            </h1>
                            <h4>{{ $properties->description }}</h4>
                            <hr class="my-4">
                            <h3>{{ $properties->product }}</h3>
                            <p>{{ $properties->desk }}</p>
                            <div class="row" style="justify-content:space-between; padding:0px 24px 0px 16px;">
                                <div class="col-md-8">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>LT</td>
                                                <td> : </td>
                                                <td>{{ $properties->LT }} M2</td>
                                            </tr>
                                            <tr>
                                                <td>LB</td>
                                                <td> : </td>
                                                <td>{{ $properties->LB }} M2</td>
                                            </tr>
                                            <tr>
                                                <td>Tingkat</td>
                                                <td> : </td>
                                                <td>{{ $properties->jumlah_tingkat }} Tingkat</td>
                                            </tr>
                                            <tr>
                                                <td>Sertifikat</td>
                                                <td> : </td>
                                                <td>{{ $properties->sertifikat }}</td>
                                            </tr>
                                            <tr>
                                                <td>PBB</td>
                                                <td> : </td>
                                                <td>{{ $properties->status_pbb }}</td>
                                            </tr>
                                            <tr>
                                                <td>Deposit</td>
                                                <td> : </td>
                                                <td>Rp {{ $properties->deposit_sewa }}</td>
                                            </tr>
                                            <tr>
                                                <td>Listrik </td>
                                                <td> : </td>
                                                <td>{{ $properties->listrik }}VA</td>
                                            </tr>
                                            <tr>
                                                <td>Air</td>
                                                <td> : </td>
                                                <td>{{ $properties->air }}</td>
                                            </tr>
                                            <tr>
                                                <td>IPL</td>
                                                <td> : </td>
                                                <td>{{ $properties->ipl }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 align-item-center" style="padding:8px;">
                                    <div class="card" style="padding:16px;">
                                        <h5>Agent : {{ $properties->agent }}</h5>
                                        <h5>Developer : {{ $properties->developer }}</h5>
                                        <h1 style="color:deepskyblue">
                                            Rp {{ $properties->harga_jual }}/
                                            <span style="font-size: 16px;">{{ $properties->periode_sewa }}</span>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
