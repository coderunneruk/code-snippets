<?php
function number2word($number) {
    $numArray = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thir", "for", "fif", "six", "seven", "eight", "nine");
    $tenArray = array("", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety");
    $word = $number;
    if ($number <= 12) {
        $word = $numArray[$number];
    }
    if ($number > 12 && $number < 20) {
        $word = $numArray[$number] . "teen";
    }
    if ($number >= 20 && $number < 100) {
        $first_word = $tenArray[substr($number, 0, 1)];
        $second_word = "";
        $second_digit = substr($number, 1, 1);
        if ($second_digit != 0) {
            $second_word = "-" . $numArray[substr($number, 1, 1)];
        }
        $word = $first_word . $second_word;
    }
    return $word;
}

/*
 *
 * The following is for display / test purposes only
 *
 */

if (array_key_exists("number", $_POST) && $_POST['number'] == (int)$_POST['number']) {
    $number2word = (int) $_POST['number'];
} else {
    $number2word = "23";
}
?>
<!doctype html>
<html>
<head>
    <title>Number to Word</title>
    <meta name="description" content="Test page for number2word PHP function">
    <meta name="keywords" content="number word">
</head>
<body>
<h3>
    Test example of number2word function:
</h3>
<form method="POST">
    Enter integer :
    <input type="text" name="number" value="<?php echo($number2word); ?>" size="3">
    <input type="submit" name="Submit"  value="Submit">
</form>
<p>
    This function works on whole numbers under 100 only. <br /><br />
    <?php if ($number2word < 100): ?>
        The number <?php echo($number2word); ?> is <b><?php echo(number2word($number2word)); ?></b> in words.
    <?php else: ?>
        The number <?php echo($number2word); ?> will not be converted to words.
    <?php endif; ?>
</p>
</body>
</html>



