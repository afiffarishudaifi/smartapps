/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.7.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/

var handleDashboardGritterNotification = function () {
  var nilai = document.getElementById("pemberitahuan").value;
  setTimeout(function () {
    $.gritter.add({
      title: "Pemberitahuan",
      text: nilai,
      image: "../assets/img/user/user-12.jpg",
      sticky: true,
      time: "",
      class_name: "gritter-light",
    });
  }, 1000);
};

var DashboardV2 = (function () {
  "use strict";
  return {
    //main function
    init: function () {
      handleDashboardGritterNotification();
    },
  };
})();

$(document).ready(function () {
  var nilai = document.getElementById("pemberitahuan").value;
  if (nilai != "") {
    DashboardV2.init();
  }
});
