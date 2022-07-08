<?php
require_once "bootstrap.php";

if (isset($_GET['delete'])) {
    $employee = $entityManager->find('models\Employee', $_GET['delete']);
    $entityManager->remove($employee);
    $entityManager->flush();
    header('Location: index.php?del_success=deleted successfully');
}

if ((isset($_POST['employee_name'])) and (isset($_POST['project_id']))) {
    if (!empty($_POST['employee_name'])) {
        $employee = new models\Employee();
        $employee->setName($_POST['employee_name']);
        $project = $entityManager->getRepository('models\Project')->findOneById($_POST['project_id']);
        try {
            $employee->setProject($project);
            $entityManager->persist($employee);
            $entityManager->flush();
            header('Location: index.php?success=successfully');
        } catch (Exception $e) {
            header("Location: index.php?err_employee_dublicated=duplicate_employee");
        }
    } else {
        header('Location: index.php?errEmployee=field is empty');
    }
}

if ((isset($_POST['EmployeetUpdatedName'])) and (isset($_POST['EmployeeUpdatedId']))) {
    if (!empty($_POST['EmployeetUpdatedName'])) {
        $employee = $entityManager->find('models\Employee', $_POST['EmployeeUpdatedId']);
        $employee->setName($_POST['EmployeetUpdatedName']);
        $project = $entityManager->getRepository('models\Project')->findOneById($_POST['ProjectUpdatedId']);
        try {
            $employee->setProject($project);
            $entityManager->persist($employee);
            $entityManager->flush();
            header('Location: index.php?updated_success=successfully updated');
        } catch (Exception $e) {
            header("Location: index.php?err_employee_dublicated=duplicate_employee");
        }
    } else {
        header('Location: index.php?errEmployee=field is empty');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, itial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $result_Employess = $entityManager->getRepository('models\Employee')->findAll();
    $result_Projects = $entityManager->getRepository('models\Project')->findAll();
    ?>

    <header>
        <nav>
            <a class="main_part" href="./index.php">EMPLOYEES</a>
            <a class="main_part" href="./projects.php">PROJECTS</a>
        </nav>
    </header>

    <?php
    require_once "errorsAndSuccess.php";
    ?>

    <div class="AddForm">
        <h2>To add new employee:</h2>
        <form class="form_1" action="" method="POST">
            <label>Employee name:</label>
            <input type="text" name="employee_name" placeholder="Name">
            <label>Project name:</label>
            <select name="project_id">
                <option value="">None selected</option>
                <option disabled>──────────</option>
                <?php

                foreach ($result_Projects as $project) {
                ?>
                    <option value=<?= $project->getId() ?>><?= $project->projectName ?></option>

                <?php
                }
                ?>
            </select>
            <button class="btn_submit" type="submit">Add</button>
        </form>
    </div>

    <table class="myTable">
        <tr class="topTable">
            <th>Id</th>
            <th>Name</th>
            <th>Project Name</th>
            <th>&#10006</th>
            <th>&#9998</th>
        </tr>

        <?php

        foreach ($result_Employess as $employee) {
        ?>
            <tr>
                <td><?= $employee->getId() ?></td>
                <td><?= $employee->getName() ?></td>
                <td><?= $employee->getProject() ? $employee->getProject()->getName()  : ""; ?></td>
                <td><a class="a_delete" href="?delete=<?= $employee->getId() ?>">Delete</a></td>
                <td><a class="a_update" href="?updatable=<?= $employee->getId() ?>">Update</a></td>
            </tr>

        <?php
        }
        ?>
    </table>

    <?php

    if ((isset($_GET['updatable'])) and ($_GET['updatable']) !== "") {

        $employee = $entityManager->find('models\Employee', $_GET['updatable']);

    ?>

        <h2>Edit this Employee:</h2>
        <form action="" method="post">

            <label>Employee id:</label>
            <input type="text" name="EmployeeUpdatedId" value="<?= $employee->getId() ?>" readonly>

            <label>Employee name:</label>
            <input type="text" name="EmployeetUpdatedName" value="<?= $employee->getName() ?>">

            <label>Project name:</label>
            <select name="ProjectUpdatedId">
                <option value="">None selected</option>
                <option disabled>──────────</option>

                <?php
                foreach ($result_Projects as $project) {
                ?>
                    <option value=<?= $project->getId() ?>><?= $project->projectName ?></option>

                <?php
                }
                ?>
            </select>

            <button class="btn_submit" type="submit">Update</button>
            <button class="btn_back"><a class="txt_white" href="./index.php">Back</a>
        </form>


    <?php
    }
    ?>

</body>

</html>