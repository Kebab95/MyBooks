/**
 * Created by Kebab on 2017.04.16..
 */
$(function () {
    $.get(getDefaultUrl()+"groupview/ajaxLoadTableData/",{grpid: $("#groupSelect").val()},function (data) {
        $("#tableTBody").html(data);
    },'html');
});