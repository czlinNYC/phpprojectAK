<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css">
    <title>User Input</title>
  </head>
  <body>
    <main id="main">
        <form id="form" action="includes/formhandler.php" method="post">
            <div class="row">
                <label for="firstname"> First Name</label>
                <input id="firstname" required type="text" name="firstname" placeholder="First Name">
            </div>
            <div class="row">
                <label for="lastname"> Last Name</label>
                <input id="lastname" required type="text" name="lastname" placeholder="Last Name">
            </div>
            <div class="row">
                <label for="email"> Email</label>
                <input id="email"    
                    required 
                    type="email" 
                    name="email" 
                    placeholder="Your email">
            </div>
            <div class="row">
                <label for="city">City</label>
                <input id="city" required type="text" name="city" placeholder="City">
            </div>
            <div class="row">
                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="America">America</option>
                    <option value="United Kingfom">United Kingdom</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="Canada">Canada</option>
                    <option value="Japan">Japan</option>
                </select>
            </div>
                <div class="row">
                     <input class="input-button" type="submit" name="submit" value="Submit">
                     <input class="input-button" type="submit" name="search" value="Search Email">
                </div>
                <?php
                $error = "";
                $status = "";
                $display = false;
                if (isset($_GET['error'])) {    
                    $error = $_GET['error'];
                    $status = "error-row";
                    $display = true; 
                } elseif (isset($_GET['notification'])) {
                    $error = $_GET['notification'];
                    $status = "notification-row";
                    $display = true;
                }
                if ($display) {
                echo "<div id=$status class=\"row\">
                <div id=\"error-message\">
                $error
                </div> 
                    <div id=\"close\">
                        X
                    </div>
                </div>";
                };
                ?>
                
        </form>
        yarr
    </main>
    <script>
       let error = document.getElementById("error-row");
       let notification = document.getElementById("notification-row");
       let close = document.getElementById("close");
        close.addEventListener("click", ()=> {
        error ? error.remove() : notification.remove(); 
        })
    </script>
       </body>
</html>
