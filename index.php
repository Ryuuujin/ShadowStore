<?php
include 'config/db.php';
include 'includes/header.php';

// Query untuk mendapatkan data game
$query = $pdo->query("SELECT * FROM games ORDER BY created_at DESC");
$games = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="banner">
    <img src="images/banner.jpg" alt="Banner">
</div>

<section class="flash-sale">
    <h2>Flash Sale</h2>
    <div class="games">
        <?php foreach ($games as $game): ?>
            <div class="game">
                <img src="images/<?= $game['image']; ?>" alt="<?= $game['name']; ?>">
                <p><?= $game['name']; ?></p>
                <p>Rp <?= number_format($game['price'], 0, ',', '.'); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>