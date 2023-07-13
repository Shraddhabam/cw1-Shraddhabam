<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <?php
           if (isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error. '</span>';
            }
        };
           ?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">

        <form action="" method=post>
           <h3>login now</h3>
           <input type="email" name="name" required placeholder="enter your email">
           <input type="password" name="name" required placeholder="enter your password">          
           <input type="submit" name=" submit" value="login now" class="form-btn">
           <p>Don't have an account? <a href="register.php">register now</a></p>
        </form>
    </div>
</body>
</html>