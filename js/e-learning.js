$(document).ready(function() {
    $('table.dataTables').DataTable( {
        "language": {
            "lengthMenu": "Afficher _MENU_ par page",
            "zeroRecords": "Nothizefng found - sorry",
            "info": "Showing zefpage _PAGE_ of _PAGES_",
            "infoEmpty": "No rezecords available",
            "infoFiltered": "(filtezefred from _MAX_ total records)",
            "search" : "Recherche :"
        }
    } );
});