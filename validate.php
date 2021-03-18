<?php
    $nameErr = $emailErr = $genderErr = $linksErr = $mobileErr=$uploadErr="";
    $name = $email = $gender = $links=$mobile=$dob=$address=$about=$qualification=$image="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["name"] = $name = test_input($_POST["name"]);
        $_SESSION["dob"] = $dob = test_input($_POST["dob"]);
        $_SESSION["gender"] = $gender = test_input($_POST["gender"]);
        $_SESSION["email"] = $email = test_input($_POST["email"]);
        $_SESSION["contact"] = $mobile = test_input($_POST["contact"]);
        $skills = $_POST["skills"];
        $_SESSION["address"] = $address = test_input($_POST["address"]);
        $image = test_input($_POST["image"]);
        $_SESSION["about"] = $about = test_input($_POST["about"]);
        $_SESSION["qualification"] = $qualification = test_input($_POST["qualification"]);
        $interest = $_POST["interest"];
        $_SESSION["links"] = $links = test_input($_POST["links"]);
    }

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (empty($name])) {
                $nameErr = "Name is required";
            }
            if (empty($_POST["email"])) {
             $emailErr = "Email is required";
            }
            else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                }
            }
            if (empty($gender)) {
                $genderErr = "Gender is required";
            }
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $linksErr = "Invalid URL"; 
            }
            if(!preg_match('/^[0-9]{10}$/', $_POST["mobile"])){
                $mobileErr="Invalid Format";
            }
            if(!empty($_FILES["image"]["name"]))
            {
                if($_FILES["image"]["error"] == 0)
                {
                    $allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");
                    if((in_array($_FILES["image"]["type"], $allowed_types)))
                    {
                        if($_FILES["image"]["size"] < 990000)
                        {
                            $uploaded = move_uploaded_file($_FILES["image"]["tmp_name"],"/home/nikitab/repos/php_learning/upload/" .$_FILES["image"]["name"]);
                            if($uploaded)
                            {
                                $image="File uploaded sucessfully";
                            }
                            else
                            {
                                $uploadErr="File could not be uploaded";
                            }   
                        }
                        else
                        {
                            $uploadErr="File should be less than 10KB " . $_FILES["image"]["size"];
                        }
                    }   
                    else
                    {
                        $uploadErr="Please upload JPG or PNG files";
                    }
                }
                else
                {
                    $uploadErr="There are some errors with the file";
                }
            }
            else
            {
                $uploadErr="Please browse a file to upload";
            }
        }
    }
    if (!$nameERR && !$genderErr && !$emailErr && !$linksErr && !$uploadErr && !$mobileErr) {
            $_SESSION["interest"] = implode(", ", $interests);
            $_SESSION["skills"] = implode(", ", $skills);
            $_SESSION["profile"] = $target_file;
            header('Location: success.php');
            exit();
        }
    }
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>