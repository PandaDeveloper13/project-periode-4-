<?php
global $conn;
require "header.php";
require "db.php";

// Zoekterm ophalen
$search_query = isset($_GET['Auto']) ? trim($_GET['Auto']) : '';
$filtered = [];

if (!empty($search_query)) {
    // Haal alle auto's op
    $sql = "SELECT * FROM rental_database";
    $result = $conn->query($sql);

    // Fuzzy filter via levenshtein()
    while ($car = $result->fetch_assoc()) {
        $distance = levenshtein(strtolower($car['Auto']), strtolower($search_query));
        if ($distance <= 2 || stripos($car['Auto'], $search_query) !== false) {
            $filtered[] = $car;
        }
    }
} else {
    // Geen zoekterm: alle auto's ophalen
    $sql = "SELECT * FROM rental_database";
    $result = $conn->query($sql);

    while ($car = $result->fetch_assoc()) {
        $filtered[] = $car;
    }
}
?>

<main>
    <div class="search-results">
        <div class="search-header">
            <h1>Zoekresultaten</h1>

            <?php if (!empty($search_query)): ?>
                <p class="search-info">
                    <?= count($filtered) ?> auto's gevonden voor "<?= htmlspecialchars($search_query) ?>"
                </p>
            <?php endif; ?>

            <div class="search-form">
                <form action="/pages/zoeken.php" method="GET">
                    <input type="search" name="Auto" id="Auto" placeholder="Zoek op automerk..." required>
                    <button type="submit" class="button-primary">Zoeken</button>
                </form>
            </div>
        </div>

        <?php if (count($filtered) === 0): ?>
            <div class="no-results">
                <p>Geen auto's gevonden voor "<?= htmlspecialchars($search_query) ?>".</p>
                <p>Probeer een andere zoekopdracht of bekijk <a href="/pages/ons-aanbod.php">ons complete aanbod</a>.</p>
            </div>
        <?php else: ?>
            <div class="cars">
                <?php foreach ($filtered as $car): ?>
                    <div class="car-details">
                        <div class="car-brand">
                            <h3><?= htmlspecialchars($car['Auto']) ?></h3>
                            <div class="car-type"><?= htmlspecialchars($car['Type']) ?></div>
                        </div>

                        <img src="../assets/images/products/Car_<?= $car['Id'] ?>.png" alt="<?= htmlspecialchars($car['Auto']) ?>">

                        <div class="car-specification">
                            <span><img src="../assets/images/icons/gas-station.svg" alt=""> <?= $car['Liter'] ?>L</span>
                            <span><img src="../assets/images/icons/car.svg" alt=""> <?= $car['Versnellingsbak'] ?></span>
                            <span><img src="../assets/images/icons/profile-2user.svg" alt=""> <?= $car['Passagiers'] ?> Personen</span>
                        </div>

                        <div class="rent-details">
                            <span><span class="font-weight-bold">€<?= number_format($car['Prijs'], 2, ',', '.') ?></span> / dag</span>
                            <a href="/pages/car-detail.php?id=<?= $car['Id'] ?>" class="button-primary">Bekijk nu</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require "footer.php"; ?>
