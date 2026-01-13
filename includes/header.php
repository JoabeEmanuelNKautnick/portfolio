<?php
require_once __DIR__ . '/security.php';

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

// Função para traduzir
function t($key) {
    global $translations;
    return $translations[$key] ?? $key;
}

// Detectar tema (do cookie)
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
    <meta name="description" content="<?php echo t('meta_description'); ?>">
    <meta name="author" content="Portfolio">
    
    <!-- Preconnect para fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/themes.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title><?php echo t('site_title'); ?></title>
</head>
<body>
    <!-- Header Navigation -->
    <header class="header" id="header">
        <div class="header-container">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <span class="logo-text">&lt;Portfolio/&gt;</span>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="nav-desktop" id="nav-desktop">
                <ul class="nav-list">
                    <li><a href="#about" class="nav-link"><?php echo t('nav_about'); ?></a></li>
                    <li><a href="#experience" class="nav-link"><?php echo t('nav_experience'); ?></a></li>
                    <li><a href="#skills" class="nav-link"><?php echo t('nav_skills'); ?></a></li>
                    <li><a href="#projects" class="nav-link"><?php echo t('nav_projects'); ?></a></li>
                    <li><a href="#certifications" class="nav-link"><?php echo t('nav_certifications'); ?></a></li>
                    <li><a href="#articles" class="nav-link"><?php echo t('nav_articles'); ?></a></li>
                    <li><a href="quiz/" class="nav-link nav-quiz"><?php echo t('nav_quiz'); ?></a></li>
                    <li><a href="#contact" class="nav-link"><?php echo t('nav_contact'); ?></a></li>
                </ul>
            </nav>
            
            <!-- Controls -->
            <div class="header-controls">
                <!-- Theme Toggle -->
                <button class="theme-toggle" id="theme-toggle" aria-label="<?php echo t('toggle_theme'); ?>">
                    <span class="theme-icon theme-icon-dark">🌙</span>
                    <span class="theme-icon theme-icon-light">☀️</span>
                </button>
                
                <!-- Language Selector -->
                <div class="lang-selector">
                    <button class="lang-btn" id="lang-btn" aria-label="<?php echo t('change_language'); ?>">
                        <span class="lang-current"><?php echo strtoupper($lang); ?></span>
                        <span class="lang-arrow">▼</span>
                    </button>
                    <div class="lang-dropdown" id="lang-dropdown">
                        <a href="?lang=pt" class="lang-option <?php echo $lang === 'pt' ? 'active' : ''; ?>">🇧🇷 Português</a>
                        <a href="?lang=en" class="lang-option <?php echo $lang === 'en' ? 'active' : ''; ?>">🇺🇸 English</a>
                        <a href="?lang=es" class="lang-option <?php echo $lang === 'es' ? 'active' : ''; ?>">🇪🇸 Español</a>
                        <a href="?lang=de" class="lang-option <?php echo $lang === 'de' ? 'active' : ''; ?>">🇩🇪 Deutsch</a>
                    </div>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <nav class="nav-mobile" id="nav-mobile">
            <ul class="nav-list-mobile">
                <li><a href="#about" class="nav-link-mobile"><?php echo t('nav_about'); ?></a></li>
                <li><a href="#experience" class="nav-link-mobile"><?php echo t('nav_experience'); ?></a></li>
                <li><a href="#skills" class="nav-link-mobile"><?php echo t('nav_skills'); ?></a></li>
                <li><a href="#projects" class="nav-link-mobile"><?php echo t('nav_projects'); ?></a></li>
                <li><a href="#certifications" class="nav-link-mobile"><?php echo t('nav_certifications'); ?></a></li>
                <li><a href="#articles" class="nav-link-mobile"><?php echo t('nav_articles'); ?></a></li>
                <li><a href="quiz/" class="nav-link-mobile nav-quiz"><?php echo t('nav_quiz'); ?></a></li>
                <li><a href="#contact" class="nav-link-mobile"><?php echo t('nav_contact'); ?></a></li>
            </ul>
            
            <!-- Mobile Controls -->
            <div class="mobile-controls">
                <div class="mobile-theme">
                    <span><?php echo t('theme'); ?>:</span>
                    <button class="theme-toggle-mobile" id="theme-toggle-mobile">
                        <span class="theme-icon theme-icon-dark">🌙</span>
                        <span class="theme-icon theme-icon-light">☀️</span>
                    </button>
                </div>
                <div class="mobile-lang">
                    <span><?php echo t('language'); ?>:</span>
                    <div class="lang-options-mobile">
                        <a href="?lang=pt" class="<?php echo $lang === 'pt' ? 'active' : ''; ?>">PT</a>
                        <a href="?lang=en" class="<?php echo $lang === 'en' ? 'active' : ''; ?>">EN</a>
                        <a href="?lang=es" class="<?php echo $lang === 'es' ? 'active' : ''; ?>">ES</a>
                        <a href="?lang=de" class="<?php echo $lang === 'de' ? 'active' : ''; ?>">DE</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
