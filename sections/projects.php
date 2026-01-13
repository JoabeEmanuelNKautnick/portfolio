<section id="projects" class="section">
    <div class="section-header">
        <h2 class="section-title"><?php echo t('projects_title'); ?></h2>
        <p class="section-subtitle"><?php echo t('projects_subtitle'); ?></p>
    </div>
    
    <div class="projects-container">
        <!-- Projeto Principal -->
        <article class="project-featured card">
            <div class="project-image">
                <div class="project-image-placeholder">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                </div>
            </div>
            <div class="project-content">
                <span class="project-badge"><?php echo t('project_featured'); ?></span>
                <h3 class="project-title"><?php echo t('project_idor_title'); ?></h3>
                <p class="project-description">
                    <?php echo t('project_idor_desc'); ?>
                </p>
                <div class="project-features">
                    <div class="feature-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                        </svg>
                        <span><?php echo t('project_feature_idor'); ?></span>
                    </div>
                    <div class="feature-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                        </svg>
                        <span><?php echo t('project_feature_access'); ?></span>
                    </div>
                    <div class="feature-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                        </svg>
                        <span><?php echo t('project_feature_mitigations'); ?></span>
                    </div>
                    <div class="feature-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                        </svg>
                        <span><?php echo t('project_feature_educational'); ?></span>
                    </div>
                </div>
                <div class="project-tags">
                    <span class="tag tag-primary"><?php echo t('tag_security'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_api'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_owasp10'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_pentest'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_idor'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_accesscontrol'); ?></span>
                </div>
                <div class="project-links">
                    <a href="#" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
                        </svg>
                        <?php echo t('project_view_docs'); ?>
                    </a>
                    <a href="#" class="btn btn-secondary" target="_blank" rel="noopener noreferrer">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                        </svg>
                        <?php echo t('project_source_code'); ?>
                    </a>
                </div>
            </div>
        </article>
        
        <!-- Portfólio -->
        <article class="project-card card">
            <div class="project-content">
                <h3 class="project-title">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                    </svg>
                    <?php echo t('project_portfolio_title'); ?>
                </h3>
                <p class="project-description">
                    <?php echo t('project_portfolio_desc'); ?>
                </p>
                <div class="project-tags">
                    <span class="tag tag-primary"><?php echo t('tag_php'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_javascript'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_css'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_i18n'); ?></span>
                    <span class="tag tag-primary"><?php echo t('tag_security'); ?></span>
                </div>
            </div>
        </article>
    </div>
</section>

<style>
.projects-container {
    display: grid;
    gap: var(--space-2xl);
    max-width: 1200px;
    margin: 0 auto;
}

.project-featured {
    display: grid;
    gap: var(--space-xl);
    padding: 0;
    overflow: hidden;
    border: 2px solid var(--purple-medium);
}

.project-image {
    width: 100%;
    height: 280px;
    background: var(--bg-tertiary);
    display: flex;
    align-items: center;
    justify-content: center;
}

.project-image-placeholder {
    background: var(--gradient-subtle);
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
}

.project-content {
    padding: var(--space-xl);
}

.project-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-xs);
    padding: var(--space-xs) var(--space-md);
    background: var(--gradient-primary);
    color: white;
    border-radius: var(--radius-full);
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: var(--space-md);
}

.project-title {
    font-size: 1.8rem;
    color: var(--text-primary);
    margin-bottom: var(--space-md);
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.project-description {
    color: var(--text-secondary);
    font-size: 1.05rem;
    line-height: 1.8;
    margin-bottom: var(--space-lg);
}

.project-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
}

.feature-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.feature-item svg {
    color: var(--purple-light);
    flex-shrink: 0;
}

.project-tags {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-sm);
    margin-bottom: var(--space-lg);
}

.project-links {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-md);
}

.project-links .btn {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
}

.project-card {
    padding: var(--space-xl);
}

.project-card .project-title {
    font-size: 1.4rem;
}

@media (min-width: 768px) {
    .project-featured {
        grid-template-columns: 1fr 1.2fr;
    }
    
    .project-image {
        height: auto;
    }
}
</style>
