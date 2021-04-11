<?php
$content = file_get_contents('https://allergotop.com/');
print_r(explode('col-xs-6',$content)[1]);