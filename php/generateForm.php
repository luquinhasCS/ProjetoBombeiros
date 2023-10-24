<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;500;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style.css">
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
    echo('<form id="iframeFrom">');
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
                        '. $label .' 
                        </label>
                        <input class="form-control" type="text" value="" id="f_checkbox_text'. $inputId. '">
                    </div>'
                );
                break;
            case 4:
                // especial modal
                break;
        }
    }
    echo('</form>');
}
?>