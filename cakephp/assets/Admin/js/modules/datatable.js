import $ from 'jquery'
import 'datatables.net'

$(function() {
    $('#datatable').DataTable( {
        "ajax": '/admin/prospects/json'
    } );
} );