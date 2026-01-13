<section id="experience" class="section">
    <div class="section-header">
        <h2 class="section-title"><?php echo t('experience_title'); ?></h2>
        <p class="section-subtitle"><?php echo t('experience_subtitle'); ?></p>
    </div>
    
    <div class="experience-timeline">
        <!-- BLACK ANGS -->
        <div class="experience-item">
            <div class="experience-marker">
                <div class="experience-dot"></div>
                <div class="experience-line"></div>
            </div>
            <div class="experience-content card">
                <div class="experience-header">
                    <div class="experience-info">
                        <h3 class="experience-title"><?php echo t('exp_founder'); ?></h3>
                        <p class="experience-company">BLACK ANGS</p>
                    </div>
                    <span class="experience-date">2025 - <?php echo t('experience_present'); ?></span>
                </div>
                <p class="experience-description">
                    <?php echo t('exp_blackangs_desc'); ?>
                </p>
                <div class="experience-tags">
                    <span class="tag tag-primary"><?php echo t('tag_redteam'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_pentest'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_consultoria'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_security'); ?></span>
                </div>
            </div>
        </div>
        
        <!-- OWASP BH -->
        <div class="experience-item">
            <div class="experience-marker">
                <div class="experience-dot"></div>
                <div class="experience-line"></div>
            </div>
            <div class="experience-content card">
                <div class="experience-header">
                    <div class="experience-info">
                        <h3 class="experience-title"><?php echo t('exp_member'); ?></h3>
                        <p class="experience-company">OWASP Belo Horizonte</p>
                    </div>
                    <span class="experience-date">2025 - <?php echo t('experience_present'); ?></span>
                </div>
                <p class="experience-description">
                    <?php echo t('exp_owasp_desc'); ?>
                </p>
                <div class="experience-tags">
                    <span class="tag tag-primary"><?php echo t('tag_owasp'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_websecurity'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_community'); ?></span>
                </div>
            </div>
        </div>
        
        <!-- Formming Hackers -->
        <div class="experience-item">
            <div class="experience-marker">
                <div class="experience-dot"></div>
                <div class="experience-line"></div>
            </div>
            <div class="experience-content card">
                <div class="experience-header">
                    <div class="experience-info">
                        <h3 class="experience-title"><?php echo t('exp_volunteer'); ?></h3>
                        <p class="experience-company">Formming Hackers</p>
                    </div>
                    <span class="experience-date">2025 - <?php echo t('experience_present'); ?></span>
                </div>
                <p class="experience-description">
                    <?php echo t('exp_formming_desc'); ?>
                </p>
                <div class="experience-tags">
                    <span class="tag tag-primary"><?php echo t('tag_volunteer'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_education'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_cybersecurity'); ?></span>
                </div>
            </div>
        </div>
        
        <!-- Formação -->
        <div class="experience-item">
            <div class="experience-marker">
                <div class="experience-dot"></div>
            </div>
            <div class="experience-content card">
                <div class="experience-header">
                    <div class="experience-info">
                        <h3 class="experience-title"><?php echo t('exp_academic'); ?></h3>
                        <p class="experience-company">CEDUP PE. AFFONSO ROBL</p>
                    </div>
                    <span class="experience-date">2024 - 2026</span>
                </div>
                <p class="experience-description">
                    <?php echo t('exp_cedup_desc'); ?>
                </p>
                <div class="experience-tags">
                    <span class="tag tag-primary"><?php echo t('tag_development'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_highschool'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_technical'); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.experience-timeline {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
}

.experience-item {
    display: flex;
    gap: var(--space-lg);
    margin-bottom: var(--space-xl);
}

.experience-item:last-child {
    margin-bottom: 0;
}

.experience-marker {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex-shrink: 0;
}

.experience-dot {
    width: 18px;
    height: 18px;
    background: var(--gradient-primary);
    border-radius: 50%;
    box-shadow: var(--shadow-glow);
    z-index: 1;
}

.experience-line {
    flex: 1;
    width: 3px;
    background: var(--border-color);
    margin-top: var(--space-sm);
}

.experience-content {
    flex: 1;
    padding: var(--space-xl);
}

.experience-content:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-glow);
}

.experience-header {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
    margin-bottom: var(--space-md);
}

.experience-title {
    font-size: 1.3rem;
    color: var(--text-primary);
    margin: 0;
    font-weight: 700;
}

.experience-company {
    color: var(--purple-light);
    font-weight: 600;
    font-size: 1.05rem;
    margin: 0;
}

.experience-date {
    font-size: 0.9rem;
    color: var(--text-muted);
    background: var(--bg-tertiary);
    padding: var(--space-xs) var(--space-md);
    border-radius: var(--radius-full);
    width: fit-content;
    border: 1px solid var(--border-color);
}

.experience-description {
    color: var(--text-secondary);
    margin-bottom: var(--space-md);
    line-height: 1.8;
    font-size: 1rem;
}

.experience-tags {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-sm);
}

@media (min-width: 768px) {
    .experience-header {
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
    }
}
</style>
