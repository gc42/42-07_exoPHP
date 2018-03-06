<?php
require('model.php');

$reqPost     = getPost();
$reqComments = getComments();


require('commentsView.php');
