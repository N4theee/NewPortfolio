<header class="site-header" id="siteHeader">
    <div class="header-inner">
        <a href="#home" class="brand">
            <span class="brand-mark">N</span>
            <span class="brand-text">
                <span class="brand-name"><?php echo htmlspecialchars($name); ?></span>
                <span class="brand-role"><?php echo htmlspecialchars($role); ?></span>
            </span>
        </a>

        <nav class="main-nav" id="mainNav" aria-label="Primary">
            <ul class="nav-list">
                <li><a href="#home" class="nav-link active" data-section="home">Home</a></li>
                <li><a href="#about" class="nav-link" data-section="about">About</a></li>
                <li><a href="#skills" class="nav-link" data-section="skills">Skills</a></li>
                <li><a href="#projects" class="nav-link" data-section="projects">Projects</a></li>
                <li><a href="#experience" class="nav-link" data-section="experience">Experience</a></li>
                <li><a href="#certificates" class="nav-link" data-section="certificates">Certificates</a></li>
                <li><a href="#contact" class="nav-link" data-section="contact">Contact</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <button type="button" class="theme-toggle" id="themeToggle" aria-label="Switch to light mode" aria-pressed="false">
                <i class="bi bi-moon-stars-fill theme-icon theme-icon-moon" aria-hidden="true"></i>
                <i class="bi bi-sun-fill theme-icon theme-icon-sun" aria-hidden="true"></i>
                <span class="theme-toggle-thumb"></span>
            </button>

            <button type="button" class="hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false" aria-controls="mobileNav">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <!-- Mobile navigation -->
    <nav class="mobile-nav" id="mobileNav" aria-label="Mobile">
        <ul class="mobile-nav-list">
            <li><a href="#home" class="mobile-nav-link" data-section="home">Home</a></li>
            <li><a href="#about" class="mobile-nav-link" data-section="about">About</a></li>
            <li><a href="#skills" class="mobile-nav-link" data-section="skills">Skills</a></li>
            <li><a href="#projects" class="mobile-nav-link" data-section="projects">Projects</a></li>
            <li><a href="#experience" class="mobile-nav-link" data-section="experience">Experience</a></li>
            <li><a href="#certificates" class="mobile-nav-link" data-section="certificates">Certificates</a></li>
            <li><a href="#contact" class="mobile-nav-link" data-section="contact">Contact</a></li>
        </ul>
    </nav>
</header>
