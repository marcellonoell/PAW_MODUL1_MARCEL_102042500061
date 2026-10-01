<?php
// 1. Data produk disimpan menggunakan Array PHP (minimal 6 produk)[cite: 1]
$produk = [
    [
        "nama"     => "Monitor 24 Inch",
        "kategori" => "Monitor",
        "harga"    => 1800000,
        "stok"     => 4
    ],
    [
        "nama"     => "Laptop Murah",
        "kategori" => "Laptop",
        "harga"    => 6000000,
        "stok"     => 3
    ],
    [
        "nama"     => "Keyboard Mekanikal",
        "kategori" => "Aksesoris",
        "harga"    => 500000,
        "stok"     => 8
    ],
    [
        "nama"     => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga"    => 150000,
        "stok"     => 0 // Contoh stok habis[cite: 1]
    ],
    [
        "nama"     => "Headset Gaming",
        "kategori" => "Audio",
        "harga"    => 350000,
        "stok"     => 5
    ],
    [
        "nama"     => "Webcam HD",
        "kategori" => "Kamera",
        "harga"    => 250000,
        "stok"     => 0 // Contoh stok habis[cite: 1]
    ]
];

// 2. Menghitung jumlah seluruh produk secara otomatis[cite: 2]
$total_produk = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <!-- Menghubungkan ke file CSS yang sama -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- 1. Header & Navigasi -->
    <header class="header">
        <nav class="navbar">
            <h2 class="brand">Cia Store</h2>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#katalog">Katalog</a></li>
            </ul>
        </nav>
    </header>

    <!-- 2. Hero Section -->
    <section class="hero">
        <h1 class="hero-title">Selamat Datang di Cia Store</h1>
        <p class="hero-desc">Penyedia perangkat dan aksesoris teknologi sederhana.</p>
    </section>

    <!-- 3. Katalog Produk -->
    <main class="container" id="katalog">
        <div class="katalog-header">
            <h2>Katalog Produk</h2>
            <!-- Informasi jumlah produk secara dinamis[cite: 2] -->
            <p class="badge-total">Total Produk: <strong><?= $total_produk; ?></strong></p>
        </div>

        <div class="grid-produk">
            <?php 
            // 3. Perulangan PHP untuk menampilkan seluruh card produk secara dinamis[cite: 1]
            foreach ($produk as $item): 
            ?>
                <div class="card">
                    <div class="card-content">
                        <span class="kategori"><?= $item["kategori"]; ?></span>
                        <h3 class="nama-produk"><?= $item["nama"]; ?></h3>
                        <!-- 4. Format mata uang Rupiah[cite: 2] -->
                        <div class="harga">Rp<?= number_format($item["harga"], 0, ',', '.'); ?></div>
                    </div>

                    <div class="card-action">
                        <div class="stok-info">
                            <span>Stok: <?= $item["stok"]; ?></span>
                            <!-- 5. Percabangan PHP untuk status ketersediaan stok[cite: 1] -->
                            <?php if ($item["stok"] > 0): ?>
                                <span class="status-tersedia">Tersedia</span>
                            <?php else: ?>
                                <span class="status-habis">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <!-- 6. Percabangan PHP untuk tombol beli[cite: 1, 2] -->
                        <?php if ($item["stok"] > 0): ?>
                            <button class="btn btn-beli">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn btn-disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- 4. Footer -->
    <footer class="footer">
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>