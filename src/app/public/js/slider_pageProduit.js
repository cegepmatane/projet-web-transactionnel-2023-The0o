const images = ["image1.png", "image2.png"];
let ordreAffichage = 0;

function changeImage(sens) {
    ordreAffichage = ordreAffichage + sens;
    if (ordreAffichage > images.length - 1) {
        ordreAffichage = 0;
    } else if (ordreAffichage < 0) {
        ordreAffichage = images.length - 1;
    }
    document.getElementById("image").src = "../img/" + images[ordreAffichage];
}
