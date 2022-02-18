<?php

    include_once "../db/db.php";

    if(array_key_exists('id_user', $_GET) && $_GET['id_user']) {
        $id_user = filter_input(INPUT_GET, "id_user", FILTER_SANITIZE_NUMBER_INT);
    
        $query = "SELECT * FROM student WHERE id = $id_user";

        $students = $connect->prepare($query);
        
        $students->execute();
        
        if($students->rowCount()) {
            while ($student = $students->fetch(PDO::FETCH_ASSOC)) {
                //var_dump('verify',$student);die;
                extract($student);
            }
        } else {
            echo "Empty!";
        }
    } else if(array_key_exists('id_user', $_POST) &&  $_POST['id_user']){
        $data = filter_input_array(INPUT_POST);      
        

        if(!empty($data['update'])){
            $query= "UPDATE student
                        SET name = :name, 
                            email = :email, 
                            phone = :phone, 
                            payment = :payment, 
                            password = :password,
                            situation = :situation, 
                            about = :about 
                      WHERE id = :id";
            $edit = $connect->prepare($query);
            $edit->execute([
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':phone' => $data['phone'],
                ':payment' => $data['payment'],
                ':password' => $data['password'],
                ':situation' => $data['situation'],
                ':about' => $data['about'],
                ':id' => $data['id_user']
            ]);
            header("Location: http://localhost/Development/crud_davos/index.php");
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,wght@1,100&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="update">
        <div id="header" class="text-center justify-center py-2">
            <h1 class="text-center">Davos College</h1>
            <a href="../index.php"><button class="btn btn-primary text-center justify-center"><i class="bi bi-arrow-return-left mx-1"></i>Return</button></a>
            <hr>
        </div>
    </header>
    <main class="update">
    <form method="POST" action="update.php">
        <div class="text-center justify-center">
            <input type="hidden" name="id_user" value="<?= $_GET['id_user']; ?>">
            <div class="control-group py-2">
                <label class="control-label">Name</label>
                <div class="controls">
                    <input id="name" name="name" type="text" value="<?php if(isset($name)) { echo $name;} ?>" placeholder="Write your name..." required>
                </div>
            </div>
            <div class="control-group py-2">
                <label class="control-label">E-mail</label>
                <div class="controls">
                    <input id="email" name="email" type="text" value="<?php if(isset($email)) { echo $email;} ?>" placeholder="Write your e-mail..." required>
                </div>
            </div>
            <div class="control-group py-2">
                <label class="control-label">Phone</label>
                <div class="controls">
                    <input id="phone" name="phone" type="text" value="<?php if(isset($phone)) { echo $phone;} ?>" placeholder="Write your phone..." required>
                </div>
            </div>
            <div class="control-group py-2">
                <label class="control-label">Payment</label>
                <div class="controls">
                    <input id="payment" name="payment" type="number" value="<?php if(isset($payment)) { echo $payment;} ?>" placeholder="Write your payment..." required>
                </div>
            </div>
            <div class="control-group py-2">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input id="password" name="password" type="password" value="<?php if(isset($password)) { echo $password;} ?>" placeholder="Write your password..." required>
                </div>
            </div>
            <div class="control-group py-2">
                <label class="control-label">Situation</label>
                <div class="controls">
                    <label class="radio">
                    <?php
                        if($situation === "Ativo"){
                            echo "<input type='radio' name='situation' value='Ativo' checked> Ativo ";
                            echo "<input type='radio' name='situation' value='Desativado'> Desativado";
                        } else {
                            echo "<input type='radio' name='situation' value='Ativo' checked> Ativo ";
                            echo "<input type='radio' name='situation' value='Desativado' checked> Desativado";
                        }
                    ?>
                </div>
            </div>
            <div class="control-group py-2">
                <label class="control-label">About</label>
                <div class="controls">
                    <textarea type="text" name="about" id="about" cols="30" rows="5" required><?= $about ?? ''; ?></textarea>
                </div>
            </div>
            <div class="button">
                <button class="my-3 btn btn-secondary" type="submit" name="update" value="update"><i class="bi bi-arrow-clockwise mx-1"></i>Update</button>
            </div>
        </div>
    </form>
    </main>
</body>
</html>