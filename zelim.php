<?php include('posluzitelj.php') ?>	
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" type="text/css"href="forme_style.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<title>Donati</title>
</head>
<body>
	<a href="prijava.php?logout='1'"><div class="btn btn-info odjava">Odjava</div></a>
	<div class="container">
		
			<div class="col-md-5 col-md-offset-4 doniraj">
			
			<form method="post" action="zelim.php">
					
					
					<?php include('errors.php'); ?>
					
				<div class="row">
						<h3 class="text-center">PRIBILJEŽI SE</h3>
				</div>
				
			<hr>
				<div class="row">
					<label class="label col-md-4 control-label">Broj donacije</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="br_donacije" required>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Kontakt</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="kontakt" required>
					</div>
				</div>
				
				<div class="row">
					<label class="label col-md-4 control-label">Lokacija</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="lokacija" required>
					</div>
				</div>
			
				<a href="#"><div class="btn btn-info" data-toggle="modal" data-target="#modal">Pribilježi se</div></a>
								<!-- Modal - pop up prozor-->
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">POTVRDITE SVOJ ODABIR</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									Jeste li sigurni u svoj odabir?
								  </div>
								  <div class="modal-footer">
									
									 <input type="submit" name="zelim_potvrda" value="Pribilježi se" class="btn btn-info">
										
									
								  </div>
								</div>
							  </div>
							</div>
							
				<a href="pocetna_potrebiti.html"><div class="btn btn-warning">Odustani</div></a>
				</form>
			</div>
		</div>
	</div>

</body>
</html>