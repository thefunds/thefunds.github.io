<?php
    session_start();
    if (isset($_POST["contact_button"])) {
        // $_SESSION["alert"] = "";
        // $connection = mysqli_connect("localhost", "root", "root", "tosin");
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $cell_sms = $_POST["cell_sms"];
        $email_address = $_POST["email_address"];
        $question = $_POST["question"];
        if (empty($f_name) || empty($l_name) || empty($cell_sms) || empty($email_address) || empty($question)) {
            $_SESSION["alert"] = "<div class='error'>All fields are required</div>";
        } else {
            $query = "
                INSERT INTO contact_us (f_name, l_name, cell_sms, email_address, question) 
                VALUES ('{$f_name}','{$l_name}', '{$cell_sms}', '{$email_address}', '{$question}')
            ";

            // $result = mysqli_query($connection, $query);

            // if ($result) {
                $to = "murshhood@gmail.com";
                $subject = "From Contact Us";

                $message = '
                    <html>
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        </head>
                        <body>
                            <p>First Name : '.$f_name.'</p>
                            <p>Last Name : '.$l_name.'</p>
                            <p>Cell SMS : '.$cell_sms.'</p>
                            <p>Email Address : '.$email_address.'</p>
                            <p>Question: '.$question.'</p>
                        </body>
                    </html>
                ';

                mail($to, $subject, $message);

                $_SESSION["alert"] = "<div class='pass'>Response recorded</div>";
            // } else {
            //     $_SESSION["alert"] = "An error occured, try again";
            // }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Unemployment Insurance Relief During COVID-19 Outbreak | American Rescue Plan Act.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php include("head_section.php");?>
    <main>
        <section id="contact">
            <h3>We want to hear from you</h3>
            <?php 
            if (isset($_SESSION["alert"])) {
            
                echo $_SESSION["alert"];
            } 
            ?>
            <form action="" method="post">
                <div>
                    <label for="f_name">First Name <sup>*</sup></label>
                    <input type="text" name="f_name" id="f_name">
                </div>
                <div>
                    <label for="l_name">Last Name <sup>*</sup></label>
                    <input type="text" name="l_name" id="l_name">
                </div>
                <div>
                    <label for="email_address">Email Address <sup>*</sup></label>
                    <input type="email" name="email_address" id="email_address">
                </div>
                <div>
                    <label for="cell_sms">Cell for SMS <sup>*</sup></label>
                    <input type="number" name="cell_sms" id="cell_sms">
                </div>
                <div>
                    <label for="question">Your questions/comments <sup>*</sup></label>
                    <textarea name="question" id="question" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <button name="contact_button" id="contact_button">SUBMIT</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <h2>&copy; 2021, American Rescue Plan Act.</h2>
        <div>
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
        </div>
    </footer>
    <script>
        setTimeout(() => {
            
        document.querySelector('.error').style.display = 'none';
        // document.querySelector('.pass').style.display = 'none';
        }, 10000);

    
    </script>
</body>
</html>