<?php echo $title; ?><br/>
<?php echo  $bd; ?>
<hr>
<?php foreach($authors as $author) { ?>
<?php echo $author['name'] . '</br>'; ?>
<?php  }; ?>
<hr>
<?php echo $text; ?>