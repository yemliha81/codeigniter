<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP </title>
    <style>
        body{
            font-family:Arial;
        }
        .login_form{
            width: 300px;
            display:grid;
            gap:10px;
            background:#f3f3f3;
            padding:20px;
        }
    </style>
</head>
<body>
    <form action="<?php echo SIGNUP_POST;?>" method="POST">
        <div class="login_form">
        
                <div>LÜTFEN KAYIT OLUNUZ</div>
                <div class="input">
                    <label for="">Ad Soyad</label>
                    <input type="text" name="full_name">
                </div>
                <div class="input">
                    <label for="">Kullanıcı Adı</label>
                    <input type="text" name="username">
                </div>
                <div class="input">
                    <label for="">Şifre</label>
                    <input type="password" name="password">
                </div>
                <div class="input">
                    
                    <input type="submit" value="GİRİŞ YAP">
                </div>
            
        </div>
    </form>
</body>
</html>