<?php
if (!isset($page_title)){$page_title='staff Area';}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>GBI<?php echo $page_title;?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href=<?php echo url_for('/stylesheets/staff.css');//pulling css from stylesheets staff.css?>>
  </head>
  <body>
  <header> 
      <h1>GBI staff Area</h1> 
</header>   
<navigation>
    <ul>
        <li> <a href =" <?php echo url_for('/staff/index.php');//for menu button in the header?>">Menu</a></li>
    </ul>
</navigation>