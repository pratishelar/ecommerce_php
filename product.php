<?php # Script 9.6 - view_users.php #2
// This script retrieves all the records from the users table.

$page_title = 'View the Current Users';
include('includes/header.html');
echo'<div class="container">';
// Page header:
echo '<h1>Products</h1>';

require('mysqli_connect.php'); // Connect to the db.

// Make the query:
$q = "SELECT product_id, product_name, product_detail, price, image FROM inventory";
$r = @mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
    	
        echo " <p>There are currently $num products.</p>\n";

	// Table header.
	echo '<table width="90%">
	<thead>
	<tr>
		<th align="left">image</th>
        <th align="left">product name</th>
		<th align="left">product details</th>
       
        <th align="left">Price</th>
	</tr>
	</thead>
	<tbody>
';

	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        
        
        
		echo '<tr><td align="left"> <a href="product_detail.php?id=' . $row['product_id'].' "> <img src= "data:image/jpg;base64,'.base64_encode($row['image']).'">  </td>
        <td align="left"> <a href="product_detail.php?id=' . $row['product_id'].' ">' . $row['product_name'] . '</td>
        <td align="left"> ' . $row['product_detail'] . '</td>
        <td align="left">' . $row['price'] . '</td></tr>';
	}

	echo '</tbody></table>'; // Close the table.

	mysqli_free_result ($r); // Free up the resources.

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}
echo'</div>';

mysqli_close($dbc); // Close the database connection.

include('includes/footer.html');
?>
