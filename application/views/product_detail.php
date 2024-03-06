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
            <select class="select_cat" required>
                <option value="">Select category</option>
                <?php foreach($categories as $cat){?>
                    <option value="<?php echo $cat['id'];?>" <?php if($product['cat_id'] == $cat['id']){ echo "selected"; } ?> >
                        <?php echo $cat['category_name'];?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="sub_cats"></div>
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
        <input class="hidden_cat_id" type="hidden" name="cat_id" value="0">
    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).on('change', '.select_cat', function(){
            const cat_id = $('option:selected', this).val()
            //$('#aioConceptName option:selected').val();
            
            $.ajax({
                method: "post",
                url: "<?php echo GET_SUB_CATS;?>",
                data: {"cat_id":cat_id},
                success: function(response){
                    if(response != 'no_sub_cats'){
                        create_options(response);
                        $('.hidden_cat_id').val('0')
                    }else{
                        $('.hidden_cat_id').val(cat_id)
                    }
                }
            })
        })

        function create_options(response){
            const options = JSON.parse(response)
            
            
            let selectBox = '<div>';
            
            selectBox += "<span>Sub Categories</span>";
            selectBox += "<select class='select_cat' required>";
            selectBox += "<option value=''>Select category</option>";

            options.forEach(function(option){
                
                
                selectBox += "<option value='"+option.id+"'>"+option.category_name+"</option>";
            
            })

            selectBox += "</select></div>";

            $('.sub_cats').append(selectBox);
        }
    </script>
</body>
</html>