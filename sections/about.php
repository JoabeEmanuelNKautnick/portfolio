<section id="about" class="section">
    <div class="section-header">
        <h2 class="section-title"><?php echo t('about_title'); ?></h2>
        <p class="section-subtitle"><?php echo t('about_subtitle'); ?></p>
    </div>
    
    <div class="about-content">
        <div class="about-image">
            <div class="about-image-wrapper">
                <div class="carousel">
                    <img src="assets/img/profile-1.png" alt="Profile 1" class="carousel-image active">
                    <img src="assets/img/profile-2.png" alt="Profile 2" class="carousel-image">
                    <img src="assets/img/profile-3.png" alt="Profile 3" class="carousel-image">
                </div>
                <div class="carousel-dots">
                    <span class="dot active" data-slide="0"></span>
                    <span class="dot" data-slide="1"></span>
                    <span class="dot" data-slide="2"></span>
                </div>
            </div>
            <div class="about-image-decoration"></div>
        </div>
        
        <div class="about-text-content">
            <p class="about-description">
                <?php echo t('about_text'); ?>
            </p>
            
            <div class="about-info">
                <div class="about-info-item">
                    <span class="about-info-icon">📍</span>
                    <span class="about-info-text"><?php echo t('about_location'); ?></span>
                </div>
                <div class="about-info-item">
                    <span class="about-info-icon">🎓</span>
                    <span class="about-info-text"><?php echo t('about_education'); ?></span>
                </div>
                <div class="about-info-item">
                    <span class="about-info-icon">🔴</span>
                    <span class="about-info-text"><?php echo t('about_role'); ?></span>
                </div>
                <div class="about-info-item">
                    <span class="about-info-icon">👤</span>
                    <span class="about-info-text"><?php echo t('about_aka'); ?></span>
                </div>
                <div class="about-info-item">
                    <span class="about-info-icon">🌐</span>
                    <span class="about-info-text"><?php echo t('about_owasp'); ?></span>
                </div>
            </div>
            
            <div class="about-cta">
                <a href="#contact" class="btn btn-primary"><?php echo t('hero_cta_secondary'); ?></a>
                <a href="#projects" class="btn btn-secondary"><?php echo t('hero_cta_primary'); ?></a>
            </div>
        </div>
    </div>
</section>

<style>
.about-content {
    display: grid;
    gap: var(--space-2xl);
    align-items: center;
}

.about-image {
    position: relative;
    display: flex;
    justify-content: center;
}

.about-image-wrapper {
    position: relative;
    z-index: 2;
    width: 250px;
    height: 250px;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 3px solid var(--purple-medium);
    background: var(--bg-tertiary);
    box-shadow: 0 10px 40px rgba(124, 58, 237, 0.3),
                0 0 60px rgba(37, 99, 235, 0.2);
    transition: all var(--transition-normal);
}

.about-image-wrapper:hover {
    transform: scale(1.05) rotate(2deg);
    box-shadow: 0 15px 50px rgba(124, 58, 237, 0.4),
                0 0 80px rgba(37, 99, 235, 0.3);
}

.carousel {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.carousel-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.carousel-image.active {
    opacity: 1;
}

.carousel-dots {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
    z-index: 10;
}

.dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.8);
}

.dot:hover {
    background: rgba(255, 255, 255, 0.8);
    transform: scale(1.2);
}

.dot.active {
    background: var(--purple-medium);
    border-color: var(--purple-light);
    box-shadow: 0 0 10px rgba(124, 58, 237, 0.6);
}

.about-image-decoration {
    position: absolute;
    top: 20px;
    left: calc(50% - 105px);
    width: 250px;
    height: 250px;
    border: 3px solid var(--blue-medium);
    border-radius: var(--radius-xl);
    z-index: 1;
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.about-text-content {
    text-align: center;
}

.about-description {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-secondary);
    margin-bottom: var(--space-xl);
}

.about-info {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-md);
    margin-bottom: var(--space-xl);
}

.about-info-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-sm) var(--space-md);
    background: var(--bg-tertiary);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-full);
    color: var(--text-secondary);
    font-size: 0.9rem;
    transition: all var(--transition-fast);
    position: relative;
    overflow: hidden;
}

.about-info-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(124, 58, 237, 0.1), transparent);
    transition: left 0.5s;
}

.about-info-item:hover::before {
    left: 100%;
}

.about-info-item:hover {
    border-color: var(--purple-medium);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.2);
}

.about-info-icon {
    font-size: 1.1rem;
}

.about-cta {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-md);
}

@media (min-width: 768px) {
    .about-content {
        grid-template-columns: 300px 1fr;
        text-align: left;
    }
    
    .about-text-content {
        text-align: left;
    }
    
    .about-info {
        justify-content: flex-start;
    }
    
    .about-cta {
        justify-content: flex-start;
    }
    
    .about-image-decoration {
        left: 20px;
    }
}
</style>

<script>
// Carousel functionality
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('.carousel-image');
    const dots = document.querySelectorAll('.dot');
    let currentSlide = 0;
    const slideInterval = 8000; // 8 segundos
    let autoPlayInterval;

    function showSlide(index) {
        images.forEach(img => img.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        images[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % images.length;
        showSlide(currentSlide);
    }

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, slideInterval);
    }

    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    // Click nos dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopAutoPlay();
            showSlide(index);
            startAutoPlay();
        });
    });

    // Pausar no hover
    const carouselWrapper = document.querySelector('.about-image-wrapper');
    carouselWrapper.addEventListener('mouseenter', stopAutoPlay);
    carouselWrapper.addEventListener('mouseleave', startAutoPlay);

    // Iniciar autoplay
    startAutoPlay();
});
</script>
