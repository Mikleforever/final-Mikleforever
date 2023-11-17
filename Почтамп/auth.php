<?php include("include/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="css/auth.css">
    <script src="logreg.js"></script>
</head>
<body style="overflow:hidden; background: #360061">
    <?php
        if (isset($_POST['go_reg'])){

            $g = mysqli_query($connections, "SELECT * FROM `users` WHERE `login`='{$_POST['login']}'");

            if (mysqli_num_rows($g) == 0){
                $info = array(
                    'location' => trim($_POST['mest_jit']),
                    'born' => trim($_POST['rodil']),
                    'job' => trim($_POST['rab']),
                    'study' => trim($_POST['uch']),
                    'type' => trim($_POST['polog']),
                    'hobby' => trim($_POST['evlech']),
                    'email' => trim($_POST['mail']),
                    'background' =>"img/background.jpg",
                    'avatar' => "img/avatar.jpg",
                    'friends' => array()
                    
                );
                $info_json = (json_encode($info,JSON_UNESCAPED_UNICODE));
                $posts = json_encode(array(),JSON_UNESCAPED_UNICODE);
                $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
                mysqli_query($connections, "INSERT INTO `users` (`name`, `login`, `password`, `info_json`, `posts_json`) VALUES ('{$_POST['login']}', '{$_POST['login']}', '{$pass}', '{$info_json}', '{$posts}')");
                echo("<script>document.location.href  = '/auth.php'</script>");
            }else{
                $_SESSION['message'] = 'Эти данные уже используются';
            }

            
        }
        if (isset($_POST['go_log'])){
            $loginEx = mysqli_query($connections, "SELECT * FROM `users` WHERE `login`='{$_POST['login']}'");
            
            if (mysqli_num_rows($loginEx) == 1){
                $loginExFetch = mysqli_fetch_assoc($loginEx);
                if (password_verify($_POST['password'], substr( $loginExFetch['password'], 0, 60 ))){

                    $_SESSION['user'] = $loginExFetch;
                    echo("<script>document.location.href  = '/index.php'</script>");
                }else{

                    $_SESSION['message'] = 'Неверный логин или пароль';

                }
            }else{
                $_SESSION['message'] = 'Неверный логин или пароль';
            }
        }
    ?>
    <style>
        input{
            font-size:2vw;
            margin-top:2vw;
            border-style: solid;
            background:unset;
        }
        #login{

            margin-bottom:4vw;
            display: flex;
            justify-content: center;
            align-items: center;
            width:40%;
            height:80%;
            padding-top:4vw;
            padding-bottom:4vw;

            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            background:  #FFFFFF;
            transition:0.5s;
        }


        #reg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            width:fit-content;
            background:  #FFFFFF;
            width:40%;
            height:80%;
            padding-top:4vw;
            padding-bottom:4vw;

            margin-top: 0vh;

            transition:0.5s;

        }
    </style>

    <div id="login" style=" <?php if (isset($_POST['go_reg'])) {echo("margin-top:-100vh;"); }else{echo("margin-top:15vh;");} ?>">
        <form action="#" method="POST">    
            <h1 class="vhod_text">Вход в Почтамп</h1>
            <input class="vhod_input" type="text"  style="width:100%; height: 50px;" placeholder="Логин" name="login" minlength="4" required><br>
            <input class="vhod_input" type="password"  style="width:100%; height: 50px;" placeholder="Пароль" name="password" minlength="6" required>

            <input class="vhod_btn" type="submit" value="Вход" style=" " " name="go_log">
       <div class="unbutton_text">
            <h2 class="reg_text"> Нет учётной записи?  </h2>



           <h2 class="toreg_text" style="  " onclick="toRegister()" >Регистрация</h2>


       </div>


            <h2 class="message_text">
                <?php echo $_SESSION['message'];
                 unset($_SESSION['message']);
              ?>
            </h2>

        </form>
    </div>


    <div id="reg" style=" <?php if (isset($_POST['go_reg'])) {echo("margin-top:-200vh;"); }else{echo("margin-top:-200vh;");} ?>">
        <form action="#" method="POST">        
            <h1 class="reg_text_main">Регистрация </h1>
            <div style="display:flex;">
                <div style="margin-right:2vw;">
                    <input class="reg_input" type="text"  style="width:25vw; height: 50px;" placeholder="Логин*" name="login" minlength="4" required><br>
                    <input class="reg_input" type="password" style="width:25vw; height: 50px;" placeholder="Пароль*" name="password" minlength="6" required><br>
                    <input class="reg_input" type="email" style="width:25vw; height: 50px;" placeholder="E-Mail*" name="mail" required><br>
                </div>
                <div>

                </div>
            </div>

            <input class="reg_btn" type="submit" value="Зарегистрироватся" style="width:90%;" name="go_reg">

            <div class="unbutton_text">
                <h2 class="reg_text"> Уже есть аккаунт?  </h2>



                <h2 class="toreg_text" style=" " onclick="toLogin()" >Войти</h2>
            </div>

            <h2 class="message_text">

                <?php echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </h2>


        </form>
    </div>
</body>
</html>
