@extends('layouts.admin')
@section('isi')

  <div class="container" style="position: relative;">
    
    <form action="{{ route('diskon.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        
    
        <div class="form-group">
            <label for="formGroupExampleInput2">Diskon</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" name="diskon" value="{{ old('diskon') }}">
            <input type="hidden" class="form-control" id="formGroupExampleInput2" name="kode" value="">
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