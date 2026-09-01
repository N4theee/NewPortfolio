<?php
require_once __DIR__ . '/includes/data.php';

// Map of skill icon keys -> [Bootstrap icon class fallback, brand colour, label]
// Add an entry here whenever you introduce a new technology icon in data.php.
$brandIcons = [
    'html5'     => ['devicon-html5-plain',      '#E44D26'],
    'css3'      => ['devicon-css3-plain',       '#264DE4'],
    'js'        => ['devicon-javascript-plain', '#F0DB4F'],
    'php'       => ['devicon-php-plain',        '#8892BF'],
    'python'    => ['devicon-python-plain',     '#3776AB'],
    'mysql'     => ['devicon-mysql-original',   '#00758F'],
    'git'       => ['devicon-git-plain',        '#F05032'],
    'laravel'   => ['devicon-laravel-original', '#FF2D20'],
    'linux'     => ['devicon-linux-plain',      '#FCC624'],
    'bootstrap' => ['devicon-bootstrap-plain',  '#7952B3'],
    'figma'     => ['devicon-figma-plain',      '#A259FF'],
    'java'      => ['devicon-java-plain',       '#EA2D2E'],
];
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($name); ?> | IT Student &amp; Developer</title>
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="keywords" content="IT student portfolio, developer, PHP, web development, cybersecurity, <?php echo htmlspecialchars($name); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($name); ?>">

    <!-- Prevent theme flash: apply saved/preferred theme before first paint -->
    <script>
        (function () {
            var saved = localStorage.getItem('portfolio-theme');
            var theme = saved || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'dark');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main>

    <!-- ============ HERO ============ -->
    <section class="hero" id="home">
        <div class="hero-inner">
            <div class="hero-copy reveal">
                <span class="badge"><i class="bi bi-mortarboard-fill" aria-hidden="true"></i> <?php echo htmlspecialchars($badge); ?></span>
                <h1 class="hero-title"><?php echo htmlspecialchars($heroTitle); ?> <span class="accent-text"><?php echo htmlspecialchars($heroName); ?></span></h1>
                <p class="hero-tagline"><?php echo htmlspecialchars($tagline); ?></p>
                <p class="hero-description"><?php echo htmlspecialchars($description); ?></p>

                <div class="hero-actions">
                    <a href="#projects" class="btn btn-primary">View My Work <i class="bi bi-arrow-right btn-arrow" aria-hidden="true"></i></a>
                    <a href="#contact" class="btn btn-outline">Contact Me <i class="bi bi-person-lines-fill" aria-hidden="true"></i></a>
                </div>

                <div class="hero-social">
                    <?php foreach ($socialLinks as $link): ?>
                        <a href="<?php echo htmlspecialchars($link['url']); ?>" class="social-icon" aria-label="<?php echo htmlspecialchars($link['label']); ?>" target="_blank" rel="noopener">
                            <i class="bi <?php echo htmlspecialchars($link['icon']); ?>" aria-hidden="true"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="hero-visual reveal">
                <div class="hero-frame">
                    <!-- Decorative circuit pattern behind the portrait -->
                    <svg class="hero-circuit" viewBox="0 0 400 400" aria-hidden="true">
                        <g fill="none" stroke="currentColor" stroke-width="1.5" opacity="0.5">
                            <path d="M20 60 H140 V140 H260 V60 H380"></path>
                            <path d="M20 200 H100 V320 H220 V260 H380"></path>
                            <path d="M20 340 H180 V380"></path>
                            <circle cx="140" cy="60" r="4" fill="currentColor" stroke="none"></circle>
                            <circle cx="260" cy="140" r="4" fill="currentColor" stroke="none"></circle>
                            <circle cx="100" cy="200" r="4" fill="currentColor" stroke="none"></circle>
                            <circle cx="220" cy="320" r="4" fill="currentColor" stroke="none"></circle>
                            <circle cx="180" cy="340" r="4" fill="currentColor" stroke="none"></circle>
                        </g>
                    </svg>

                    <!--
                        PROFILE IMAGE SWAP FEATURE
                        ---------------------------------
                        Two <img> tags are stacked in the same spot. CSS + script.js
                        cross-fade between them based on [data-theme] on <html>.
                        Replace the files at:
                          assets/images/profile-dark.png   (black outfit)
                          assets/images/profile-light.png  (white outfit)
                        Keep both images the same crop/aspect ratio for a clean swap.
                    -->
                    <div class="profile-swap">
                        <img src="assets/images/profile-dark.png"
                             alt="<?php echo htmlspecialchars($name); ?> portrait, dark mode"
                             class="profile-img profile-img-dark"
                             onerror="this.src='assets/images/profile-fallback.svg'">
                        <img src="assets/images/profile-light.png"
                             alt="<?php echo htmlspecialchars($name); ?> portrait, light mode"
                             class="profile-img profile-img-light"
                             onerror="this.src='assets/images/profile-fallback.svg'">
                    </div>

                    <div class="status-badge">
                        <span class="status-dot" aria-hidden="true"></span>
                        <?php echo htmlspecialchars($availability); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ ABOUT + SKILLS ============ -->
    <section class="section" id="about">
        <div class="section-grid two-col">

            <div class="card about-card reveal">
                <h2 class="card-title"><i class="bi bi-person-badge" aria-hidden="true"></i> About Me</h2>
                <p class="about-text"><?php echo htmlspecialchars($bio1); ?></p>
                <p class="about-text"><?php echo htmlspecialchars($bio2); ?></p>

                <div class="about-info-row">
                    <?php foreach ($aboutInfo as $info): ?>
                        <div class="about-info-item">
                            <i class="bi <?php echo htmlspecialchars($info['icon']); ?>" aria-hidden="true"></i>
                            <div>
                                <span class="info-label"><?php echo htmlspecialchars($info['label']); ?></span>
                                <span class="info-value"><?php echo htmlspecialchars($info['value']); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="card skills-card reveal" id="skills">
                <div class="card-header-row">
                    <h2 class="card-title"><i class="bi bi-grid-1x2" aria-hidden="true"></i> Skills</h2>
                    <a href="#projects" class="link-view-all">View All <i class="bi bi-chevron-right" aria-hidden="true"></i></a>
                </div>

                <div class="skills-grid">
                    <?php foreach ($skills as $skill):
                        $iconKey = $skill['icon'];
                        $iconClass = isset($brandIcons[$iconKey]) ? $brandIcons[$iconKey][0] : 'bi-code-slash';
                        $iconColor = isset($brandIcons[$iconKey]) ? $brandIcons[$iconKey][1] : '#6C4DFF';
                    ?>
                        <div class="skill-chip">
                            <div class="skill-icon" style="--icon-color: <?php echo htmlspecialchars($iconColor); ?>">
                                <i class="<?php echo htmlspecialchars($iconClass); ?>" aria-hidden="true"></i>
                            </div>
                            <span class="skill-name"><?php echo htmlspecialchars($skill['name']); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
     AI-ASSISTED DEVELOPMENT
============================================================ -->

<section class="section" id="ai-development">

    <div class="section-header reveal">

        <div>

            <span class="section-label">
                DEVELOPMENT WORKFLOW
            </span>

            <h2 class="section-title">
                <i class="bi bi-stars"></i>
                AI-Assisted Development
            </h2>

            <p class="section-description">
                I use AI as a development support tool for problem-solving,
                debugging, research, planning, and documentation while
                reviewing and validating the solutions I implement.
            </p>

        </div>

    </div>


    <div class="ai-grid">

        <?php foreach ($aiDevelopment as $item): ?>

            <div class="ai-card reveal">

                <div class="ai-icon">
                    <i class="bi <?php echo htmlspecialchars($item['icon']); ?>"></i>
                </div>

                <h3>
                    <?php echo htmlspecialchars($item['title']); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($item['description']); ?>
                </p>

            </div>

        <?php endforeach; ?>

    </div>

</section>

    <!-- ============ FEATURED PROJECTS ============ -->
    <section class="section" id="projects">
        <div class="section-header reveal">
            <h2 class="section-title"><i class="bi bi-folder2-open" aria-hidden="true"></i> Featured Projects</h2>
            <a href="https://drive.google.com/drive/folders/1ofRsrBU91XtTBlNN4GhQ_F2hENRoGdid" class="link-view-all">View All Projects <i class="bi bi-chevron-right" aria-hidden="true"></i></a>
        </div>

        <div class="projects-grid">
            <?php foreach ($projects as $index => $project): ?>
                <article class="project-card reveal" data-project-index="<?php echo $index; ?>" tabindex="0" role="button" aria-label="View details for <?php echo htmlspecialchars($project['title']); ?>">
                    <div class="project-image-wrap">
                        <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="Screenshot of <?php echo htmlspecialchars($project['title']); ?>" class="project-image" loading="lazy">
                    </div>
                    <div class="project-body">
                        <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p class="project-description"><?php echo htmlspecialchars($project['description']); ?></p>
                        <div class="project-tech">
                            <?php foreach ($project['technologies'] as $tech): ?>
                                <span class="tech-badge"><?php echo htmlspecialchars($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="project-actions">
                            <button type="button" class="btn btn-primary btn-sm project-view-btn">View Project</button>
                            <?php if (!empty($project['github'])): ?>
                                <a href="<?php echo htmlspecialchars($project['github']); ?>" class="btn btn-outline btn-sm" target="_blank" rel="noopener" onclick="event.stopPropagation()">
                                    <i class="bi bi-github" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- ============ RESUME ============ -->
    <section class="section" id="resume">
        <div class="card cv-card resume-download-card reveal">
            <div>
                <span class="section-label">RESUME</span>
                <h2 class="card-title"><i class="bi bi-file-earmark-arrow-down" aria-hidden="true"></i> Download My CV</h2>
                <p class="about-text">Download a copy of my resume in PDF format.</p>
            </div>
            <div class="cv-card-bottom">
                <a href="<?php echo htmlspecialchars($resume['path']); ?>" download="<?php echo htmlspecialchars($resume['filename']); ?>" class="btn btn-primary">
                    Download CV <i class="bi bi-download" aria-hidden="true"></i>
                </a>
                <i class="bi bi-file-earmark-pdf cv-icon" aria-hidden="true"></i>
            </div>
        </div>
    </section>

    <!-- ============ CERTIFICATIONS ============ -->
    <section class="section" id="certificates">
        <div class="section-header reveal">
            <h2 class="section-title"><i class="bi bi-patch-check" aria-hidden="true"></i> Certifications</h2>
        </div>

        <div class="certs-grid">
            <?php foreach ($certificates as $cert): ?>
                <div class="cert-card reveal">
                    <img src="<?php echo htmlspecialchars($cert['image']); ?>" alt="<?php echo htmlspecialchars($cert['title']); ?> certificate" class="cert-image" loading="lazy">
                    <div class="cert-body">
                        <h3 class="cert-title"><?php echo htmlspecialchars($cert['title']); ?></h3>
                        <p class="cert-meta"><?php echo htmlspecialchars($cert['issuer']); ?> &middot; <?php echo htmlspecialchars($cert['date']); ?></p>
                        <a href="<?php echo htmlspecialchars($cert['link']); ?>" class="link-view-all" target="_blank" rel="noopener">View Certificate <i class="bi bi-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ============ CONTACT ============ -->
    <section class="section" id="contact">
        <div class="section-grid two-col">

            <div class="card contact-info-card reveal">
                <h2 class="card-title"><i class="bi bi-chat-dots" aria-hidden="true"></i> Get In Touch</h2>
                <p class="about-text">Have an opportunity, a question, or just want to say hi? My inbox is open.</p>

                <ul class="contact-list">
                    <li><i class="bi bi-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>"><?php echo htmlspecialchars($contact['email']); ?></a></li>
                    <li><i class="bi bi-github" aria-hidden="true"></i> <a href="<?php echo htmlspecialchars($contact['github']); ?>" target="_blank" rel="noopener">GitHub</a></li>
                    <li><i class="bi bi-linkedin" aria-hidden="true"></i> <a href="<?php echo htmlspecialchars($contact['linkedin']); ?>" target="_blank" rel="noopener">LinkedIn</a></li>
                    <li><i class="bi bi-geo-alt" aria-hidden="true"></i> <?php echo htmlspecialchars($contact['location']); ?></li>
                </ul>
            </div>

            <div class="card contact-form-card reveal">
                <h2 class="card-title"><i class="bi bi-send" aria-hidden="true"></i> Send a Message</h2>

                <div id="formStatus" class="form-status" role="status" aria-live="polite"></div>

                <form id="contactForm" class="contact-form" action="contact-handler.php" method="POST" novalidate>
                    <div class="form-row">
                        <label for="cf-name">Name</label>
                        <input type="text" id="cf-name" name="name" required maxlength="100" autocomplete="name">
                    </div>
                    <div class="form-row">
                        <label for="cf-email">Email</label>
                        <input type="email" id="cf-email" name="email" required maxlength="150" autocomplete="email">
                    </div>
                    <div class="form-row">
                        <label for="cf-subject">Subject</label>
                        <input type="text" id="cf-subject" name="subject" required maxlength="150">
                    </div>
                    <div class="form-row">
                        <label for="cf-message">Message</label>
                        <textarea id="cf-message" name="message" rows="5" required maxlength="2000"></textarea>
                    </div>
                    <!-- Honeypot field for basic bot protection, hidden from real users via CSS -->
                    <div class="form-row honeypot" aria-hidden="true">
                        <label for="cf-website">Website</label>
                        <input type="text" id="cf-website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <button type="submit" class="btn btn-primary btn-full" id="contactSubmit">
                        Send Message <i class="bi bi-send-fill" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<script>
    // Project features/demo links, made available to script.js for the modal.
    // Generated automatically from $projects in includes/data.php — no manual editing needed.
    window.PROJECT_FEATURES = <?php echo json_encode(array_map(function ($p) { return $p['features'] ?? []; }, $projects)); ?>;
    window.PROJECT_DEMOS = <?php echo json_encode(array_map(function ($p) { return $p['demo'] ?? '#'; }, $projects)); ?>;

</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
