<?php
$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));

echo $dt->format('Y/m/d H:i:s');