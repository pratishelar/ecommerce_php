<?php
session_start();

$test = $_SESSION["product"];

$fetched_id = $_SESSION["id"];
$quan = $_SESSION["qt"];

?>
<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Checkout';
include('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require('mysqli_connect.php'); // Connect to the db.

	$errors = []; // Initialize an error array.

	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}

	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
    
    // Check for a payment name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to select payment method.';
	} else {
		$py = mysqli_real_escape_string($dbc, trim($_POST['payment']));
	}


	
	if (empty($errors)) { // If everything's OK.

		// Register the user in the database...

		// Make the query:
        
		$q = "INSERT INTO orders (customer_firstname, customer_lastname, payment) VALUES ('$fn', '$ln', '$py' )";
        
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r && ($quan > 0)) { // If it ran OK.
            
            $q = "update inventory set quantity = quantity -1 where product_id = $fetched_id ";
            $r = @mysqli_query($dbc, $q); // Run the query.

			// Print a message:
			echo '<div class="container"><h1>Thank you!</h1>
		<p>order placed successfully </p> </div>
        <p><br></p>';
            

		} else { // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

		} // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include('includes/footer.html');
		exit();

	} else { // Report the errors.

		echo '<div class= "container"><h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p> </div>';

	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>


<?php 
echo '<div class="container">';
echo" <h2> Product details</h2><br>
<p>product ordered is $test </p>" ?>


<h1>Checkout</h1>
<form action="checkout.php" method="post">


    <div class="form-group">
        <label for="email">First Name:</label>
       
            <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
        
    </div>

    <div class="form-group">
        <label for="name">Last Name:</label>
        <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
    </div>

    <p>select payment mode</p>
    <input type="radio" name="payment" value="cash"> cash
    <input type="radio" name="payment" value="card"> card
    <input type="radio" name="payment" value="paytm"> paytm

    <div class="form-group">
        <button type="submit" class="btn btn-default">place order</button>
    </div>
</form>


<?php include('includes/footer.html'); ?>
