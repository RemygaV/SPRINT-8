<?php
require_once "bootstrap.php";

if (isset($_GET['delete'])) {
    $project = $entityManager->find('models\Project', $_GET['delete']);
    $entityManager->remove($project);
    $entityManager->flush();
    header('Location: projects.php?del_success=deleted successfully');
}

if (isset($_POST['createProjectName'])) {
    if (!empty($_POST['createProjectName'])) {
        $project = new models\Project();
        $project->setName($_POST['createProjectName']);
        try {
        $entityManager->persist($project);
        $entityManager->flush();
        header('Location: projects.php?success=successfully');
    } catch (Exception $e) {
        header("Location: projects.php?err_project_dublicated=duplicate_project");
    }
    } else {
        header('Location: projects.php?errProject=field is empty');
    }}

if (isset($_POST['ProjectUpdateName'])) {
    if (!empty($_POST['ProjectUpdateName'])) {
        $user = $entityManager->find('models\Project', $_POST['ProjectUpdateId']);
        try {
        $user->setName($_POST['ProjectUpdateName']);
        $entityManager->flush();
        header('Location: projects.php?updated_success=successfully updated');
    } catch (Exception $e) {
        header("Location: projects.php?err_project_dublicated=duplicate_project");
    }
    } else {
        header('Location: projects.php?errProject=field is empty');
    }}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
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

    <h2>Please add a new project:</h2>
    <form action="" method="POST">
        <label>Project name:</label>
        <input type="text" name="createProjectName" placeholder="Project name">
        <button class="btn_submit" type="submit">Add</button>
    </form>

    <table class="myTable">
        <tr class="topTable">
            <th>Id</th>
            <th>Project name</th>
            <th>Employees</th>
            <th>&#10006</th>
            <th>&#9998</th>
        </tr>

        <?php

        foreach ($result_Projects as $project) {
            $employeesNames = [];
            foreach ($project->getEmployees() as $employee) {
                $employeesNames[] = $employee->getName();
            }
        ?>
            <tr>
                <td><?= $project->getId() ?></td>
                <td><?= $project->getName() ?></td>
                <td> <?= implode(", ", $employeesNames) ?></td>
                <td><a class="a_delete" href="?delete=<?= $project->getId() ?>">Delete</a></td>
                <td><a class="a_update" href="?updatable=<?= $project->getId() ?>">Update</a></td>
            </tr>
        <?php

        }
        ?>
    </table>

    <?php

    if ((isset($_GET['updatable'])) and ($_GET['updatable']) !== "") {

        $project = $entityManager->find('models\Project', $_GET['updatable']);

    ?>
        <h2>Edit this project:</h2>
        <form action="" method="post">
            <label>Project id:</label>
            <input type="text" name="ProjectUpdateId" value="<?= $project->getId() ?>" readonly>
            <label>Project name:</label>
            <input type="text" name="ProjectUpdateName" value="<?= $project->getName() ?>">

            <button class="btn_submit" type="submit">Update</button>
            <button class="btn_back"><a class= "txt_white" href="./projects.php">Back</a>
        </form>
    <?php
    }
    ?>

</body>

</html>