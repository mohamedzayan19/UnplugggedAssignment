$("document").ready(function () {

    $("#allTickets").hide();
    $("#myTickets").show();

    $("#myTicketsButton").on('click', function () {
        $("#allTickets").hide();
        $("#myTickets").show();
    });

    $("#allTicketsButton").on('click', function () {
        $("#allTickets").show();
        $("#myTickets").hide();
    });

    $("#notifications").on('click', function () {
        $(".label-warning.label").text("");
    });

});