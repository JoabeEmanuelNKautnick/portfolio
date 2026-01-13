/**
 * Theme Toggle - Controle de tema escuro/claro
 */

(function() {
    'use strict';
    
    const STORAGE_KEY = 'portfolio-theme';
    const COOKIE_DAYS = 365;
    
    /**
     * Define um cookie
     */
    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
    }
    
    /**
     * Obtém valor de um cookie
     */
    function getCookie(name) {
        const cookies = document.cookie.split(';');
        for (let cookie of cookies) {
            const [key, value] = cookie.trim().split('=');
            if (key === name) return value;
        }
        return null;
    }
    
    /**
     * Obtém tema salvo ou preferência do sistema
     */
    function getSavedTheme() {
        // Primeiro, verifica localStorage
        const stored = localStorage.getItem(STORAGE_KEY);
        if (stored) return stored;
        
        // Depois, verifica cookie
        const cookie = getCookie('theme');
        if (cookie) return cookie;
        
        // Por último, usa preferência do sistema
        if (window.matchMedia('(prefers-color-scheme: light)').matches) {
            return 'light';
        }
        
        return 'dark';
    }
    
    /**
     * Aplica o tema
     */
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem(STORAGE_KEY, theme);
        setCookie('theme', theme, COOKIE_DAYS);
    }
    
    /**
     * Alterna entre temas
     */
    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        applyTheme(newTheme);
    }
    
    /**
     * Inicializa os event listeners
     */
    function initThemeToggle() {
        // Botão desktop
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', toggleTheme);
        }
        
        // Botão mobile
        const themeToggleMobile = document.getElementById('theme-toggle-mobile');
        if (themeToggleMobile) {
            themeToggleMobile.addEventListener('click', toggleTheme);
        }
        
        // Escuta mudanças na preferência do sistema
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (!localStorage.getItem(STORAGE_KEY)) {
                applyTheme(e.matches ? 'dark' : 'light');
            }
        });
    }
    
    // Aplica tema inicial imediatamente (antes do DOM carregar)
    const initialTheme = getSavedTheme();
    document.documentElement.setAttribute('data-theme', initialTheme);
    
    // Inicializa quando o DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initThemeToggle);
    } else {
        initThemeToggle();
    }
    
    // Expõe funções globalmente se necessário
    window.themeUtils = {
        toggle: toggleTheme,
        apply: applyTheme,
        get: getSavedTheme
    };
})();
