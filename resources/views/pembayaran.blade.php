@extends('layouts.admin')
@section('isi')	<!--Content Start-->
	<div class="content-start transition">
		<div class="container-fluid dashboard">
			<div class="content-header">
				<h1>Transaksi</h1>
				<p></p>
			</div>
		  
			<div class="row">
				<div class="col-12">

					<div class="card">
						<div class="card-body"> 
							
								
							<div class="card-content">
								<div class="card-body">
									<p>
										transaksi anda
									</p>
									@foreach ($datas as $key )
									<form action="{{ url('/bayar',$key->userid) }}" method="post" >
										@csrf
										
										
										<input type="hidden" name="userid" value="{{ $key->userid }}">
										<input type="hidden" name="download" value="1">
										<input type="hidden" name="villaid" value="{{ $key->villaid }}">
										@endforeach
									<ul class="list-group">
										<li class="list-group-item ">Total villa yang anda pesan: {{ $total }}</li>
										<li class="list-group-item">Total harga seluruh villa yang anda pesan: {{ number_format($jumlah, 0, '', '.') }}</li>
										@if ($diskon)
											
										
										<li class="list-group-item">Total diskon yang anda peroleh: {{ number_format($diskons, 0, '', '.') }} untuk {{ $totals }} jenis villa</li>
										@endif
										<li class="list-group-item "> metode pembayaran yang tersedia: 
											<select class="form-select mt-2" aria-label="Default select example" name="metode_pembayaran" required>
											
											   <option value="cash">cash</option>
											
									  </select></li>
									 
									  <li class="list-group-item ">Masukan total pembayaran : <input type="number" name="total" placeholder="Rp 1.000.000"> </li>

									  </ul>
									  <button type="submit" class="btn btn-primary mt-5 justify-content-center text-center align-center">Bayar</button>
									</form>
								</div>
					</div>
				</div>

				</div>
			</div>

		</div> <!-- End Container -->
	</div>
    
@endsection