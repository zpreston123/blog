$(document).ready(function () {
    $("#commentsLink").click(function (event) {
        event.preventDefault();
        $("#comments").toggle();
    });
});
