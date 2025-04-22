<?php
    require_once 'dbconfig.php';
    if(isset($_GET['delete'])){
        $user_id = intval($_GET['delete']);

        $sql = "DELETE FROM users WHERE id=:id";

        $delete_query = $pdo->prepare($sql);
        $delete_query->bindParam(':id', $user_id, PDO::PARAM_INT);
        $delete_query->execute();
        echo "<script>alert('User Deleted successfully!');</script>";
        echo "<script>window.location.href='users.php';</script>";
//        header("Location: users.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="users.css">
    <title>Document</title>
</head>
<body>
<div id="users">
    <h1>Users List</h1>
    <table id="users_table">
        <thead>
            <tr>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
                <th>phone number</th>
                <th>email</th>
                <th>address</th>
                <th>created at</th>
                <th>edite</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT id, first_name, last_name, phone_number, email, address, created_at FROM users";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0){
                $counter = 0;
            foreach($result as $row){
                $counter++;
        ?>
            <tr>
                <td><?php echo $counter?></td>
                <td><?php echo $row->first_name?></td>
                <td><?php echo $row->last_name?></td>
                <td><?php echo $row->phone_number?></td>
                <td><?php echo $row->email?></td>
                <td><?php echo $row->address?></td>
                <td><?php echo $row->created_at?></td>
                <td>
                    <a href="update.php?id=<?php echo $row->id ?>">
                        <button class="edit_btn">Edite</button>
                    </a>
                </td>
                <td>
                    <a href="users.php?delete=<?php echo $row->id ?>">
                        <button class="delete_btn" onclick="return confirm('are you sure ?')">Delete</button>
                    </a>
                </td>
            </tr>
        <?php }}else{
            echo "0 results";
        } ?>
        </tbody>
    </table>
</div>
<div>
    <a href="register.php?id=<?php echo $row->id ?>" class="add-user-link">
        <button id="add_user_btn" class="add_user_btn">➕ Add New User</button>
    </a>
</div>

</body>
</html>