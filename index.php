<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>R G B</title>

</head>
<body>
<div>  
<?php
if(isset($_POST['r']) && isset($_POST['g']) && isset($_POST['b'])){
    $color_b = "background:rgb(".$_POST['r'].",".$_POST['g'].",".$_POST['b']." )";
    $color_s =  "color:rgb(".$_POST['g'].",".$_POST['r'].",".$_POST['b']." )";
}
else{
    $color_b = "background:rgb(255,255,255)";
    $color_s =  "color:rgb(0,0,0)";
}
?>
<style>
        body{
            <?=$color_b?>;
        }
        .span-color{
            <?=$color_s?>;
        }
    </style>
<span class='span-color'>Один з кольорів введено неправильно!!!</span>
        <form action='' method='post'>
            <p>Введіть значення кольорів 255..0</p>
            <label>R</label>
            <input type='text' name='r'>
            <label>G</label>
            <input type='text' name='g'>
            <label>B</label>
            <input type='text' name='b'>
            <input type='submit' name='sub' value='Accept'>
        </form>
</div>
</body>
</html>