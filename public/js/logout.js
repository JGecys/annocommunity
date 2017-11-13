function logout() {
    $('#logout-modal').modal('show');
}

$(document).ready(function () {
    $('#session-id').hide();
    $("#session-save").submit(function (e) {

        $.post("/save", $("#session-save").serialize(), function (data) {
            $('#session-id').text(data);
            $('#session-id').show();
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
});