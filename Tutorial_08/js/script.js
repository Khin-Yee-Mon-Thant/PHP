$(document).ready(function () {
    $('.delete-btn').on('click', function () {
        $('#delete-modal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete-id').val(data[0]);
    });
});
