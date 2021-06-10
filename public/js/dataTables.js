//Code from https://datatables.net/examples/api/multi_filter_select.html

$(document).ready(function() {
  $('#table').DataTable( {
      "orderCellsTop": true,
      "fixedHeader": true,
      "bStateSave": true,
      initComplete: function () {
          this.api().columns().every( function () {
              var column = this;
              var select = $('<select><option value=""></option></select>')
                  .appendTo( $(column.footer()).empty() )
                  .on( 'change', function () {
                      var val = $.fn.dataTable.util.escapeRegex(
                          $(this).val()
                      );

                      column
                          .search( val ? '^'+val+'$' : '', true, false )
                          .draw();
                  } );

              column.data().unique().sort().each( function ( d, j ) {
                  var val = $('<div/>').html(d).text();
                  if(column.search() === '^'+val+'$'){
                      select.append('<option value="' + val + '" selected="selected">' + val + '</option>')
                  } else{
                      select.append( '<option value="' + val + '">' + val + '</option>' );
                  }
              } );
          } );
      }

  } );
} );
