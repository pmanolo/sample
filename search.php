<?php
// mysql_connect("localhost", "root", "")or die ("cannot connect");
// mysql_select_db("test") or die("cannot select DB");

// $id = $_POST['firstname'];
// $last_name = $_POST['lastname'];
// $middle_name = $_POST['middle_name'];
// $query = "Select * From person where first_name = '$id'";
//     if(isset($_POST['search'])){
//     echo "Search";
//     $query = "Select * From person Where first_name = '$id'";

//     $result = mysql_query($query);
//     while($row = mysql_fetch_assoc($result)){
//     $last_name = $row['last_name'];
//     $first_name = $row['first_name'];
//     $middle_name = $row['middle_name'];
//  // echo $row['last_name'] . ', ';
//  // echo $row['first_name'] . ' ';
//  // echo $row['middle_name'] . '<br>';
// }
//     } else if(isset($_POST['add'])){
//     echo "Add";
//     $query = "Insert into person (first_name, last_name, middle_name) values ('$id', '$last_name', '$middle_name')";
//     }


// $result = mysql_query($query);
// if(!$result){
// die('Invalid query: ' . mysql_error());
// }



// echo $last_name . ", " . $first_name . " " . $middle_name;
?>
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
    $(".search").keyup(function()
    {
    var searchid = $(this).val();
    var dataString = 'search='+ searchid;
    if(searchid != '')
    {
        $.ajax({
        type: "POST",
        url: "dbsearch.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
        $('#result').html(html).show();
        }
        });
    } return false;
    });
jQuery("#result").live("click", function(e){
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e){
    var $clicked = $(e.target);
    if(!$clicked.hasClass("search")){
        jQuery("#result").fadeOut();
    }
});
$("#searchid").click(function(){
    jQuery("#result").fadeIn();
});
});
</script>
</head>
<body>
<form action='' method='POST'>
<input type='text' name='firstname' value="<?php if(isset($first_name)){ echo $first_name; }?>">
<input type='text' name='lastname' value="<?php if(isset($last_name)){echo $last_name; }?>">
<input type='text' name='middlename' value="<?php if(isset($middle_name)){echo $middle_name; }?>">
<input type='submit' name='search' value='Search'>
<input type='submit' name='add' value='Add New'>
<input type='submit' name='delete' value='Delete'>
<div id="result"></div>
</form>
</body>
</html>

<!-- $host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="canteen_db"; // Database name 
$tbl_name="staff"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername'];
$mypass=$_POST['mypass']; -->