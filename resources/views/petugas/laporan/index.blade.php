@extends('layouts.admin')
@section("button")
<div class="col-6">
    <div class="text-end upgrade-btn">
        <a href="/laporanexcel" class="btn btn-primary text-white"
                >Download EXCEL</a>
    </div>
</div>
@endsection
@section('isi')
<div class="container">
    @if ($datas->isNotEmpty())
   
    <table class="table mt-3" cellpadding="10" cellspace="0">
        <thead class="align-self-center text-center">
            <th>nama</th>
            <th>hari</th>
            <th>alamat</th>
            <th>action</th>
            
        </thead>
       
        @foreach ($datas as $key) 
        <tbody>
            <tr class="align-self-center text-center"  style="border: 1px solid black;">
                
                <td data-label="Cost">{{ $key->pembeli->name }}</td>
                <td data-label="Cost">{{ $key->pembeli->alamat }}</td>
                <td data-label="Cost">{{ $key->hari }}</td>
     
                 <td class="text-center justify-content-center align-self-center d-flex">
                    
                    <a class="btn btn-info" href="{{ route('produk.edit',$key->id)}}">Ubah</a>
                    <a class="btn btn-info ml-4" href="">detail</a>
                    <form action="{{ url('produk/'.$key->id) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger ms-2">Delete</button>
                    </form>
                </td>
            
            </tr>
        </tbody>
        @endforeach
       

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