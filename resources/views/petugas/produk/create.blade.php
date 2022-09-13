@extends('layouts.admin')
@section('isi')

  <div class="container" style="position: relative;">
    
    <form action="{{ route('produk.store') }}" method="post" >
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Jenis Villa</label>
            <select class="form-select" aria-label="Default select example" name="jnsID" required>
                @foreach ($datas as $data)
                   <option value="{{ $data->id }}">{{ $data->jenis }}</option>
                @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Harga</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="harga" value="{{ old('harga') }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Stok</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="stok" value="{{ old('stok') }}">
        </div>
      
            {{-- <input type="hidden" class="form-control" id="ProdID" name="level" value="ADMIN" required> --}}
       
        <div class="form-group">
            <label for="formGroupExampleInput">Deskripsi</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
        </div>

         <button style="background-color: #FF9106; border: unset" type="submit" class="btn btn-primary mt-4">Tambah</button>
         <button type="reset" class="btn btn-danger mt-4">Reset</button>
    </form>
  </div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->






<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection