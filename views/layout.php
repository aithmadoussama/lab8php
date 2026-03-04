<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Étudiants - Projet PHP</title>
    <!-- Utilisation de Pico.css pour un rendu moderne et responsive -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        .error {
            color: #c0392b;
            font-weight: bold;
        }

        .pagination a {
            margin-right: 10px;
            text-decoration: none;
        }

        main {
            padding-top: 2rem;
        }
    </style>
</head>

<body>
    <header class="container">
        <nav>
            <ul>
                <li><a href="/etudiants"><strong>Gestion Étudiants</strong></a></li>
            </ul>
            <ul>
                <li><a href="/etudiants">Liste</a></li>
                <li><a href="/etudiants/create">Ajouter</a></li>
                <?php if (!empty($_SESSION['admin_id'])): ?>
                    <li>
                        <form method="post" action="/logout" style="display:inline">
                            <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            <button type="submit" class="secondary outline" style="padding: 0.5rem 1rem;">Déconnexion</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li><a href="/login" class="outline">Se connecter</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="container">
        <?php echo $content; ?>
    </main>

    <footer class="container">
        <hr>
        <small>© 2026 Projet de Gestion des Étudiants</small>
    </footer>
</body>

</html>