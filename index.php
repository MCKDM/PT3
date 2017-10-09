<?php
include "monPdo.php";
include "class/ArtistManager.php";
include "class/artist.php";
$pdo =  MonPdo::getInstance();
$managerArtist = new ArtistManager($pdo);

if(isset($_POST['nom'])){
	$message = $managerArtist->addArtiste($_POST['nom']);
}
//test
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PARCE QUE C'EST NOTRE PROGRAAAAAAAAAAAAAAAAAAAAME</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
           	<div class="col-md-12">
				<?php
			   		if(isset($message)){
				?>
						<div class="alert text-center <?php if($message[0] == "0"){echo "alert-danger";} else { echo "alert-success";} ?>">
							<?= $message[1]; ?>
						</div>
				<?php
					}
			   	?>
           </div>
            <div class="col-md-6">
               <h1>Liste des artistes</h1>

               <form method="post">
					<div class="form-group">
					<label for="nom">Ajouter un artiste</label>
						<div class="input-group">
							<input type="text" class="form-control" required id="nom" name="nom" placeholder="Nom de l'artiste">
							<span class="input-group-btn"><input type="submit" class="btn btn-primary"></span>
						</div>
					</div>
               </form>



                <table class="table table-hover table-striped text-center">
                    <thead>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nom</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($managerArtist->getArtistes() as $artist):
                        ?>
                            <tr>
                                <td><?= $artist->getId() ?></td>
                                <td><?= $artist->getNom() ?></td>
                                <td><a class="text-alert" href="index.php?id=<?= $artist->getId() ?>" >✚</a></td>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <?php
                    if(isset($_GET['id'])){
                    	$artiste = $managerArtist->searchArtiste((int)$_GET['id']);
						if(isset($artiste[0])){
							echo $artiste[0];
						}
					}
                ?>

            </div>
        </div>
    </div>
</body>
</html>
