<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./signup.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Document</title>
</head>
<body>
<div class="signUpArea">
            
            <form action="../scripts/createNewUser.php" method="POST">
                <label for="Login">Login</label>
                <input type="text" name="newLogin"></input>
                <label for="Name">Name</label>
                <input type="text" name="newName"></input>
                <label for="surname">Surname</label>
                <input type="text" name="newSurname"></input>
                <label for="phone">Phone number</label>
                <input type="text" name="newPhone"></input>
                <label for="email">Email</label>
                <input type="mail" name="newMail"></input>
                <label for="password">Password</label>
                <input type="password" name="newPassword"></input>
                <label for="passwordRep">Repeat Password</label>
                <input type="password" name="newPasswordCheck"></input>
                <label for="terms" class="acceptTerms">
                <p>Accept <a href=""> terms and conditions:</a></p> </label>
                <input type="checkbox" class="checkbox1" name="newTerms">
                <div class="g-recaptcha" data-sitekey="6LcCPgYbAAAAALMhUSalsffkDJxWxCcdPgx_rK5m"></div>
                <button type="submit" >Sign up</button>
            </form>
        <div class = "singUpWrapper">
            <p>Already have an account? <a href="../index.php">Sing Up</a></p>
        </div>
        <div class="footerLinks">
            <a href="">Security</a>
            <a href="">FAQ</a>
            <a href="">Contact us</a>
        </div>

        </div>
</body>
</html>