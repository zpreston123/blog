$(function () {
    $(".commentsLink").click(function (event) {
        event.preventDefault();
        $(this).parent().parent().next().slideToggle();
    });//end click handler

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

    $(document).pjax('a', '#pjax-container', { timeout: 8000 });
});//end ready function
