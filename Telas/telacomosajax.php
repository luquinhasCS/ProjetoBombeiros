<script>
    $.ajax({
        type: "POST",
        url: "../php/getOcorrencia.php",
        data: {ocorrenciaId: id},
        success: function(response){
            console.log(`Response: ${response}`)
            // só igualar o response com uma variavel dai q na teoria é pra vir em json
        }
    });
    $.ajax({
        type: "POST",
        url: "../php/headerSave.php",
        data: dados,
        dataType: 'json',
        success: function(response){
            console.log(`Response: ${response}`)
        }
    });
</script>