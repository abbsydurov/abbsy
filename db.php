<?php
// db.php - Database connection & auto-schema initialization (PDO SQLite / MySQL)

// Configuration: Default SQLite database file path
$dbFile = __DIR__ . '/database.db';

try {
    // Create PDO connection to SQLite database
    $pdo = new PDO("sqlite:" . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Auto-create users table if not exists
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        telegram_id VARCHAR(64) UNIQUE NOT NULL,
        username VARCHAR(255),
        first_name VARCHAR(255),
        photo_url TEXT,
        uid VARCHAR(255),
        status VARCHAR(50) DEFAULT 'pending',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Auto-create settings table if not exists
    $pdo->exec("CREATE TABLE IF NOT EXISTS settings (
        setting_key VARCHAR(100) PRIMARY KEY,
        setting_value TEXT
    )");

    // Pre-populate default settings if empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM settings");
    if ($stmt->fetchColumn() == 0) {
        $defaultSettings = [
            'app_name' => 'PRIVATE WINGO',
            'logo_url' => 'https://www.image2url.com/r2/default/images/1783499309745-1177cad2-56e0-4922-b8ac-0b895b024146.jpg',
            'register_link' => 'https://t.me/abbsydurov',
            'welcome_message' => 'Support, setup ya help ke liye Telegram par @abbsydurov se direct contact karo.',
            'tg_owner_link' => 'https://t.me/abbsydurov'
        ];

        $insertStmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (:key, :val)");
        foreach ($defaultSettings as $k => $v) {
            $insertStmt->execute([':key' => $k, ':val' => $v]);
        }
    }

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $e->getMessage()]);
    exit();
}
?>
