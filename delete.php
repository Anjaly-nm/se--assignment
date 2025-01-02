<?php
// Include the database connection file
require_once("connection.php");

// Get id parameter value from URL
$id = $_GET['product_id'];
// Ensure the id is an integer to prevent SQL injection
$id = (int) $id;

// Prepare a DELETE statement to avoid SQL injection
$query = "DELETE FROM crud2 WHERE product_id = ?";

// Initialize prepared statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameter (i.e., the id) to the prepared statement
mysqli_stmt_bind_param($stmt, "i", $id);

// Execute the query
if (mysqli_stmt_execute($stmt)) {
    // Redirect to the main display page (index.php in our case)
    header("Location: welcome.php");
    exit(); // Always use exit() after header to ensure no further code is executed
} else {
    // Handle the error, e.g., by showing a message or logging it
    echo "Error: " . mysqli_error($conn);
}

// Close the prepared statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
?>
=======
/
