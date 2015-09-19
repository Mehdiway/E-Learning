$(document).ready(function() {
    $('body').on('click', '.details-reussite', function() {
        var template = $('#details-reussite').html();
        var details = $(this).data("details");
        var render = Mustache.render(template, details);

        bootbox.dialog({
            message : render,
            title : "Détails réussite",
            buttons: {
                primary: {
                    label : "Fermer",
                    className : "btn-primary"
                }
            }
        });
    });

    $('body').on('click', '.valider-reussite', function() {
        var inscriptionID = $(this).data('id');
        console.log(inscriptionID);

        bootbox.dialog({
            message : "Valider cette réussite ?",
            title : "Confirmation",
            buttons: {
                default: {
                    label : "Annuler",
                    className : "btn-default"
                },
                danger: {
                    label: "Valider",
                    className: "btn-primary",
                    callback: function() {
                        $.ajax({
                            method: "POST",
                            url: "ws/validerReussite.php",
                            data: { id : inscriptionID }
                        }).done(function(response) {
                            location.reload();
                        });
                        return false;
                    }
                }
            }
        });
    });
});