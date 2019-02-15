<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>
<body>

<?php

$originalUnit = '';
$originalTemp = '';
$conversionUnit = '';
$convertedTemp = '';
// function to calculate converted temperature
function convertTemp($temp, $unit1, $unit2)
{
    // conversion formulas
    // $celsiusToFahrenheit = T(°C) × 9/5 + 32;
    // $celsiusToKelvin = T(°C) + 273.15;
    // $fahrenheitToCelsius = (T(°F) - 32) × 5/9;
    // $fahrenheitToKelvin = (T(°F) + 459.67)× 5/9;
    // $kelvinT0Fahrenheit = T(K) × 9/5 - 459.67;
    // $kelvintoCelsius = T(K) - 273.15;

    // You need to develop the logic to convert the temperature based on the selections and input made

    // echo $temp;
    // echo $unit1;
    // echo $unit2;
    
    if ($unit1 == 'celsius' && $unit2 == 'fahrenheit') {
        $retval = $temp * 9/5 + 32;
       
    }elseif ($unit1 == 'celsius' && $unit2 == 'kelvin') {
        $retval = $temp + 273.15;

    }elseif ($unit1 == 'fahrenheit' && $unit2 == 'celsius') {
        $retval = ($temp - 32) * 5/9;

    }elseif ($unit1 == 'fahrenheit' && $unit2 == 'kelvin') {
        $retval = ($temp + 459.67)* 5/9;

    }elseif ($unit1 == 'kelvin' && $unit2 == 'fahrenheit') {
        $retval = $temp * 9/5 - 459.67;

    }elseif ($unit1 == 'kelvin' && $unit2 == 'celsius') {
        $retval = $temp - 273.15;
    }else {
        $retval = $temp;
    }
    //echo $retval;
    return $retval;
}// end function

// Logic to check for POST and grab data from $_POST
// Store the original temp and units in variables
    // You can then use these variables to help you make the form sticky
    // then call the convertTemp() function
    // Once you have the converted temperature you can place PHP within the converttemp field using PHP
    // I coded the sticky code for the originaltemp field for you
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['originaltemp'])) {
        $originalTemperature = $_POST['originaltemp'];
    }else {
        $originalTemperature = "";
    }//end if

    if (isset($_POST['originalunit'])) {
        $originalUnit = $_POST['originalunit'];
    }else {
        $originalUnit = "";
    }//end if

    if (isset($_POST['conversionunit'])) {
        $conversionUnit = $_POST['conversionunit'];
    }else {
       $conversionUnit = "";
    }//end if

    // $originalTemperature = $_POST['originaltemp'];
    // $originalUnit = $_POST['originalunit'];
    // $conversionUnit = $_POST['conversionunit'];
    $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);

} // end if

?>
<!-- Form starts here -->
<h1>Temperature Converter</h1>
<h4>CTEC 127 - PHP with SQL 1</h4>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <div class="group">
        <label for="temp">Temperature</label>
        <input type="text" value="<?php if (isset($_POST['originaltemp'])) {
            echo $_POST['originaltemp'];}?>" name="originaltemp" size="14" maxlength="7" id="temp">

        <select name="originalunit">
            <option value="--Select--"<?php if($originalUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
            <option value="celsius"<?php if($originalUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
            <option value="fahrenheit"<?php if($originalUnit == "fahrenheit") echo ' selected="selected"';?>>Fahrenheit</option>
            <option value="kelvin"<?php if($originalUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
        </select>
    </div>

    <div class="group">
        <label for="convertedtemp">Converted Temperature</label>
        <input type="text" value="<?php echo $convertedTemp;?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" readonly>

        

        <select name="conversionunit">
            <option value="--Select--"<?php if($conversionUnit == "--Select--") echo ' selected="selected"';?>>--Select--</option>
            <option value="celsius"<?php if($conversionUnit == "celsius") echo ' selected="selected"';?>>Celsius</option>
            <option value="fahrenheit"<?php if($conversionUnit == "fahrenheit") echo ' selected="selected"';?>>Fahrenheit</option>
            <option value="kelvin"<?php if($conversionUnit == "kelvin") echo ' selected="selected"';?>>Kelvin</option>
        </select>
    </div>
    <input type="submit" value="Convert"/>
</form>
</body>
</html>