<?php require "../includes/header.php"; ?>

<main>
    <div class="invite-page">
        <div class="invite-header">
            <h1>Nodig een vriend uit</h1>
            <p class="invite-intro">Deel Rydr met je vrienden en verdien samen voordelen.</p>
        </div>

        <div class="referral-program">
            <div class="referral-benefits">
                <h2>Hoe werkt het?</h2>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">👥</div>
                        <h3>Nodig je vrienden uit</h3>
                        <p>Deel je unieke uitnodigingslink met vrienden en familie.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">🎁</div>
                        <h3>Verdien voordelen</h3>
                        <p>Voor elke vriend die zich aanmeldt, krijg je €25 tegoed.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">🚗</div>
                        <h3>Geniet samen</h3>
                        <p>Je vriend krijgt ook €25 korting op hun eerste huur.</p>
                    </div>
                </div>
            </div>

            <div class="referral-form">
                <h2>Deel je uitnodiging</h2>
                <div class="referral-link">
                    <input type="text" value="https://rydr.nl/invite/<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'signup'; ?>" readonly>
                    <button class="button-primary" onclick="copyReferralLink()">Kopieer link</button>
                </div>
                <div class="share-options">
                    <p>Of deel direct via:</p>
                    <div class="social-share">
                        <a href="#" class="share-button">📧 E-mail</a>
                        <a href="#" class="share-button">💬 WhatsApp</a>
                        <a href="#" class="share-button">📱 SMS</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="referral-stats">
            <h2>Je uitnodigingen</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Uitgenodigd</h3>
                    <p class="stat-number">0</p>
                </div>
                <div class="stat-card">
                    <h3>Geregistreerd</h3>
                    <p class="stat-number">0</p>
                </div>
                <div class="stat-card">
                    <h3>Verdiend tegoed</h3>
                    <p class="stat-number">€0</p>
                </div>
            </div>
        </div>

        <div class="referral-cta">
            <h2>Meer weten?</h2>
            <p>Bekijk onze veelgestelde vragen over het uitnodigingsprogramma.</p>
            <a href="/faq" class="button-secondary">Bekijk FAQ</a>
        </div>
    </div>
</main>

<script>
function copyReferralLink() {
    const linkInput = document.querySelector('.referral-link input');
    linkInput.select();
    document.execCommand('copy');
    alert('Link gekopieerd naar klembord!');
}
</script>

<?php require "../includes/footer.php"; ?>
