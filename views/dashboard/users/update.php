<h1>Modification d'un utilisateur</h1>

<form method="post" action="">
    <div class="card m-5">
        <div class="row styleCard justify-content-center m-3 py-5">
            <div class="col-sm-12 col-md-6 mb-3">
                <label for="username" class="form-label"><strong>Identifiant</strong></label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre identifiant svp?">
                <div class="error">
                    <p id="error1" class="d-none alert alert-danger"></p><br>
                    <?= $error['username'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="lastname" class="form-label"><strong>Nom</strong></label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user->lastname ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre nom svp?">
                <div class="error">
                    <p id="error2" class="d-none alert alert-danger"></p><br>
                    <?= $error['lastname'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="firstname" class="form-label"><strong>Nom</strong></label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user->firstname ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre prénom svp?">
                <div class="error">
                    <p id="error3" class="d-none alert alert-danger"></p><br>
                    <?= $error['firstname'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="email" class="form-label"><strong>Nom</strong></label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre email svp?">
                <div class="error">
                    <p id="error4" class="d-none alert alert-danger"></p><br>
                    <?= $error['email'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="adress" class="form-label"><strong>Adresse</strong></label>
                <textarea class="form-control" id="adress" name="adress" maxlength='50' placeholder="Veuillez entrer votre adresse svp?"><?= $user->adress ?? '' ?></textarea>
                <div class="error">
                    <p id="error5" class="d-none alert alert-danger"></p><br>
                    <?= $error['adress'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="phone" class="form-label"><strong>Téléphone</strong></label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->phone ?? '' ?>" maxlength='30' placeholder="Veuillez entrer votre numéro de téléphone svp?">
                <div class="error">
                    <p id="error6" class="d-none alert alert-danger"></p><br>
                    <?= $error['phone'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="role" class="form-label"><strong>Rôle</strong></label>
                <select class="form-select" id="role" name="role" required>
                    <option value="1" <?= ($user->role ?? '') == '1' ? 'selected' : '' ?>>Administrateur</option>
                    <option value="2" <?= ($user->role ?? '') == '2' ? 'selected' : '' ?>>Utilisateur</option>
                </select>
                <div class="error">
                    <p id="error7" class="d-none alert alert-danger"></p><br>
                    <?= $error['role'] ?? '' ?>
                </div>
                <div class="success">
                    <?= $msg['success'] ?? '' ?>
                </div><br>
            </div>

            <div class="col-12 mb-3">
                <div class="insert">
                    <input class="btn btn-primary" type="submit" name="insert" value="Modifier un utilisateur">
                </div><br>
                <div class="cancel">
                    <a href="/controllers/dashboard/users/list-ctrl.php"><input class="btn btn-secondary" type="submit" name="cancel" value="Annuler"></a>
                </div>
            </div>
        </div>
    </div>
</form>