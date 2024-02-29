<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
        .input{
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2><?php echo $product['product_name'];?></h2>
    <form action="<?php echo $_ENV['BASE_URL'].'products/update_product';?>" method="post">
        <div class="input">
            <label for="">Category</label>
            <select name="cat_id" >
                <?php foreach($categories as $cat){?>
                    <option value="<?php echo $cat['id'];?>" <?php if($product['cat_id'] == $cat['id']){ echo "selected"; } ?> >
                        <?php echo $cat['category_name'];?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="input">
            <label for="">Product Name</label>
            <input type="text" name="product_name" value="<?php echo $product['product_name'];?>">
        </div>
        <div class="input">
            <label for="">Volume</label>
            <input type="text" name="product_volume" value="<?php echo $product['product_volume'];?>">
        </div>
        <div class="input">
            <input type="hidden" name="product_id" value="<?php echo $product['id'];?>">
            <input type="submit" value="SAVE">
        </div>
    </form>
</body>
</html>