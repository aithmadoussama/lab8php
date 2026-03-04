<?php /** @var array $e */ ?>

<h2>Étudiant #<?= (int)$e['id']; ?></h2>

<ul>
    <li>CNE : <?= htmlspecialchars($e['cne'], ENT_QUOTES, 'UTF-8'); ?></li>
    <li>Nom : <?= htmlspecialchars($e['nom'], ENT_QUOTES, 'UTF-8'); ?></li>
    <li>Prénom : <?= htmlspecialchars($e['prenom'], ENT_QUOTES, 'UTF-8'); ?></li>
    <li>Email : <?= htmlspecialchars($e['email'], ENT_QUOTES, 'UTF-8'); ?></li>
    <li>
        Filière :
        <?= htmlspecialchars(
            $e['filiere_code'] . ' — ' . $e['filiere_libelle'],
            ENT_QUOTES,
            'UTF-8'
        ); ?>
    </li>
</ul>

<p>
    <a role="button"
       href="/etudiants/<?= (int)$e['id']; ?>/edit">
        Éditer
    </a>

    <a role="button" class="secondary"
       href="/etudiants">
        Retour à la liste
    </a>

    <form action="/etudiants/<?= (int)$e['id']; ?>/delete"
          method="post"
          style="display:inline"
          onsubmit="return confirm('Supprimer ?');">
        <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <button type="submit">Supprimer</button>
    </form>
</p>