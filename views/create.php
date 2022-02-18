<?php
    include_once "../db/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@1,100&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        $data = filter_input_array(INPUT_POST);

        if(!empty($data['send'])){
            extract($data);
            $query = "INSERT INTO student (name, email, phone, payment, password, situation, about) VALUES ('" . $name . "',
            '" . $email . "',
            '" . $phone . "',
            '" . $payment . "',
            '" . $password . "',
            '" . $situation . "',
            '" . $about . "'
            )";

            $student = $connect->prepare($query);
            $student->execute();

            if($student->rowCount()){
                echo "User registered successfully!";
            } else {
                echo "User not registered successfully!";
            }
        }
    ?>
    <header class="create">
        <div id="header" class="text-center justify-center py-2">
            <h1 class="text-center">Davos College</h1>
            <a href="../index.php"><button class="btn btn-primary text-center justify-center"><i class="bi bi-arrow-return-left mx-1"></i>Return</button></a>
        <hr>
    </div>
    </header>
    <main class="create">
        <form method="POST" action="create.php" class="form-horizontal">
            <div class="text-center justify-center input-xlarge">
            <fieldset>
                <div class="control-group py-2">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input id="name" name="name" type="text" placeholder="Write your name..." required>
                    </div>
                </div>
                <div class="control-group py-2">
                    <label class="control-label">E-mail</label>
                    <div class="controls">
                        <input id="email" name="email" type="text" placeholder="Write your e-mail..." required>
                    </div>
                </div>
                <div class="control-group py-2">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input id="phone" name="phone" type="text" placeholder="Write your phone..." required>
                    </div>
                </div>
                <div class="control-group py-2">
                    <label class="control-label">Payment</label>
                    <div class="controls">
                        <input id="payment" name="payment" type="number" placeholder="Write your payment..." required>
                    </div>
                </div>
                <div class="control-group py-2">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input id="password" name="password" type="password" placeholder="Write your password..." required>
                    </div>
                </div>
                <div class="control-group py-2">
                <label class="control-label">Situation</label>
                    <div class="controls">
                        <label class="radio">
                        <input type="radio" name="situation" value="Ativo">
                        Ativo
                        </label>
                        <label class="radio">
                        <input type="radio" name="situation" value="Desativado">
                        Desativado
                        </label>
                    </div>
                </div>
                <div class="control-group py-2">
                    <label class="control-label">About</label>
                    <div class="controls">
                        <textarea id="about" name="about" cols="30" rows="5" placeholder="Write about you..." required></textarea>
                    </div>
                </div>
                <div class="control-group pb-3">
                    <label class="control-label"></label>
                    <div class="controls">
                        <button type="submit" name="send" value="send" class="btn btn-secondary"><i class="bi bi-plus"></i>Create</button>
                    </div>
                </div>
            </fieldset>
            </div>
        </form>
    </main>
</body>
</html>