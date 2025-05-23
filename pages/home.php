<?php global $conn;
require include "../includes/header.php"; ?>
<?php
include "../database/db.php";; // Or adjust the path

$sql = "SELECT * FROM rental_database LIMIT 5"; // show 4 popular cars
$result = $conn->query($sql);
?>

    <header>
        <div class="advertorials">
            <div class="advertorial">
                <h2>Hét platform om een auto te huren</h2>
                <p>Snel en eenvoudig een auto huren. Natuurlijk voor een lage prijs.</p>
                <a href="../pages/ons-aanbod.php" class="button-primary">Huur nu een auto</a>
                <img src="../assets/images/products/Car_0.png" alt="">
                <img src="../assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
            <div class="advertorial">
                <h2>Wij verhuren ook bedrijfswagens</h2>
                <p>Voor een vaste lage prijs met prettig voordelen.</p>
                <a href="/pages/ons-aanbod.php?type=bedrijfswagen" class="button-primary">Huur een bedrijfswagen</a>
                <img src="/assets/images/car-rent-header-image-2.png" alt="">
                <img src="/assets/images/header-block-background.svg" alt="" class="background-header-element">
            </div>
        </div>
    </header>



    <main>
        <h2 class="section-title">Populaire auto's</h2>
        <div class="cars">
            <?php while ($car = $result->fetch_assoc()) : ?>
                <div class="car-details">
                    <div class="car-brand">
                        <h3><?= htmlspecialchars($car['Auto']) ?></h3>
                        <div class="car-type"><?= htmlspecialchars($car['Type']) ?></div>
                    </div>

                    <!-- Dynamic car image (fallback used if missing) -->
                    <img src="../assets/images/products/Car_<?= $car['Id'] ?>.png" alt="<?= htmlspecialchars($car['Auto']) ?>">

                    <div class="car-specification">
                        <span><img src="../assets/images/icons/gas-station.svg" alt=""><?= $car['Liter'] ?>L</span>
                        <span><img src="../assets/images/icons/car.svg" alt=""><?= $car['Versnellingsbak'] ?></span>
                        <span><img src="../assets/images/icons/profile-2user.svg" alt=""><?= $car['Passagiers'] ?> Personen</span>
                    </div>

                    <div class="rent-details">
                        <span><span class="font-weight-bold">€<?= number_format($car['Prijs'], 2, ',', '.') ?></span> / dag</span>

                        <!-- ✅ FIXED BUTTON: now links to car-detail by ID -->
                        <a href="/pages/car-detail.php?id=<?= $car['Id'] ?>" class="button-primary">Bekijk nu</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="show-more">
            <a class="button-primary" href="/pages/ons-aanbod.php">Toon alle</a>
        </div>
    </main>

<?php $conn->close(); ?>

<?php require "../includes/footer.php"; ?>