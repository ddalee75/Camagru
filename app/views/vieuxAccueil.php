<?php
foreach($artcles as $article): ?>
<h1><?= $article->title() ?></h2>
<time><?= $article->date() ?></time>
<?php endforeach; ?>