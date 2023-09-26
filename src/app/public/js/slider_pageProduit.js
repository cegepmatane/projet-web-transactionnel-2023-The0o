function changeImage(sens) {
    if (document.getElementById("image1").style.display === "none") {
        document.getElementById("image1").style.display = "block"
        document.getElementById("image2").style.display = "none"
    }
    else {
        document.getElementById("image2").style.display = "block"
        document.getElementById("image1").style.display = "none"
    }
}
