<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-5">
        <a href="student-create.php"><button class='btn btn-primary'>Create</button></a>
       <?php
            $conn = new mysqli("localhost", "root", "", "school");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              
              $sql = "SELECT * FROM students";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                echo "<table class='table'> 
                <thead>
                  <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Age</th>
                    <th scope='col'>Date</th>
                    <th scope='col'>Actions</th>
                  </tr>
                </thead> 
                <tbody class='table-group-divider'>";
                while($row = $result->fetch_assoc()) {
                    echo " <tr>
                    <th scope='row'>{$row["studentID"]}</th>
                    <td>{$row["studentName"]}</td>
                    <td>{$row["studentAge"]}</td>
                    <td>{$row["studentDate"]}</td>
                    <td><a href='student-edit.php?id={$row['studentID']}'><button class='btn btn-secondary'>Edit</button></a>
                        <a href='student-delete.php?id={$row['studentID']}'><button class='btn btn-danger'>Delete</button></a>
                    </td>
                  </tr> ";
                }
                echo "</tbody>";
              echo "</table>"; 

              } else {
                echo "0 results";
              }
              $conn->close();
        ?>
    </div>
  </body>
</html>