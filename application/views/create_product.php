<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        .boxes{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            min-height: 200px;
            background: #f3f3f3;
            padding:20px;
        }
    </style>
</head>
<body>

    <div>
        <?php echo $_SESSION['username'];?>
    </div>

    <div class="boxes">
        <div class="box1">
            <a href="<?php echo NEW_PRODUCT;?>">Add New</a>
        </div>
        <div class="box2">
            Önceki Matrixler
        </div>
        <div class="box3">
            Ürün Resimleri
        </div>
    </div>
</body>
</html>