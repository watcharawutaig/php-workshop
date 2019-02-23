<?php

$nameCode = $_GET["name"];
$countryCode = $_GET["country"];
//echo "hi"." ".$nameCode;
//echo "form"." ".$countryCode;

?>
<div>
    <h1>Profile</h1>
    Hi <b><?php echo $nameCode; ?></b>
    Form <u><?php echo $countryCode; ?></u>
    <hr />
</div>