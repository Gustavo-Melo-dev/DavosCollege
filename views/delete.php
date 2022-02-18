<?php
    include_once "../db/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <?php
        $id_user = filter_input(INPUT_GET, "id_user", FILTER_SANITIZE_NUMBER_INT);

        $query = "DELETE FROM student WHERE id = $id_user";

        $students = $connect->prepare($query);
        $students->execute();

        header("Location: http://localhost/Development/crud_davos/index.php");
    ?>
</body>
</html>