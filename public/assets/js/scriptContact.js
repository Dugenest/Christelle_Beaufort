const userName = document.getElementById("username");
const lastName = document.getElementById("lastname");
const firstName = document.getElementById("firstname");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const performance = document.getElementById("performance");
const message = document.getElementById("message");

const message1 = "Identifiant incorrect !";
const message2 = "Caractères non pris en compte !";
const message3 = "E-mail incorrect !";

const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");
const errorMessage3 = document.getElementById("error3");
const errorMessage4 = document.getElementById("error4");
const errorMessage5 = document.getElementById("error5");
const errorMessage6 = document.getElementById("error6");
const errorMessage7 = document.getElementById("error7");

const regexUserName = /^[A-Za-z0-9éèêëàâäôöûüïç' ]{2,30}$/;
const regexName = /^[A-Za-zéèêëàâäôöûüïç' ]{2,30}$/;
const regexEmail = /^[A-Za-z0-9.\_\.\-]+@[a-z0-9\_\-]+\.[a-z]{2,5}$/;
const regexPhone = /^[0-9]{10}$/;
const regexPerformance = /^[A-Za-z0-9À-ÖØ-öø-ÿéèêëàâäôöûüïç\s\.,;\'\"!?()\[\]{}\-:]{5,50}$/;
const regexMessage = /^[A-Za-z0-9À-ÖØ-öø-ÿéèêëàâäôöûüïç\s\.,;\'\"!?()\[\]{}\-: ]{5,300}$/;


// Création d'un écouteur d'événement pour le userName
userName.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    userName.classList.remove("border-danger", "border-success");
    errorMessage1.classList.add("d-none");
    //Test de la regexName pour tester la valeur
    if (regexUserName.test(userName.value)) {
        userName.classList.add("border-success");
        errorMessage1.classList.add("d-none");
    } else {
        userName.classList.add("border-danger");
        errorMessage1.classList.remove("d-none");
        errorMessage1.textContent = message1;
    };
});

// Création d'un écouteur d'événement pour le lastname
lastName.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    lastName.classList.remove("border-danger", "border-success");
    errorMessage2.classList.add("d-none");
    //Test de la regexName pour tester la valeur
    if (regexName.test(lastName.value)) {
        lastName.classList.add("border-success");
        errorMessage2.classList.add("d-none");
    } else {
        lastName.classList.add("border-danger");
        errorMessage2.classList.remove("d-none");
        errorMessage2.textContent = message2;
    };
});

// Création d'un écouteur d'événement pour le firstName
firstName.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    firstName.classList.remove("border-danger", "border-success");
    errorMessage3.classList.add("d-none");
    //Test de la regexName pour tester la valeur
    if (regexName.test(firstName.value)) {
        firstName.classList.add("border-success");
        errorMessage3.classList.add("d-none");
    } else {
        firstName.classList.add("border-danger");
        errorMessage3.classList.remove("d-none");
        errorMessage3.textContent = message2;
    };
});

// Création d'un écouteur d'événement pour l'email
email.addEventListener("keyup", function () {
    email.classList.remove("border-danger", "border-success",);
    errorMessage4.classList.add("d-none");
    if (regexEmail.test(email.value)) {
        email.classList.add("border-success");
        errorMessage4.classList.add("d-none");
    } else {
        email.classList.add("border-danger");
        errorMessage4.classList.remove("d-none");
        errorMessage4.textContent = message3;
    };
});

// Création d'un écouteur d'événement pour le phone
phone.addEventListener("keyup", function () {
    // Supprimer les classes "border-danger" et "border-success" à chaque saisie 
    phone.classList.remove("border-danger", "border-success");
    errorMessage5.classList.add("d-none");
    //Test de la regexPhone pour tester la valeur
    if (regexPhone.test(phone.value)) {
        phone.classList.add("border-success");
        errorMessage5.classList.add("d-none");
    } else {
        phone.classList.add("border-danger");
        errorMessage5.classList.remove("d-none");
        errorMessage5.textContent = message2;
    };
});

// Création d'un écouteur d'événement pour la prestation
performance.addEventListener("keyup", function () {
    performance.classList.remove("border-danger", "border-success",);
    errorMessage6.classList.add("d-none");
    //Test de la regexPerformance pour tester la valeur
    if (regexPerformance.test(performance.value)) {
        performance.classList.add("border-success");
        errorMessage6.classList.add("d-none");
    } else {
        performance.classList.add("border-danger");
        errorMessage6.classList.remove("d-none");
        errorMessage6.textContent = message2;
    };
});

// Création d'un écouteur d'événement pour le message
message.addEventListener("keyup", function () {
    message.classList.remove("border-danger", "border-success",);
    errorMessage7.classList.add("d-none");
    //Test de la regexMessage pour tester la valeur
    if (regexMessage.test(message.value)) {
        message.classList.add("border-success");
        errorMessage7.classList.add("d-none");
    } else {
        message.classList.add("border-danger");
        errorMessage7.classList.remove("d-none");
        errorMessage7.textContent = message2;
    };
});