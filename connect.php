<?

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dboop";

// create connection
$connect = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
    echo "Successfully Connected";
}
$result = mysqli_query($connect, 'SELECT
                                        id_comment,
                                        coment,
                                        id_author
                                    FROM
                                        comentarii
                                    JOIN users ON comentarii.id_author = users.id    
                                        ');
?>