<html>
<?session_start();
$name="";$email="";$password="";$validation = TRUE;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $name;
    
    //validation
    if(strlen($name.trim())==0)
    {
        $validation = FALSE;
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $validation = FALSE;
    }


    if (strlen($password)<6) 
    {
        $validation = FALSE;
    }


    if ($validation == TRUE)
     {
        $_SESSION["email"] =$email;
        $_SESSION["name"]=$name;
        $_SESSION["count"]=0;
        header('Location:welcome.php');
        exit();
    }
    else
    {
        header('Location:login.html');
        exit();
    }
}
else 
{
    header('Location:login.html');
    exit();
}?>
    
</html>