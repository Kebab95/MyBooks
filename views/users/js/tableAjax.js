/**
 * Created by Kebab on 2017.04.14..
 */
$(function () {
   $.get(getDefaultUrl()+"users/ajaxLoadTableBody", function (data) {
        $("#tableBody").html(data);


   },"html");
   
   $("#loadNewUserModel").click(function () {
       $.get(getDefaultUrl()+"users/ajaxLoadUserModel", function (data) {
           $("#newUserModel").html(data);
           $("#newUserForm").slideDown('slow');
       },"html");
   });

});
$(document).on("click", '#deleteUser', function(event) {
    var id = $(this).attr("rel");
    $.post(getDefaultUrl()+"users/ajaxDeleteUser",{id:id},function (data) {
        $("#newUserModel").html("");
        $("#tableBody").html(data);
    },'html');
});
$(document).on("submit", '#newUserForm', function(event) {
    event.preventDefault();
    var action = $(this).attr("action");
    $.post(action,$(this).serialize(),function (data) {
        $("#newUserModel").html("");
        $("#tableBody").html(data);
    },"html");
});
$(document).on("click", '#newUserModelClose', function() {
    $("#newUserForm").slideUp('slow');
    setTimeout(function () {
        $("#newUserModel").html("");
    },1000);

});
$(document).on("click", '#editUser', function() {


});