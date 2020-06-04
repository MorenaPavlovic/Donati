<?php include('posluzitelj.php') ?>	
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" type="text/css"href="forme_style.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<title>Donati</title>
</head>
<body>
	<div class="container">
		<div class="row">
		
		
			<div class="col-md-7">
				<h1 class="text-center"> DONATI</h1>
				<p class="text-center"> "Ja doniram tebi" - Aplikacija za doniranje i preuzimanje hrane </p>
				<hr/>
				<p class="text-center">Jer i jedan jogurt ili jabuka je velika donacija ako nije završio u smeću. 
				Oko nas postoje ljudi čiji frižideri zjape prazni. Ti ljudi su naši prijatelji 
				i naši susjedi, a možemo im pomoći tako da promijenimo način razmišljanja i djelovanja. </p>
			</div>
		
			
		<div class="col-md-5">
			
			<form method="post" action="registracija.php">
				
				
				<?php include('errors.php'); ?>
				
				<div class="row">
						<h3 class="text-center">REGISTRIRAJ SE</h3>
				</div>
				
			<hr>
				
				<div class="row">
					<label class="label col-md-4 control-label">Ime</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="username" required>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">E-mail</label>
					<div class="col-md-8">
						<input type="e-mail" class="form-control" name="email" required>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Lozinka</label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="password_1" required>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Potvrda</label>
					<div class="col-md-8">
						<input type="password" class="form-control" name="password_2" required>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Status</label>
					<div class="col-md-8">
						<input type="radio" name="status" value="Potrebiti"><small> Potrebiti</small>
						<br/>
						<input type="radio" name="status" value="Donator"><small> Donator</small>
					</div>
				</div>
				
				<input type="submit" name="registracija" value="Registracija" class="btn btn-info">
				<a href="#"><div class="btn btn-warning">Odustani</div></a>
				
			</form>	
			
				<br/>
				
				<div class="text-center"> <a href="prijava.php">Registriran si? Prijavi se!</a>
			</div>
		</div>
	</div>

</body>
</html>