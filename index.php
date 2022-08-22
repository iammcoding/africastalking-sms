<?php
    require(__DIR__."/vendor/autoload.php");
use AfricasTalking\SDK\AfricasTalking;
$status == "";
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['send']){



$username = 'silexsecure'; // use 'sandbox' for development in the test environment
$apiKey   = 'df1042f68545ee405baf89ec7615c121055f10f792f7f09426a746306dab0aac'; // use your sandbox app API key for development in the test environment
$AT       = new AfricasTalking($username, $apiKey);

// Get one of the services
$sms      = $AT->sms();

// Use the service
$result   = $sms->send([
    'to'      => $_POST['phone'],
    'message' => $_POST['text']
]);

 if($result['status'] == "successs"){
    $status = $result['data']->SMSMessageData->Message;
 }else{
    $status = $result['data']->SMSMessageData->Message;
 }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;">
    <form method="POST">
<?php if($status != ""): ?>

    <div class="alert alert-primary">
<?php echo $status;?>
</div>
 
    <?php endif;?>
<div class="form-group">
    <label>Enter phone number seprated with comma</label>
        <input type="" class="form-control" name="phone">
</div>


<div class="form-group">
    <label>Enter Message</label>
        <textarea class="form-control" name="text"></textarea>
</div>

<input class="btn btn-primary btn-sm mt-2" style="float:right" name="send" value="Send" type="submit">
</form>


</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>