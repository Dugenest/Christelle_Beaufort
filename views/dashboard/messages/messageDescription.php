<h1>Description d'un message</h1>

<div class="container-fluid">
    <form method="post" class="row align-items-center py-5" action="">
        <div class="col col-md-6 description text-start">
            <p class="tableMessage"><strong>Identifiant : </strong><?= $idMessage->username ?? '' ?></p> 
            <p class="tableMessage"><strong>Nom : </strong><?= $idMessage->lastname ?? '' ?></p> 
            <p class="tableMessage"><strong>Prénom : </strong><?= $idMessage->firstname ?? '' ?></p>
            <p class="tableMessage"><strong>Prestation : </strong><?= $idMessage->performance ?? '' ?></p>
            <p class="tableMessage"><strong>Date du message : </strong><?= $idMessage->created_at ?? '' ?></p>
            <p class="tableMessage"><strong>Message : </strong><?= $idMessage->message ?? '' ?></p>
        </div>
        <div class="row btnList justify-content-center py-5">
            <a href="/controllers/dashboard/messages/list-ctrl.php" class="col-2 btn btn-primary">Liste des messages</a>
        </div>
    </form>
</div>