<?php
global $conn;

require "header.php";
require "db.php";

// Like system
if (isset($_SESSION['id']) && !isset($_SESSION['likes'])) {
    $_SESSION['likes'] = [];
}
if (isset($_SESSION['id']) && isset($_GET['like'])) {
    $car_id = $_GET['like'];
    if (in_array($car_id, $_SESSION['likes'])) {
        $_SESSION['likes'] = array_diff($_SESSION['likes'], [$car_id]);
    } else {
        $_SESSION['likes'][] = $car_id;
    }
    header("Location: ons-aanbod.php" . (isset($_GET['category']) ? '?category=' . urlencode($_GET['category']) : ''));
    exit;
}

// Categorie filter
$selectedCategories = [];
if (isset($_GET['category']) && $_GET['category'] !== '') {
    $selectedCategories = explode(',', $_GET['category']);
    $placeholders = implode(',', array_fill(0, count($selectedCategories), '?'));
    $stmt = $conn->prepare("SELECT * FROM rental_database WHERE Type IN ($placeholders)");
    $stmt->bind_param(str_repeat('s', count($selectedCategories)), ...$selectedCategories);
} else {
    $stmt = $conn->prepare("SELECT * FROM rental_database");
}
$stmt->execute();
$result = $stmt->get_result();
$cars = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<main>
    <div class="aanbod-container">
        <div class="aanbod-sidebar">
            <div class="filter">
                <h2>Filter ons aanbod</h2>
                <form action="" method="GET">
                    <div class="filter-group">
                        <label for="category">Categorie:</label>
                        <select name="category" id="category">
                            <option value="">Alle categorieën</option>
                            <option value="Sport" <?= in_array('Sport', $selectedCategories) ? 'selected' : '' ?>>Sport</option>
                            <option value="SUV" <?= in_array('SUV', $selectedCategories) ? 'selected' : '' ?>>SUV</option>
                            <option value="Sedan" <?= in_array('Sedan', $selectedCategories) ? 'selected' : '' ?>>Sedan</option>
                            <option value="Hatchback" <?= in_array('Hatchback', $selectedCategories) ? 'selected' : '' ?>>Hatchback</option>
                        </select>
                    </div>
                    <button type="submit" class="button-primary">Filter toepassen</button>
                    <?php if (!empty($selectedCategories)) : ?>
                        <a href="ons-aanbod.php" class="button-secondary">Reset filter</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="aanbod-content">
            <h2 class="section-title"><?= count($cars) ?> auto’s gevonden</h2>
            <div class="cars">
                <?php foreach ($cars as $car): ?>
                    <div class="car-details">
                        <div class="car-brand">
                            <h3><?= htmlspecialchars($car['Auto']) ?></h3>
                            <div class="car-type"><?= htmlspecialchars($car['Type']) ?></div>
                        </div>

                        <?php if (isset($_SESSION['id'])): ?>
                            <div class="like-button">
                                <a href="ons-aanbod.php?<?= !empty($selectedCategories) ? 'category=' . urlencode(implode(',', $selectedCategories)) . '&' : '' ?>like=<?= $car['Id'] ?>" class="like-link <?= in_array($car['Id'], $_SESSION['likes']) ? 'liked' : '' ?>">
                                    <span class="heart-icon">♥</span>
                                </a>
                            </div>
                        <?php endif; ?>

                        <img src="/assets/images/products/Car_<?= $car['Id'] ?>.png" alt="<?= htmlspecialchars($car['Auto']) ?>">

                        <div class="car-specification">
                            <span><img src="/assets/images/icons/gas-station.svg" alt=""> <?= $car['Liter'] ?>L</span>
                            <span><img src="/assets/images/icons/car.svg" alt=""> <?= $car['Versnellingsbak'] ?></span>
                            <span><img src="/assets/images/icons/profile-2user.svg" alt=""> <?= $car['Passagiers'] ?> Personen</span>
                        </div>

                        <div class="rent-details">
                            <span><span class="font-weight-bold">€<?= number_format($car['Prijs'], 2, ',', '.') ?></span></span>
                            <a href="/pages/car-detail.php?id=<?= $car['Id'] ?>" class="button-primary">Bekijk nu</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php require "footer.php"; ?>
