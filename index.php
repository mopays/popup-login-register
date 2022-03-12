<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="main">
  <?php include_once('register.php')?>
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form>
                <?php if(isset($errorMsg)){
                    foreach($errorMsg as $error){
                ?>
                <div class="alert alert-danger">
                    <strong><?php echo $error?></strong>
                </div> 
                <?php }
                        }
                ?>
                   <?php if(isset($insertMsg)){
                ?>
                <div class="alert alert-success">
                    <strong><?php echo $insertMsg?></strong>
                </div> 
                <?php }
                       
                ?>
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="txt_username" placeholder="username">
                <input type="email" name="txt_email" placeholder="email">
                <input type="password" name="txt_password" placeholder="password">
                <button name="sing_up">Sing up</button>
            </form>
        </div>

        <div class="login">
            <form method="post">
          <?php include_once('login.php')?>
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="txt_email_username" placeholder="username or email">
                <input type="password" name="txt_password" placeholder="password">
                <button name="login_btn">Login</button>
                <br>
                <br>
                 <?php if(isset($errorMsgs)){
                    foreach($errorMsgs as $error){
                ?>
                <div class="alert alert-danger">
                    <strong><?php echo $error?></strong>
                </div> 
                <?php }
                        }
                ?>
                   <?php if(isset($loginMsg)){
                ?>
                <div class="alert alert-success">
                    <strong><?php echo $loginMsg?></strong>
                </div> 
                <?php }
                        
                ?>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>