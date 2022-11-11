<!DOCTYPE html>
<html lang="en">
<?php
    $arrDrinks = array("Coke" => 15, "Sprite" => 20, "Royal" => 20, "Pepsi" => 15, "Mountain Dew" => 20);
    $arrSize = array("Regular" => 0, "Up-Size" => 5, "Jumbo" => 10);
?>
<head>
    <title>Vendo Machine</title>
</head>
<body>
    <div style="width: 50%;">
        <h1>Vendo Machine</h1>
        <form action="" method="post">
            <fieldset>
                <legend>Products:</legend>
                <?php
                    foreach($arrDrinks as $key => $value){
                        echo '<input type="checkbox" name="chkDrinks[]" id="chk' . $key .'" value="'. $key .'"><label for="chk' . $key .'">' . $key . ' - ₱ ' . $value . '</label><br> ' . "\n";
                    }
                ?>
            </fieldset>

            <fieldset>
                <label for="drpSize">Size</label>
                <legend>Options:</legend>
                <select name="drpSize" id="drpSize">
                    <option value="Regular">Regular</option>
                    <option value="Up-Size">Up-Size (add ₱5)</option>
                    <option value="Jumbo">Jumbo(add ₱10)</option>
                </select>

                <label for="txtQTY">Quantity</label>
                <input type="number" name="txtQTY" id="txtQTY" min="1" value="1">
                <button type="submit" name="btnSend" id="btnSend">Check Out</button>
            </fieldset>
        </form>

        <hr>
    </div>

</body>
    <?php if(isset($_POST['btnSend']) && isset($_POST['chkDrinks'])){ ?>
        <h3>Product Summary:</h3>
        <ul>
            <?php
            
                $arrUserChoice = $_POST['chkDrinks'];
                $size = $_POST['drpSize'];
                $quantity = $_POST['txtQTY'] ;
                $addedSizeCompute = 0; // additional add size
                $totalAmount = 0;       // total all cost
                $numItems = 0;          // count items
                


                foreach($arrUserChoice as $key => $value){
                    $addedSizeCompute = $arrDrinks[$value] + $arrSize[$size]; // compute when user chosen the size of drinks

                    if($quantity > 1):
                        echo '<li>'. $quantity . ' pieces of '. $size . ' ' .$value . ' amouting to ₱' . $addedSizeCompute . '</li>';
                    else:
                        echo '<li>'. $quantity . ' piece of '. $size . ' '. $value .' amouting to ₱'. $addedSizeCompute . '</li>';
                    endif;
                                        
                    $totalAmount +=  ($addedSizeCompute * $quantity); // Process the computation amount all per item   
                    $numItems += $quantity; // the quatity per item
                }
            
            ?>  
        </ul>

        <b>Total Number of Items: </b> <?php echo $numItems; ?> <br>
        <b>Total Amount: </b> <?php echo $totalAmount; ?>
            
    <?php }
           elseif(isset($_POST['btnSend'])){
                echo 'No seleted Product. Try Again';
            } 
    ?>


</html>