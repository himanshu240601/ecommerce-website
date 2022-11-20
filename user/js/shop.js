document.body.onload = dataBySubmenu('');

var tabCont = document.getElementById("tabLinks");
var links = tabCont.getElementsByClassName("link");
for (let i = 0; i < links.length; i++) {
    links[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active-tab-link");
        current[0].className = current[0].className.replace(" active-tab-link", "");
        this.className += " active-tab-link";
    });
}

function dataBySubmenu(id) {
    let data = 'data=' + id;
    $.ajax({
        type: "POST",
        url: "get_data.php",
        data: data,
        cache: false,
        success: function (html) {
            $("#list-products").html(html).show();
        }
    });
}