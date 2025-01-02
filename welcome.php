<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beuty bliss cosmetics</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <nav class="navbar navbar-expand-lg navbar-primary bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">"Feel beautiful, Feel blissful"</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">LOG OUT</a>
            </li>
            <li class="nav-item">
            </li>
          </ul>

          <a class=" nav-link" href="create.php">ADD NEW</a><br><br><br>
          <link rel="stylesheet" href="style4.css">

        </div>
      </div>
    </nav>

    <div class="container my-4">
      <table class="table">
        <thead>
          <tr>
            <th>PRODUCT_ID</th>
            <th>PRODUCT_NAME</th>
            <th>PRICE</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
        <?php
        include "connection.php";
        $sql = "SELECT * FROM crud2";
        $result = $conn->query($sql);
        
        if(!$result) {
            die("Invalid query!");
        }

        while($row = $result->fetch_assoc()) {
            echo "
            <tr>
              <th>" . $row['product_id'] . "</th>
              <td>" . $row['product_name'] . "</td>
              <td>" . $row['price'] . "</td>
              <td>
                 <a class='btn btn-success' href='update.php?product_id=" . $row['product_id'] . "'>Edit</a>
                 <a class='btn btn-danger' href='delete.php?product_id=" . $row['product_id'] . "'>Delete</a>
              </td>
            </tr>
            ";
        }
        ?>  
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
=
