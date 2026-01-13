<?php
/**
 * Portfolio - Joabe Emanuel Neundorff Kautnick
 * Back-End Developer & Pentester
 * 
 * Página principal do portfólio
 */

// Carrega configurações de segurança
require_once __DIR__ . '/includes/security.php';

// Inicia sessão segura
start_secure_session();

// Aplica headers de segurança
apply_security_headers();
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <?php require_once __DIR__ . '/includes/header.php'; ?>
</head>
<body>
    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loading-spinner"></div>
    </div>
    
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <p class="hero-greeting"><?php echo t('hero_greeting'); ?></p>
                <h1 class="hero-title">
                    <span class="hero-name">Joabe Emanuel</span>
                    <span class="hero-name-secondary">Neundorff Kautnick</span>
                </h1>
                <p class="hero-subtitle"><?php echo t('Desenvolvedor Back-End & Operador Red Team '); ?></p>
                <p class="hero-description"><?php echo t('hero_description'); ?></p>
                <div class="hero-cta">
                    <a href="#projects" class="btn btn-primary"><?php echo t('hero_cta_primary'); ?></a>
                    <a href="#contact" class="btn btn-secondary"><?php echo t('hero_cta_secondary'); ?></a>
                </div>
                <div class="hero-social">
                    <a href="https://linkedin.com/in/joabeenkautnick/" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="LinkedIn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                    <a href="https://github.com/" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="GitHub">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                        </svg>
                    </a>
                    <a href="https://instagram.com/theg0dfatherhacking" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Instagram">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-decoration">
                    <div class="decoration-circle decoration-circle-1"></div>
                    <div class="decoration-circle decoration-circle-2"></div>
                    <div class="decoration-circle decoration-circle-3"></div>
                </div>
            </div>
        </div>
        <a href="#about" class="scroll-indicator" aria-label="Scroll to about">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
            </svg>
        </a>
    </section>
    
    <!-- Main Content -->
    <main>
        <?php require_once __DIR__ . '/sections/about.php'; ?>
        <?php require_once __DIR__ . '/sections/experience.php'; ?>
        <?php require_once __DIR__ . '/sections/skills.php'; ?>
        <?php require_once __DIR__ . '/sections/projects.php'; ?>
        <?php require_once __DIR__ . '/sections/certifications.php'; ?>
        <?php require_once __DIR__ . '/sections/articles.php'; ?>
        <?php require_once __DIR__ . '/sections/contact.php'; ?>
        
        <!-- Quiz CTA -->
        <section class="quiz-cta section">
            <div class="quiz-cta-content card">
                <div class="quiz-cta-text">
                    <h2 class="quiz-cta-title"><?php echo t('QUIZ GAME'); ?></h2>
                    <p class="quiz-cta-description"><?php echo t('Quiz com questões sobre segurança da informação'); ?></p>
                </div>
                <a href="quiz/" class="btn btn-primary btn-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                    </svg>
                    <?php echo t('JOGAR'); ?>
                </a>
            </div>
        </section>
    </main>
    
    <?php require_once __DIR__ . '/includes/footer.php'; ?>
    
    <style>
    /* Hero Section */
    .hero {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: var(--space-2xl) var(--space-md);
        position: relative;
    }
    
    .hero-content {
        max-width: 1100px;
        width: 100%;
        display: flex;
        flex-direction: column-reverse;
        gap: var(--space-2xl);
        align-items: center;
        justify-content: center;
    }
    
    .hero-text {
        text-align: center;
        max-width: 600px;
        width: 100%;
    }
    
    .hero-greeting {
        font-size: 1.1rem;
        color: var(--purple-light);
        font-weight: 500;
        margin-bottom: var(--space-sm);
    }
    
    .hero-title {
        font-size: clamp(2rem, 6vw, 3.5rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: var(--space-md);
    }
    
    .hero-name {
        display: block;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-name-secondary {
        display: block;
        color: var(--text-primary);
        font-size: 0.85em;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        color: var(--blue-light);
        font-weight: 600;
        margin-bottom: var(--space-md);
    }
    
    .hero-description {
        font-size: 1.1rem;
        color: var(--text-secondary);
        line-height: 1.7;
        margin-bottom: var(--space-xl);
    }
    
    .hero-cta {
        display: flex;
        flex-wrap: wrap;
        gap: var(--space-md);
        margin-bottom: var(--space-xl);
        justify-content: center;
    }
    
    .hero-social {
        display: flex;
        gap: var(--space-md);
        justify-content: center;
    }
    
    .social-link {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        color: var(--text-secondary);
        transition: all var(--transition-fast);
    }
    
    .social-link:hover {
        border-color: var(--purple-medium);
        color: var(--purple-light);
        transform: translateY(-3px);
    }
    
    .hero-visual {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .hero-decoration {
        position: relative;
        width: 300px;
        height: 300px;
    }
    
    .decoration-circle {
        position: absolute;
        border-radius: 50%;
        border: 2px solid;
        animation: pulse 4s ease-in-out infinite;
    }
    
    .decoration-circle-1 {
        width: 100%;
        height: 100%;
        border-color: var(--purple-medium);
        opacity: 0.3;
    }
    
    .decoration-circle-2 {
        width: 75%;
        height: 75%;
        top: 12.5%;
        left: 12.5%;
        border-color: var(--blue-medium);
        opacity: 0.5;
        animation-delay: 0.5s;
    }
    
    .decoration-circle-3 {
        width: 50%;
        height: 50%;
        top: 25%;
        left: 25%;
        border-color: var(--purple-light);
        opacity: 0.7;
        animation-delay: 1s;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: var(--space-xl);
        left: 50%;
        transform: translateX(-50%);
        color: var(--text-muted);
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40% { transform: translateX(-50%) translateY(-10px); }
        60% { transform: translateX(-50%) translateY(-5px); }
    }
    
    /* Quiz CTA */
    .quiz-cta {
        padding: var(--space-xl) var(--space-md);
    }
    
    .quiz-cta-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: var(--space-lg);
        padding: var(--space-2xl);
        background: var(--gradient-subtle);
        border: 2px solid var(--purple-medium);
        max-width: 800px;
        margin: 0 auto;
    }
    
    .quiz-cta-title {
        font-size: 1.5rem;
        color: var(--text-primary);
    }
    
    .quiz-cta-description {
        color: var(--text-secondary);
        max-width: 500px;
    }
    
    .btn-lg {
        padding: var(--space-md) var(--space-xl);
        font-size: 1.1rem;
        gap: var(--space-sm);
    }
    
    /* Loading Screen */
    .loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--bg-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        transition: opacity 0.5s ease, visibility 0.5s ease;
    }
    
    .loading-screen.hidden {
        opacity: 0;
        visibility: hidden;
    }
    
    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 3px solid var(--border-color);
        border-top-color: var(--purple-medium);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    @media (min-width: 768px) {
        .hero-content {
            flex-direction: row;
            gap: var(--space-3xl);
            align-items: center;
            justify-content: center;
        }
        
        .hero-text {
            text-align: left;
            max-width: 550px;
        }
        
        .hero-cta {
            justify-content: flex-start;
        }
        
        .hero-social {
            justify-content: flex-start;
        }
        
        .hero-decoration {
            width: 350px;
            height: 350px;
        }
        
        .quiz-cta-content {
            flex-direction: row;
            text-align: left;
            justify-content: space-between;
        }
    }
    
    @media (min-width: 1024px) {
        .hero-content {
            max-width: 1200px;
            gap: var(--space-3xl);
        }
        
        .hero-text {
            max-width: 600px;
        }
        
        .hero-decoration {
            width: 400px;
            height: 400px;
        }
    }
    </style>
    
    <script>
        // Hide loading screen when page is ready
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loading-screen').classList.add('hidden');
            }, 500);
        });
    </script>
</body>
</html>
