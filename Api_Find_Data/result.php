<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: xx-large;
            background-image: url('pic.jpg');
            background-repeat: no-repeat;
       
            background-attachment: fixed;     
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-size: 1800px 1000px;
        }
        
    </style>
</head>
<body>
    <div class="hee">
    <h22>report</h22>
    <?php
    if (isset($_POST['city']) && !empty(trim($_POST['city'])))
    {
        $city = escapeshellarg(trim($_POST['city']));
        
        // Python aur script ka exact path
        $python_path = "C:\\Users\\abc\\AppData\\Local\\Programs\\Python\\Python314\\python.exe";
        $script_path = __DIR__ . DIRECTORY_SEPARATOR . "get_weather.py";
        
        $command = $python_path . " " . $script_path . " " . $city;
        
        $output = shell_exec($command);
        echo "<pre>" . htmlspecialchars($output) . "</pre>";
    }
    else
    {
        echo "<p>Please enter a valid city</p>";
    }
    ?>
    </div>
</body>
</html>