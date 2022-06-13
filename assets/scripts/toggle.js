const online = $("#online");
const offline = $("#offline");
const status_update_url =
  "http://localhost/smartgarbage/api/update?id=1&api_key=6C793695171E793D";
let status;
$("#online, #offline").on("click", toggleButton);

function toggleButton() {
  offline.toggleClass("d-none");
  online.toggleClass("d-none");

  status = $("#status").text();

  $("#status").text(status == "on" ? "off" : "on");
  fetch(status_update_url);
}

$("#reset-password-check").click(function () {
  $("#reset-password").toggleClass("d-none");
});
