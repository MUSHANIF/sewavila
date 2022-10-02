@extends('layouts.admin')


@section('title')
<h1 class="mb-0 fw-bold">List Keranjang</h1> 
@endsection
@section("button")
@if ($status)
<div class="col-6">
    <div class="text-end upgrade-btn">
       
        <a href="{{ url('pembayaran/'.Auth::user()->id) }}" class="btn btn-primary text-white"
            
        
                >Pesan</a>
    </div>
</div>
@endif
@endsection
@section('isi')
<div class="container">
    @if ($status)
   
    <table class="table mt-3" cellpadding="10" cellspace="0">
        <thead class="align-self-center text-center">
            <th>Nama villa</th>
            <th>Jumlah </th>
            <th>Jumlah villa di pesan</th>
             <th>jenis</th>
             <th>tanggal</th>
              <th>action</th>
            
        </thead>
       
        @foreach ($datas as $key) 
        <tbody>
            <tr class="align-self-center text-center"  style="border: 1px solid black;">
              
                <td data-label="Name">{{ $key->name }}</td>
                <td data-label="jumlah">{{ $key->jumlah }}</td>
                <td data-label="stok">{{ $key->stok }}</td>
                <td data-label="jenis">{{ $key->jenis }}</td>
                <td data-label="tanggal">{{ $key->tanggal }}</td>
                <td class="text-center justify-content-center align-self-center d-flex">
                    
                   
                    <form action="{{ url('hapus/'.$key->id) }}" method="POST" >
                        @csrf
                        @method('delete')
                        <input type="hidden" name="hapus" value="{{ $key->vila->id }}">
                        <button type="submit" class="btn btn-danger ms-2">Delete pesanan</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        <p>total harga seluruh pesanan anda : {{ $total }} </p>
        <p>total villa yang anda pesan : {{ $stok }} </p>
       
       

    </table>

    @elseif (!$status)
    <div id="error">
        <div class="container text-center">
        <div class="pt-8">
            <h1 class="errors-titles">404</h1>
            <p>keranjang anda kosong!</p>
           
          </div>
        </div>
    </div>
    @else
          @endif
</div>
    
@endsection