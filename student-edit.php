<?php

    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "school");
    $sql = "SELECT * from students where studentID=$id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $age = $_POST["age"];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE students set studentName='$name', studentAge='$age' where studentID=$id";
        $result = $conn->query($sql);

        if($result){
           header('location:student-list.php');
        } else {
            die(mysqli_error($conn));
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

                <div class='container mt-5'>
                    <form class='col-lg-8 mt-3 mx-auto' method='POST'>
                    <div class='mb-3'>
                        <label class='form-label'>Student Name</label>
                        <input type='text' class='form-control' name='name' value=<?php echo $student['studentName']; ?>>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Student Age</label>
                        <input type='text' class='form-control' name='age' value=<?php echo $student['studentAge']; ?>>
                    </div>
                    <button type='submit' class='btn btn-primary' name='submit'>Submit</button>
                    </form>
                </div> 

  </body>
</html>