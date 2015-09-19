$(document).ready(function() {
    $('body').on('click', '.supprimer-inscription', function() {
        var inscriptionID = $(this).data('id');
        console.log(inscriptionID);

        bootbox.dialog({
            message : "Êtes-vous sûr de vouloir supprimer cette inscription ?",
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
                            url: "ws/supprimerInscription.php",
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

    $('body').on('click', '.valider-inscription', function() {
        var inscriptionID = $(this).data('id');
        console.log(inscriptionID);

        bootbox.dialog({
            message : "Valider cette inscription ?",
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
                            url: "ws/validerInscription.php",
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