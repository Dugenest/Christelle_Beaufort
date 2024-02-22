const userName = document.getElementById("username");
const performance = document.getElementById("performance");
const message = document.getElementById("message");

const message1 = "Identifiant incorrect !";
const message2 = "Caractères non pris en compte !";

const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");
const errorMessage3 = document.getElementById("error3");

const regexUserName = /^[A-Za-z0-9éèêëàâäôöûüïç' ]{2,30}$/;
const regexName = /^[A-Za-zéèêëàâäôöûüç' ]+$/;
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

// Création d'un écouteur d'événement pour la prestation
performance.addEventListener("keyup", function () {
    performance.classList.remove("border-danger", "border-success",);
    errorMessage2.classList.add("d-none");
    if (regexPerformance.test(performance.value)) {
        performance.classList.add("border-success");
        errorMessage2.classList.add("d-none");
    } else {
        performance.classList.add("border-danger");
        errorMessage2.classList.remove("d-none");
        errorMessage2.textContent = message2;
    };
});

// Création d'un écouteur d'événement pour la prestation
message.addEventListener("keyup", function () {
    message.classList.remove("border-danger", "border-success",);
    errorMessage3.classList.add("d-none");
    if (regexMessage.test(message.value)) {
        message.classList.add("border-success");
        errorMessage3.classList.add("d-none");
    } else {
        message.classList.add("border-danger");
        errorMessage3.classList.remove("d-none");
        errorMessage3.textContent = message2;
    };
});

document.addEventListener('DOMContentLoaded', function () {
    const commentContainer = document.getElementById('commentContainer');
    let scrollPosition = 0;

    function scrollComments(direction) {
        const commentHeight = commentContainer.querySelector('.comment').offsetHeight;
        const maxScroll = commentContainer.scrollHeight - commentContainer.clientHeight;

        if (direction === 'up' && scrollPosition > 0) {
            scrollPosition -= commentHeight;
        } else if (direction === 'down' && scrollPosition < maxScroll) {
            scrollPosition += commentHeight;
        }

        commentContainer.scrollTop = scrollPosition;
    }

    // Handle arrow keys for scrolling
    document.addEventListener('keydown', function (event) {
        if (event.key === 'ArrowUp') {
            scrollComments('up');
        } else if (event.key === 'ArrowDown') {
            scrollComments('down');
        }
    });

    // Handle scrolling with mouse wheel
    commentContainer.addEventListener('wheel', function (event) {
        event.preventDefault();
        if (event.deltaY < 0) {
            scrollComments('up');
        } else {
            scrollComments('down');
        }
    });
});
