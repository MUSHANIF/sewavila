@extends('layouts.admin')


@section('title')
<h1 class="mb-0 fw-bold">List Keranjang</h1> 
@endsection
@section('isi')
<div class="container">
    @if ($datas->isNotEmpty())
   
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
                    
                   
                    <form action="{{ url('akunpetugas/'.$key->id) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger ms-2">Delete pesanan</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        <p>total harga seluruh pesanan anda : {{ $total }} </p>
        <p>total villa yang anda pesan : {{ $stok }} </p>
       
       

    </table>

    @else
    <div id="error">
        <div class="container text-center">
        <div class="pt-8">
            <h1 class="errors-titles">404</h1>
            <p>Data Kosong,tidak ada villa!</p>
           
          </div>
        </div>
    </div>
          @endif
</div>
    
@endsection