<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys Apps</title>
</head>
<body>
    <form action="" method="post">
        <label for="ranSize">Select Photo Size</label>
        <input type="range" name="ranSize" id="ranSize" min="0" max="100" value="60"><br>
        <label for="ranSize">Select Border Color</label>
        <input type="color" name="cpBColor" id="cpBColor" ><br><br>
        <button type="submit" name="btnProcess">Process</button><br>
    </form>

     

    <?php
        $photoSize = '60';
        $borderColor = '#000000';
        
        if(isset($_POST['btnProcess'])){
            $photoSize = $_POST['ranSize'];
            $borderColor = $_POST['cpBColor'];
        }

        echo '<br>';
        echo '<img src="./img/myPic.jpg" alt="ProfilePic" width="' . $photoSize . '%" style="border: 5px solid ' . $borderColor . ';">';
    
    ?>
    
</body>
</html>