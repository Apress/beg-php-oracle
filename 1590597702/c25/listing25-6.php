<?php
echo $this->render('header.phtml');
?>
<div id="header">About You!</div>
<p>
Your IP Address: <?php echo $this->escape($this->ip); ?><br />
Your Browser: <?php echo $this->escape($this->browser); ?><br />
</p>
<?php
echo $this->render('footer.phtml');
?>