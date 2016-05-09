<?php

echo '<pre>';

// Outputs all the result of shellcommand "ls", and returns
// the last output line into $last_line. Stores the return value
// of the shell command in $retval.
$last_line = system('cd /home/wilx/Documentos/minsal/git/nightly && git pull', $retval);

// Printing additional info
echo '
</pre>
<hr />Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval;

system("cd /home/wilx/Documentos/minsal/git/nightly && git pull 2>&1",$output) ;
echo $output;
?>


if ( date('i') % 5 == 0 )
	echo 'solo sale en 5';
