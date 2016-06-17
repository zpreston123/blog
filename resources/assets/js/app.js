$(function() {
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    $('select').material_select();

    $(".commentsLink").click(function(event) {
        event.preventDefault();

        if ($(this).parent().parent().next().hasClass("hidden")) {
            $(this).parent().parent().next().removeClass("hidden").addClass("show");
        } else {
            $(this).parent().parent().next().removeClass("show").addClass("hidden");
        }
    }); //end click handler

    $(".deleteComment").click(function(event) {
        event.preventDefault();
        var form = $(this).closest("form");

        swal({
            title: "Are you sure you want to delete this comment?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                form.submit();
            }
        });
    });

    $(".deletePost").click(function(event) {
        event.preventDefault();
        var form = $(this).closest("form");

        swal({
            title: "Are you sure you want to delete this post?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        }, function(isConfirm) {
            if (isConfirm) {
                form.submit();
            }
        });
    }); //end submit handler
}); //end ready function
