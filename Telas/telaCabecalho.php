<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Bombeiros</title>

    <link rel="shortcut icon" href="../imgs/logo_pequena.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;500;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
<nav class="nav navbar">
        <div class="container-fluid">
            <div class="text-center" style="width: 100%">
                <h1 class="nav-title">Bombeiros Voluntários</h1>
            </div>
        </div>
    </nav>
    <form id="form">
    <div class="col-md-12 d-flex justify-content-center mt-5">
        <div class="col-md-6">
    <div class="alert alert-success" role="alert">
        <p>Cadastro efetuado com sucesso!</p>
      </div>
    </div>
    </div>
<div class="col-sm-12 m-3">
            <input type="hidden" name="f_ocorrenciaID" id="input" value="<?= $_GET["ocorrenciaId"]?>">
            <div class="col-sm-12 row">
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-6"><input type="text" name="f_sexo" class="form-control" placeholder="SEXO"></div>
                    <div class="col-sm-6"><input type="text" name="f_nome_do_hospital" class="form-control" placeholder="NOME DO HOSPITAL"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-8"><input type="text" name="f_nome" class="form-control" placeholder="NOME"></div>
                    <div class="col-sm-4"><input type="text" name="f_idade" class="form-control" placeholder="IDADE"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-8"><input type="text" name="f_rg_cpf_paciente" class="form-control" placeholder="RG/CPF PACIENTE"></div>
                    <div class="col-sm-4"><input type="tel" name="f_fone" class="form-control" placeholder="FONE"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-8"><input type="text" name="f_acompanhante" class="form-control" placeholder="ACOMPANHANTE"></div>
                    <div class="col-sm-4"><input type="text" name="f_idade_acompanhante" class="form-control" placeholder="IDADE"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-12"><input type="text" name="f_local_da_ocorrencia" class="form-control" placeholder="LOCAL DA OCORRÊNCIA"></div>
                </div>
            </div>

            <div class="col-sm-12 row mb-3">
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-9"><input type="text" name="f_n_usb" class="form-control" placeholder="N° USB"></div>
                    <div class="col-sm-3 form-check"><label for="codir" class="form-check-label">CÓD. IR</label><input name="f_cod_ir" type="checkbox" class="form-check-input" id="codir" name="codir" value="1"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-9"><input type="text" name="f_n_ocorrencia" class="form-control" placeholder="N° OCORR"></div>
                    <div class="col-sm-3 form-check"><label for="codps" class="form-check-label">CÓD. PS</label><input name="f_cod_ps" type="checkbox" class="form-check-input" id="codps" name="codps" value="1"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-9"><input type="text" name="f_despachante" class="form-control" placeholder="DESP"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-9"><input type="text" name="f_h_ch" class="form-control" placeholder="H. CH"></div>
                </div>
                <div class="col-sm-12 row mb-3">
                    <div class="col-sm-9"><input type="text" name="f_km_final" class="form-control" placeholder="KM. FINAL"></div>
                    <div class="col-sm-3"><input type="text" name="f_cod_sia_sus" class="form-control" placeholder="CÓD SIA/SUS"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_finalizar">Finalizar ocorrência</button>
            </div>
        </form>
</body>

<script>
    $(function(){
        $(".alert").hide()

        $("#form").submit(function(e){
            e.preventDefault();
            var dados = $(this).serialize();
            $.ajax({
            type: "POST",
            url: "../php/headerSave.php",
            data: dados,
            dataType: 'json',
            success: function(response){
                console.log(`Response: ${response}`)
            }
        });
        $(alert).show()
        setTimeout(function(){$(alert).hide()}, 1500)
        setTimeout(function(){window.location.href = "telaInicial.php"}, 1800)
        })


        })
</script>

</html>