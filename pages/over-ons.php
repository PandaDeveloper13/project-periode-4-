<?php 
$root_path = $_SERVER['DOCUMENT_ROOT'];
require $root_path . "/includes/header.php"; 
?>
<main class="over-ons-page">
    <section class="hero-section">
        <img src="/assets/images/banner.jpeg" alt="Rydr banner afbeelding" class="banner-image">
        <div class="hero-overlay">
            <h1>Over Rydr.</h1>
            <p>Jouw betrouwbare partner voor autoverhuur in Nederland</p>
        </div>
    </section>
    
    <section class="company-info">
        <div class="grid">
            <div class="row">
                <div class="col">
                    <h2>Ons verhaal</h2>
                    <p>Rydr is in 2018 opgericht met een duidelijke missie: autoverhuur toegankelijker, transparanter en duurzamer maken. We zijn begonnen als een klein bedrijf in Rotterdam, maar zijn inmiddels uitgegroeid tot een van de meest toonaangevende autoverhuurbedrijven in Nederland.</p>
                    <p>Ons hoofdkantoor bevindt zich in het bruisende hart van Rotterdam, direct naast het Centraal Station. Hier combineren we technologie, design en klantgerichtheid onder één dak. In een modern pand met uitzicht op de skyline werken we elke dag aan de mobiliteit van morgen.</p>
                </div>
                <div class="col">
                    <img src="/assets/images/hoofdvestiging.png" alt="Rydr hoofdvestiging in Rotterdam" class="office-image">
                </div>
            </div>
        </div>
    </section>

    <section class="mission-values">
        <div class="container">
            <h2>Onze missie & waarden</h2>
            <div class="values-grid">
                <div class="value-card">
                    <h3>Duurzaamheid</h3>
                    <p>We investeren continu in een groene vloot en klimaatneutrale bedrijfsvoering om onze ecologische voetafdruk te verkleinen.</p>
                </div>
                <div class="value-card">
                    <h3>Transparantie</h3>
                    <p>Bij Rydr weet je precies waar je aan toe bent. Geen verborgen kosten of kleine lettertjes, maar eerlijke prijzen.</p>
                </div>
                <div class="value-card">
                    <h3>Innovatie</h3>
                    <p>We omarmen nieuwe technologieën om de huurervaring zo eenvoudig en plezierig mogelijk te maken voor onze klanten.</p>
                </div>
                <div class="value-card">
                    <h3>Klantvriendelijkheid</h3>
                    <p>De klant staat bij ons altijd centraal. We streven naar de hoogste klanttevredenheid in de branche.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="our-team" id="team">
        <div class="container">
            <h2>Ons team</h2>
            <p class="team-intro">Maak kennis met de mensen achter Rydr die elke dag klaarstaan om jou de beste service te bieden.</p>
            
            <div class="team-grid">
                <div class="team-member">
                    <img src="/assets/images/team/jasper-van-den-brink.png" alt="Jasper van den Brink">
                    <h3>Jasper van den Brink</h3>
                    <p class="title">CEO & Oprichter</p>
                    <p class="bio">Jasper heeft meer dan 15 jaar ervaring in de mobiliteitsbranche en is de drijvende kracht achter de innovatieve aanpak van Rydr.</p>
                </div>
                
                <div class="team-member">
                    <img src="/assets/images/team/lotte-de-graaf.png" alt="Lotte de Graaf">
                    <h3>Lotte de Graaf</h3>
                    <p class="title">Hoofd Klantenservice</p>
                    <p class="bio">Lotte zorgt ervoor dat onze klanten altijd de beste service krijgen en leidt ons klantenserviceteam met passie en toewijding.</p>
                </div>

                <div class="team-member">
                    <img src="/assets/images/team/brian-mensah.png" alt="Brian Mensah">
                    <h3>Brian Mensah</h3>
                    <p class="title">Hoofd Verkoop</p>
                    <p class="bio">Brian leidt ons verkoopteam en zorgt ervoor dat we altijd de juiste auto's voor onze klanten hebben.</p>
                </div>

                <div class="team-member">
                    <img src="/assets/images/team/youssef-amrani.png" alt="Youssef Amrani">
                    <h3>Youssef Amrani</h3>
                    <p class="title">Hoofd Operations</p>
                    <p class="bio">Youssef zorgt ervoor dat al onze vestigingen soepel draaien en dat onze auto's altijd in perfecte staat zijn.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="locations">
        <div class="container">
            <h2>Onze vestigingen</h2>
            <div class="locations-grid">
                <div class="location">
                    <h3>Rotterdam (Hoofdkantoor)</h3>
                    <p>Weena 505<br>3013 AL Rotterdam</p>
                    <p>Open: Ma-Vr 8:00-20:00, Za-Zo 9:00-18:00</p>
                    <p>Tel: 010-123 45 67</p>
                </div>
                
                <div class="location">
                    <h3>Amsterdam</h3>
                    <p>Zuidas 123<br>1082 MS Amsterdam</p>
                    <p>Open: Ma-Vr 8:00-20:00, Za-Zo 9:00-18:00</p>
                    <p>Tel: 020-123 45 67</p>
                </div>
                
                <div class="location">
                    <h3>Utrecht</h3>
                    <p>Stationsplein 14<br>3511 ED Utrecht</p>
                    <p>Open: Ma-Vr 8:00-20:00, Za-Zo 9:00-18:00</p>
                    <p>Tel: 030-123 45 67</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-cta">
        <div class="container">
            <h2>Vragen of opmerkingen?</h2>
            <p>We staan klaar om al je vragen te beantwoorden. Neem contact met ons op via het onderstaande formulier of bezoek een van onze vestigingen.</p>
            <a href="/pages/hulp-nodig.php" class="button-primary">Neem contact op</a>
        </div>
    </section>
</main>

<?php require $root_path . "/includes/footer.php"; ?>

