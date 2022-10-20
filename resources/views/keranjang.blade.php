@extends('layouts.admin')


@section('title')
<h1 class="mb-0 fw-bold">List Keranjang Anda untuk hari ini</h1> 
@endsection
@section("button")
@if ($datas->isNotEmpty())
<div class="col-6">
    <div class="text-end upgrade-btn">
       
        {{-- <a href="{{ url('pembayaran/'.Auth::user()->id) }}" class="btn btn-primary text-white"
                >Pesan</a> --}}
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Pesan</button>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ada diskon?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('pembayaran/'.Auth::user()->id) }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Masukan kode redeem:</label>
              <input type="text" class="form-control" name="redem">
            </div>
    
          
        </div>
        <div class="modal-footer">
        <a href="{{ url('redem/'.Auth::user()->id) }}" class="btn btn-primary text-white"
                >Lanjutkan transaksi   </a>
          <button type="submit" class="btn btn-primary">kirim kode redeem</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endif
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
                <td data-label="jumlah">{{ number_format($key->jumlah, 0, '', '.') }}</td>
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
        <p>total harga seluruh pesanan anda : {{ number_format($total, 0, '', '.') }} </p>
        <p>total villa yang anda pesan : {{ $stok }} </p>
       
       

    </table>

    @else
    <div id="error">
        <div class="container text-center">
        <div class="pt-8">
            <h1 class="errors-titles">404</h1>
            <p>keranjang anda kosong!</p>
           
          </div>
        </div>
    </div>

          @endif
</div>
    
@endsection