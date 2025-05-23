<?php
global $conn;
include "header.php";
include "db.php";

// ✅ Get car ID from URL
$id = $_GET['id'] ?? null;
$car = null;

// ✅ Fetch car by ID (not name)
if ($id !== null && is_numeric($id)) {
    $stmt = $conn->prepare("SELECT * FROM rental_database WHERE Id = ?");
    $stmt->bind_param("i", $id); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
    }

    $stmt->close();
}
$conn->close();
?>




<div class="grid">
    <div class="row">
        <div class="advertorial">
            <h2>Sport auto met het beste design en snelheid</h2>
            <p>Veiligheid en comfort terwijl je rijdt in een futuristische en elegante auto.</p>
            <img src="../assets/images/products/Car_<?= $car['Id'] ?>.png" alt="<?= htmlspecialchars($car['Auto']) ?>">

            <img src="../assets/images/header-circle-background.svg" alt="" class="background-header-element">
        </div>
    </div>

    <?php if ($car): ?>
        <div class="row white-background">
            <h2><?= htmlspecialchars($car['Auto']) ?></h2>
            <div class="rating">
                <span class="stars stars-4"></span>
                <span>440+ reviewers</span>
            </div>
            <p><?= htmlspecialchars($car['Auto']) ?> is een uitstekende keuze voor sportief rijden met comfort en prestaties.</p>

            <div class="car-type">
                <div class="grid">
                    <div class="row">
                        <span class="accent-color">Type Car</span>
                        <span><?= htmlspecialchars($car['Type']) ?></span>
                    </div>
                    <div class="row">
                        <span class="accent-color">Capacity</span>
                        <span><?= htmlspecialchars($car['Passagiers']) ?> personen</span>
                    </div>
                </div>
                <div class="grid">
                    <div class="row">
                        <span class="accent-color">Steering</span>
                        <span><?= htmlspecialchars($car['Versnellingsbak']) ?></span>
                    </div>
                    <div class="row">
                        <span class="accent-color">Gasoline</span>
                        <span><?= htmlspecialchars($car['Liter']) ?>L</span>
                    </div>
                </div>
                <br>
                <div class="call-to-action">
                    <div class="row">
                        <span class="font-weight-bold">
                            €<?= number_format($car['Prijs'], 2, ',', '.') ?>
                        </span> / dag
                    </div>
                    <br>
                    <div class="row">
                        <a href="#" class="button-primary">Huur nu</a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row white-background">
            <h2>Auto niet gevonden</h2>
            <p>De opgegeven auto bestaat niet in onze database. Ga terug en probeer opnieuw.</p>
        </div>
    <?php endif; ?>
</div>

<?php include "footer.php"; ?>
