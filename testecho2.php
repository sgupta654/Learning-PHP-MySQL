<?php
	
	$text = 'PHP TRAINING';
echo '<title>php Training Example 4</title>';
echo 'echo treats double quotes and single quotes differently';
echo '<br /><hr /><br />';

echo 'single quote example<br />
			<p style="font-family: sans-serif; color:red">
				This is a styled paragraph
			</p>'
			.$text.'';
echo '<br /><hr /><br />';


echo "doube quote example<br />
			<p style=\"font-family: sans-serif; color:red\">
				This is a styled paragraph
			</p>"
			.$text." rest of string
";
echo "<br /><hr /><br />";

?>
