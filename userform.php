<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>User Form</title>
</head>
<body>




    <?php
    // importing a function causes the script to stop and i don't know why 
    // $connection = "";
    // include(__DIR__ . '/includes/formhandler.php');
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
            return $connection;
        };
        
    }
        $connection = connectDb();
    try {
        if( isset($_GET['email'])) {
        $email = $_GET['email']; 
        $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            $returnedfirst = $row["firstname"];
            $returnedlast = $row["lastname"];
            $returnedemail = $row["email"];
            $returnedcity = $row["city"];
            $returnedcountry = $row["country"];
    } else {
        header("Location: ./index.php?error=No Email provided");
    };
    } catch (Exception $error) {
        header("Location: ./index.php?error=$connection->error");
    };
      ?>
      
      <main id="main">
        <div id="form">
            <div class="row">
                <label for="firstname">First Name</label>
                <text><?php echo $returnedfirst ?></text>
            </div>
            <div class="row">
                <label for="lastname">Last Name</label>
                <text><?php echo $returnedlast ?></text>
            </div>
            <div class="row">
                <label for="email">Email</label>
                <text><?php echo $returnedemail ?></text>
            </div>
            <div class="row">
                <label for="city">City</label>
                <text><?php echo $returnedcity ?></text>
            </div>
            <div class="row">
                <label for="firstname">Country</label>
                <text><?php echo $returnedcountry ?></text>
            </div>
            <button  onClick="window.location.href='index.php'">Return</button>
            <div class="row-column">
                <iframe id="display-iframe" src="display.html"></iframe>
                <iframe id="calc-iframe" src="calculator.html"></iframe>
            </div>
        </div>
      </main>
      <script>
        const display = document.getElementById("display-iframe");
        window.addEventListener('message', function(event) {
        console.log("Message received from the child: " + event.data); // Message received from child
        display.contentWindow.postMessage(event.data, "*");
        });
        </script>
</body>
</html>