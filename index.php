<?php session_start() ?>
<?php include "./src/data.php" ?>
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
    <?php include "./header.php" ?>
    <?php if(isset($data)): ?>
    <div class="container mx-auto">
        <div class="grid grid-cols-2 px-4 md:grid-cols-3 lg:grid-cols-4 gap-8 py-8 md:px-0">
            <?php 
                foreach ($data as $key => $value) {
                    echo 
                        '<a href="details.php?key='.$key.'">
                            <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                                   <div class="relative">
                                    <img class="w-full" src="./img/'.$value['image'].'" alt="'.$value['image'].'">
                                    <img class="w-full absolute top-0 transition-opacity duration-300 opacity-0 hover:opacity-100" src="./img/'.$value['image2'].'" alt="'.$value['image2'].'">
                                </div>
                                <div class="p-4 space-x-2 md:space-x-0 flex justify-between items-center">
                                    <h2 class="text-base md:text-lg font-semibold text-gray-800">'.$value['name'].'</h2>
                                    <p class="px-6 py-2 bg-slate-700 text-white rounded">₱ '.$value['price'].'</p>
                                </div>
                            </div>
                        </a>';
                }
            ?>
        </div>
    </div>
    <?php endif ?>
</body>
</html>
