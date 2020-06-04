		<?php include ('posluzitelj.php'); 
		
		if(isset($_POST['zelim_obrok'])){
							
							$donacija_query = "INSERT INTO zelim (ID_korisnik, ID_br_donacije, Kod, br) VALUES ('0', '1', '0', '0')";
							mysqli_query($db, $donacija_query);										
							
		header('location: prijava.php');}?>
		
<html>
<head>
</head>
<body>
		<form method='post' action='proba.php'>								
								<input type='submit' name='zelim_obrok' value='Želim' class='btn btn-info zelim'>
								</form>
								
						
							
			</body>
			</html>