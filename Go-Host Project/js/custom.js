// to get current year
function getYear() {
  var currentDate = new Date();
  var currentYear = currentDate.getFullYear();
  document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// nice select
$(document).ready(function () {
  $("select").niceSelect();
});

// date picker
$(function () {
  $("#inputDate")
    .datepicker({
      autoclose: true,
      todayHighlight: true,
    })
    .datepicker("update", new Date());
});

// owl carousel slider js
$(".team_carousel").owlCarousel({
  loop: true,
  margin: 15,
  dots: true,
  autoplay: true,
  navText: [
    '<i class="fa fa-angle-left" aria-hidden="true"></i>',
    '<i class="fa fa-angle-right" aria-hidden="true"></i>',
  ],
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
      margin: 0,
    },
    576: {
      items: 2,
    },
    992: {
      items: 3,
    },
  },
});

// for email validation
function sendEmail() {
  Email.send({
    Host: "smtp.elasticemail.com",
    Username: "willsmalta0@gmail.com",
    Password: "D38DA8621B17A9E9531586501E20DDA8B554",
    To: "willsmalta0@gmail.com",
    From: document.getElementById("email").value,
    Subject: "New Content Form Enquiry",
    Body:
      "Name: " +
      document.getElementById("name").value +
      "<br> Email: " +
      document.getElementById("email").value +
      "<br> Phone no: " +
      document.getElementById("phone").value +
      "<br> Message: " +
      document.getElementById("mesage").value,
  }).then(
    message => alert("Message Sent Successfully"));
}

// Remember to use @test when testing the newsletter
