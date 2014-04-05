<?php echo $title; ?><br/>
<?php echo $bd; ?>
<hr>
<?php foreach($articles as $article) { ?>
<?php echo $article['text'] . '</br>'; ?>
<?php  }; ?>
<hr>
<?php echo $text; ?>