<?php require "../includes/header.php"; ?>

<main>
<?php 
// Get the search query from URL
$search_query = isset($_GET['brand']) ? trim($_GET['brand']) : '';

// Car data (same as in ons-aanbod.php)
$cars = [
    [
        'brand' => 'Koenigsegg',
        'type' => 'Sport',
        'image' => 0,
        'fuel' => '90l',
        'transmission' => 'Schakel',
        'passengers' => '2 Personen',
        'price' => '€249,00'
    ],
    [
        'brand' => 'Lamborghini',
        'type' => 'Sport',
        'image' => 1,
        'fuel' => '80l',
        'transmission' => 'Automaat',
        'passengers' => '2 Personen',
        'price' => '€299,00'
    ],
    [
        'brand' => 'Audi',
        'type' => 'SUV',
        'image' => 2,
        'fuel' => '70l',
        'transmission' => 'Automaat',
        'passengers' => '5 Personen',
        'price' => '€149,00'
    ],
    [
        'brand' => 'BMW',
        'type' => 'Sedan',
        'image' => 3,
        'fuel' => '65l',
        'transmission' => 'Automaat',
        'passengers' => '5 Personen',
        'price' => '€179,00'
    ],
    [
        'brand' => 'Mercedes',
        'type' => 'Sedan',
        'image' => 4,
        'fuel' => '75l',
        'transmission' => 'Automaat',
        'passengers' => '5 Personen',
        'price' => '€189,00'
    ],
    [
        'brand' => 'Volkswagen',
        'type' => 'Hatchback',
        'image' => 5,
        'fuel' => '50l',
        'transmission' => 'Schakel',
        'passengers' => '5 Personen',
        'price' => '€99,00'
    ],
    [
        'brand' => 'Toyota',
        'type' => 'Hatchback',
        'image' => 6,
        'fuel' => '45l',
        'transmission' => 'Schakel',
        'passengers' => '5 Personen',
        'price' => '€89,00'
    ],
    [
        'brand' => 'Ferrari',
        'type' => 'Sport',
        'image' => 7,
        'fuel' => '85l',
        'transmission' => 'Automaat',
        'passengers' => '2 Personen',
        'price' => '€349,00'
    ]
];

// Function to search cars by brand
function search_cars_by_brand($cars, $search_term) {
    if (empty($search_term)) {
        return $cars;
    }
    
    return array_filter($cars, function($car) use ($search_term) {
        // Case-insensitive search
        return stripos($car['brand'], $search_term) !== false;
    });
}

// Get filtered results
$search_results = search_cars_by_brand($cars, $search_query);
?>

<div class="search-results">
    <div class="search-header">
        <h1>Zoekresultaten</h1>
        
        <?php if (!empty($search_query)): ?>
            <p class="search-info">
                <?php echo count($search_results); ?> auto's gevonden voor "<?php echo htmlspecialchars($search_query); ?>"
            </p>
        <?php endif; ?>
        
        <div class="search-form">
            <form action="/pages/zoeken.php" method="GET">
                <div class="search-input">
                    <input type="search" name="brand" id="brand" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Zoek op automerk..." required>
                    <button type="submit" class="button-primary">Zoeken</button>
                </div>
            </form>
        </div>
    </div>
    
    <?php if (empty($search_results)): ?>
        <div class="no-results">
            <p>Geen auto's gevonden voor "<?php echo htmlspecialchars($search_query); ?>".</p>
            <p>Probeer een andere zoekopdracht of bekijk <a href="/pages/ons-aanbod.php">ons complete aanbod</a>.</p>
        </div>
    <?php else: ?>
        <div class="cars">
            <?php foreach ($search_results as $car): ?>
                <div class="car-details">
                    <div class="car-brand">
                        <h3><?= $car['brand'] ?></h3>
                        <div class="car-type">
                            <?= $car['type'] ?>
                        </div>
                    </div>
                    <img src="/assets/images/products/car%20(<?= $car['image'] ?>).svg" alt="">
                    <div class="car-specification">
                        <span><img src="/assets/images/icons/gas-station.svg" alt=""><?= $car['fuel'] ?></span>
                        <span><img src="/assets/images/icons/car.svg" alt=""><?= $car['transmission'] ?></span>
                        <span><img src="/assets/images/icons/profile-2user.svg" alt=""><?= $car['passengers'] ?></span>
                    </div>
                    <div class="rent-details">
                        <span><span class="font-weight-bold"><?= $car['price'] ?></span> </span>
                        <a href="/car-detail" class="button-primary">Bekijk nu</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</main>

<?php require "includes/footer.php"; ?>
