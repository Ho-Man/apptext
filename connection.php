<?php
    $conn=postgre_connect('localhost','
    postgres://cgbnwzftocisgf:13398f7624b56e867d31d669ca7d1e0fe61a5086e676f6b3377723793b43f105@ec2-34-203-91-150.compute-1.amazonaws.com:5432/d4iv7vupomae05','
    d4iv7vupomae05')
    or die("Can not connect database".postgre_connect_error());
?>