<html>

<head>
    <title>Fibonacci Series</title>
</head>

<body>
    <?php
    // Fibonacci Series using recursion
    function fSeries($num)
    {
        if ($num == 0 || $num == 1) {
            return $num;
        }
        return (fSeries($num - 1) + fSeries($num - 2));
    }
    for ($i = 0; $i < 10; $i++) {
        echo fSeries($i);
        echo ", ";
    }
    ?>
</body>

</html>