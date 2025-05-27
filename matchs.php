<?php
// Gestion de l'affichage selon le paramètre GET
$section = isset($_GET['section']) ? $_GET['section'] : 'upcoming';

// Données des matchs à venir
$upcoming_matches = [
    [
        'date' => 'Sam 1 Juin 2025 - 18:00',
        'home_team' => 'Mugiwara',
        'home_logo' => 'M',
        'away_team' => 'Thunder Bolts', 
        'away_logo' => 'T',
        'venue' => 'Gymnase Mugiwara',
        'championship' => 'Régional Senior'
    ],
    [
        'date' => 'Mer 4 Juin 2025 - 20:30',
        'home_team' => 'Storm Eagles',
        'home_logo' => 'S',
        'away_team' => 'Mugiwara',
        'away_logo' => 'M',
        'venue' => 'Palais des Sports - Centre-ville',
        'championship' => 'Régional Senior'
    ],
    [
        'date' => 'Sam 7 Juin 2025 - 16:00',
        'home_team' => 'Mugiwara',
        'home_logo' => 'M',
        'away_team' => 'Dragons FC',
        'away_logo' => 'D',
        'venue' => 'Gymnase Mugiwara',
        'championship' => 'Coupe Régionale'
    ],
    [
        'date' => 'Dim 15 Juin 2025 - 14:30',
        'home_team' => 'Fire Wolves',
        'home_logo' => 'F',
        'away_team' => 'Mugiwara',
        'away_logo' => 'M',
        'venue' => 'Complexe Sportif Municipal',
        'championship' => 'Régional Senior'
    ]
];

// Données des résultats
$results = [
    [
        'date' => 'Sam 25 Mai 2025 - 18:00',
        'home_team' => 'Mugiwara',
        'home_logo' => 'M',
        'home_score' => 89,
        'away_team' => 'Pirates',
        'away_logo' => 'P',
        'away_score' => 75,
        'venue' => 'Gymnase Mugiwara',
        'top_scorer' => 'Luffy - 24 pts'
    ],
    [
        'date' => 'Mer 22 Mai 2025 - 20:00',
        'home_team' => 'Lions',
        'home_logo' => 'L',
        'home_score' => 92,
        'away_team' => 'Mugiwara',
        'away_logo' => 'M',
        'away_score' => 88,
        'venue' => 'Arena Lions',
        'top_scorer' => 'Zoro - 28 pts'
    ],
    [
        'date' => 'Sam 18 Mai 2025 - 16:30',
        'home_team' => 'Mugiwara',
        'home_logo' => 'M',
        'home_score' => 105,
        'away_team' => 'Rockets',
        'away_logo' => 'R',
        'away_score' => 97,
        'venue' => 'Gymnase Mugiwara',
        'top_scorer' => 'Sanji - 31 pts'
    ],
    [
        'date' => 'Dim 12 Mai 2025 - 15:00',
        'home_team' => 'Sharks',
        'home_logo' => 'S',
        'home_score' => 79,
        'away_team' => 'Mugiwara',
        'away_logo' => 'M',
        'away_score' => 84,
        'venue' => 'Complexe Aquatique',
        'top_scorer' => 'Usopp - 22 pts'
    ]
];

// Fonction pour déterminer si l'équipe a gagné
function isWinner($team, $homeTeam, $homeScore, $awayScore) {
    if ($team === $homeTeam) {
        return $homeScore > $awayScore;
    } else {
        return $awayScore > $homeScore;
    }
}

// Fonction pour obtenir la classe CSS du score
function getScoreClass($team, $homeTeam, $homeScore, $awayScore) {
    return isWinner($team, $homeTeam, $homeScore, $awayScore) ? 'win' : 'loss';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matchs - Mugiwara-no Basket</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            background: oklch(0.141 0.005 285.823);
            font-family: "Roboto";
            color: white;
            overflow-x: hidden;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            height: 100%;
        }

        #titre {
            text-decoration: none;
            color: #42aaff;
            box-shadow: 110px;
        }

        #main {
            flex: 1;
            width: 100%;
        }

        header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            height: 80px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        header main h1 {
            font-size: 35px;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        header main h1 img {
            border-radius: 18px;
            width: 50px;
        }

        header main {
            padding: 8px;
            display: flex;
            height: 100%;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            gap: 24px;
        }

        nav a {
            text-decoration: none;
            cursor: pointer;
            font-size: 25px;
            color: #42aaff;
            padding: 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background: rgba(66, 170, 255, 0.2);
            transform: translateY(-3px);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        footer {
            width: 100%;
            position: fixed;
            bottom: 0;
            background: oklch(0.21 0.006 285.885);
            height: 50px;
        }

        footer div {
            display: flex;
            gap: 48px;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        footer div p {
            color: white;
            cursor: pointer;
        }

        /* Styles spécifiques à la page matchs */
        .container {
            margin-top: 120px;
            margin-bottom: 80px;
            padding: 0 20px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .toggle-container {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .toggle-buttons {
            display: flex;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 4px 15px rgba(66, 170, 255, 0.3);
        }

        .toggle-btn {
            padding: 15px 30px;
            background: transparent;
            color: white;
            border: none;
            border-radius: 45px;
            cursor: pointer;
            font-size: 18px;
            font-family: "Roboto";
            transition: all 0.3s ease;
            min-width: 150px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .toggle-btn.active {
            background: #42aaff;
            color: white;
            box-shadow: 0 2px 10px rgba(66, 170, 255, 0.5);
        }

        .toggle-btn:hover:not(.active) {
            background: rgba(66, 170, 255, 0.2);
        }

        .matches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .match-card {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(66, 170, 255, 0.2);
            transition: all 0.3s ease;
            border: 1px solid rgba(66, 170, 255, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .match-card:nth-child(1) { animation-delay: 0.1s; }
        .match-card:nth-child(2) { animation-delay: 0.2s; }
        .match-card:nth-child(3) { animation-delay: 0.3s; }
        .match-card:nth-child(4) { animation-delay: 0.4s; }

        .match-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(66, 170, 255, 0.4);
            border: 1px solid rgba(66, 170, 255, 0.3);
        }

        .match-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .match-date {
            color: #42aaff;
            font-weight: bold;
            font-size: 16px;
        }

        .match-status {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-upcoming {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }

        .status-finished {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }

        .teams {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .team {
            text-align: center;
            flex: 1;
        }

        .team-name {
            font-size: 20px;
            font-weight: bold;
            color: white;
            margin-bottom: 8px;
        }

        .team-logo {
            width: 50px;
            height: 50px;
            background: #42aaff;
            border-radius: 50%;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
        }

        .vs {
            color: #42aaff;
            font-size: 24px;
            font-weight: bold;
            margin: 0 20px;
        }

        .match-info {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .info-label {
            color: #42aaff;
            font-weight: bold;
        }

        .score {
            font-size: 28px;
            font-weight: bold;
            color: #42aaff;
            margin: 0 10px;
        }

        .score.win {
            color: #28a745;
        }

        .score.loss {
            color: #dc3545;
        }

        .section-title {
            text-align: center;
            font-size: 32px;
            color: #42aaff;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .section-subtitle {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 30px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .matches-grid {
                grid-template-columns: 1fr;
            }
            
            .toggle-btn {
                min-width: 120px;
                font-size: 16px;
                padding: 12px 20px;
            }
            
            .container {
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>
    <div id="main">
        <header>
            <main>
                <a id="titre" href="index.html">
                    <h1><img src="logo.jpg" /> Mugiwara-no Basket</h1>
                </a>

                <nav>
                    <a href="effectif.html">Effectif</a>
                    <a href="#">Matériels</a>
                    <a href="admin.html">Admin</a>
                </nav>
            </main>
        </header>

        <main class="container">
            <div class="toggle-container">
                <div class="toggle-buttons">
                    <a href="?section=upcoming" class="toggle-btn <?php echo ($section === 'upcoming') ? 'active' : ''; ?>">
                        Matchs à venir
                    </a>
                    <a href="?section=results" class="toggle-btn <?php echo ($section === 'results') ? 'active' : ''; ?>">
                        Résultats
                    </a>
                </div>
            </div>

            <?php if ($section === 'upcoming'): ?>
            <!-- Section Matchs à venir -->
            <div id="upcoming-section">
                <h2 class="section-title">Prochains Matchs</h2>
                <p class="section-subtitle">Découvrez nos prochains défis et venez nous soutenir !</p>
                
                <div class="matches-grid">
                    <?php foreach ($upcoming_matches as $match): ?>
                    <div class="match-card">
                        <div class="match-header">
                            <div class="match-date"><?php echo htmlspecialchars($match['date']); ?></div>
                            <div class="match-status status-upcoming">À venir</div>
                        </div>
                        <div class="teams">
                            <div class="team">
                                <div class="team-logo"><?php echo htmlspecialchars($match['home_logo']); ?></div>
                                <div class="team-name"><?php echo htmlspecialchars($match['home_team']); ?></div>
                            </div>
                            <div class="vs">VS</div>
                            <div class="team">
                                <div class="team-logo"><?php echo htmlspecialchars($match['away_logo']); ?></div>
                                <div class="team-name"><?php echo htmlspecialchars($match['away_team']); ?></div>
                            </div>
                        </div>
                        <div class="match-info">
                            <div class="info-row">
                                <span class="info-label">Lieu:</span>
                                <span><?php echo htmlspecialchars($match['venue']); ?></span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Championnat:</span>
                                <span><?php echo htmlspecialchars($match['championship']); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php else: ?>
            <!-- Section Résultats -->
            <div id="results-section">
                <h2 class="section-title">Derniers Résultats</h2>
                <p class="section-subtitle">Découvrez les performances récentes de notre équipe</p>
                
                <div class="matches-grid">
                    <?php foreach ($results as $match): ?>
                    <div class="match-card">
                        <div class="match-header">
                            <div class="match-date"><?php echo htmlspecialchars($match['date']); ?></div>
                            <div class="match-status status-finished">Terminé</div>
                        </div>
                        <div class="teams">
                            <div class="team">
                                <div class="team-logo"><?php echo htmlspecialchars($match['home_logo']); ?></div>
                                <div class="team-name"><?php echo htmlspecialchars($match['home_team']); ?></div>
                                <div class="score <?php echo getScoreClass($match['home_team'], $match['home_team'], $match['home_score'], $match['away_score']); ?>">
                                    <?php echo $match['home_score']; ?>
                                </div>
                            </div>
                            <div class="vs">-</div>
                            <div class="team">
                                <div class="team-logo"><?php echo htmlspecialchars($match['away_logo']); ?></div>
                                <div class="team-name"><?php echo htmlspecialchars($match['away_team']); ?></div>
                                <div class="score <?php echo getScoreClass($match['away_team'], $match['home_team'], $match['home_score'], $match['away_score']); ?>">
                                    <?php echo $match['away_score']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="match-info">
                            <div class="info-row">
                                <span class="info-label">Lieu:</span>
                                <span><?php echo htmlspecialchars($match['venue']); ?></span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Meilleur marqueur:</span>
                                <span><?php echo htmlspecialchars($match['top_scorer']); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </main>
    </div>

    <footer>
        <div>
            <p>À propos de nous</p>
            <p>Whatsapp</p>
            <p>Facebook</p>
            <p>Instagram</p>
        </div>
    </footer>
</body>
</html>