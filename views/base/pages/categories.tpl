<?php echo $title; ?><br/>
<?php echo $bd; ?>
<hr>
<?php foreach($categories as $category) { ?>
<?php echo $category['title'] . '</br>'; ?>
<?php  }; ?>
<hr>
<?php echo $text; ?>
