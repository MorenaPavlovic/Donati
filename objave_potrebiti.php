<?php include('posluzitelj.php'); ?>


<html>
<head>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" type="text/css"href="objave_style.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<title>Donati</title>
</head>
<body>
<a href="prijava.php?logout='1'"><div class="btn btn-info odjava">Odjava</div></a>
	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"> DONATI</h1>
				<p class="text-center"> "Ja doniram tebi" - Aplikacija za doniranje i preuzimanje hrane </p>
				<hr/>
				<p class="text-center">Jer i jedan jogurt ili jabuka je velika donacija ako nije završio u smeću. 
				Oko nas postoje ljudi čiji frižideri zjape prazni. Ti ljudi su naši prijatelji 
				i naši susjedi, a možemo im pomoći tako da promijenimo način razmišljanja i djelovanja. </p>
				
				
			</div>
		</div>
			
		<div class="row">
			<div class="col-md-12 white">
			
				<?php 	 
				if(isset($_GET['dostava']))
				{
					$objave_query="SELECT * FROM donacija WHERE Preuzimanje='Dostavljam' AND Datum=CURDATE() ORDER BY ID_donacija DESC";

					$run_result = mysqli_query($db,$objave_query);
					
					while($row_result=mysqli_fetch_array($run_result, MYSQLI_ASSOC))
					{
						
						$id_donacije=$row_result['ID_donacija'];
						$ime=$row_result['Ime'];
						$jelo=$row_result['Jelo'];
						$kolicina=$row_result['Kolicina'];
						$preuzimanje=$row_result['Preuzimanje'];
						$lokacija=$row_result['Lokacija'];
						$vrijeme_od=$row_result['Vrijeme_od'];
						$vrijeme_do=$row_result['Vrijeme_do'];
						
						
						echo "
						<form method ='GET' action'objave_potrebiti.php'>
							<div class='row'>
								<h3>$ime</h3>
								<a href='zelim.php'><div class='btn btn-info zelim'>Želim</div></a>
								<p>Broj donacije: $id_donacije<br/>
									Naziv jela: $jelo </br>
									Količina: $kolicina </br>
									Preuzimanje: $preuzimanje </br>
									Lokacija: $lokacija </br>
									od $vrijeme_od do $vrijeme_do</p>
								<hr>
							</div>
						";
					} 
				}

				if(isset($_GET['samostalno']))
				{
					$objave_query="SELECT * FROM donacija WHERE Preuzimanje='Ne dostavljam' AND Datum=CURDATE() ORDER BY ID_donacija DESC";

					$run_result = mysqli_query($db,$objave_query);
				
					while($row_result=mysqli_fetch_array($run_result, MYSQLI_ASSOC)){
						
						$id_donacije=$row_result['ID_donacija'];
						$ime=$row_result['Ime'];
						$jelo=$row_result['Jelo'];
						$kolicina=$row_result['Kolicina'];
						$preuzimanje=$row_result['Preuzimanje'];
						$lokacija=$row_result['Lokacija'];
						$vrijeme_od=$row_result['Vrijeme_od'];
						$vrijeme_do=$row_result['Vrijeme_do'];

						echo "
							<div class='row'>
								<h3>$ime</h3>
								<a href='zelim.php'><div class='btn btn-info zelim'>Želim</div></a>
								<p>Broj donacije: $id_donacije<br/>
									Naziv jela: $jelo </br>
									Količina: $kolicina </br>
									Preuzimanje: $preuzimanje </br>
									Lokacija: $lokacija </br>
									od $vrijeme_od do $vrijeme_do</p>
								<hr>
							</div>
							";
					}
				}
				
				if (isset($_GET['sve']))
				{
					$objave_query="SELECT * FROM donacija WHERE Datum=CURDATE() ORDER BY ID_donacija DESC";

					$run_result = mysqli_query($db,$objave_query);
				
					while($row_result=mysqli_fetch_array($run_result, MYSQLI_ASSOC)){
						
						$id_donacije=$row_result['ID_donacija'];
						$ime=$row_result['Ime'];
						$jelo=$row_result['Jelo'];
						$kolicina=$row_result['Kolicina'];
						$preuzimanje=$row_result['Preuzimanje'];
						$lokacija=$row_result['Lokacija'];
						$vrijeme_od=$row_result['Vrijeme_od'];
						$vrijeme_do=$row_result['Vrijeme_do'];

						echo "
							<div class='row'>
								<h3>$ime</h3>
								<a href='zelim.php'><div class='btn btn-info zelim'>Želim</div></a>
								<p>Broj donacije: $id_donacije<br/>
									Naziv jela: $jelo </br>
									Količina: $kolicina </br>
									Preuzimanje: $preuzimanje </br>
									Lokacija: $lokacija </br>
									od $vrijeme_od do $vrijeme_do</p>
								<hr>
							</div>
							";
					}
				}
								?>
				
				
				
		
				
				
			</div>
		</div>	
	</div>
</body>
</html>