<h1>Ajout d'un utilisateur</h1>

    <form method="post" action="">
        <div class="mb-3">
            <label for="username" class="form-label"><strong>Identifiant <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="username" name="username" value="<?=$username??''?>" maxlength='30' aria-describedby="userNameHelp" placeholder="Veuillez entrer votre identifiant svp?" required>
            <div class="error">
                <p id="error1" class="d-none"></p><br>
                <?= $error['username'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="lastname" class="form-label"><strong>Nom <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$lastname??''?>" maxlength='30' aria-describedby="lastNameHelp" placeholder="Veuillez entrer votre nom svp?" required>
            <div class="error">
                <p id="error2" class="d-none"></p><br>
                <?= $error['lastname'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="firstname" class="form-label"><strong>Prénom <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$firstname??''?>" maxlength='30' aria-describedby="firstNameHelp" placeholder="Veuillez entrer votre prénom svp?" required>
            <div class="error">
                <p id="error3" class="d-none"></p><br>
                <?= $error['firstname'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="email" class="form-label"><strong>Email <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="email" name="email" value="<?=$email??''?>" maxlength='30' aria-describedby="emailHelp" placeholder="Veuillez entrer votre mail svp?" required>
            <div class="error">
                <p id="error4" class="d-none"></p><br>
                <?= $error['email'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="adress" class="form-label"><strong>Adresse <strong class="danger">*</strong></strong></label>
            <textarea class="form-control" id="adress" rows="3" name="adress" value="<?=$user->adress??''?>" maxlength='50' aria-describedby="adressHelp" placeholder="Veuillez entrer votre adresse svp?" required></textarea>
            <div class="error">
                <p id="error5" class="d-none"></p><br>
                <?= $error['adress'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="phone" class="form-label"><strong>Téléphone <strong class="danger">*</strong></strong></label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?=$phone??''?>" maxlength='30' aria-describedby="phoneHelp" placeholder="Veuillez entrer votre numéro de téléphone svp?" required>
            <div class="error">
                <p id="error6" class="d-none"></p><br>
                <?= $error['phone'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="role" class="form-label"><strong>Rôle <strong class="danger">*</strong></strong></label>
            <select class="form-select"  id="role" name="role" value="<?=$role??''?>" required>
                <option selected>Selection du rôle</option>
                <option value="1">Administrateur</option>
                <option value="0">Utilisateur</option>
            </select>
            <div class="error">
                <p id="error7" class="d-none"></p><br>
                <?= $error['role'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="password" class="form-label"><strong>Mot de passe <strong class="danger">*</strong></strong></label>
            <input type="password" class="form-control" id="password" name="password" value="<?=$password??''?>" maxlength='30' aria-describedby="passwordHelp" placeholder="Veuillez entrer votre mot de passe svp?" required>
            <div class="error">
                <p id="error8" class="d-none"></p><br>
                <?= $error['password'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <label for="password1" class="form-label"><strong>Confirmation du mot de passe <strong class="danger">*</strong></strong></label>
            <input type="password" class="form-control" id="password1" name="password1" value="<?=$password??''?>" maxlength='30' aria-describedby="passwordHelp" placeholder="Veuillez confirmer votre mot de passe svp?" required>
            <div class="error">
                <p id="error9" class="d-none"></p>
                <p id="error10" class="d-none"></p>
                <?= $error['password'] ?? ''?>
            </div>
            <div class="success">
                <?= $msg['success'] ?? '' ?>
            </div><br>

            <div class="insert">
                <input class="button" type="submit" name="insert" value="Ajouter un utilisateur">
            </div>
            <div class="cancel">
                <a href="/controllers/dashboard/users/list-ctrl.php"><input class="button" type="submit" name="cancel" value="Annuler"></a>
            </div>
        </div>
    </form> 