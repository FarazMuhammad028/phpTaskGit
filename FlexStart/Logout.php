<?php
session_start();
session_destroy();

header("Location:index.html?msg=<div class='alert alert-success mt-lg-4'>Logged Out</div>");