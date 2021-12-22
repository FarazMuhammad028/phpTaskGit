<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
session_destroy();
echo '<p></p>';
echo '<script type="text/javascript">';
echo 'swal("Logged Out");';
echo '</script>';
header("refresh:1;url=index.html");