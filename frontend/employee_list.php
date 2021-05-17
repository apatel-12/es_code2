<?php session_start();
 // admin login 
if($_SESSION['user_id']!=2 || $_SESSION['user_id']=='')
{
   
    header("Location:employee_edit.php");exit;
}

require_once('../api/server/EmployeeApi.php');
$api = new EmployeeApi();
$data = $api->getAllEmplyee() ;

$print_msg="";
if(isset($_GET['m']) && $_GET['m']=='add')
    $print_msg="New Employee Added!";
elseif(isset($_GET['m']) && $_GET['m']=='error')
    $print_msg="There is something wrong, please contact site admin!";   
elseif(isset($_GET['m']) && $_GET['m']=='del')
    $print_msg="Employee Deleted!";  
 
?>
<!DOCTYPE html>
<html>
<head>
<title>Employee List</title>
<link rel="stylesheet" href="css/app.css">
</head>

<body>

<?php if($print_msg!='') {?>
    <div id="status_msg"><?php print $print_msg;?></div>
<?php } // status message display?>

<div id="login_msg"></div>
<div><a href="employee_edit.php?t=add">Add Employee</a> | <a href="logout.php">Logout</a></div>
<div class="instructions">
Employee List
</div>
<table width="100%" border="1" cellspacing="4" cellpadding="4">
  <tbody>
    <tr>
      <td>Firstname</td>
      <td>Last Name</td>
      <td>Username</td>
      <td>Phone</td>
      <td>Office Number</td>
      <td>Date of Birth</td>
      <td>Category</td>
      <td>Actions</td>
    </tr>
    <?php foreach($data as $key => $emp_values){
            $employee_id=$emp_values['id'];
            $delete="";
            if($employee_id!=2)
                $delete=' | <a href="../emp_api.php?obj=employeedelete&id='.$employee_id.'">Delete</a>'
        ?>
    <tr>
      <td><?php print $emp_values['first_name'];?></td>
      <td><?php print $emp_values['last_name'];?></td>
      <td><?php print $emp_values['username'];?></td>
      <td><?php print $emp_values['phone_number'];?></td>
      <td><?php print $emp_values['office_number'];?></td>
      <td><?php print $emp_values['date_birth'];?></td>
      <td><?php print $emp_values['employee_category'];?></td>
      <td><a href="employee_edit.php?id=<?php print $employee_id; ?>">Edit</a> <?php print $delete;?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>

</html>
