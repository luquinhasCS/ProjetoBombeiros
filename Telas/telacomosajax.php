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
    });$.ajax({
        type: "POST",
        url: "../php/getUserTipo.php",
        data: {},
        success: function(response){
            const bombeiroId = response
        }
    });
    
    
    
    
    $.ajax({
        type: "POST",
        url: "../php/updateBombeiro.php",
        data: {bombeiroId: variavelComOId},
        success: function(response){
            console.log(response)
        }
    }); $.ajax({
        type: "POST",
        url: "../php/deleteBombeiro.php",
        data: {bombeiroId: variavelComOId},
        success: function(response){
            console.log(response)
        }
    }); $.ajax({
        type: "POST",
        url: "../php/getBombeiro.php",
        data: {bombeiroId: variavelComOId},
        success: function(response){
            console.log(response)
        }
    });
</script>