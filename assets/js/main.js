/**
 * Main.js - Funcionalidades principais do portfólio
 */

(function() {
    'use strict';
    
    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const navMobile = document.getElementById('nav-mobile');
        
        if (!menuBtn || !navMobile) return;
        
        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('active');
            navMobile.classList.toggle('active');
            
            // Previne scroll do body quando menu está aberto
            document.body.style.overflow = navMobile.classList.contains('active') ? 'hidden' : '';
        });
        
        // Fecha menu ao clicar em um link
        const navLinks = navMobile.querySelectorAll('.nav-link-mobile');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                menuBtn.classList.remove('active');
                navMobile.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
        
        // Fecha menu ao redimensionar para desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                menuBtn.classList.remove('active');
                navMobile.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
    
    /**
     * Smooth Scroll para links internos
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const headerHeight = document.querySelector('.header')?.offsetHeight || 80;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    /**
     * Header scroll effect
     */
    function initHeaderScroll() {
        const header = document.getElementById('header');
        if (!header) return;
        
        let lastScroll = 0;
        
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            // Adiciona sombra quando rolar
            if (currentScroll > 50) {
                header.style.boxShadow = 'var(--shadow-md)';
            } else {
                header.style.boxShadow = 'none';
            }
            
            lastScroll = currentScroll;
        });
    }
    
    /**
     * Animação de elementos ao scroll (Intersection Observer)
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observa elementos com classe .animate-on-scroll
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            el.style.opacity = '0';
            observer.observe(el);
        });
        
        // Observa todas as sections e cards
        document.querySelectorAll('.section, .card').forEach(el => {
            if (!el.classList.contains('animate-fade-in')) {
                el.style.opacity = '0';
                observer.observe(el);
            }
        });
    }
    
    /**
     * Active nav link based on scroll position
     */
    function initActiveNavLink() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link, .nav-link-mobile');
        
        if (sections.length === 0) return;
        
        window.addEventListener('scroll', () => {
            const scrollY = window.pageYOffset;
            const headerHeight = document.querySelector('.header')?.offsetHeight || 80;
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - headerHeight - 100;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');
                
                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${sectionId}`) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        });
    }
    
    /**
     * Formulário de contato com validação
     */
    function initContactForm() {
        const form = document.getElementById('contact-form');
        if (!form) return;
        
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            // Validação básica
            const email = formData.get('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailRegex.test(email)) {
                showNotification('Por favor, insira um email válido.', 'error');
                return;
            }
            
            // Desabilita botão durante envio
            submitBtn.disabled = true;
            submitBtn.textContent = 'Enviando...';
            
            try {
                // Simula envio (substituir por endpoint real)
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                showNotification('Mensagem enviada com sucesso!', 'success');
                form.reset();
            } catch (error) {
                showNotification('Erro ao enviar. Tente novamente.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });
    }
    
    /**
     * Sistema de notificações
     */
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            background: var(--bg-card);
            border: 1px solid var(--${type === 'success' ? 'success' : type === 'error' ? 'error' : 'info'});
            border-radius: var(--radius-md);
            color: var(--text-primary);
            box-shadow: var(--shadow-lg);
            z-index: 9999;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(20px)';
            notification.style.transition = 'all 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 4000);
    }
    
    /**
     * Typing effect para hero section
     */
    function initTypingEffect() {
        const typingElement = document.querySelector('.typing-text');
        if (!typingElement) return;
        
        const texts = typingElement.dataset.texts?.split(',') || ['Developer'];
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        
        function type() {
            const currentText = texts[textIndex];
            
            if (isDeleting) {
                typingElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingElement.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }
            
            let typeSpeed = isDeleting ? 50 : 100;
            
            if (!isDeleting && charIndex === currentText.length) {
                typeSpeed = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
                typeSpeed = 500;
            }
            
            setTimeout(type, typeSpeed);
        }
        
        type();
    }
    
    /**
     * Inicialização
     */
    function init() {
        initMobileMenu();
        initSmoothScroll();
        initHeaderScroll();
        initScrollAnimations();
        initActiveNavLink();
        initContactForm();
        initTypingEffect();
        
        console.log('🚀 Portfolio initialized!');
    }
    
    // Inicializa quando o DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    // Expõe função de notificação globalmente
    window.showNotification = showNotification;
})();
