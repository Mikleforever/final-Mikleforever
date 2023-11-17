<?php include("include/config.php"); 

if (isset($_GET['exit'])){
    unset($_SESSION['user']);
 } 


if (!isset($_SESSION['user'])){
    header('Location: /auth.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Почтамп</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>

    <?php if (isset($_GET['exit'])){
       unset($_SESSION['user']);
    } 
    $check =  mysqli_query($connections, "SELECT * FROM `pushes` WHERE (`userid`={$_SESSION['user']['id']})");
    if (mysqli_num_rows($check) != 0){
        ?>
        <style>
        #pushb{
            box-shadow: 0px 0px 13px blue;
            background: unset;
        }
        </style>
        <?php
    }
    
    ?>
    <div class="m-container">
        <div class="left-menu">
            <div class="logo"><img class="logo_img" src="webicons\star.png" alt="">  <h1 class="logo_text" > почтамп </h1>  </div>
            <div  style="margin-top:0vw" title="Профиль"><a  class="a_a" href="?home="><img class="a_img" src="webicons\user.png" alt=""> <h2 class="menu_text"> Профиль </h2>        </a>   </div>
            <div title="Новости"><a class="a_a" href="?news="><img class="a_img" src="webicons\news.png" alt="">  <h2 class="menu_text"> Новости </h2> </a>   </div>
            <div title="Сообщения"><a class="a_a" href="?messages="><img class="a_img" src="webicons\message.png" alt="">  <h2 class="menu_text"> Сообщения </h2>   </a></div>
            <div title="Уведомления"><a  class="a_a" href="?pushs="><img id="pushb" src="webicons\notification.png" alt="">  <h2 class="menu_text"> Уведомления </h2> </a></div>
            <div title="Друзья"><a class="a_a" href="?friends="><img class="a_img" src="webicons\friends.png" alt="">   <h2 class="menu_text"> Друзья </h2> </a></div>
            <!-- <div><a href=""><img src="icons\group.svg" alt=""></a>  </div> -->
            <div title="Выйти"><a class="a_a" href="/auth.php"><img class="a_img" src="webicons\exit.png" alt="">  <h2 class="menu_text"> Выйти </h2> </a>  </div>
        </div>
        <div class="right-main">
            <?php
                if (!isset($_SESSION['user'])){
                    echo("<script>document.location.href  = '/auth.php'</script>");
                    die;
                }
                $q = mysqli_query($connections, "SELECT * FROM `users` WHERE `id`=".intval($_SESSION['user']['id']));
                if (mysqli_num_rows($q) == 0){
                    echo("<script>document.location.href  = '/auth.php'</script>");
                    die;
                }
                $_SESSION['user'] = mysqli_fetch_assoc($q);
                
                $sessionInfo = json_decode($_SESSION['user']['info_json']);
                if (isset($_GET['home'])){
                    include("home.php");
                }else
                if (isset($_GET['pushs'])){
                    include("pushs.php");
                }else
                if (isset($_GET['friends'])){
                    include("friendslist.php");
                }else
                if (isset($_GET['search'])){
                    include("search.php");
                }else
                if (isset($_GET['messages'])){
                    include("messages.php");
                }else
                if (isset($_GET['messages'])){
                    include("messages.php");
                }else if (isset($_GET['news'])){
                    include("news.php");
                }else{
                    ?>

                    <?php
                }
            ?>
        </div>
    </div>
</body>

</html>