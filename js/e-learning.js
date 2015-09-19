$(document).ready(function() {
    $('a[href=#]').on('click', function(e) {
        e.preventDefault();
    });

    $('table.dataTables').DataTable( {
        "language": {
            "lengthMenu": "Afficher _MENU_ par page",
            "zeroRecords": "Aucun résultat trouvé",
            "info": "Page _PAGE_ de _PAGES_",
            "infoEmpty": "Aucun résultat",
            "infoFiltered": "(filtré à partir de _MAX_ résultats)",
            "search" : "Recherche :",
            "paginate": {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
        },
        "aaSorting": []
    } );
});