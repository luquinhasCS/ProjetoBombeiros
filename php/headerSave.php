<?php
require "Db.php";
$db = new db();

$ocorrenciaId = $_POST['f_ocorrenciaID'];

$ocorrenciaResp = $db->select(
    $table = 'cabecalho',
    $select = "*",
    $condition = "cabecalho.ocorrencia_id = $ocorrenciaId"
);

$sexo = $_POST['f_sexo'];
$nome_do_hospital = $_POST['f_nome_do_hospital'];
$nome = $_POST['f_nome'];
$idade = $_POST['f_idade'];
$rg_cpf_paciente = $_POST['f_rg_cpf_paciente'];
$acompanhante = $_POST['f_acompanhante'];
$idade_acompanhante = $_POST['f_idade_acompanhante'];
$fone = $_POST['f_fone'];
$local_da_ocorrencia = $_POST['f_local_da_ocorrencia'];
$n_usb = $_POST['f_n_usb'];
$cod_ir = $_POST['f_cod_ir'];
$cod_ps = $_POST['f_cod_ps'];
$n_ocorrencia = $_POST['f_n_ocorrencia'];
$despachante = $_POST['f_despachante'];
$h_ch = $_POST['f_h_ch'];
$km_final = $_POST['f_km_final'];
$cod_sia_sus = $_POST['f_cod_sia_sus'];

$insertData = array(
    'ocorrencia_id' => $ocorrenciaId,
    'data' => date('Y-m-d'),
    'sexo' => $sexo,
    'nome_do_hospital' => $nome_do_hospital,
    'idade' => $idade,
    'nome' => $nome,
    'rg_cpf_paciente' => $rg_cpf_paciente,
    'acompanhante' => $acompanhante,
    'idade_acompanhante' => $idade_acompanhante,
    'fone' => $fone,
    'local_da_ocorrencia' => $local_da_ocorrencia,
    'n_usb' => $n_usb,
    'cod_ir' => $cod_ir,
    'cod_ps' => $cod_ps,
    'n_ocorrencia' => $n_ocorrencia,
    'despachante' => $despachante,
    'h_ch' => $h_ch,
    'km_final' => $km_final,
    'cod_sia_sus' => $cod_sia_sus
);

if (!$ocorrenciaResp) {
    if ($db->insert('cabecalho', $insertData)) {
        echo "A ocorrência registrado com sucesso!";
    } else {
        echo "Ocorreu um erro no registro da ocorrência.";
    }
} else {
    if ($db->update('cabecalho', $insertData, "cabecalho.ocorrencia_id = $ocorrenciaId")){
        echo "A ocorrência alterada com sucesso!";
    } else {
        echo "Ocorreu um erro na alteração da ocorrência.";
    }
}

$db->close();
?>