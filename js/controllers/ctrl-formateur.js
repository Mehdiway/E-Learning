$(document).ready(function() {
    $('body').on('click', '.details-formateur', function() {
        console.log('Showing details');
        var template = $('#details-formateur').html();
        var details = $(this).data("details");
        var render = Mustache.render(template, details);

        bootbox.dialog({
            message : render,
            title : "Détails formateur",
            buttons: {
                primary: {
                    label : "Fermer",
                    className : "btn-primary"
                }
            }
        });

    });


    $('body').on('click', '.supprimer-formateur', function() {
        var formateurID = $(this).data('id');
        console.log("Supprimer ID = " + formateurID);

        bootbox.dialog({
            message : "Êtes-vous sûr de vouloir supprimer ce formateur ?",
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
                            url: "ws/supprimerFormateur.php",
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

    $('#formateurForm').validate({
        rules: {
            nom: "required",
            prenom: "required",
            tel: "required",
            adresse: "required",
            specialite: "required",
            birthday: "required",
            bio: "required",
            email: "required",
            password: "required",
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

    $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'fr-CH'
    });
});