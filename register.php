<?php
    require_once 'dbconfig.php';
//    var_dump($_POST);
    if(isset($_POST['insert'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = intval($_POST['phone_number']);
        $email = $_POST['email'];
        $address = $_POST['address'];

        $sql = "INSERT INTO users (first_name, last_name, phone_number, email, address)
                VALUES (:first_name, :last_name, :phone_number, :email, :address);";
        $insert_query = $pdo->prepare($sql);

        $insert_query->bindParam(':first_name', $first_name,PDO::PARAM_STR);
        $insert_query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $insert_query->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $insert_query->bindParam(':email', $email, PDO::PARAM_STR);
        $insert_query->bindParam(':address', $address, PDO::PARAM_STR);
        $insert_query->execute();

        $last_inser_id = $pdo->lastInsertId();
        if($last_inser_id){
            echo "<script>alert('User Added Successfully!');</script>";
            echo "<script>window.location.href='users.php';</script>";
        }else{
            echo "<script>alert('User Not Added! some things wrong !');</script>";
            echo "<script>window.location.href='users.php';</script>";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <fieldset>
                <legend>Register</legend>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" placeholder="john" name="first_name">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" placeholder="watson" name="last_name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="abc@gmail.com" name="email">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label><br>
                    <input type="tel" id="phone" name="phone_number" placeholder="09123456789" pattern="09[0-9]{9}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label><br>
                    <textarea id="address" name="address" rows="4" cols="30" placeholder="Paul and Mary Moore reside on East Main Street in Portage, Mich."></textarea>
                </div>
            </fieldset>
<!--            <button type="submit" class="input_submit">Submit</button>-->
            <input type="submit" class="input_submit" name="insert">
        </form>
    </div>
</body>
</html>