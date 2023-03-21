$(document).ready(function(){
    $("#confirmDelete").dialog({
                              modal: true,
                              bgiframe: true,
                              resizable: false,
                              draggable: false,
                              title: 'Advertencia!!!',
                              autoOpen: false }); 
});

function confirmDelete(url, id) {
  $('#confirmDelete').html("Esta seguro de borrar el registro:<br>"+id);
  $('#confirmDelete').dialog('option', 'buttons', { 
    "No": function() { $(this).dialog("close"); },
    "Si": function() { window.location.href = url; }  });
  $('#confirmDelete').dialog('open');
}
