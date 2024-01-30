<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    Kullanıcılar

    <?php foreach($users as $user){ ?>
        <div><?php echo $user['username'];?> <?php echo $user['password'];?></div>
    <?php } ?>
</body>
</html>