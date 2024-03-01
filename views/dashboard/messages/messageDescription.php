<h1>Description d'un message</h1>

<!-- Création du formulaire -->
<form method="post" class="row align-items-center py-3" action="">
    <div class="card">
        <div class="row styleCard m-3 py-5">
            <div class="col-sm-12 col-md-6 mb-3 description text-start">
                <!-- <p class="tableMessage"><strong>Identifiant : </strong><?= $idMessage->username ?? '' ?></p> -->
                <p class="tableMessage"><strong>Nom : </strong><?= $idMessage->lastname ?></p>
                <p class="tableMessage"><strong>Prénom : </strong><?= $idMessage->firstname ?></p>
                <p class="tableMessage"><strong>Email : </strong><?= $idMessage->email ?></p>
                <p class="tableMessage"><strong>Téléphone : </strong><?= $idMessage->phone ?></p>
                <p class="tableMessage"><strong>Prestation : </strong><?= $idMessage->performance ?></p>
                <p class="tableMessage"><strong>Date du message : </strong><?= $idMessage->created_at ?></p>
                <p class="tableMessage"><strong>Message : </strong><?= $idMessage->message ?></p>
            </div>
            <div class="row btnList justify-content-center py-5">
                <a href="/controllers/dashboard/messages/list-ctrl.php" class="col-2 btn btn-primary">Liste des messages</a>
            </div>
        </div>
    </div>
<!-- Fin du formulaire -->
</form>