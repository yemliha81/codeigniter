<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>İsim</td>
            <td>Soyisim</td>
            <td></td>
        </tr>
    </thead>
    <tbody class="tbody">
        <tr>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
        </tr>
    </tbody>
</table>

</body>
<script>
    
    const data = '[{"id":"4","isim":"murat","soyisim":"basar","timestamp":"2024-02-05 22:55:06"},{"id":"5","isim":"muba 123","soyisim":"mubamuba 123","timestamp":"2024-02-06 20:02:28"}]';

    const j_data = JSON.parse(data);
    
    let html = "";

    j_data.forEach(function(row){
        html += "<tr>";
        html += "<td>"+row.id+"</td>";
        html += "<td>"+row.isim+"</td>";
        html += "<td>"+row.soyisim+"</td>";
        html += "<td><a href='#'>Delete</td>";
        html += "</tr>";
    })

    $('.tbody').html(html);

</script>
</html>