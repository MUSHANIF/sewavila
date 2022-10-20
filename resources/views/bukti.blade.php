<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
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
										bukti transaksi anda {{ $hari }}
									</p>
									
									
										
										
										
									<ul class="list-group">
										<li class="list-group-item ">Total villa yang anda pesan: {{ $total }}</li>
										<li class="list-group-item">Total harga seluruh villa yang anda pesan: {{ number_format($tots, 0, '', '.') }}</li>
										<li class="list-group-item ">Total diskon yang anda peroleh: {{ number_format($diskonss, 0, '', '.') }}</li>
                                        <li class="list-group-item">Metode pembayaran : {{ $metode }}</li>
                                        <li class="list-group-item">Total bayar :  {{ number_format($duit, 0, '', '.') }}</li>
                                        <li class="list-group-item">Kembalian :  {{number_format($kembali, 0, '', '.') }}</li>
									</ul>
									
								
								</div>
					</div>
				</div>

				</div>
			</div>

		</div> <!-- End Container -->
	</div>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>