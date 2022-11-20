function add(id) {
  id.value++;
}
function min(id) {
  if (id.value > 1) {
    id.value--;
  }
}

function rem(id) {
  let data = "data=" + id;
  $.ajax({
    type: "POST",
    url: "removefromcart.php",
    data: data,
    cache: false,
    success: function (html) {
        location.reload();
    },
  });
}
