<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><em>Publié le <?= htmlspecialchars($post['french_creation_date']) ?></em></p>
    <div>
        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    </div>

    <h2>Commentaires :</h2>
    <ul>
        <?php foreach ($comments as $comment): ?>
            <li>
                <strong><?= htmlspecialchars($comment['author']) ?></strong> (<?= htmlspecialchars($comment['french_creation_date']) ?>) :
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>