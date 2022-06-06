<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

    <?php

        if (isset($_POST['submit'])) {
            $name = $_POST["name"];
            $age = $_POST["age"];

            $conn = new mysqli("localhost", "root", "", "school");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql = "INSERT INTO students(studentName, studentAge) values('$name','$age')";
              $result = $conn->query($sql);

              if($result){
                header('location:student-list.php');
             } else {
                 die(mysqli_error($conn));
             }
        }

    ?>

    <div class="container mt-5">
        <form class="col-lg-8 mt-3 mx-auto" method="POST">
        <h2>Add Student</h2>
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Student Age</label>
            <input type="text" class="form-control" name="age">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
  </body>
</html>