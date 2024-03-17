$(document).ready(function(){
    var funcion;
    $('.select2').select2();
    function rellenar_Laboratorios(){
        funcion="rellenar_laboratorios";
        $.post('../controlador/LaboratorioController.php',{funcion},(response)=>{
            console.Log(response);
        })
    }
})

