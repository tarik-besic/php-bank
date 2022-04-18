<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/login/login.css">
</head>


<body>
    <div class="loginContainer">
        <div class="header">
            Login
        </div>
        <div class="inputDiv first">
            <img src="./images/user.png" class="img">
            <input type="text" class="input" placeholder="Username..." id="username">
        </div>
        <div class="inputDiv second">
            <img src="./images/pass.png" class="img">
            <input type="password" class="input" placeholder="Password..." id="pass">
        </div>
        <div class="signIn">
            <div class="text">
                Sign in
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    $(".signIn").click(() => {

        const name = $("#username").val();
        const pass = $("#pass").val();
        if (name == "admin" && pass == "admin") {
            window.location = "dashboard.php";
        }
        else if(name == "tarik besic" && pass == "user"){
            window.location = "dashboardUser.php";
        }
        else{
            $(".first").css("border","1px solid red")
            $(".second").css("border","1px solid red")
        }
    })
</script>

</html>