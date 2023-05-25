<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            display:inline-block;
            width:100px;
            font-size:20px;
        }
        #signup{
            color:white;
            font-size:18px;
            background-color:#04AA6D;
            padding: 5px 20px;
            margin: 8px 0;
        }
        input{
            width:300px;
        }
        span{
            color:red;
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Sign Up Form</h1></br>
    <form method="POST">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Your Name" name="name" required><br><br>
        <span class="error"><?php if (isset($nameError)) echo $nameError ?></span><br>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required><br><br>
        <span class="error"><?php if (isset($emailError)) echo $emailError ?></span><br>

        <label for="pass"><b>Password</b></label>
        <input type="text" placeholder="Enter Password" name="pass" required><br><br>
        <span class="error"><?php if (isset($passwordError)) echo $passwordError ?></span><br>

        <button type="submit" id="signup" name="submit">Sign Up</button>
    </form>
    </center>
</body>
</html>