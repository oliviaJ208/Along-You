<?php
Session_start();
session_destroy();
// echo "<script>localStorage.clear();</script>"
echo " <script>location.href='index.php';</script>"
?>
