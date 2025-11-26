    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3><i class="fas fa-bullseye"></i> Teer Results</h3>
                    <p>Your trusted source for live Teer results, predictions, and analysis. Get accurate and real-time updates for all major Teer games.</p>
                    <div class="social-links">
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/premium.php">Premium Features</a></li>
                        <li><a href="/support.php">Support & FAQ</a></li>
                        <li><a href="/download.php">Download App</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Teer Games</h4>
                    <ul>
                        <li><a href="/game.php?game=shillong-teer">Shillong Teer</a></li>
                        <li><a href="/game.php?game=khanapara-teer">Khanapara Teer</a></li>
                        <li><a href="/game.php?game=juwai-teer">Juwai Teer</a></li>
                        <li><a href="/game.php?game=shillong-night">Shillong Night</a></li>
                        <li><a href="/game.php?game=bhutan-teer">Bhutan Teer</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="/terms.php">Terms & Conditions</a></li>
                        <li><a href="/privacy.php">Privacy Policy</a></li>
                    </ul>
                    <h4 class="mt-3">Contact</h4>
                    <p><i class="fas fa-envelope"></i> <?php echo SUPPORT_EMAIL; ?></p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Teer Khela Results. All rights reserved.</p>
                <p class="disclaimer">Disclaimer: This website is for informational purposes only. Please check local laws regarding lottery games.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" target="_blank" class="whatsapp-btn">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
            document.getElementById('navMenu').classList.toggle('active');
        });
    </script>

    <?php if (isset($extraScripts)): ?>
    <?php echo $extraScripts; ?>
    <?php endif; ?>
</body>
</html>
