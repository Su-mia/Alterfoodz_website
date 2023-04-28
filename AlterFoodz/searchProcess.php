<?php
// session_start();
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {

//   echo "<script>
//   alert('You have to login first, please');
//   window.location.href='login.php';
//   </script>";

// }

include("init.php");

	if(isset($_POST["findAlter"]))
	{
		$foodName = $_POST["foodName"];
		$Category = $_POST["Category"];
		$brand_name = $_POST["brand_name"];

		// prepare the mysql query statement and bind parameters
        $query = "SELECT * from Products where product_name='$foodName'";

        if($Category != "Any")
        {$query .= " AND CategoryName='$Category'";}
        if($brand_name!="Any")
        {$query .= " AND BrandName='$brand_name'";}

        $query = mysqli_query($link,$query,);
        $results = mysqli_fetch_assoc($query);
        // Define an array to hold the filter names
        $filters = array("price", "Fat", "Sugar", "Calories", "Carbohydrate", "Protein", "Fiber");

        // Loop through the filter names and create a new array with the filter values as the values
        $filter_values = array();
        foreach ($filters as $filter) {
        $filter_values[$filter] = $results[$filter];
        }
  
        // Start building the SQL query
        $sql = "SELECT * FROM Products WHERE 1=1";
        if($Category != "Any")
        {$sql .= " AND CategoryName='$Category'";}
        if($brand_name!="Any")
        {$sql .= " AND BrandName='$brand_name'";}

        // Loop through the filter options and add the corresponding SQL clauses
        foreach ($filter_values as $filter_name => $value) {
            $selected_option = $_POST[$filter_name];
            if ($selected_option != "All") {
            $sql .= " AND $filter_name ";
            if ($selected_option == "less") {
                $sql .= "<= $value";
            } else {
                $sql .= ">= $value";
            }
            }
        }
        
        // Prepare the query
        $result = mysqli_query($link, $sql);
        //$_SESSION['result'] = $result;
        // mysqli_close($link);

		
	}
	else
	{
		print "<a href='index.php'> Go to home page </a>";
        die();
	}
include("search-result.php");


?>