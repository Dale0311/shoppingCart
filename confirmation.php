<?php 
session_start();
include "./src/data.php";
   if(!isset($_POST['addToCart'])){
      header("location: index.php");
   }
   
   $key = $_SESSION['key'];
   
   // to access all data
   $product = $data[$key];
   $quantity = $_POST['quantity'];
   $size = $_POST['size'];

   // to put to session
   $itemsInCart = [
      "id" => $key,
      "image" => $product['image'],
      "name" => $product['name'],
      "price" => $product['price'],
      "description" => $product['description'],
      "size" => $size,
      "quantity" => $quantity,
   ];
   // if di pa naka set itemsInCart, gagawa sya
   if(!isset($_SESSION['itemsInCart'])){
      $_SESSION['itemsInCart'] = [];
   }

   // // if naka set na, gagawang logic
   if(isset($_SESSION['itemsInCart'])){
      // if is less than 0, means wala pa then aappend nya lang yung item
      if(count($_SESSION['itemsInCart']) < 1){
         $_SESSION['itemsInCart'][] = $itemsInCart;
      // if meron na foreach loop ako
      }else{
         // flag
         $isExisting = false;
         foreach ($_SESSION['itemsInCart'] as $key => $value) {
            // if name n size mag kapareho then i set ko yung isExisting to true, tas kunin lang index and yung quantity
            if($value['name'] === $product['name'] && $value['size'] === $size){
               $index = $key;
               $isExisting = true;
               $tempQuantity = $value['quantity'];
               break;
            }
         }
         // if false then just add to the cart yung item
         if(!$isExisting){
            $_SESSION['itemsInCart'][] = $itemsInCart;
         }
         // if true then do this.
         else{
            $_SESSION['itemsInCart'][$index]['quantity'] = $tempQuantity + $quantity;
         } 
   }
   if(isset($_SESSION['numAtCart'])){
      $_SESSION['numAtCart']+= $quantity;
   } }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="./output.css">
</head>
<body>
   <?php include "header.php" ?>
   <div class="container my-8 mx-auto">
      <h1 class="text-4xl font-semibold">Product is successfully added to your cart!</h1>
      <div class="flex space-x-12 w-1/2 items-center my-8 font-semibold">
         <a href="cart.php" class="py-2 text-center px-4 w-1/4 bg-slate-500 text-white rounded">View Cart</a>
         <a href="." class="py-2 text-center px-4 w-1/4 bg-red-500 text-white rounded">Continue Shopping</a>
      </div>
   </div>
</body>
</html>