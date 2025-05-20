<?php
$root_path = $_SERVER['DOCUMENT_ROOT'];
require $root_path . "/includes/header.php";
?>

<main class="help-page">
    <section class="hero-section">
        <img src="/assets/images/car-rent-header-image-1.png" alt="Rydr klantenservice" class="hero-image">
        <div class="hero-overlay">
            <h1>Hulp nodig?</h1>
            <p>We staan voor je klaar</p>
        </div>
    </section>

    <section class="help-options">
        <div class="container">
            <div class="help-grid">
                <div class="help-card">
                    <h3>Direct contact</h3>
                    <p>Bel ons direct op:</p>
                    <a href="tel:0101234567" class="phone-number">010-123 45 67</a>
                    <p class="availability">Beschikbaar: Ma-Vr 8:00-20:00, Za-Zo 9:00-18:00</p>
                </div>

                <div class="help-card">
                    <img src="/assets/images/icons/message.svg" alt="Chat">
                    <h3>Live chat</h3>
                    <p>Start een gesprek met een van onze medewerkers</p>
                    <button class="button-primary" onclick="startChat()">Start chat</button>
                </div>

                <div class="help-card">
                    <h3>E-mail</h3>
                    <p>Stuur ons een e-mail en we reageren binnen 24 uur</p>
                    <a href="mailto:info@rydr.nl" class="email-link">info@rydr.nl</a>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <h2>Veelgestelde vragen</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <img src="/assets/images/car-rent-header-image-2.png" alt="Auto reserveren" class="faq-image">
                    <h3>Hoe kan ik een auto reserveren?</h3>
                    <p>Selecteer een auto uit ons aanbod, kies je gewenste datum en tijd, en voltooi de reservering via ons online systeem. Je ontvangt direct een bevestiging per e-mail.</p>
                </div>

                <div class="faq-item">
                    <img src="/assets/images/work-place.png" alt="Huurvoorwaarden" class="faq-image">
                    <h3>Wat zijn de huurvoorwaarden?</h3>
                    <p>Je moet minimaal 21 jaar zijn en een geldig rijbewijs hebben. We accepteren creditcards en bankpassen als betalingsmethode. Bekijk onze volledige voorwaarden voor meer informatie.</p>
                </div>

                <div class="faq-item">
                    <img src="/assets/images/hoofdvestiging.png" alt="Vestiging" class="faq-image">
                    <h3>Kan ik de reservering annuleren?</h3>
                    <p>Ja, je kunt tot 24 uur voor de geplande ophaaldatum kosteloos annuleren. Bij latere annulering kunnen er kosten in rekening worden gebracht.</p>
                </div>

                <div class="faq-item">
                    <img src="/assets/images/koenigsegg.jpeg" alt="Auto verzekering" class="faq-image">
                    <h3>Wat gebeurt er bij schade?</h3>
                    <p>Alle auto's zijn verzekerd tegen schade. Bij een ongeluk bel je direct onze 24/7 hulplijn. We helpen je met alle formaliteiten en zorgen voor een vervangende auto indien nodig.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form">
        <div class="container">
            <h2>Stel je vraag</h2>
            <form action="/includes/process-help.php" method="POST" class="help-form">
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Onderwerp</label>
                    <select id="subject" name="subject" required>
                        <option value="">Kies een onderwerp</option>
                        <option value="reservering">Reservering</option>
                        <option value="betaling">Betaling</option>
                        <option value="schade">Schade</option>
                        <option value="overig">Overig</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Bericht</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="button-primary">Verstuur</button>
            </form>
        </div>
    </section>
</main>

<script>
function startChat() {
    // Hier komt de chat functionaliteit
    alert('Chat wordt binnenkort beschikbaar!');
}
</script>

<?php require $root_path . "/includes/footer.php"; ?>
