<?php 
require "includes/header.php";

// Initialiseer de likes array in de sessie als deze niet bestaat
if (isset($_SESSION['id']) && !isset($_SESSION['likes'])) {
    $_SESSION['likes'] = [];
}

// Afhandelen van like/unlike actie
if (isset($_SESSION['id']) && isset($_GET['like'])) {
    $car_id = $_GET['like'];
    
    // Toggle like status
    if (in_array($car_id, $_SESSION['likes'])) {
        // Unlike the car
        $_SESSION['likes'] = array_diff($_SESSION['likes'], [$car_id]);
    } else {
        // Like the car
        $_SESSION['likes'][] = $car_id;
    }
    
    // Redirect terug naar dezelfde pagina zonder like parameter
    $redirect_url = 'ons-aanbod.php';
    if (isset($_GET['category'])) {
        $redirect_url .= '?category=' . urlencode($_GET['category']);
    }
    
    header('Location: ' . $redirect_url);
    exit;
}

// Verwerk categorie parameter
$selectedCategories = [];
if (isset($_GET['category']) && $_GET['category'] !== '') {
    $selectedCategories = explode(',', $_GET['category']);
}
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
                        <option value="Sport" <?php echo in_array('Sport', $selectedCategories) ? 'selected' : ''; ?>>Sport</option>
                        <option value="SUV" <?php echo in_array('SUV', $selectedCategories) ? 'selected' : ''; ?>>SUV</option>
                        <option value="Sedan" <?php echo in_array('Sedan', $selectedCategories) ? 'selected' : ''; ?>>Sedan</option>
                        <option value="Hatchback" <?php echo in_array('Hatchback', $selectedCategories) ? 'selected' : ''; ?>>Hatchback</option>
                    </select>
                </div>
                
                <button type="submit" class="button-primary">Filter toepassen</button>
                <?php if(!empty($selectedCategories)): ?>
                    <a href="ons-aanbod.php" class="button-secondary">Reset filter</a>
                <?php endif; ?>
            </form>
        </div>
    </div>
    
    <div class="aanbod-content">
        <?php 
        $cars = [
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

        // Apply category filter if set
        if (!empty($selectedCategories)) {
            $filtered_cars = array_filter($cars, function($car) use ($selectedCategories) {
                return in_array($car['type'], $selectedCategories);
            });
            
            if (count($selectedCategories) === 1) {
                echo '<h2 class="section-title">'. count($filtered_cars) .' auto\'s gevonden in categorie "'. htmlspecialchars($selectedCategories[0]) .'"</h2>';
            } else {
                echo '<h2 class="section-title">'. count($filtered_cars) .' auto\'s gevonden in geselecteerde categorieën</h2>';
            }
        } else {
            $filtered_cars = $cars;
            echo '<h2 class="section-title">Ons complete aanbod</h2>';
        }
        ?>

        <div class="cars">
        <?php foreach ($filtered_cars as $car) : ?>
        <div class="car-details">
            <div class="car-brand">
                <h3><?= htmlspecialchars($car['brand']) ?></h3>
                <div class="car-type">
                    <?= htmlspecialchars($car['type']) ?>
                </div>
            </div>
            <?php if (isset($_SESSION['id'])): ?>
            <div class="like-button">
                <a href="ons-aanbod.php?<?= !empty($selectedCategories) ? 'category=' . urlencode(implode(',', $selectedCategories)) . '&' : '' ?>like=<?= $car['id'] ?>" class="like-link <?= isset($_SESSION['likes']) && in_array($car['id'], $_SESSION['likes']) ? 'liked' : '' ?>">
                    <span class="heart-icon">♥</span>
                </a>
            </div>
            <?php endif; ?>
            <img src="/assets/images/products/car%20(<?= $car['image'] ?>).svg" alt="<?= htmlspecialchars($car['brand']) ?>">
            <div class="car-specification">
                <span><img src="/assets/images/icons/gas-station.svg" alt="Brandstof"><?= htmlspecialchars($car['fuel']) ?></span>
                <span><img src="/assets/images/icons/car.svg" alt="Transmissie"><?= htmlspecialchars($car['transmission']) ?></span>
                <span><img src="/assets/images/icons/profile-2user.svg" alt="Passagiers"><?= htmlspecialchars($car['passengers']) ?></span>
            </div>
            <div class="rent-details">
                <span><span class="font-weight-bold"><?= htmlspecialchars($car['price']) ?></span> </span>
                <a href="/car-detail" class="button-primary">Bekijk nu</a>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
</main>

<?php require "includes/footer.php"; ?>

