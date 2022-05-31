@extends('layouts.app')
@section('title', 'PT. Musang | Aplikasi Pendataan Barang')

@section('content')
    @include('layouts.main_screen')
    
    <div class="container mt-3">
        <h2><i class="uil uil-box"></i> DAFTAR BARANG</h2>
        <hr>
        @if($barang->count() == NULL)
            <div class="alert alert-warning" role="alert">
                Barang masih kosong
            </div>
        @else
            <div class="row">
                @foreach($barang as $data)
                <div class="col-xl-3 col-6 mb-3">
                    <div class="col-md-12 shadow-sm">
                        <img src="{{ asset('storage/app/public/images/'.$data->foto_barang) }}" alt="{{ $data->nama_barang }}" class="w-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_barang }}</h5>
                            <p class="card-text">Rp. {{ number_format($data->harga_barang) }}</p>
                            <p class="card-text">
                                Stok: 
                                @if($data->jumlah_barang === '0' || $data->jumlah_barang == null)
                                    <span class="text-danger">Barang sudah habis, silakan tunggu hingga barang di-restock ulang</span>
                                @else
                                    {{ $data->jumlah_barang }}
                                @endif
                            </p>
                            <a href="{{ route('showBarang', $data->id) }}" class="btn btn-success text-white w-100">Lihat <i class="uil uil-eye ms-1"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection