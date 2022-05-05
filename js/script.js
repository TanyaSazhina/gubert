function testWebP(callback) {
  var webP = new Image();
  webP.onload = webP.onerror = function () {
    callback(webP.height == 2);
  };
  webP.src =
    "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
}

testWebP(function (support) {
  if (support == true) {
    document.querySelector("body").classList.add("webp");
  } else {
    document.querySelector("body").classList.add("no-webp");
  }
});

$(".portfolio__filter").click(function () {
  $(".portfolio__filter").removeClass("active__filter");
  $(this).addClass("active__filter");
});

$(".open__order, .price__btn").click(function () {
  $(".order").addClass("active__order");
  $("body").addClass("locked");
});

$(".order__close, .close").click(function () {
  $(".order").removeClass("active__order");
  $("body").removeClass("locked");
});

$("#vse").click(function () {
  $(".vse").show();
});
$("#card").click(function () {
  $(".vse").hide();
  $(".card").show();
});
$("#landing").click(function () {
  $(".vse").hide();
  $(".landing").show();
});
$("#store").click(function () {
  $(".vse").hide();
  $(".store").show();
});
$("#corporate").click(function () {
  $(".vse").hide();
  $(".corporate").show();
});
function getData(obj_form) {
  // функция для получения данных из формы
  var hData = {};
  $("input", obj_form).each(function () {
    if (this.name && this.name != "") {
      hData[this.name] = this.value;
      console.log("hData: {" + this.name + "} = " + hData[this.name]);
    }
  });
  return hData;
}

function send() {
  var postData = getData(".order__form");
  $.ajax({
    dataType: "json",
    url: "telegram.php",
    method: "POST",
    async: true,
    data: postData,
    success: function (data) {
      $(".order__form-title").html("Ваша заявка отправленна");
      $(".order__form .input__container").hide();
      $(".order__btn").html("Вернуться");
      $(".order__btn").attr("href", "index.php");
    },
  });
}
