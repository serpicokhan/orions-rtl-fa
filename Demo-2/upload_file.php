
<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
// require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
// require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// // passing true in constructor enables exceptions in PHPMailer
// $mail = new PHPMailer(true);

// try {
    // // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    // $mail->isSMTP();
    // $mail->Host = 'mail.ekadprint.ir';
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->Port = 587;

    // $mail->Username = 'info@ekadprint.ir'; // YOUR gmail email
    // $mail->Password = '12345687'; // YOUR gmail password

    // // Sender and recipient settings
    // $mail->setFrom('moein.serpico@gmail.com', 'Sender Name');
    // $mail->addAddress('moein.serpico@gmail.com', 'Receiver Name');
    // $mail->addReplyTo('algorithm.ac@gmail.com', 'Sender Name'); // to set the reply to

    // // Setting the email content
    // $mail->IsHTML(true);
    // $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
    // $mail->Body = 'HTML message body. <b>Gmail</b> SMTP email body.';
    // $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    // $mail->send();
    // echo "Email message sent.";
// } catch (Exception $e) {
    // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
// }
?>
<?php
//session_start();
// if(isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['repassword']) && !empty($_POST['repassword'])){
// $firstname=$_POST['firstname'];
// $lastname=$_POST['lastname'];
// $password=$_POST['password'];
// $repassword=$_POST['repassword'];
// }else
// exit("someFildes is EMPTY!");

// if($password != $repassword)
// exit("password and repassword is not match!");

// $dbn=mysqli_connect("localhost","root","","os");
// if(!$dbn)
// exit "error:".mysqli_connect_error();

// $query="INSERT INTO dbn.registerr(firstname,lastname,password,repassword) VALUES ('$firstname','$lastname','$password','$repassword')";
// if(mysqli_query($dbn,$query)===true)
// echo ("<P style='color:green;'><b>".$firstname. $lastname."your account added succsessfully" . "</b></p>");}
// mysqli_query($dbn,$query);
// $_SESSION['firstname']=$firstname;
// $_SESSION['success']="you are loged in";

// else
// echo("<p style='color:red;'><b>ERROR</b></p>");
// mysqli_close($dbn);

if(isset($_POST['size2']) && !empty($_POST['size2']) ){
$size=$_POST['size2'];
$paper_form=$_POST['paper_form'];
$paper_type=$_POST['paper_type'];
$color_type=$_POST['color_type'];
$service_type=$_POST['service_type'];
$seri=$_POST['seri'];
$tamas=$_POST['tamas'];
$nm=$_POST['nm'];
$delivery_type=$_POST['delivery_type'];
// $msg=(isset($_POST['message_field']) && !empty($_POST['message_field']))?$_POST['message_field']:'';
// $repassword=$_POST['repassword'];
}else
exit("someFildes is EMPTY!");

// if($password != $repassword)
// exit("password and repassword is not match!");
$dbn = mysqli_connect("localhost","root","","ekad");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$date1 = date('Y-m-d H:i:s');
// $query="INSERT INTO request(id,size,paper_type,color_type,msg) VALUES (NULL,$size,$paper_type,$color_type,'{$msg}')";
$query="INSERT INTO `request`(`id`, `size`, `paper_type`, `color_type`, `paper_form`, `seri`, `service_type`, `nm`, `tamas`,`delivery_type`, `myfile`) VALUES (NULL,
  $size,$paper_type,$color_type,$paper_form,$seri,$service_type,'{$nm}','{$tamas}',$delivery_type,'')";


// if(isset($_FILES['myfile'])){
//       $errors= array();
//       $file_name = $_FILES['myfile']['name'];
//       $file_size = $_FILES['myfile']['size'];
//       $file_tmp = $_FILES['myfile']['tmp_name'];
//       $file_type = $_FILES['myfile']['type'];
//       $file_ext=strtolower(end(explode('.',$_FILES['myfile']['name'])));
//       echo echo basename($file_name) ."<br/>";
//       move_uploaded_file($file_tmp,"images/".$file_name);
//     }




if(mysqli_query($dbn,$query)===true)
echo ("your account added succsessfully" . "</b></p>");
header('Location:index.html');
// mysqli_query($dbn,$query);
?>
