<?php
session_start();
if(session_destroy())
{
header("Location: /lms2/index");
}

?>