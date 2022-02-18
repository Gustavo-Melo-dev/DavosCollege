<?php
    include_once "../db/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@1,100&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="show-view">
        <div class="text-center justify-center">
            <h1>Davos College</h1>
        </div>
    </header>
    
    <main class="show-view">
        <?php
            $id_user = filter_input(INPUT_GET, "id_user", FILTER_SANITIZE_NUMBER_INT);

            $query = "SELECT * FROM student WHERE id = $id_user";

            $students = $connect->prepare($query);
            $students->execute();

            if ($students->rowCount()) {
                while ($student = $students->fetch(PDO::FETCH_ASSOC)) {
                    extract($student);
                    echo "<hr>";
                    echo "<div class='text-center justify-center'> ID: " . $id . "</div>";
                    echo "<div class='text-center justify-center'> Name: " . $name . "</div>";
                    echo "<div class='text-center justify-center'> E-mail: " . $email . "</div>";
                    echo "<div class='text-center justify-center'> phone: " . $phone . "</div>";
                    echo "<div class='text-center justify-center'> Monthly Payment: " . $payment . "</div>";
                    echo "<div class='text-center justify-center'> Password: " . $password . "</div>";
                    echo "<div class='text-center justify-center'> Situation: " . $situation . "</div>";
                    echo "<div class='text-center justify-center'> About: " . $about . "</div>";
                    echo "<br>";
                }
            }
        ?>
        <div class="text-center justify-center">
            <a href="../index.php"><button class='btn btn-secondary mx-2'><i class="bi bi-arrow-return-left mx-1"></i>Return</button></a>
        </div>
    </main>
</body>
</html>