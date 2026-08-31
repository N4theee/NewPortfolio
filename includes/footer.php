    <footer class="site-footer">
        <div class="footer-inner">
            <p class="footer-copy">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($name); ?>. All rights reserved.</p>

            <nav class="footer-nav" aria-label="Footer">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </nav>

            <button type="button" class="back-to-top" id="backToTop" aria-label="Back to top">
                <i class="bi bi-arrow-up" aria-hidden="true"></i>
            </button>
        </div>
    </footer>

    <!-- Project modal -->
    <div class="modal-overlay" id="projectModal" aria-hidden="true">
        <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <button type="button" class="modal-close" id="modalClose" aria-label="Close project details">
                <i class="bi bi-x-lg" aria-hidden="true"></i>
            </button>
            <div class="modal-image-wrap">
                <img src="" alt="" id="modalImage" class="modal-image">
            </div>
            <div class="modal-content">
                <h3 id="modalTitle" class="modal-title"></h3>
                <p id="modalDescription" class="modal-description"></p>

                <div class="modal-tech" id="modalTech"></div>

                <div class="modal-features-wrap">
                    <h4 class="modal-subheading">Key features</h4>
                    <ul class="modal-features" id="modalFeatures"></ul>
                </div>

                <div class="modal-links">
                    <a href="#" id="modalDemo" class="btn btn-primary" target="_blank" rel="noopener">
                        Live Demo <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i>
                    </a>
                    <a href="#" id="modalGithub" class="btn btn-outline" target="_blank" rel="noopener">
                        <i class="bi bi-github" aria-hidden="true"></i> GitHub
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
