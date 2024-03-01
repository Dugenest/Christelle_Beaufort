// Déclaration des variables
const userNameText = document.getElementById("username");
const lastNameText = document.getElementById("lastname");
const firstNameText = document.getElementById("firstname");
const emailText = document.getElementById("email");
const phoneText = document.getElementById("phone");
const roleText = document.getElementById("role");
const pwdMedium = document.getElementById("password");
const pwdStrong = document.getElementById("confirmPassword");

//création des messages
const message1 = "Caractères non pris en compte !";
const message2 = "E-mail incorrect !";
const message3 = "Le texte n'est pas valide !";
const message4 = "Le numéro de téléphone n'est pas valide !";
const message5 = "Mot de Passe différent du premier !";
const message6 = "Merci de mettre au moins 1 Majuscule, 1 minuscule, 1 chiffre et 1 caratère spécial (min 8)."

//création des constantes pour afficher les messages
const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");
const errorMessage3 = document.getElementById("error3");
const errorMessage4 = document.getElementById("error4");
const errorMessage5 = document.getElementById("error5");
const errorMessage6 = document.getElementById("error6");
const errorMessage7 = document.getElementById("error7");
const errorMessage8 = document.getElementById("error8");
const errorMessage9 = document.getElementById("error9");


// Création des regex
const regexUserName = /^[A-Za-z0-9éèêëàâäôöûüïç' ]{2,30}$/;
const regexName = /^[A-Za-zéèêëàâäôöûüç' ]+$/;
const regexEmail = /^[A-Za-z0-9.\_\.\-]+@[a-z0-9\_\-]+\.[a-z]{2,5}$/; 
const regexPhone = /^[0-9]{10}$/;
const regexPwdStrong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;


// Création d'un écouteur d'événement pour le lastname
userNameText.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    userNameText.classList.remove("border-danger", "border-success");
    errorMessage1.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexUserName.test(userNameText.value)) {
        userNameText.classList.add("border-success");
        errorMessage1.classList.add("d-none");
    } else {
        userNameText.classList.add("border-danger");
        errorMessage1.classList.remove("d-none");
        errorMessage1.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour le lastname
lastNameText.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    lastNameText.classList.remove("border-danger", "border-success");
    errorMessage2.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexName.test(lastNameText.value)) {
        lastNameText.classList.add("border-success");
        errorMessage2.classList.add("d-none");
    } else {
        lastNameText.classList.add("border-danger");
        errorMessage2.classList.remove("d-none");
        errorMessage2.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour le lastname
firstNameText.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    firstNameText.classList.remove("border-danger", "border-success");
    errorMessage3.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexName.test(firstNameText.value)) {
        firstNameText.classList.add("border-success");
        errorMessage3.classList.add("d-none");
    } else {
        firstNameText.classList.add("border-danger");
        errorMessage3.classList.remove("d-none");
        errorMessage3.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour l'email (pas obligatoire d'utiliser une regex ici)
emailText.addEventListener("keyup", function () {
    emailText.classList.remove("border-danger", "border-success",);
    errorMessage4.classList.add("d-none");
    if (regexEmail.test(emailText.value)) {
        emailText.classList.add("border-success");
        errorMessage4.classList.add("d-none");
    } else {
        emailText.classList.add("border-danger");
        errorMessage4.classList.remove("d-none");
        errorMessage4.textContent = message2;
    };
});

// Création d'un écouteur d'événement pour le lastname
phoneText.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    phoneText.classList.remove("border-danger", "border-success");
    errorMessage5.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexPhone.test(phoneText.value)) {
        phoneText.classList.add("border-success");
        errorMessage5.classList.add("d-none");
    } else {
        phoneText.classList.add("border-danger");
        errorMessage5.classList.remove("d-none");
        errorMessage5.textContent = message4;
    };
});

// Création d'un écouteur d'événement pour le lastname
roleText.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    roleText.classList.remove("border-danger", "border-success");
    errorMessage6.classList.add("d-none");
    // Utilisation de regexLastname.test() pour tester la valeur 
    if (regexName.test(roleText.value)) {
        roleText.classList.add("border-success");
        errorMessage6.classList.add("d-none");
    } else {
        roleText.classList.add("border-danger");
        errorMessage6.classList.remove("d-none");
        errorMessage6.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour le mot de passe
pwdMedium.addEventListener("input", function () {
    pwdMedium.classList.remove("border-danger", "border-success",);
    errorMessage7.classList.add("d-none");
    if (regexPwdStrong.test(pwdMedium.value)) {
        pwdMedium.classList.add("border-success");
        errorMessage7.classList.add("d-none");
    } else {
        pwdMedium.classList.add("border-danger");
        errorMessage7.classList.remove("d-none");
        errorMessage7.textContent = message6;
    };
});

// Création d'un écouteur d'événement pour la confirmation du mot de passe
pwdStrong.addEventListener("input", function () {
    pwdStrong.classList.remove("border-danger", "border-success",);
    errorMessage8.classList.add("d-none");
    if (regexPwdStrong.test(pwdStrong.value)) {
        pwdStrong.classList.add("border-success");
        errorMessage8.classList.add("d-none");
    } else {
        pwdStrong.classList.add("border-danger");
        errorMessage8.classList.remove("d-none");
        errorMessage8.textContent = message6;
    };
});

// Fonction vérification des mots de passe
pwdStrong.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    pwdMedium.classList.remove("border-danger", "border-success");
    pwdStrong.classList.remove("border-danger", "border-success");
    errorMessage9.classList.add("d-none");
    errorMessage9.textContent = '';
    // Conditions
    if (pwdMedium.value == '' && pwdStrong.value == '') {
        return
    }
    if (pwdMedium.value === pwdStrong.value) {
        pwdMedium.classList.add("border-success");
        pwdStrong.classList.add("border-success");
        errorMessage9.classList.add("d-none");
    } else {
        pwdMedium.classList.add("border-danger");
        pwdStrong.classList.add("border-danger");
        errorMessage9.classList.remove("d-none");
        errorMessage9.textContent = message5;
    }
});
