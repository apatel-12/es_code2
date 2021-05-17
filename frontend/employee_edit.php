<!DOCTYPE html>
<html>
<head>
<title>Employee Details</title>
<link rel="stylesheet" href="css/app.css">
</head>

<body>
<?php session_start();

$obj_type='editemployee';
$profile_message="Your Profile";
if(isset($_GET['t']) && $_GET['t']=='add' && isset($_SESSION['user_id']))
{
    $obj_type='addemployee';
    $profile_message="For new users, username and password are random and same.";

}else if(isset($_REQUEST['id']) && $_REQUEST['id']!='' && isset($_SESSION['user_id']))
{
    $user_id=$_REQUEST['id'];    

}else if(isset($_SESSION['user_id']) && $_SESSION['user_id']!='')
{
    $user_id=$_SESSION['user_id'];
}else
{
    header("Location:login.html");exit;
}

//$userAgent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:88.0) Gecko/20100101 Firefox/88.0";

$URL="http://localhost:90/es_code2/emp_api.php?obj=employee&id=".$user_id; // Get employee profile
$curl=curl_init($URL); 
curl_setopt_array($curl, array(
  CURLOPT_URL => $URL,
  //CURLOPT_HEADER => true,
  CURLOPT_RETURNTRANSFER => true, 
 // CURLOPT_USERAGENT => $userAgent,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
	"content-type: application/json"
  ),
));   

$response = curl_exec($curl);  
//$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);  

$emp_fields=json_decode($response,true);

$print_msg="";

if(isset($_GET['m']) && $_GET['m']=='updated')
    $print_msg="Employee Profile Updated!";
elseif(isset($_GET['m']) && $_GET['m']=='error')
    $print_msg="There is something wrong, please contact site admin!";   
    
 if($print_msg!='') {  ?>
    <div id="status_msg"><?php print $print_msg;?></div>
<?php } // status message display

// admin login can view Employee List
if($_SESSION['user_id']==2)
{?> <a href="employee_list.php">Employee List</a> | <?php } ?> <a href="logout.php">Logout</a>

<div class="instructions">
   <?php echo $profile_message?>: (* marked fields are required)
</div>
<form id="employee_record" action="../emp_api.php" method="POST">
    <div>
        <label for="first_name">First Name*</label>
        <input id="first_name" required type="text" name="first_name" value="<?php echo $emp_fields['first_name'];?>">
    </div>
    <div>
        <label for="last_name">Last name*</label>
        <input id="last_name" required type="text" name="last_name" value="<?php echo $emp_fields['last_name'];?>">      
    </div>      
    <div>
        <label for="phone">Phone Number</label>
        <input id="phone_number" required maxlength="10" type="text" name="phone_number" value="<?php echo $emp_fields['phone_number'];?>">
    </div>
    <div>
        <label for="office_number">Office Number</label>
        <input id="office_number" type="text" maxlength="5" name="office_number" value="<?php echo $emp_fields['office_number'];?>">
    </div>
    
    <div>
        <label for="date_birth">Date Of Birth*</label>
        <input id="date_birth" required type="date" name="date_birth" maxlength="10" value="<?php if(isset($emp_fields['date_birth'])) {echo $emp_fields['date_birth'];} else { print "2000-01-01";}?>" min="1980-01-01" max="2010-12-31">
    </div>
    <div>
        <label for="employee_category">Category*</label>
       <select id="employee_category" name="employee_category">
            <option value="FullTime" <?php if($emp_fields['employee_category'] == "FullTime") { print "selected";} ?> >Full Time</option>
            <option value="PartTime" <?php if($emp_fields['employee_category'] == "PartTime") { print "selected";} ?> >Part Time</option>
            <option value="Intern" <?php if($emp_fields['employee_category'] == "Intern") { print "selected";}?>>Intern</option>
            <option value="Contract" <?php if($emp_fields['employee_category'] == "Contract") { print "selected";}?>>Contract</option>
       </select>
    </div>
    <div>
        <input type="Submit" value="Save">
        <input id="id" type="hidden" name="id" value="<?php echo $user_id?>">
        <input id="obj" type="hidden" name="obj" value="<?php echo $obj_type?>">
    </div>

</form>

</body>

</html>
