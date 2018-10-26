<?php require_once 'connect.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?

$acesData = [
    "username" => "admin",
    "password" => "1111"
];
if(
    !empty($_POST['username']) &&
    $_POST['username']===$acesData['username'] &&
    !empty($_POST['password']) &&
    $_POST['password']===$acesData['password']
){
    $authorised = true;
}

/*if ($_GET['module'] === 'auth' && $_GET['action'] === 'logout'){
    session_start();
    unset($_SESSION);
}

if(!empty($_POST['user']) && !empty($_POST['password'])){
    $sql2 = "
        SELECT
            users.password
        FROM
            users
        WHERE
            users.user = '{$_POST['user']}'
    ";
    $user = $connect->query($sql2);
    if(!empty($user)){
        $_SESSION['userAuthorised'] = false;
        $dbPassword = current($user)['password'];
        if(password_verify($_POST['password'], $dbPassword)){
            $_SESSION['userAuthorised'] = true;
        }
    }
}*/


?>


<? if(!$authorised){?>
    <form method="post">
        <table align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Login"></td>
            </tr>

        </table>
    </form>
<? }?>

<? if($authorised){?>
    <a href="create.php"><button type="button">Add a book</button></a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Comment</th>
        <th>ID User</th>
        <th>Option</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT
                id_comment,
                coment,
                id_author
            FROM
                comentarii
            JOIN users ON comentarii.id_author = users.id";
    $result = $connect->query($sql);

    echo "hello";
    if($result->num_rows > 0) {
        $result->fetch_assoc();
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                                <td>".$row['id_comment']."</td>
                                <td>".$row['coment']."</td>
                                <td>".$row['id_author']."</td>
                                <td>
                                    <a href='edit.php?Id=".$row['id_comment']."'><button type='button'>Edit</button></a>
                                    <a href='remove.php?id_comment=".$row['id_comment']."'><button type='button'>Remove</button></a>
                                </td>
                            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No Data Avaliable</td></tr>";
    }
    ?>
    </tbody>
</table>

<? }?>

</body>
</html>