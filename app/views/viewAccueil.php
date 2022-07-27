<?php
foreach($articles as $article): ?>
<h2><?= $article->title() ?></h2>
<p><?= $article->content() ?></p>
<time><?= $article->date() ?></time>
<?php endforeach; ?>