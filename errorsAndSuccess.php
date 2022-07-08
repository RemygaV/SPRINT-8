<?php
if (!empty($_GET['errEmployee'])) {
?>
    <p class="error_txt">This employee name field can't be empty !!! </p>
<?php
}

if (!empty($_GET['errProject'])) {
?>
    <p class="error_txt">This project name field can't be empty !!! </p>
<?php
}

if (!empty($_GET['success'])) {
?>
    <p class="success_txt">Field is entered successfully! </p>
<?php
}

if (!empty($_GET['updated_success'])) {
?>
    <p class="success_txt">Field updated successfully! </p>
<?php
}

if (!empty($_GET['del_success'])) {
?>
    <p class="success_txt">Deleted successfully! </p>
<?php
}

if (!empty($_GET['err_project_dublicated'])) {
?>
    <p class="error_txt">This project already created! </p>
<?php
}

if (!empty($_GET['err_employee_dublicated'])) {
?>
    <p class="error_txt">This employee name already created! </p>
<?php
}



?>