<?php  if (count($errors) > 0) : ?>  
										<!--ako je zbroj greški u nizu veći od 0, izvrši... -->
	<div class="error">
  
									<!-- Atribut klase "error" koristi se za definiranje stylea za sve 
															elemente s istim nazivom klase; svi HTML elementi s istim atributom klase 
															"error" imaju isti format i style. -->
				<!--  ime niza as vrijednost -->									
		<?php foreach ($errors as $error) : ?>				<!-- foreach: petlja radi na nizovima i koristi se za provlačenje kroz svakiu vrijednost u nizu.
															isto kao i=0; i<=10; i++ -->
															<!-- $errors: naziv niza -->
															<!-- vrijednost trenutnog elementa niza -->
															<!-- sve pogreške/obavjesti koje se pojavljuju spremljene su u istoimenoj varijabli, odnosno nizu -->
															
			<p><?php echo $error ?></p>						<!-- ispis errora/greške/obavjesti -->
		<?php endforeach ?>									<!-- završi za svaku vrijednost -->
	</div>
<?php  endif ?>	