<?php
        $conn=mysqli_connect("localhost","root","ArlanBB270899","tu");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }