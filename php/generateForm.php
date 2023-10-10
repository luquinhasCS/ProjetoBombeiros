<?php 
require '../php/Db.php';

$db = new db();

$clickedButtonId = $_GET['buttonId'];

$form_structure = $db->select(
    $table = "form_structure",
    $select = "*",
    $condition = "form_structure.parent_id = '$clickedButtonId'"
);

if ($form_structure) {
    foreach ($form_structure as $row) {
        $inputId = $row['id'];
        $label = $row["label"];
        switch ($row["data_type"]) {
            case 1:
                echo(
                    '<div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="f_checkbox'. $inputId .'">
                        <label class="form-check-label" for="f_checkbox'. $inputId .'">
                        '. $label .'
                        </label>
                    </div>'
                );
                break;
            case 2:
                //table data php process
                // echo table input HTML
                break;
            case 3:
                echo(
                    '<div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="f_checkbox'. $inputId .'">
                        <label class="form-check-label" for="f_checkbox'. $inputId .'">
                        Outros: 
                        </label>
                        <input class="form-control" type="text" value="">
                    </div>'
                );
                break;
            case 4:
                // especial modal
                break;
        }
    }
}
?>