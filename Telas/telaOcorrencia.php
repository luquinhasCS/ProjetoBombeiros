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
<body style="overflow-x: hidden !important">
    <nav class="nav navbar">
        <div class="container-fluid">
            <div class="text-center" style="width: 100%">
                <h1 class="nav-title">Bombeiros Voluntários</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_update">Alterar Ocorrência</button>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary rounded-pill" style="border:solid 1px #fff!important" id="f_excluir">Excluir Ocorrência</button>
            </div>
        </div>
    </nav>


    <div class="col-md-12 d-flex justify-content-center mt-5">
        <div class="col-md-6">
            <div class="alert alert-success alert-ocorrencia" role="alert">
                <p>Ocorrência alterada com sucesso!</p>
            </div>
        </div>
    </div>

    <div class="col-sm-12 m-3 dale">
            <input type="hidden" name="f_ocorrenciaID" id="input" value="<?= $_GET["id"]?>">

            <div class="col-sm-12 row" id="checkboxes">

                <div id="anamnese_cinematica">
                    <h1>Anamnese Cinemática</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="disturbio_comportamento">
                        <label for="disturbio_comportamento" class="form-check-label">Distúrbio Comportamento</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="encontrado_capacete">
                        <label for="encontrado_capacete" class="form-check-label">Encontrado Capacete</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="caminhando_na_cena">
                        <label for="caminhando_na_cena" class="form-check-label">Caminhando Na Cena</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="encontrado_de_cinto">
                        <label for="encontrado_de_cinto" class="form-check-label">Encontrado de Cinto</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="painel_avariado">
                        <label for="painel_avariado" class="form-check-label">Painel Avariado</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="para_brisas_avariado">
                        <label for="para_brisas_avariado" class="form-check-label">Parabrisas Avariado</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="volante_torcido">	
                        <label for="volante_torcido" class="form-check-label">Volante Torcido</label>
                    </div>

                </div>


                <div id="avaliacao_paciente_menores">
                    <h1>Avaliação Paciente Menores</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="espontanea">
                        <label for="espontanea" class="form-check-label">Espontânea</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="comando_verbal">
                        <label for="comando_verbal" class="form-check-label">Comando Verbal</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="estimulo_doloroso">
                        <label for="estimulo_doloroso" class="form-check-label">Estímulo Doloroso</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nenhuma">
                        <label for="nenhuma" class="form-check-label">Nenhuma</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="orientado">	   
                        <label for="orientado" class="form-check-label">Orientado</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="confuso">
                        <label for="confuso" class="form-check-label">Confuso</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="palavras_inapropriadas"> 
                        <label for="palavras_inapropriadas" class="form-check-label">Palavras Inapropriadas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="palavras_incompreensiveis">
                        <label for="palavras_incompreensiveis" class="form-check-label">Palavras Incompreensíveis</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nenhuma1">    
                        <label for="nenhuma1" class="form-check-label">Nenhuma1</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="obedece_comandos">
                        <label for="obedece_comandos" class="form-check-label">Obedece Comandos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="localiza_dor">
                        <label for="localiza_dor" class="form-check-label">Localiza Dor</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="movimento_retirada">
                        <label for="movimento_retirada" class="form-check-label">Movimento Retirada</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexao_anormal">
                        <label for="flexao_anormal" class="form-check-label">Flexão Anormal</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="extensao_anormal">
                        <label for="extensao_anormal" class="form-check-label">Extensao Anormal</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nenhuma2">
                        <label for="nenhuma2" class="form-check-label">Nenhuma2</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="soma_gcs">
                        <label for="soma_gcs" class="form-check-label">Soma GCS</label>
                    </div>

                </div>


                <div id="decisao_transporte">
                <h1>Decisão Transporte</h1>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="critico">
                        <label for="critico" class="form-check-label">Crítico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="instavel">
                        <label for="instavel" class="form-check-label">Instável</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="parcialmente_inavel">
                        <label for="parcialmente_inavel" class="form-check-label">Parcialmente Inável</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="estavel">	
                        <label for="estavel" class="form-check-label">Estável</label>
                    </div>

                </div>

                <div id="forma_de_conducao">
                    <h1>Forma de Condução</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="deitada">
                        <label for="deitada" class="form-check-label">Deitada</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="semi_sentada">
                        <label for="semi_sentada" class="form-check-label">Semi Sentada</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sentada">   
                        <label for="sentada" class="form-check-label">Sentada</label>
                    </div>
                    
                </div>


                <div id="problemas_encontrados">

                    <h1>Problemas Encontrados</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="psiquiatrico">	
                        <label for="psiquiatrico" class="form-check-label">Psiquiátrico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="respiratorio_dpoc">
                        <label for="respiratorio_dpoc" class="form-check-label">Respiratório DPOC</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="respiratorio_inalacao_fumaca">	
                        <label for="respiratorio_inalacao_fumaca" class="form-check-label">Respiratório Inalação Fumaça</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="diabetes_hiperglicemia">
                        <label for="diabetes_hiperglicemia" class="form-check-label">Diabetes Hiperglicemia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="diabetes_hipoglicemia">
                        <label for="diabetes_hipoglicemia" class="form-check-label">Diabetes Hipoglicemia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="obstetrico_parto_emergencial">	
                        <label for="obstetrico_parto_emergencial" class="form-check-label">Obstétrico Parto Emergencial</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="obstetrico_gestante">	
                        <label for="obstetrico_gestante" class="form-check-label">Obstétrico Gestante</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="obstetrico_hemor_excessiva">
                        <label for="obstetrico_hemor_excessiva" class="form-check-label">Obstétrico Hemor Excessiva</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="transporte_aereo">	
                        <label for="transporte_aereo" class="form-check-label">Transporte Aéreo</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="transporte_clinico">	
                        <label for="transporte_clinico" class="form-check-label">Transporte Clínico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="transporte_emergencial">	
                        <label for="transporte_emergencial" class="form-check-label">Transporte Emergencial</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="transporte_pos_trauma">
                        <label for="transporte_pos_trauma" class="form-check-label">Transporte Pós Trauma</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="transporte_samu">
                        <label for="transporte_samu" class="form-check-label">Transporte Samu</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="transporte_sem_remocao">
                        <label for="transporte_sem_remocao" class="form-check-label">Transporte Sem Remoção</label>
                    </div>

                </div>


                <div id="sinais_e_sintomas">
                    <h1>Sinais E Sintomas</h1>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="abdomen_sensivel_ou_rigido">
                        <label for="abdomen_sensivel_ou_rigido" class="form-check-label">Abdomên Sensível ou Rígido</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="afundamento_de_cranio">
                        <label for="afundamento_de_cranio" class="form-check-label">Afundamento de Crânio</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agitacao">
                        <label for="agitacao" class="form-check-label">Agitação</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="amnesia">
                        <label for="amnesia" class="form-check-label">Amnésia</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="angina_de_peito">
                        <label for="angina_de_peito" class="form-check-label">Angina de Peito</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="apineia">
                        <label for="apineia" class="form-check-label">Apinéia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bradicardia">
                        <label for="bradicardia" class="form-check-label">Bradicardia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bronco_aspirando">
                        <label for="bronco_aspirando" class="form-check-label">Bronco Aspirando</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cefaleia">
                        <label for="cefaleia" class="form-check-label">Cefaléia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cianose_labios">
                        <label for="cianose_labios" class="form-check-label">Cianose Lábios</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cianose_extremidade">
                        <label for="cianose_extremidade" class="form-check-label">Cianose Extremidade</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="convulsao">
                        <label for="convulsao" class="form-check-label">Convulsão</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="decorticacao">
                        <label for="decorticacao" class="form-check-label">Decorticação</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="deformidade">
                        <label for="deformidade" class="form-check-label">Deformidade</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="descerebracao">
                        <label for="descerebracao" class="form-check-label">Descerebração</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="desmaio">
                        <label for="desmaio" class="form-check-label">Desmaio</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="desvio_de_traqueia">
                        <label for="desvio_de_traqueia" class="form-check-label">Desvio de Traqueia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dispneia">
                        <label for="dispneia" class="form-check-label">Dispneia</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="dor_local">
                        <label for="dor_local" class="form-check-label">Dor Local</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="edema_generalizado">
                        <label for="edema_generalizado" class="form-check-label">Edema Generalizado</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="edema_localizado">
                        <label for="edema_localizado" class="form-check-label">Edema Localizado</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="enfisema_subcutaneo">
                        <label for="enfisema_subcutaneo" class="form-check-label">Enfisema Subcutâneo</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="estase_de_jugular">
                        <label for="estase_de_jugular" class="form-check-label">Êstase de Jugular</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="face_palida">
                        <label for="face_palida" class="form-check-label">Face Pálida</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hemorragia_interna">
                        <label for="hemorragia_interna" class="form-check-label">Hemorragia Interna</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hemorragia_externa">
                        <label for="hemorragia_externa" class="form-check-label">Hemorragia Externa</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hipertensao">
                        <label for="hipertensao" class="form-check-label">Hipertensao</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hipotensao">
                        <label for="hipotensao" class="form-check-label">Hipotensão</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="nauseas_e_vomitos">
                        <label for="nauseas_e_vomitos" class="form-check-label">Náuseas E Vômitos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="nasoragia">
                        <label for="nasoragia" class="form-check-label">Nasoragia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="obito">
                        <label for="obito" class="form-check-label">Óbito</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otorreia">   
                        <label for="otorreia" class="form-check-label">Otorréia</label>
                    </div>

                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" id="ovace">
                        <label for="ovace" class="form-check-label">Ovace</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="parada_cardiaca">
                        <label for="parada_cardiaca" class="form-check-label">Parada Cardíaca</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="parada_respiratoria">
                        <label for="parada_respiratoria" class="form-check-label">Parada Respiratória</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="priaprismo">
                        <label for="priaprismo" class="form-check-label">Priaprismo</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="prurido_na_pele">
                        <label for="prurido_na_pele" class="form-check-label">Prurido Na Pele</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pupilas_anisocoria">
                        <label for="pupilas_anisocoria" class="form-check-label">Pupilas Anisocoria</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pupilas_isocoria">
                        <label for="pupilas_isocoria" class="form-check-label">Pupilas Isocoria</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pupilas_midriase">
                        <label for="pupilas_midriase" class="form-check-label">Pupilas Midríase</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pupilas_miose">
                        <label for="pupilas_miose" class="form-check-label">Pupilas Miose</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pupilas_reagente">
                        <label for="pupilas_reagente" class="form-check-label">Pupilas Reagente</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pupilas_nao_reagente">
                        <label for="pupilas_nao_reagente" class="form-check-label">Pupilas Não Reagente</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sede">
                        <label for="sede" class="form-check-label">Sede</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sinal_de_battle">
                        <label for="sinal_de_battle" class="form-check-label">Sinal de Battle</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sinal_de_guaxinim">
                        <label for="sinal_de_guaxinim" class="form-check-label">Sinal de Guaxinim</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sudorese">
                        <label for="sudorese" class="form-check-label">Sudorese</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="taquipneia">
                        <label for="taquipneia" class="form-check-label">Taquipneia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="taquicardia">
                        <label for="taquicardia" class="form-check-label">Taquicardia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tontura">
                        <label for="tontura" class="form-check-label">Tontura</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bradipneia">
                        <label for="bradipneia" class="form-check-label">Bradipneia</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bradpneia">
                        <label for="bradpneia" class="form-check-label">Bradpneia</label>
                    </div>

                </div>


                <div id="tipo_de_ocorrencia">
                    <h1>Tipo de Ocorrência</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="causado_por_animais">	
                        <label for="causado_por_animais" class="form-check-label">Causado Por Animais</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="com_meio_de_transporte">	
                        <label for="com_meio_de_transporte" class="form-check-label">Com Meio de Transporte</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="desmoronamentodeslizamento">	
                        <label for="desmoronamentodeslizamento" class="form-check-label">Desmoronamento/Deslizamento</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="emergencia_medica">	
                        <label for="emergencia_medica" class="form-check-label">Emergência Médica</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="queda_de_altura_2m">	
                        <label for="queda_de_altura_2m" class="form-check-label">Queda de Altura 2m</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tentativa_de_suicidio">	
                        <label for="tentativa_de_suicidio" class="form-check-label">Tentativa de Suicídio</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="queda_propria_altura">	
                        <label for="queda_propria_altura" class="form-check-label">Queda Própria Altura</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="afogamento">	
                        <label for="afogamento" class="form-check-label">Afogamento</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agressao">	
                        <label for="agressao" class="form-check-label">Agressão</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="atropelamento">	
                        <label for="atropelamento" class="form-check-label">Atropelamento</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="choque_eletrico">	
                        <label for="choque_eletrico" class="form-check-label">Choque Elétrico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="desabamento">	
                        <label for="desabamento" class="form-check-label">Desabamento</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="domestico">	
                        <label for="domestico" class="form-check-label">Doméstico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="esportivo">	
                        <label for="esportivo" class="form-check-label">Esportivo</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="intoxicacao">	
                        <label for="intoxicacao" class="form-check-label">Intoxicação</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="queda_bicicleta">	
                        <label for="queda_bicicleta" class="form-check-label">Queda Bicicleta</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="queda_moto">	
                        <label for="queda_moto" class="form-check-label">Queda Moto</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="queda_nivel_2m">	
                        <label for="queda_nivel_2m" class="form-check-label">Queda Nível 2m</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="trabalho">	
                        <label for="trabalho" class="form-check-label">Trabalho</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="transferencia">	    
                        <label for="transferencia" class="form-check-label">Transferência</label>
                    </div>

                </div>


                <div id="vitima_era">
                    
                    <h1>Vitima Era</h1>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ciclista">
                        <label for="ciclista" class="form-check-label">Ciclista</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="condutor_moto">
                        <label for="condutor_moto" class="form-check-label">Condutor Moto</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="passageiro_moto">
                        <label for="passageiro_moto" class="form-check-label">Passageiro Moto</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gestante">
                        <label for="gestante" class="form-check-label">Gestante</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="condutor_carro">
                        <label for="condutor_carro" class="form-check-label">Condutor Carro</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="passageiro_carro">
                        <label for="passageiro_carro" class="form-check-label">Passageiro Carro</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="passageiro_banco_tras">
                        <label for="passageiro_banco_tras" class="form-check-label">Passageiro Banco Trás</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="clinico">
                        <label for="clinico" class="form-check-label">Clínico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="trauma">
                        <label for="trauma" class="form-check-label">Trauma</label>
                    </div>

                </div>

            </div>
            </div>
</body>

<script>
    $(function(){
        $(".alert").hide()
        var alert = $(".alert")
        var ocorrenciaId = $("#input").val() 
        $.ajax({
        type: "POST",
        url: "../php/getOcorrencia.php",
        data: {id: ocorrenciaId},
        success: function(response){
            var lista = JSON.parse(response)
            for (const key in lista) {
                if (Object.hasOwnProperty.call(lista, key)) {
                    const tables = lista[key][0];
                    if (tables != undefined){

                        for (const prop in tables) {
                        if (Object.hasOwnProperty.call(tables, prop)) {
                            // prop = coluna
                            if (tables[prop] == 1){
                                // seta input como true
                                $("input#" + prop).attr("checked", "checked")
                            }                    
                            
                        }
                    }

                    }
                }

            }
        }
    });

    $("#f_update").on("click", function(e){
        $(alert).show()
        setTimeout(function(){$(alert).hide(); window.location.href = "telaADM.php"}, 1250)

    })

        $("#f_excluir").on("click", function(e){
            e.preventDefault()
            $.ajax({
                type: "POST",
                url: "../php/deleteOcorrencia.php",
                data: {id: ocorrenciaId},
                success: function(response){
                    console.log(response)
                    window.location.href = "telaADM.php"
                },
                error: function(response){
                    console.error(response)
                }
            });
        })
    })
</script>

</html>