 var modal = $('#NombreDelModal');

  $(function(){
    validarFormulario();// validar forularios con kendo
    EventoFormularioModal(modal, onSuccess)
  });

  function validarFormulario(){
    /*metodo de kendo para validar los formulario*/
    $('form').kendoValidator({
      //organiza los mensajes personalizados
       messages: {

             customRule1: "Debete tener mas de 3 caracteres",
             required: "Este campo es obligatorio",
         },
         //define reglas si necesita tener mas  de solo el campo requerido
        rules: {
          customRule1: function(input) {
              if (input.is("[name=usuario]")) {
                return input.val().length>3;
              }
              return true;
          }
        }
    });
  }

  function onSuccess(result) {
    result = JSON.parse(result)
    console.log(result);
    if(result.estado=true){
      $.msgbox(result.mensaje, { type: 'success' }, function(){
         modalBs.modal('hide');
      });
    }
  }