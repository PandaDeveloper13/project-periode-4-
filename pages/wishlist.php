<?php 
$root_path = $_SERVER['DOCUMENT_ROOT'];
require $root_path . "/includes/header.php";

// Controleer of gebruiker is ingelogd
if (!isset($_SESSION['id'])) {
    // Redirect naar login pagina als niet ingelogd
    header('Location: /pages/login.php');
    exit;
}

// Initialiseer de likes array als deze niet bestaat
if (!isset($_SESSION['likes'])) {
    $_SESSION['likes'] = [];
}

// Alle auto data (zelfde als ons-aanbod.php)
$all_cars = [
    [
        'id' => 'car1',
        'brand' => 'Koenigsegg',
        'type' => 'Sport',
        'image' => 0,
        'fuel' => '90l',
        'transmission' => 'Schakel',
        'passengers' => '2 Personen',
        'price' => '€249,00'
    ],
    [
        'id' => 'car2',
        'brand' => 'Lamborghini',
        'type' => 'Sport',
        'image' => 1,
        'fuel' => '80l',
        'transmission' => 'Automaat',
        'passengers' => '2 Personen',
        'price' => '€299,00'
    ],
    [
        'id' => 'car3',
        'brand' => 'Audi',
        'type' => 'SUV',
        'image' => 2,
        'fuel' => '70l',
        'transmission' => 'Automaat',
        'passengers' => '5 Personen',
        'price' => '€149,00'
    ],
    [
        'id' => 'car4',
        'brand' => 'BMW',
        'type' => 'Sedan',
        'image' => 3,
        'fuel' => '65l',
        'transmission' => 'Automaat',
        'passengers' => '5 Personen',
        'price' => '€179,00'
    ],
    [
        'id' => 'car5',
        'brand' => 'Mercedes',
        'type' => 'Sedan',
        'image' => 4,
        'fuel' => '75l',
        'transmission' => 'Automaat',
        'passengers' => '5 Personen',
        'price' => '€189,00'
    ],
    [
        'id' => 'car6',
        'brand' => 'Volkswagen',
        'type' => 'Hatchback',
        'image' => 5,
        'fuel' => '50l',
        'transmission' => 'Schakel',
        'passengers' => '5 Personen',
        'price' => '€99,00'
    ],
    [
        'id' => 'car7',
        'brand' => 'Toyota',
        'type' => 'Hatchback',
        'image' => 6,
        'fuel' => '45l',
        'transmission' => 'Schakel',
        'passengers' => '5 Personen',
        'price' => '€89,00'
    ],
    [
        'id' => 'car8',
        'brand' => 'Ferrari',
        'type' => 'Sport',
        'image' => 7,
        'fuel' => '85l',
        'transmission' => 'Automaat',
        'passengers' => '2 Personen',
        'price' => '€349,00'
    ]
];

// Filter de auto's op basis van gelikete auto's
$liked_cars = [];
foreach ($all_cars as $car) {
    if (in_array($car['id'], $_SESSION['likes'])) {
        $liked_cars[] = $car;
    }
}

// Handle like/unlike action
if (isset($_GET['unlike'])) {
    $car_id = $_GET['unlike'];
    
    // Unlike the car
    if (in_array($car_id, $_SESSION['likes'])) {
        $_SESSION['likes'] = array_diff($_SESSION['likes'], [$car_id]);
    }
    
    // Redirect to refresh the page
    header('Location: /pages/wishlist.php');
    exit;
}
?>

<main>
    <div class="white-background">
        <div class="wishlist-header">
            <h1>Mijn favoriete auto's</h1>
            <?php if (empty($liked_cars)): ?>
                <p class="empty-wishlist">U heeft nog geen favoriete auto's geselecteerd. <a href="/pages/ons-aanbod.php">Bekijk ons aanbod</a> om auto's toe te voegen aan uw favorieten.</p>
            <?php else: ?>
                <p class="wishlist-count">U heeft <?= count($liked_cars) ?> auto('s) in uw favorieten.</p>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($liked_cars)): ?>
            <div class="cars">
                <?php foreach ($liked_cars as $car): ?>
                    <div class="car-details">
                        <div class="car-brand">
                            <h3><?= htmlspecialchars($car['brand']) ?></h3>
                            <div class="car-type">
                                <?= htmlspecialchars($car['type']) ?>
                            </div>
                        </div>
                        <div class="like-button">
                            <a href="/pages/wishlist.php?unlike=<?= $car['id'] ?>" class="like-link liked" title="Verwijderen uit favorieten">
                                <span class="heart-icon">♥</span>
                            </a>
                        </div>
                        <img src="/assets/images/products/car%20(<?= $car['image'] ?>).webp" alt="<?= htmlspecialchars($car['brand']) ?>">
                        <div class="car-specification">
                            <span><img src="/assets/images/icons/gas-station.webp" alt="Brandstof"><?= htmlspecialchars($car['fuel']) ?></span>
                            <span><img src="/assets/images/icons/car.webp" alt="Transmissie"><?= htmlspecialchars($car['transmission']) ?></span>
                            <span><img src="/assets/images/icons/profile-2user.webp" alt="Passagiers"><?= htmlspecialchars($car['passengers']) ?></span>
                        </div>
                        <div class="rent-details">
                            <span><span class="font-weight-bold"><?= htmlspecialchars($car['price']) ?></span> </span>
                            <a href="/car-detail" class="button-primary">Bekijk nu</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require $root_path . "/includes/footer.php"; ?> 
