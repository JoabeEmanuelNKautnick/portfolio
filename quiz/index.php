<?php
/**
 * Quiz CiberSec - Página do Quiz
 */

require_once __DIR__ . '/../includes/security.php';

// Detectar idioma
$lang = isset($_GET['lang']) ? sanitize_input($_GET['lang']) : 'pt';
$allowed_langs = ['pt', 'en', 'es', 'de'];
if (!in_array($lang, $allowed_langs)) {
    $lang = 'pt';
}

// Carregar traduções
$lang_file = __DIR__ . '/../lang/' . $lang . '.json';
$translations = [];
if (file_exists($lang_file)) {
    $translations = json_decode(file_get_contents($lang_file), true) ?? [];
}

function t($key) {
    global $translations;
    return $translations[$key] ?? $key;
}

// Tema
$theme = isset($_COOKIE['theme']) ? sanitize_input($_COOKIE['theme']) : 'dark';
if (!in_array($theme, ['dark', 'light'])) {
    $theme = 'dark';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" data-theme="<?php echo $theme; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo t('quiz_subtitle'); ?>">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/css/themes.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="quiz.css">
    
    <title><?php echo t('quiz_title'); ?> | Portfolio</title>
</head>
<body>
    <!-- Header Simplificado -->
    <header class="quiz-header">
        <div class="quiz-header-container">
            <a href="../index.php?lang=<?php echo $lang; ?>" class="quiz-back">
                ← <?php echo t('nav_about'); ?>
            </a>
            <h1 class="quiz-logo"><?php echo t('quiz_title'); ?></h1>
            <div class="quiz-controls">
                <button class="theme-toggle" id="theme-toggle">
                    <span class="theme-icon theme-icon-dark">🌙</span>
                    <span class="theme-icon theme-icon-light">☀️</span>
                </button>
            </div>
        </div>
    </header>
    
    <main class="quiz-main">
        <!-- Tela Inicial -->
        <div id="quiz-start" class="quiz-screen quiz-start-screen">
            <div class="quiz-start-content">
                <div class="quiz-start-icon">🛡️</div>
                <h2><?php echo t('quiz_title'); ?></h2>
                <p><?php echo t('quiz_subtitle'); ?></p>
                
                <div class="quiz-info">
                    <div class="quiz-info-item">
                        <span class="quiz-info-icon">❓</span>
                        <span>10 <?php echo t('quiz_question'); ?>s</span>
                    </div>
                    <div class="quiz-info-item">
                        <span class="quiz-info-icon">⏱️</span>
                        <span>~5 min</span>
                    </div>
                    <div class="quiz-info-item">
                        <span class="quiz-info-icon">📊</span>
                        <span><?php echo t('quiz_medium'); ?> / <?php echo t('quiz_hard'); ?></span>
                    </div>
                </div>
                
                <button id="start-quiz-btn" class="btn btn-primary btn-lg">
                    <?php echo t('quiz_start'); ?> 🚀
                </button>
            </div>
        </div>
        
        <!-- Tela do Quiz -->
        <div id="quiz-game" class="quiz-screen hidden">
            <div class="quiz-game-container">
                <!-- Progresso -->
                <div class="quiz-progress">
                    <div class="quiz-progress-info">
                        <span id="question-counter">1 / 10</span>
                        <span id="difficulty-badge" class="difficulty-badge medium">🟡 Medium</span>
                    </div>
                    <div class="quiz-progress-bar">
                        <div id="progress-bar" class="quiz-progress-fill"></div>
                    </div>
                </div>
                
                <!-- Pergunta -->
                <div class="quiz-question-container">
                    <h2 id="question-text" class="quiz-question"></h2>
                </div>
                
                <!-- Opções -->
                <div id="options-container" class="quiz-options"></div>
                
                <!-- Feedback -->
                <div id="feedback-container" class="quiz-feedback hidden">
                    <h3 class="feedback-title"></h3>
                    <p class="feedback-text"></p>
                </div>
                
                <!-- Botão Próximo -->
                <button id="next-btn" class="btn btn-primary hidden">
                    <?php echo t('quiz_next'); ?> →
                </button>
            </div>
        </div>
        
        <!-- Tela de Resultado -->
        <div id="quiz-result" class="quiz-screen hidden">
            <div class="quiz-result-content">
                <div class="quiz-result-icon">🏆</div>
                <h2><?php echo t('quiz_score'); ?></h2>
                <div id="score-display" class="quiz-score"></div>
                <p id="result-message" class="quiz-result-message"></p>
                
                <div class="quiz-result-actions">
                    <button id="restart-quiz-btn" class="btn btn-primary">
                        <?php echo t('quiz_restart'); ?> 🔄
                    </button>
                    <a href="../index.php?lang=<?php echo $lang; ?>#projects" class="btn btn-secondary">
                        ← <?php echo t('nav_projects'); ?>
                    </a>
                </div>
            </div>
        </div>
    </main>
    
    <script src="../assets/js/theme.js"></script>
    <script src="quiz.js"></script>
</body>
</html>
