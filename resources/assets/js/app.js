$(document).ready(function () {
    $("#commentsLink").click(function (event) {
        event.preventDefault();
        $("#comments").slideToggle();
    });//end click handler

    $("#commentForm").submit(function (event) {
        event.preventDefault();
        var $form = $(this);
        $.post('comments', $form.serialize(), function (response) {

        });
    });//end submit handler
});
