<!doctype html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Rate</title>
</head>
<body>
<div class="p-3 mb-2 bg-dark text-white">
    <form action="currentExchange.php">
        <button>Show current rate of exchange</button>
    </form>
    <br>
    <form action="ExchangeAtTheTime.php" method="get">
        <select name="time">
            <?php
            include 'functions.php';
            foreach (timeVariants() as $option) {
                echo '<option value="' . $option[0] . '">'. $option[0] . '</option>';
            }
            ?>
        </select>
        <br>
        <br>
        <button>Show rate of exchange at the time</button>
    </form>
</div>
</body>
</html>