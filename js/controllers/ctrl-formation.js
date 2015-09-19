$(document).ready(function() {
    $('body').on('click', '.details-formation', function() {
        var template = $('#details-formation').html();
        var details = $(this).data("details");
        var render = Mustache.render(template, details);

        bootbox.dialog({
            message : render,
            title : "Détails formation",
            buttons: {
                primary: {
                    label : "Fermer",
                    className : "btn-primary"
                }
            }
        });

    });


    $('body').on('click', '.supprimer-formation', function() {
        var formateurID = $(this).data('id');
        console.log("Supprimer ID = " + formateurID);

        bootbox.dialog({
            message : "Êtes-vous sûr de vouloir supprimer cette formation ?",
            title : "Confirmation",
            buttons: {
                default: {
                    label : "Annuler",
                    className : "btn-default"
                },
                danger: {
                    label: "Supprimer",
                    className: "btn-danger",
                    callback: function() {
                        $.ajax({
                            method: "POST",
                            url: "ws/supprimerFormation.php",
                            data: { id : formateurID }
                        }).done(function(response) {
                            location.reload();
                        });
                        return false;
                    }
                }
            }
        });
    });

    $('#formationForm').validate({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });
});