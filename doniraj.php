<?php include('posluzitelj.php') ?>	
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
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
			
				<form method="post" action="doniraj.php">
					
					
					<?php include('errors.php'); ?>
					
					<div class="row">
							<h3 class="text-center">KREIRAJ DONACIJU</h3>
					</div>
					
					<hr>
					
					<div class="row">
						<label class="label col-md-4 control-label">Jelo</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="jelo" required>
						</div>
					</div>
					
					<div class="row">
						<label class="label col-md-4 control-label">Količina</label>
						<div class="col-md-8">
							<select class="form-control" name="kolicina" required>
								<option value="1"> 1 </option>
								<option value="2"> 2 </option>
								<option value="3"> 3 </option>
								<option value="4"> 4 </option>
								<option value="5"> 5 </option>
							</select>
						</div>
					</div>
					
					<div class="row">
						<label class="label col-md-4 control-label">Preuzimanje</label>
						<div class="col-md-8">
							<input type="radio" name="preuzimanje" value="Dostavljam"><small> Dostavljam</small>
							<br/>
							<input type="radio" name="preuzimanje" value="Ne dostavljam"><small> Ne dostavljam</small>
						</div>
					</div>
					
					<div class="row">
						<label class="label col-md-4 control-label">Lokacija</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="lokacija" required>
						</div>
					</div>
					
					<div class="row">
						<label class="label col-md-4 control-label">Vrijeme</label>
						<div class="col-md-8">
							<input type="time" class="form-control" name="vrijeme_od" required>
						</div>
						<div class="col-md-8">
							<input type="time" class="form-control" name="vrijeme_do" required>
						</div>
					</div>
				
					<a href="#"><div class="btn btn-info" data-toggle="modal" data-target="#modal">Doniraj</div></a>
									<!-- Modal - pop up prozor-->
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">POTVRDITE SVOJU DONACIJU</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										Jeste li sigurni da želite objaviti svoju donaciju?
									  </div>
									  <div class="modal-footer">
									  <input type="submit" name="donacija" value="Doniraj" class="btn btn-info">
										
									  </div>
									</div>
								  </div>
								</div>
								
					<a href="objave.php"><div class="btn btn-warning">Odustani</div></a>
				</form>
			</div>
		</div>
	</div>

</body>
</html>