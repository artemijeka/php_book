<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
	<!--
      Добавляем к адресу /articles/
      Добавляем id статьи $article->getId()
      И выводим название статьи $article->getName()
  -->
	<h2><a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a></h2>
	<p><?= $article->getText() ?></p>
	<hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>