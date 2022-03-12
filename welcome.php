<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<div class="container text-center my-5">
    <div class="row">
        <?php require_once('connect.php');
        session_start();
            if(!isset($_SESSION['user_login'])){
                header('location:index.php');
            }
            $id = $_SESSION['user_login'];

            $select_data = $db->prepare("SELECT * FROM tbl_user WHERE id =:id");
            $select_data->bindParam(':id',$id);
            $select_data->execute();
            $row = $select_data->fetch(PDO::FETCH_ASSOC);

            if(isset($_SESSION['user_login'])){
            
            
        ?>
        <h2>
            welcome, <?php echo $row['username']?>
        </h2>
               <div text-center>
               <?php echo $row['email']?>
               </div> 
    </div>
    <a href="logout.php" class="btn btn-danger mt-5">Logout</a>
</div>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>