<?php
$eleve="de Sousa Loïc"; // Merci de modifier cette ligne en remplaçant la chaine de caractère avec vos NOM et Prénom.
$exo=0; //Ne pas modifier cette ligne
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eval. | <?= $eleve; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>
		p {text-align: justify;}
		table {margin: auto;}
		tbody, td, tfoot, th, thead, tr {padding: 0px;}
	</style>
</head>
<body>
	<header class="container">
		<h1 class="display-4 p-5">Evaluation PHP de <strong><?= $eleve; ?></strong></h1>
	</header>
	<main >
		<section class="container-fluid p-5 bg-dark">
			<h2 class="display-6 text-center text-white">1. LES BASES DE PHP</h2>
		</section>
		<section class="container p-5">
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Déclarer une variable (nom au choix), lui affecter une valeur numérique (entier) et l'afficher dans un paragraphe <code>&lt;p&gt;</code>.</p>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					$Entier = 19;
					echo "<p>".$Entier."</p>";
				?>
				<hr/>
			</article>
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Tester si la variable déclarée dans l'exercice #1 est paire ou impaire et afficher le résultat dans un paragraphe <code>&lt;p&gt;</code>.</p>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					$pairOuNon = "";
					if ($Entier % 2 != 0) {
						$pairOuNon="Pas un nombre pair";
					} else{
						$pairOuNon="C'est un nombre pair";
					}
				?>
				<p><?= $pairOuNon ?></p>
				<hr/>
			</article>
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Afficher tous les entiers de 0 à la valeur de la variable déclarée dans l'exercice #1 dans une liste <code>&lt;ul&gt;</code></p>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					?> <ul>
					<?php 
					for ($i=1;$i<=$Entier;$i++) {?>
					<?=
					"<li>".$i."</li>";
					}
				?>
				</ul>
				<hr/>
			</article>
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Déclarer une fonction qui retourne le carré du nombre donné en paramètre, l'appeler avec la variable de l'exercice #1 et afficher le résultat dans un paragraphe <code>&lt;p&gt;</code>.</p>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					function carreNombre ($nbr){
						return $nbr * $nbr;
					}
					echo "<p>".carreNombre($Entier)."</p>";
				?>
				<hr/>
			</article>
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Déclarer un tableau indexé, lui affecter plusieurs valeurs et les afficher dans une liste <code>&lt;ul&gt;</code>.</p>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					$array =["a","b","c","d","e","f","g"];
					foreach($array as $value){
						?> <ul>
							<?= "<li>".$value."</li>";
						?> 
						</ul>
					<?php }?>
				<hr/>
			</article>
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Déclarer un tableau associatif, lui affecter plusieurs valeurs et les afficher dans un tableau <code>&lt;table&gt;</code>. (Une colonne pour la clé, une colonne pour la valeur)</p>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
						$arrayAsso = ['name'=>"Pipou", 'age'=>12, 'city'=>"Osaka"];
						?>
						<table>
								<?php foreach ($arrayAsso as $key => $value){
									echo "<tr>";
									echo "<td>".$key."</td>";
									echo "<td>".$value."</t>";
									echo "</tr>";
								}?>
						</table>
				<hr/>
			</article>
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Afficher les données du tableau PHP à 2 dimensions <code>$tableau</code> (cf. code source) dans un tableau HTML <code>&lt;table&gt;</code>. (Un <code>&lt;tr&gt;</code> par case de <code>$tableau</code>, un <code>&lt;td&gt;</code> par case de <code>$tableau[$i]</code>)</p>
				<?php
					$tableau = [
						["&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;"],
						["&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;"],
						["&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;"],
						["&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;"],
						["&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;"],
						["&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;"],
						["&#11036;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11035;","&#11036;","&#11035;","&#11036;"],
						["&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11036;","&#11035;","&#11036;"],
						["&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11035;","&#11035;","&#11036;","&#11035;","&#11035;","&#11036;","&#11036;","&#11036;","&#11036;"],
						["&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;","&#11036;"]
					];
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					?>
					<table>
						<?php foreach ($tableau as $j){
							echo "<tr>";
							foreach($j as $k){
								echo "<td>".$k."</td>";
							}
							echo "<tr>";
						}
						?>
					</table>
				<hr/>
			</article>
			<article id="<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-warning">#<?= $exo; ?></span></h3>
				<p>Sur le même principe que l'exercice précédent, créer cette fois une routine qui prend en paramètre un tableau à 2 dimensions et qui affiche ses données dans un tableau HTML <code>&lt;table&gt;</code>. (Un <code>&lt;tr&gt;</code> par case de <code>$tableau</code>, un <code>&lt;td&gt;</code> par case de <code>$tableau[$i]</code>)<br/>Lorsque la valeur de la case du tableau PHP vaut "O", afficher le caractère HTML "<code>&amp;#11036;</code>" dans la case du tableau correspondante, si la valeur vaut "0" (zéro), afficher le caractère HTML  "<code>&amp;#11035;</code>".<br/>Appeler la fonction créée avec la variable <code>$tableau</code> en paramètre.</p>
				<?php
					$tableauDino = [
						["O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O"],
						["O","O","O","O","O","O","O","O","O","0","0","0","0","0","0","O","O"],
						["O","O","O","O","O","O","O","O","0","0","O","0","0","0","0","0","O"],
						["O","O","O","O","O","O","O","O","0","0","0","0","0","0","0","0","O"],
						["O","O","O","O","O","O","O","O","0","0","0","0","O","O","O","O","O"],
						["O","O","O","O","O","O","O","O","0","0","0","0","0","0","0","0","O"],
						["O","O","O","O","O","O","O","O","0","0","0","0","0","0","0","O","O"],
						["O","0","O","O","O","O","O","0","0","0","0","O","O","O","O","O","O"],
						["O","0","O","O","O","O","0","0","0","0","0","O","O","O","O","O","O"],
						["O","0","0","O","O","0","0","0","0","0","0","0","0","O","O","O","O"],
						["O","0","0","0","0","0","0","0","0","0","0","O","0","O","O","O","O"],
						["O","O","0","0","0","0","0","0","0","0","0","O","O","O","O","O","O"],
						["O","O","O","0","0","0","0","0","0","0","0","O","O","O","O","O","O"],
						["O","O","O","O","0","0","0","O","0","0","O","O","O","O","O","O","O"],
						["O","O","O","O","O","0","O","O","O","0","O","O","O","O","O","O","O"],
						["O","O","O","O","O","0","O","O","O","0","O","O","O","O","O","O","O"],
						["O","O","O","O","O","0","0","O","O","0","0","O","O","O","O","O","O"],
						["O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O"]
					];
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					?>
						<?php 
						function fonctionTableau($tableau){
							echo "<table>";
							foreach ($tableau as $tr){
								echo "<tr>";
								foreach ($tr as $td){
									echo "<td>".($td=="0"?"&#11035;":"&#11036;")."</td>";
								}
								echo "</tr>";}
							echo "</table>";
						}
						fonctionTableau($tableauDino);?>
				<hr/>
			</article>
		</section>
		<?php $exo=0; ?>
		<section class="container-fluid p-5 bg-dark">
			<h2 class="display-6 text-center text-white">2. LES FORMULAIRES</h2>
		</section>
		<section class="container p-5">
			<article id="2-<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Saisir une valeur dans le formulaire ci-dessus, valider et l'afficher dans un paragraphe <code>&lt;p&gt;</code>.</p>
				<form action="index.php#2-<?= $exo; ?>" id="form1" method="post">
					<div class="row mb-3">
						<label for="input1" class="col-2 form-label">Saisissez une valeur</label>
						<div class="col-10">
							<input type="text" class="form-control" id="input1" name="input1">
						</div>
					</div>
					<div class="row">
						<div class="col-10 offset-2">
							<input type="hidden" name="sent1">
							<button type="submit" class="btn btn-dark">Valider</button>
						</div>
					</div>
				</form>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					$info = $_POST['input1'];
					if(isset($_POST['input1'])){
						echo "<p>".htmlspecialchars($info)."</p>";
					}
				?>
				<hr/>
			</article>
			<article id="2-<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Saisir des valeurs dans le formulaire ci-dessus, valider et les afficher "proprement".</p>
				<form action="index.php#2-<?= $exo; ?>" id="form2" method="post">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="Choix 1" id="check1" name="check[]">
						<label class="form-check-label" for="check1">Choix 1</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="Choix 2" id="check2" name="check[]">
						<label class="form-check-label" for="check2">Choix 2</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="Choix 3" id="check3" name="check[]">
						<label class="form-check-label" for="check3">Choix 3</label>
					</div>
					<div class="row">
						<div class="col-10 offset-2">
							<input type="hidden" name="sent2">
							<button type="submit" class="btn btn-dark">Valider</button>
						</div>
					</div>
				</form>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
				if (isset($_POST['check'])) {
    				if (is_array($_POST['check'])) {
        				$selectedValues = $_POST['check'];
        				echo "<ul>";
        				foreach ($selectedValues as $value) {
            				echo "<li>".htmlspecialchars($value)."</li>";}
        				echo "</ul>";
    				} else {
        				echo "<p>".htmlspecialchars($_POST['check'])."</p>";}
				} else {
    				echo "Choisissez une option.";}
				?>
				<hr/>
			</article>
			<article id="2-<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>Saisir des valeurs dans le formulaire ci-dessus, valider et les afficher "proprement".</p>
				<form action="index.php#2-<?= $exo; ?>" id="form3" method="post">
					<fieldset>
						<p class="my-2">Question 1 :</p>
						<div class="form-check">
							<input class="form-check-input" type="radio" value="choix 1" id="radio1" name="radio">
							<label class="form-check-label" for="radio1">Choix 1</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" value="choix 2" id="radio2" name="radio">
							<label class="form-check-label" for="radio2">Choix 2</label>
						</div>
					</fieldset>
					<fieldset>
						<p class="my-2">Question 2 :</p>
						<div class="form-check">
							<input class="form-check-input" type="radio" value="choix 3" id="radio3" name="radio2">
							<label class="form-check-label" for="radio3">Choix 3</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" value="choix 4" id="radio4" name="radio2">
							<label class="form-check-label" for="radio4">Choix 4</label>
						</div>
						<div class="row">
							<div class="col-10 offset-2">
								<input type="hidden" name="sent3">
								<button type="submit" class="btn btn-dark">Valider</button>
							</div>
						</div>
					</fieldset>
				</form>
				<?php
					/* -------------------------------------------------- *\
					|  ------------- INSERER VOTRE CODE ICI -------------  |
					\* -------------------------------------------------- */
					$value1 =$_POST['radio'];
					$value2 =$_POST['radio2'];
					
					if(isset($_POST['radio'])){
						if(isset($_POST['radio2'])){
							echo "<p>".$value1."</p>";
							echo "<p>".$value2."</p>";
						}
					}
				?>
				<hr/>
			</article>
			<article id="2-<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-success">#<?= $exo; ?></span></h3>
				<p>A partir du tableau <code>$tableau</code> fourni, générer une liste déroulante <code>select</code>/<code>option</code>.<br/>Sélectionner une valeur dans la liste, valider et afficher le résultat "proprement".</p>
				<form action="index.php#2-<?= $exo; ?>" id="form4" method="post">
				<label for="exo4">Liste</label>
				<select name="exo4" id="exo4">
					<?php
						$tableau=[
							["id"=>1,"valeur"=>"Hello World !"],
							["id"=>2,"valeur"=>42],
							["id"=>3,"valeur"=>"toto"],
							["id"=>4,"valeur"=>"titi"],
							["id"=>5,"valeur"=>"tata"],
							["id"=>6,"valeur"=>"je manque vraiment d'inspiration"]
						];
						/* -------------------------------------------------- *\
						|  ------------- INSERER VOTRE CODE ICI -------------  |
						\* -------------------------------------------------- */
						foreach ($tableau as $option) { ?>
							<option value="<?= $option['id']; ?>" <?= (isset($_POST['exo4']) && $_POST['exo4'] == $option['id']) ? "selected" : " "; ?>> <?= $option['valeur']; ?> </option>
						<?php } ?>
					</select>
					<?php 
					?>
					<div class="row">
						<div class="col-10 offset-2">
							<input type="hidden" name="sent4">
							<button type="submit" class="btn btn-dark">Valider</button>
						</div>
					</div>
				</form>
				<hr/>
			</article>
			<article id="2-<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-warning">#<?= $exo; ?></span></h3>
				<p>Faire un formulaire d'envoi de fichier, qui enregistre le fichier dans le répertoire courant (celui où se trouve cette page).</p>
				<form action="index.php#2-<?= $exo; ?>" id="form5" method="post">
					<?php
						/* -------------------------------------------------- *\
						|  ------------- INSERER VOTRE CODE ICI -------------  |
						\* -------------------------------------------------- */
						
					?>
					<div class="row">
						<div class="col-10 offset-2">
							<input type="hidden" name="sent5">
							<button type="submit" class="btn btn-dark">Valider</button>
						</div>
					</div>
				</form>
				<hr/>
			</article>
			<article id="2-<?= ++$exo; ?>">
				<h3 class="display-6 mt-4 mb-2">Exercice <span class="badge fs-4 bg-danger">#<?= $exo; ?></span></h3>
				<p>Faire un formulaire d'envoi et de traitement d'image, qui enregistre l'image (réduite et/ou cropée) dans le répertoire courant (celui où se trouve cette page).</p>
				<form action="index.php#2-<?= $exo; ?>" id="form6" method="post">
					<?php
						/* -------------------------------------------------- *\
						|  ------------- INSERER VOTRE CODE ICI -------------  |
						\* -------------------------------------------------- */
						
					?>
					<div class="row">
						<div class="col-10 offset-2">
							<input type="hidden" name="sent6">
							<button type="submit" class="btn btn-dark">Valider</button>
						</div>
					</div>
				</form>
				<hr/>
			</article>
		</section>
	</main>
</body>
</html>