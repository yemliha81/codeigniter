<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        table tr td{
            padding:8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2>Product list</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product){ ?>
                <tr>
                    <td><?php echo $product['id'];?></td>
                    <td><?php echo $product['product_name'];?></td>
                    <td>
                        <a href="<?php echo $_ENV['BASE_URL'].'products/product_detail/'.$product['id'];?>">Update</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>