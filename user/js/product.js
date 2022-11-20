function checkRev(id) {
    for (let i = 1; i <= id; i++) {
        let element = document.getElementById(i);
        element.classList.remove("bi-star");
        element.classList.add("bi-star-fill");
        element.classList.add("checked");
    }
    document.getElementById("urating").value=id;
}
$(document).ready(function () {
    $("#link-details").click(function () {
        $("#description").hide();
        $("#reviews-by-buyers").hide();
        $("#details").fadeIn(500);
    });
    $("#link-reviews-by-buyers").click(function () {
        $("#description").hide();
        $("#details").hide();
        $("#reviews-by-buyers").fadeIn(500);
    });
    $("#link-description").click(function () {
        $("#reviews-by-buyers").hide();
        $("#details").hide();
        $("#description").fadeIn(500);
    });
})

var z = document.getElementsByClassName("card-title");
for (let i = 0; i < z.length; i++) {
    z[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("card-title-active");
        current[0].className = current[0].className.replace(" card-title-active", "");
        this.className += " card-title-active";
    });
}