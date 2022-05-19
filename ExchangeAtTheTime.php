<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Exchange at
        <?php
        echo $_GET["time"];
        ?>
        </title>
</head>
<body>
<div class="p-3 mb-2 bg-dark text-white">
    <form action="index.php">
        <button>Back</button>
    </form>
    <?php
    include 'functions.php';
    $rate = getValues($_GET["time"]);
    showExchange($rate);
    ?>
</div>
</body>
</html>