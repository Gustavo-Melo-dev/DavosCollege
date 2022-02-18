<?php
    include_once "db/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Davos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@1,100&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="index">
        <div id="header" class="text-center justify-center py-2">
            <h1 class="text-center">Davos College</h1>
            <a href="views/create.php"><button class="btn btn-primary text-center justify-center"><i class="bi bi-plus"></i>Create</button></a>
        </div>
        <main class="index">
            <?php

                $query = "SELECT * FROM student";

                $students = $connect->prepare($query);
                $students->execute();

                if ($students->rowCount()) {
                    while ($student = $students->fetch(PDO::FETCH_ASSOC)) {
                        extract($student);
                        echo "<hr>";
                        echo "<div class='text-center justify-center'> ID: " . $id . "</div>";
                        echo "<div class='text-center justify-center'> Name: " . $name . "</div>";
                        echo "<div class='text-center justify-center'> Situation: " . $situation . "</div>";
                        echo "<br>";
                        echo "<div class='text-center justify-center'>" . "<a class='show' href='views/show.php?id_user=$id'><button class='btn btn-secondary mx-2'><i class='bi bi-book mx-1'></i>Show</button></a>" . 
                            "<a class='edit' href='views/update.php?id_user=$id'><button class='btn btn-secondary mx-2'><i class='bi bi-pencil mx-1'></i>Edit</button></a> " . 
                            "<a class='delete' href='views/delete.php?id_user=$id'><button class='btn btn-secondary'><i class='bi bi-trash mx-1'></i>Delete</button></a>" . "</div>";
                    }
                } else {
                    echo "<div id='empty' class='text-center justify-center py-2'>" . "Empty!" . "</div>";
                }
            ?>
        </main>
    </div>
    <footer class="index"></footer>
</body>
</html>