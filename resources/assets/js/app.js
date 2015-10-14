$(function () {
    $(".commentsLink").click(function (event) {
        event.preventDefault();
        $(this).parent().parent().next().slideToggle();
    });//end click handler

    //adding a comment
    $("#commentsForm").submit(function (event) {
        event.preventDefault();
        $.post($(this).prop("action"), $(this).serialize(), function (response) {
            var comments = $(this).find(".comments");
            comments.prepend(response.html);
        });
    });//end submit handler

    $("#commentDeleteForm").submit(function (event) {
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this comment?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        }, function () {
            $.post($(this).prop("action"), {
                _token: $(this).find("input[name='_token']").val(),
                _method: 'delete'
            }, function (response) {
                swal("Deleted!", "Comment has been deleted!", "success");
                $(this).closest(".comments").html(response);
            });
        });
    });//end submit handler

    horsey(document.querySelector('#search'), {
        suggestions: "{{ $searchUsers }}"
    });
});//end ready function
