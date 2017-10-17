# ConvertStrings

Class to convert string variable to variable with attributes.

Two examples: 
<code>
$convert = new \Treto\ConvertStrings();
$string = "My name is __userName__ and I have __userYear__ yr. Text created in [class] class.";
$string2 = $convert -> interpolate($string, ['userName' => 'Tomirad', 'userYear' => 33], '____');
echo $convert -> interpolate($string2, ['class' => 'ConvertStrings']);
</code>

<code>
#
# Result:
# My name is Tomirad and I have 33 yr. Text created in ConvertStrings class.
#
</code>

TODO:
- Prepare class under Composer