$(document).ready(function() {
    $('.tc-table').DataTable( {
        "bLengthChange": false,
        columnDefs: [ {
            orderable: false,
            targets:   0
        } ],
        aoColumnDefs: [
            {
                bSortable: false,
                aTargets: [ -1,-2 ,-3,-4]
            }
        ],
        order: [[ 0, 'asc' ]],
        language: {
            search: "_INPUT_",
            searchPlaceholder: " Search records...",

        },

    } );
    $('div.dataTables_filter ').addClass('op-search-box');
    $('div.dataTables_filter label').addClass('uk-icon-search');
    $('div.dataTables_filter input').attr('placeholder', 'Search...');

} );