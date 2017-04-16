/**
 * Created by Kebab on 2017.04.16..
 */
$(document).ready(function() {
    $(window).resize(function() {
        var bodyheight = $(this).height();
        $("tbody").height(bodyheight-150);


        var colCount = 0;
        $('tr:nth-child(1) td').each(function () {
            if ($(this).attr('colspan')) {
                colCount += +$(this).attr('colspan');
            } else {
                colCount++;
            }
        });
        var tablewidth = $("table").width() / (colCount+1);
        $("tbody td, thead th").width(tablewidth);
    }).resize();
});