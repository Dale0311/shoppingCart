<?php 
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
    <div class="flex h-screen w-screen flex-col items-center justify-center my-8 space-y-4">
        <h1 class="text-3xl font-semibold">Thankyou for purchasing here at IT Online Shop! </h1>
        <a href="." class="py-2 px-8 rounded bg-green-500 text-white">Buy again</a>
    </div>
</body>
</html>