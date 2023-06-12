<?php

function header_function($current)
{
    $layout = '
    <!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $current . '</title>
        
        <link rel="stylesheet" href="./style/main.css?<?php echo time();?>">
</head>

<body>';
    echo $layout;
}
