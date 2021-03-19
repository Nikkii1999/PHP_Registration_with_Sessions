<?php
    session_start();
    include_once("validate.php");
?>
<!DOCTYPE HTML>  
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Php Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="mystyle.css" />
  </head>
  <body>
    <div class="container-fluid">
      <h2 class="h"><u>Registration </h2></u>
      <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate> 
        <div class="form-group box">
          <p>
            <div class="row">
              <label  class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-6">
                <input type="file" name="image">
                <span><?php echo $uploadErr;?></span>
              </div>
            </div>
          </p>
          <div class="row">
            <label  class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="name" placeholder="Enter Name">
              <span class = "error">* <?php echo $nameErr;?></span>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="email" placeholder="Enter Email">
              <span class = "error">* <?php echo $emailErr;?></span>
            </div>
          </div>
          <div class="row">
            <label  class="col-sm-2 col-form-label">Dob</label>
            <div class="col-sm-6">
              <input type="date" class="form-control" name="dob" required>
            </div>
          </div>
          <p>
            <div class="row">
              <label  class="col-sm-2 col-form-label">Phone Number</label>
              <div class="col-sm-6">
                <input type="tel" class="form-control"name="contact" pattern="[0-9]{10}" required>
              </div>
            </div>
          </p>
          <p>
            <div class="row">
              <label  class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-6">
                <textarea name="address" class="form-control"rows="5" cols="40"></textarea>
              </div>
            </div>
          </p>
          <p>
          <div class="row">
            <label  class="col-sm-2 col-form-label">About</label>
            <div class="col-sm-6">
              <textarea name="about" class="form-control"rows="5" cols="40"></textarea>
            </div>
          </div>
          </p>
          <div class="custom-control custom-radio row">
            <label  class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-6">
              <input type="radio" class="custom-control-input" name="gender" value="female">Female
              <input type="radio"  class="custom-control-input" name="gender" value="male">Male
              <input type="radio" class="custom-control-input" name="gender" value="other">Other
              <span class = "error">* <?php echo $genderErr;?></span>
            </div>
          </div>
          <div class="custom-control custom-checkbox row">
            <label  class="col-sm-2 col-form-label">Skills</label>
            <div class="col-sm-6">
                <input type="checkbox" class="custom-control-input" name="skills[]" value="Python">
                Python
                <input type="checkbox" class="custom-control-input" name="skills[]" value="Java">
                Java
                <input type="checkbox" class="custom-control-input" name="skills[]" value="C++">
                C++
                <input type="checkbox" class="custom-control-input" name="skills[]" value="ruby">
                Ruby
                <input type="checkbox" class="custom-control-input" name="skills[]" value="Sql">
                SQL
            </div>
          </div>
          <p>
            <div class="row">
              <label  class="col-sm-2 col-form-label">Educational Qualification:</label>
              <div class="col-sm-6">
                <select class="selectpicker" name="qualification" >
                    <option>10th</option>
                    <option>10th+12th</option>
                    <option>10th+12th+Diploma</option>
                    <option>10th+12th+UG</option>
                </select>
              </div>
            </div>
          </p>
          <p>
            <div class="row">
              <label  class="col-sm-2 col-form-label">Interest Area</label>
              <div class="col-sm-6">
                <select class="selectpicker" name ="interests[]" multiple data-live-search="true">
                    <option value="Sports">Sports</option>
                    <option >Social Service</option>
                    <option >Dance</option>
                    <option >Music</option>
                </select>
              </div>
            </div>
          </p>
          <div class="row">
            <label  class="col-sm-2 col-form-label">Professional Links</label>
            <div class="col-sm-6">
                <input type="text" class="form-control"name="links"><span class = "error"><?php echo $linkErr;?></span>
            </div>
          </div>
          <button class="btn btn-primary" type="submit" name="submit" value="Submit"> Submit </button>
        </div>
      </form>
    </div>
  </body>
</html>