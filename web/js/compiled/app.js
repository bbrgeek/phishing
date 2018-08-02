$(document).ready(function () {

    $('.add-participe').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).data('participe-url'),
            type: "POST",
            dataType: "jsonp",
            data: {

            },
            async: true,
            success: function (data) {

            }
        });
    });
});