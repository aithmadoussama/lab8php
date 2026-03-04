<?php

/** @var array $filieres */
/** @var array $errors */
/** @var array $old */
?>

<h2>Créer un étudiant</h2>

<form method="post" action="/etudiants">
    <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
    <!-- CNE -->
    <label>
        CNE
        <input name="cne"
            value="<?= htmlspecialchars($old['cne'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
            required>
    </label>
    <?php if (!empty($errors['cne'])): ?>
        <small class="error">
            <?= htmlspecialchars($errors['cne'], ENT_QUOTES, 'UTF-8'); ?>
        </small>
    <?php endif; ?>

    <br><br>

    <!-- Nom -->
    <label>
        Nom
        <input name="nom"
            value="<?= htmlspecialchars($old['nom'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
            required>
    </label>
    <?php if (!empty($errors['nom'])): ?>
        <small class="error">
            <?= htmlspecialchars($errors['nom'], ENT_QUOTES, 'UTF-8'); ?>
        </small>
    <?php endif; ?>

    <br><br>

    <!-- Prénom -->
    <label>
        Prénom
        <input name="prenom"
            value="<?= htmlspecialchars($old['prenom'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
            required>
    </label>
    <?php if (!empty($errors['prenom'])): ?>
        <small class="error">
            <?= htmlspecialchars($errors['prenom'], ENT_QUOTES, 'UTF-8'); ?>
        </small>
    <?php endif; ?>

    <br><br>

    <!-- Email -->
    <label>
        Email
        <input type="email"
            name="email"
            value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
            required>
    </label>
    <?php if (!empty($errors['email'])): ?>
        <small class="error">
            <?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8'); ?>
        </small>
    <?php endif; ?>

    <br><br>

    <!-- Filière -->
    <label>
        Filière
        <select name="filiere_id" required>
            <option value="">-- Choisir --</option>

            <?php foreach ($filieres as $f): ?>
                <option value="<?= (int)$f['id']; ?>"
                    <?= (isset($old['filiere_id']) && (int)$old['filiere_id'] === (int)$f['id']) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($f['code'] . ' — ' . $f['libelle'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>

        </select>
    </label>

    <?php if (!empty($errors['filiere_id'])): ?>
        <small class="error">
            <?= htmlspecialchars($errors['filiere_id'], ENT_QUOTES, 'UTF-8'); ?>
        </small>
    <?php endif; ?>

    <br><br>

    <button type="submit">Créer</button>
    <a role="button" class="secondary" href="/etudiants">Annuler</a>

</form>