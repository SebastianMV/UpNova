$(function () {

    $("#frmCalculo select,input").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function ($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();

            var cadena = $("#frmCalculo").serialize();
            var rut = $("#rut").val();

            if (rut.length < 7) {
                $('#mRut').html('RUT Incompleto');
                $('#btnSubmit').attr('disabled', true);
            } else {
                $.post(base_url+'Home/validar', cadena, function( ) {
                 
                  });
            }
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});