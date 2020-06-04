<?php 
	ob_start();
	session_start();																//Pohrana podataka koji se koriste na više stranica; 
																					//pohranjivanje podataka korisničkog imena, e-maila i lozinke,
																					//dok se preglednik ne zatvori
																			



	//DEKLARIRANJE VARIJABLI
	$username = "";																	// deklaracija varijabli; spremnici za spremanje informacija koje unose korisnici
	$email    = "";
	$status = "";
	$errors = array(); 																//varijabla = array() sa nizom unaprijed definiranih pogreški korisnika
	$_SESSION['success'] = "";	    												//pohrana podatka o uspješnoj registraciji korisnika

						//IP ili URL //username  //pass //ime baze
	$db = mysqli_connect('localhost', 'root', '', 'mpavlovic');				//spajanje sa serverom i bazom podataka

	// REGISTRACIJA KORISNIKA
	//provjerava je li korisnik kliknuo na gumb Registriraj se (registracija.php)
	if (isset($_POST['registracija'])) {
		
		
		//primanje svih ulaznih vrijednosti/podataka registracije koje je unio korisnik prilikom registracije
		//mysqli_real_escape_string: funkcija za izbjegavanje poosebnih znakova u nizu zbog potreba SQLa	
		//$db: određuje vezu ka bazi koju treba koristiti
		//$POST['']: niz posebnih znakova koji će se izbjeći 
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$status = mysqli_real_escape_string($db, $_POST['status']);
		
		
		
		//PROVJERA PODUDARANJA LOZINKE I POTVRDE LOZINKE
		if ($password_1 != $password_2) {									//ako se lozinka razlikuje od potvrde lozinke
			array_push($errors, "Lozinka i potvrda lozinke se ne podudaraju");
		}

		// REGISTRACIJA KORISNIKA AKO SU ISPRAVNO UNESENI PODACI
		if (count($errors) == 0) {											//ako je zbroj greški u nizu = 0
			$password = SHA1($password_1);									//šifriranje lozinke prije spremanja u bazu;
																			//unosi je u obliku heksadecimalnog broja
			
			$query = "INSERT INTO user (Ime, Email, Lozinka, Status) 
					  VALUES('$username', '$email', '$password', '$status')";
					  
			mysqli_query($db, $query);										//funkcija izvršava upit prema bazi podataka

			$_SESSION['username'] = $username;								//sesiji će biti dodjeljena vrijednost korisničkog imena dok se preglednik ne zatvori
			$_SESSION['email'] = $email;	
			$_SESSION['success'] = "Prijavljen si";							//sesiji će biti dodjeljena poruka o uspješnom ulazu dok se preglednik ne zatvori
			
			if($status == "Potrebiti")
				{
				header('location: pocetna_potrebiti.html');									//preusmjeravanje preglednika na index.php nakon uspješne registracije
				}
			else if($status == "Donator"){
				header('location: objave.php');	
			}
		}
		

	}

	// ... 
	

		// PRIJAVA KORISNIKA
	//provjerava je li korisnik kliknuo na gumb Prijavi se (prijava.php)
	//mysqli_real_escape_string: funkcija za izbjegavanje posebnih znakova u nizu zbog potreba SQLa	
	//$db: određuje vezu ka bazi koju treba koristiti
	//$POST['']: niz posebnih znakova koji će se izbjeći 
	if (isset($_POST['prijava'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string ($db, $_POST['password']);
		

		
		// PROVJERA ISPRAVNOSTI UNESENIH PODATAKA U OBRAZAC I PRIKAZ OBAVJESTI
		//if empty: funkcija za provjeru je li varijabla prazna ili ne
		//array_push: unosi jedan ili više elemenata na kraj niza.
		//$errors: vrijednost 1; ime niza; definirano u liniji 10
		//"Unesi korisničko ime": vrijednost 2; obavjest
		if (empty($username)) {
			array_push($errors, "Unesi korisničko ime");
		}
		if (empty($password)) {
			array_push($errors, "Unesi lozinku");
		}
		
		
		// PRIJAVA KORISNIKA AKO SU ISPRAVNO UNESENI PODACI
		if (count($errors) == 0) {																	//ako je zbroj greški u nizu = 0
			$password = SHA1($password);																//šifriranje lozinke prije spremanja u bazu
			$query = "SELECT * FROM user WHERE Ime='$username' AND Lozinka='$password' AND Status='Donator'";		//označi sve koji su u tablici "user" kojima se kor ime																						//i pass podudaraju s unesenim
			$query_1 = "SELECT * FROM user WHERE Ime='$username' AND Lozinka='$password' AND Status='Potrebiti'";
			
			$results = mysqli_query($db, $query);													//funkcija izvršava upit prema bazi podataka
			$results_1 = mysqli_query($db, $query_1);
		//mysqli_num_rows: funkcija vraća broj redaka dobivenih od upita prema bazi; ako je red samo jedan
		//$_SESSION['username'] = $username;: sesiji se dodjeljuje korisničko ime
		//$_SESSION['uspjesno'] = "Prijavljen si": poruka o uspješnoj prijavi
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				header('location: objave.php');											//preusmjeravanje preglednika na index.php nakon uspješne registracije
			}
			else if (mysqli_num_rows($results_1) == 1){
				$_SESSION['username'] = $username;
				header('location: pocetna_potrebiti.html');
			}
			else {
				array_push($errors, "Pogrešno korisničko ime i/ili lozinka");	//obavjest
			}
		}
	}
	
	
	
	// KREIRANJE DONACIJE 
	//provjerava je li korisnik kliknuo na gumb Doniraj (donacija.php)
	if (isset($_POST['donacija'])) {
		
		
		//primanje svih ulaznih vrijednosti/podataka registracije koje je unio korisnik prilikom registracije
		//mysqli_real_escape_string: funkcija za izbjegavanje poosebnih znakova u nizu zbog potreba SQLa	
		//$db: određuje vezu ka bazi koju treba koristiti
		//$POST['']: niz posebnih znakova koji će se izbjeći 
		$username = $_SESSION['username'];
		$jelo = mysqli_real_escape_string($db, $_POST['jelo']);
		$kolicina = mysqli_real_escape_string($db, $_POST['kolicina']);
		$preuzimanje = mysqli_real_escape_string($db, $_POST['preuzimanje']);
		$lokacija = mysqli_real_escape_string($db, $_POST['lokacija']);
		$vrijeme_od = mysqli_real_escape_string($db, $_POST['vrijeme_od']);
		$vrijeme_do = mysqli_real_escape_string($db, $_POST['vrijeme_do']);
		
		// AKO SU ISPRAVNO UNESENI PODACI
		if (count($errors) == 0) {											//ako je zbroj greški u nizu = 0
			
			
			$query = "INSERT INTO donacija (Ime, Jelo, Kolicina, Preuzimanje, Lokacija, Vrijeme_od, Vrijeme_do, Datum) 
					  VALUES('$username', '$jelo', '$kolicina', '$preuzimanje','$lokacija', '$vrijeme_od', '$vrijeme_do', NOW())";
					  
			mysqli_query($db, $query);										//funkcija izvršava upit prema bazi podataka

			$_SESSION['username'] = $username;								//sesiji će biti dodjeljena vrijednost korisničkog imena dok se preglednik ne zatvori
								//sesiji će biti dodjeljena poruka o uspješnom ulazu dok se preglednik ne zatvori
			
			header('location: donacija_uspjesna.html');
		}
		

	}
	
	
	// KREIRANJE DONACIJE 
	//provjerava je li korisnik kliknuo na gumb Doniraj (donacija.php)
	if (isset($_POST['zelim_potvrda'])) {
		
		
		//primanje svih ulaznih vrijednosti/podataka registracije koje je unio korisnik prilikom registracije
		//mysqli_real_escape_string: funkcija za izbjegavanje poosebnih znakova u nizu zbog potreba SQLa	
		//$db: određuje vezu ka bazi koju treba koristiti
		//$POST['']: niz posebnih znakova koji će se izbjeći 
		$username = $_SESSION['username'];
		$br_donacije = mysqli_real_escape_string($db, $_POST['br_donacije']);
		$kontakt = mysqli_real_escape_string($db, $_POST['kontakt']);
		$lokacija = mysqli_real_escape_string($db, $_POST['lokacija']);
		
		
		// AKO SU ISPRAVNO UNESENI PODACI
		if (count($errors) == 0) {											//ako je zbroj greški u nizu = 0
			
			$query_user_id ="SELECT ID_user FROM user WHERE Ime = '$username'";
			
			$run_result = mysqli_query($db,$query_user_id);
				
					while($row_result=mysqli_fetch_array($run_result, MYSQLI_ASSOC)){
						
					$id_user=$row_result['ID_user'];}
					
			$rand = rand(10000,99999);		
			
			$query_provjera ="SELECT br FROM zelim WHERE ID_korisnik='$id_user' AND Datum=CURDATE()";
			$provjera = mysqli_query($db, $query_provjera);
			
			if(mysqli_num_rows($provjera) == 1)	{
				header ('location: zelim_neuspjesno.html');
			}	
			
			else {
			$query = "INSERT INTO zelim (ID_korisnik, Lokacija, Kontakt, ID_br_donacije, Kod, br, Datum)
						VALUES('$id_user', '$lokacija', '$kontakt', '$br_donacije', '$rand', 1, NOW())";
					  
			mysqli_query($db, $query);										//funkcija izvršava upit prema bazi podataka
			
			$get_num = mysqli_query($db, "SELECT Kolicina FROM donacija WHERE ID_donacija='$br_donacije'");	//sql upit prema bazi
			$row = mysqli_fetch_array($get_num);														  	//varijabli row dodjeljuje se vriijednost reda rezultata upita
			$total_num = $row['Kolicina'];																	//varijabi je dodjeljena vrijednost polja reda likes
			$total_num--;
			$query_num = mysqli_query($db, "UPDATE donacija SET Kolicina='$total_num' WHERE ID_donacija ='$br_donacije'");

			$_SESSION['username'] = $username;								//sesiji će biti dodjeljena vrijednost korisničkog imena dok se preglednik ne zatvori
								//sesiji će biti dodjeljena poruka o uspješnom ulazu dok se preglednik ne zatvori
			
			header('location: zelim_uspjesno.html');
			
			
					
			
			}
		}		
	}
	
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: prijava.php");
	}
	
?>
	
	
	
	
	