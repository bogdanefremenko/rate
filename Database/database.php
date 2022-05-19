<?php

$link = mysqli_connect('localhost', 'root', 'root', 'money');

if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}