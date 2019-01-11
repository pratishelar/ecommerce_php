<?php
// Start the session
session_start();
?>

<?php # Script 9.6 - view_users.php #2
// This script retrieves all the records from the users table.

$page_title = 'View the Current Users';
include('includes/header.html');

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include('includes/footer.html');
	exit();
}


// Page header:
echo '<div class="container"><h1>Product Details</h1>';

require('mysqli_connect.php'); // Connect to the db.

// Make the query:
$q = "SELECT * FROM inventory where product_id = $id";
$r = @mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.



	// Table header.
	echo '<table width="90%">
	<thead>
	<tr>
		<th align="left">product name</th>
		<th align="left">product details</th>
        <th align="left">Quantity</th>
        <th align="left">Price</th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['product_name'] . '</td>
        <td align="left">' . $row['product_detail'] . '</td>
        <td align="left">' . $row['quantity'] . '</td>
        <td align="left">' . $row['price'] . '</td>
        <td align="left"> <img src= "data:image/jpg;base64,'.base64_encode($row['image']).'"> </td>
        </tr>';
        $ses = $row['product_name'];
        $pid = $row['product_id'];
        // Set session variables
        $_SESSION["product"] = $ses;
        $_SESSION["id"] = $pid;
        $_SESSION["qt"] = $row['quantity'];
        
        
	}
//setcookie("product_name", $yghvh);
	echo '</tbody></table>'; // Close the table.
    
    echo '<a href="checkout.php"><button type="button" class="btn btn-primary">Buy and proceed to checkout</button></a>';
    
    

	mysqli_free_result ($r); // Free up the resources.

} else { // If no records were returned.

	echo '<p class="error">There are currently no product</p> </div>';

}

mysqli_close($dbc); // Close the database connection.

include('includes/footer.html');
?>


