<?php include("BDD.php") ?>


    <?php

    // function displayItem1()
    // {
    //     $item_1 = [
    //         "name" => "cat plush",
    //         "price" => 99,
    //         "picture" => "pusheen.jpg",
    //     ];
    //     echo $item_1["name"] . "<br>";
    //     echo $item_1["price"] . "£" . "<br>";
    //     echo "<img src='" . $item_1["picture"] . "'alt=''/> <br>";
    // }

    // function displayItem2()
    // {
    //     $item_2 = [
    //         "name" => "dog plush",
    //         "price" => 199,
    //         "picture" => "shiba.PNG",
    //     ];
    //     echo $item_2["name"] . "<br>";
    //     echo $item_2["price"] . "£" . "<br>";
    //     echo "<img src='" . $item_2["picture"] . "'alt=''/> <br>";
    // }


    // function displayItem3()
    // {
    //     $item_3 = [
    //         "name" => "fox plush",
    //         "price" => 299,
    //         "picture" => "fox.PNG",
    //     ];
    //     echo $item_3["name"] . "<br>";
    //     echo $item_3["price"] . "£" . "<br>";
    //     echo "<img src='" . $item_3["picture"] . "'alt=''/> <br>";
    // }

    function displayItem($name, $price, $picture, $key, $quantity)
    {

        echo "<img  src='" . $picture . "'class='img-fluid' alt=''/> <br>";
        echo "Nom du produit : " . $name . "<br>";
        echo "Prix : " . $price . "$" . "<br>";
        echo '<input type="number" name="quantity[' . $key . ']" value="' . $quantity . '"><br>';
    }

    function displayItemCheckbox($name, $price, $picture, $key)
    {

        echo "<img  src='" . $picture . "'class='img-fluid' alt=''/> <br>";
        echo "Nom du produit : " . $name . "<br>";
        echo "Prix : " . $price . "$" . "<br>";
        echo '<input type="checkbox" name="checkbox[' . $key . ']" value=""><br>';
    }




    ?>

