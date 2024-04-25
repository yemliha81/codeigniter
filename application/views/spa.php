<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page Application</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="padding:30px;">
<div style="display:flex; align-items:center; justify-content:space-between;">
    <h1 class="page_title">SPA</h1>
    <a class="btn btn-info" data-toggle="modal" data-target="#myModal" href="javascript:;">New Product</a>
</div>


<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody class="tbody">
     
    </tbody>
</table>

<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Product</h4>
      </div>
      <div class="modal-body">
        <form id="pro_update_form" onsubmit="return false">
            <div>
                <label for="">Product Name</label>
                <input type="text" name="name" class="form-control pro_name" >
            </div>
            <div>
                <label for="">Product Description</label>
                <input type="text" name="description" class="form-control pro_description" >
            </div>
            <div>
                <label for="">Product Price</label>
                <input type="text" name="price" class="form-control pro_price" >
            </div>
            <div style="margin-top:10px;">
                <p>
                    <button class="btn btn-success save">SAVE</button>
                </p>
            </div>
            <input type="hidden" name="id" class="pro_id" value="0">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    //sayfa ilk yüklendiğinde çalışacak fonksiyon

    $(document).ready(function(){
        show_loader();
        get_products();
    })

    function get_products(){
        $.ajax({
            method: "GET",
            url: "<?php echo $_ENV['BASE_URL'];?>backend/get_products",
            success: function(response){
                //console.log(response)
                const products = JSON.parse(response);
                //console.log(products)
                $('.tbody').html('');
                products.forEach(function(item){
                    $('.page_title').html('Product List')
                    //console.log(item);
                    const table_row = '<tr pro_id="'+item.id+'">\
                                            <td>'+item.product_name_tr+'</td>\
                                            <td>'+item.description_tr+'</td>\
                                            <td>'+item.price+'</td>\
                                            <td>\
                                                <a class="btn btn-sm btn-info update_product" data-toggle="modal" data-target="#myModal">Update</a>\
                                                 <a class="btn btn-sm btn-danger delete_product">Delete</a>\
                                            </td>\
                                        </tr>';
                    $('.tbody').append(table_row);
                })



            }
        })
    }

    //$('.update_product').click(function)

    $(document).on('click', '.update_product', function(){
        const pro_id = $(this).parent().parent().attr('pro_id');
        //alert(pro_id);

        $.ajax({
            method: "GET",
            url: "<?php echo $_ENV['BASE_URL'];?>backend/get_product/"+pro_id,
            success: function(response){
                //console.log(response);
                const product = JSON.parse(response);
                $('.pro_name').val(product.product_name_tr);
                $('.pro_description').val(product.description_tr);
                $('.pro_price').val(product.price);
                $('.pro_id').val(product.id);
            }
        })


    })

    $(document).on('click', '.delete_product', function(){
        const pro_id = $(this).parent().parent().attr('pro_id');
        //alert(pro_id);

        if(confirm('Are you sure to delete this product?')){
            $.ajax({
                method: "GET",
                url: "<?php echo $_ENV['BASE_URL'];?>backend/delete_product/"+pro_id,
                success: function(response){
                    //console.log(response);
                    if(response == "success"){
                        show_loader();
                        get_products();
                    }
                }
            })
        }


       


    })

    $('.save').click(function(){
        const form_data = $('#pro_update_form').serialize();
        console.log(form_data);

        $.ajax({
            method: "POST",
            url:"<?php echo $_ENV['BASE_URL'];?>backend/update_product",
            data: form_data,
            success: function(response){
                console.log(response)
                if(response == "success"){
                    show_loader();
                    get_products();
                    $('#myModal').modal('toggle');
                    $('.pro_name').val('');
                    $('.pro_description').val('');
                    $('.pro_price').val(0);
                    $('.pro_id').val(0);
                }else{
                    alert("Error");
                }
            }
        })

    })

    function show_loader(){
        const loader = '<tr>\
                            <td colspan="4" class="text-center"> \
                                <h1>\
                                    <i class="fa fa-refresh fa-spin"></i>\
                                </h1>\
                            </td>\
                        </tr>';
        $('.tbody').html(loader);
    }




</script>

</body>
</html>