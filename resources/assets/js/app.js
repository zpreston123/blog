$(document).ready(function () {
    $(".commentsLink").click(function(event) {
        event.preventDefault();
        $(this).parent().parent().next().slideToggle();
    });
});
