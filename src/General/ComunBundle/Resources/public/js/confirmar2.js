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
  $('#confirmDelete').html("Esta seguro de ASIGNAR a otro Tecnico esta solicitud:<br>"+id);
  $('#confirmDelete').dialog('option', 'buttons', { 
    "No": function() { $(this).dialog("close"); },
    "Si": function() { window.location.href = url; }  });
  $('#confirmDelete').dialog('open');
}
