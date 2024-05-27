<?php
if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
    echo 'Vous utilisez Firefox.';
}
else {
    echo 'Vous n\'utilisez pas Firefox. Vous utilisez '.$_SERVER['HTTP_USER_AGENT'];
}
echo "<br />";
echo var_dump((0.1+0.7)*10)."<br />";

?>