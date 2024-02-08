<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body style="display:grid; grid-template-columns: 1fr 1fr 1fr;">
    <div>
    Yeni Matrix Oluşturma
        <form action="<?php echo PRODUCT_SAVE;?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Resim 1</label>
                <input type="file" name="photo_1">
            </div>
            <div>
                <label for="">Resim 2</label>
                <input type="file" name="photo_2">
            </div>
            <div>
                <label for="">Ürün Adı</label>
                <div>
                    <input type="text" name="product_name">
                </div>
            </div>
            <div>
                <label for="">Ürün Hacim</label>
                <div>
                    <input type="number" name="product_volume">
                </div>
            </div>
            <div class="dynamic_data">

            </div>
            <div>
                <input type="submit" value="KAYDET">
            </div>
            
        </form>
        <div>
            <button class="addData">+</button>
        </div>
    </div>
    <div>
        Ürünler Matrisi
        <div>
            <?php foreach($products as $product) { ?>
                <div>
                    <?php echo $product['product_name'];?>
                </div>
                <div>
                <?php $data_text = json_decode($product['data_text'],1); 
                
                    foreach($data_text['label'] as $key => $label){
                        echo $label." : ".$data_text['value'][$key]."<br>";
                    }
                
                ?>
                
                </div>
                <div>
                    <img src="<?php echo $_ENV['BASE_URL'];?>files/<?php echo $product['photo_1'];?>" width="100">
                </div>
            <?php } ?>
        </div>
    </div>
    <script>
        $('.addData').click(function(){
            var html = "<div><input name='data[label][]' placeholder='label'/>\
             <br/> <input name='data[value][]' placeholder='Değer'/></div>";

            $('.dynamic_data').append(html);
        })
    </script>
</body>
</html>