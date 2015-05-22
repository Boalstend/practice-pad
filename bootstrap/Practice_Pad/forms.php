<?php
//regular variables seem to be passing into php now for err variables
$errName = '';
$errEmail = '';
$errMessage = '';
$errHuman = '';

    if ($_POST){
        $email = $_POST['email'];    
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $human = intval($_POST['human']);
        $from = 'Your Mom';
        $to = 'bisment420@gmail.com';
        $subject = 'Did you get that thing I sent you?';

        $body = "From: $name\n E-Mail: $email\n Comment:\n $comment";
        if(!$_POST['name']){
            $errName = 'Please enter your name.';
        }
        else if(!$_POST['email']|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errEmail = 'Please enter a valid email';
        }
        else if(!$_POST['comment']){
            $errMessage = 'Cat got your tongue?';
        }
        else if($human !==5){
            $errHuman = 'Your math is weak!';
        }
        if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
            if (mail($to, $subject, $body, $from)) {
                $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
            } 
            else {
                $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
            }
        }
        echo $result;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

    <form role="form-vertical" method="post" action="forms.php">
        
        <div class="form-group">
        
            <label for="email" class="col-sm-2 control-label">Email address:</label>
            
            <div class="col-sm-10">
            
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
            
            </div>
            
        </div>
        <br>
        <div class="form-group">
            
            <label for="name" class="col-sm-2 control-label">Name:</label>
            
            <div class="col-sm-10">
                
                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name">
                
            
            </div>
            
        </div>
        <br>
        <div class="form-group">
            
            <label for="comment" class="col-sm-2 control-label">Comment:</label>
            
            <div class="col-sm-10">
            
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            
            </div>
            
        </div>
        <br>
        <div class="form-group">
            
            <label for="human" class="col-sm-2 control-label"> 2 + 3 = ?</label>
            
            <div class="col-sm-10">
                 
                <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
            </div>
            
        </div>
        <br>
        <div class="form-group">
            
            <div class="col-sm-10">
            
                
                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">    
                
            </div>
            
        </div>
        <br>
        <div class="form-group">
            
            <div class="col-sm-10 col-sm-offset-2">
            
                <! Will be used to display an alert to the user>
            
            </div>
        
        </div>
    </form>

    
    
</div>
    
    
    

</body>
</html>
    