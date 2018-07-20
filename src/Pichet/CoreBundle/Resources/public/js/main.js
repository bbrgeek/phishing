$(document).ready(function () {

    $('.add-participe').on('click', function (e) {
        e.preventDefault();
        console.log('entré');
        $.ajax({
            url: $(this).data('participe-url'),
            type: "POST",
            dataType: "json",
            data: {

            },
            async: true,
            success: function (data) {

            }
        });
    });
});