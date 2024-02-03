<h1>Liste des messages</h1>

<?php if (empty($result)) : ?>
    <p>Aucun message reçu.</p>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Identifiant</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Prestation</th>
                <th scope="col">Message</th>
                <th scope="col">Reçu/Lu</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $message) : ?>
                <tr>
                    <td class="tableMessage"><?= $message->username ?? '' ?></td>
                    <td class="tableMessage"><?= $message->lastname ?></td>
                    <td class="tableMessage"><?= $message->firstname ?></td>
                    <td class="tableMessage"><?= $message->performance ?></td>
                    <td class="tableMessage"><?= $message->message ?></td>
                    <td class="message">
                        <div class="message-container">
                            <div class="message text-danger" id="message<?= $message->id_message ?>">
                                <p id="status<?= $message->id_message ?>">Message reçu</p>
                                <a href="/controllers/dashboard/messages/messageDescription-ctrl.php?id=<?= $message->id_message ?>" class="btn btn-primary mark-as-read" data-message-id="<?= $message->id_message ?>">Marquer comme lu</a>
                            </div>
                        </div>
                    </td>
                    <td class="tableImg"><a href="/controllers/dashboard/messages/delete-ctrl.php?id=<?= $message->id_message ?>"><img src="/public/assets/img/téléchargement (4).png"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="error">
        <?= $error['name'] ?? '' ?><br>
    </div><br>
    <div class="success">
        <?= $msg['success'] ?? '' ?><br>
    </div>
<?php endif; ?>



