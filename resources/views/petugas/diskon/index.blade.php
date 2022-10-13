@extends('layouts.admin')

@section("button")
<div class="col-6">
    <div class="text-end upgrade-btn">
        <a href="{{ route('diskon.create') }}" class="btn btn-primary text-white"
                >Tambah</a>
    </div>
</div>
@endsection
@section('title')
<h1 class="mb-0 fw-bold">List Diskon</h1> 
@endsection
@section('isi')
<div class="container">
    @if ($datas->isNotEmpty())
   
    <table class="table mt-3" cellpadding="10" cellspace="0">
        <thead class="align-self-center text-center">
            <th>kode</th>
            <th>diskon</th>
            <th>action</th>
            
        </thead>
       
        @foreach ($datas as $key) 
        <tbody>
            <tr class="align-self-center text-center"  style="border: 1px solid black;">
              

                <td data-label="kode">{{ $key->kode }}</td>
                <td data-label="Name">{{ $key->diskon }}</td>
               
                 <td class="text-center justify-content-center align-self-center d-flex">
                    
                  
                    <form action="{{ url('diskon/'.$key->kode) }}" method="POST" >
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
            <p>Data Kosong,tidak ada diskon!</p>
           
          </div>
        </div>
    </div>
          @endif
</div>
    
@endsection