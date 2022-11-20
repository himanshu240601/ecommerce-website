function cart(id) {
    let data = "data=" + id;
    $.ajax({
      type: "POST",
      url: "addincart.php",
      data: data,
      cache: false,
      success: function (html) {
        location.reload();
      },
    });
  }