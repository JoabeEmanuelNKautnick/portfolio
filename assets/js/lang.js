/**
 * Language Selector - Controle de idioma
 */

(function() {
    'use strict';
    
    const STORAGE_KEY = 'portfolio-lang';
    const ALLOWED_LANGS = ['pt', 'en', 'es', 'de'];
    
    /**
     * Obtém idioma salvo ou do navegador
     */
    function getSavedLang() {
        // Primeiro, verifica localStorage
        const stored = localStorage.getItem(STORAGE_KEY);
        if (stored && ALLOWED_LANGS.includes(stored)) return stored;
        
        // Depois, verifica idioma do navegador
        const browserLang = navigator.language.split('-')[0];
        if (ALLOWED_LANGS.includes(browserLang)) return browserLang;
        
        return 'pt';
    }
    
    /**
     * Salva preferência de idioma
     */
    function saveLang(lang) {
        if (ALLOWED_LANGS.includes(lang)) {
            localStorage.setItem(STORAGE_KEY, lang);
        }
    }
    
    /**
     * Inicializa o dropdown de idiomas
     */
    function initLangSelector() {
        const langBtn = document.getElementById('lang-btn');
        const langSelector = langBtn?.closest('.lang-selector');
        const langDropdown = document.getElementById('lang-dropdown');
        
        if (!langBtn || !langSelector || !langDropdown) return;
        
        // Toggle dropdown
        langBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            langSelector.classList.toggle('active');
        });
        
        // Fecha ao clicar fora
        document.addEventListener('click', (e) => {
            if (!langSelector.contains(e.target)) {
                langSelector.classList.remove('active');
            }
        });
        
        // Fecha ao pressionar Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                langSelector.classList.remove('active');
            }
        });
        
        // Salva preferência ao trocar idioma
        const langOptions = langDropdown.querySelectorAll('.lang-option');
        langOptions.forEach(option => {
            option.addEventListener('click', () => {
                const url = new URL(option.href);
                const lang = url.searchParams.get('lang');
                if (lang) saveLang(lang);
            });
        });
    }
    
    /**
     * Redireciona para idioma salvo se diferente do atual
     */
    function checkRedirect() {
        const currentUrl = new URL(window.location.href);
        const currentLang = currentUrl.searchParams.get('lang');
        const savedLang = getSavedLang();
        
        // Se não há idioma na URL e temos um salvo diferente do padrão
        if (!currentLang && savedLang !== 'pt') {
            currentUrl.searchParams.set('lang', savedLang);
            // Comentado para evitar redirect automático
            // window.location.href = currentUrl.toString();
        }
    }
    
    // Inicializa quando o DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            initLangSelector();
            checkRedirect();
        });
    } else {
        initLangSelector();
        checkRedirect();
    }
    
    // Expõe funções globalmente
    window.langUtils = {
        get: getSavedLang,
        save: saveLang
    };
})();
