<?php 
$firstname = "";
$lastname = "";
$city = "";
$country = "";
$email = "";
$filepath = "";
$submit = "";
$search = "";
$emailErr ="";
$result = "";
$connection = "";
function connectDb () {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "php";
    $connection = new mysqli($server, $user, $password, $database);
    if($connection->connect_error) {
        die("Connection Failed: " . $connection->connect_error );
    }
    else {
        echo "Connected to DB";
        return $connection;
    };
    
}

$connection = connectDb();

if ($_SERVER["REQUEST_METHOD"] =="POST") {
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $city = htmlspecialchars($_POST["city"]);
    $country = htmlspecialchars($_POST["country"]);
    $email = htmlspecialchars($_POST["email"]);
    // $filepath = htmlspecialchars($_POST["filepath"]);
}
    if (empty($firstname) 
        || empty($lastname) 
        || empty($city) 
        || empty($country) 
        || empty($email)) {
        exit();
        header("Location: ../index.php?error=Some Fields Are empty");
    }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            header("Location: ../index.php?error=$emailErr");
        }
        if (isset($_POST["submit"])) {
            try {
            $submit = htmlspecialchars($_POST["submit"]);
            $sql = "INSERT INTO users (firstname, lastname, city, country, email) "  . 
            "VALUES ('$firstname', '$lastname', '$city', '$country', '$email')";
            $result = $connection->query($sql);
            header("Location: ../index.php?notification=User added");
            } catch (Exception $error) {
                header("Location: ../index.php?error=$connection->error");
            } 
        
        } elseif (isset($_POST["search"])) {
            $search = htmlspecialchars($_POST["email"]);
            header("Location: ../userform.php?email=$search");
        } else {
            header("Location: ../index.php?error= Something went wrong.");
        }; 
 


