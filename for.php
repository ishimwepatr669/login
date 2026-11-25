<html>
    <head>
        <title></title>
</head>
<body>
<form method="POST">
    username:<input type="text" name="uname"><br><br>
    <button type="submit" name="send">send<br><br>
</form>
<?php
if(isset($_POST['send'])){
    $user=$_POST['uname'];
    echo"WELOCOME $user TO BULINGA TSS";
}
?>
</body>
</html>

