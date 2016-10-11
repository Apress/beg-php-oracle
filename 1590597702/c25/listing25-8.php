<?php
echo $this->render('header.phtml');
?>
<h4>The Latest Chess News</h4>
<?php
foreach ($this->results as $result) {
printf("<p><a href='%s'>%s</a> | %s <br />",
$this->escape($result->NewsSourceUrl),
$this->escape($result->NewsSource),
date("F j, Y", $this->escape($result->PublishDate))
);
printf("%s </p>", $this->escape($result->Summary));
}
?>