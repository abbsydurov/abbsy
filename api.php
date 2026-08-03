<?php
// api.php - JSON REST API for Wingo application & admin panel
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {

    // 1. Check user registration status
    case 'check_status':
        $telegramId = trim($_GET['telegram_id'] ?? $_POST['telegram_id'] ?? '');
        if (!$telegramId) {
            echo json_encode(['success' => false, 'error' => 'Telegram ID required']);
            exit;
        }

        $stmt = $pdo->prepare("SELECT * FROM users WHERE telegram_id = :tg_id");
        $stmt->execute([':tg_id' => $telegramId]);
        $user = $stmt->fetch();

        if ($user) {
            echo json_encode([
                'success' => true,
                'registered' => true,
                'status' => $user['status'],
                'uid' => $user['uid'],
                'user' => $user
            ]);
        } else {
            echo json_encode([
                'success' => true,
                'registered' => false,
                'status' => 'not_registered'
            ]);
        }
        break;

    // 2. Submit or update Game UID
    case 'submit_uid':
        $rawInput = file_get_contents('php://input');
        $data = json_decode($rawInput, true) ?? $_POST;

        $telegramId = trim($data['telegram_id'] ?? '');
        $username   = trim($data['username'] ?? '');
        $firstName  = trim($data['first_name'] ?? '');
        $photoUrl   = trim($data['photo_url'] ?? '');
        $uid        = trim($data['uid'] ?? '');

        if (!$telegramId || !$uid) {
            echo json_encode(['success' => false, 'error' => 'Telegram ID and UID are required']);
            exit;
        }

        $stmt = $pdo->prepare("SELECT id FROM users WHERE telegram_id = :tg_id");
        $stmt->execute([':tg_id' => $telegramId]);
        $existing = $stmt->fetch();

        if ($existing) {
            $update = $pdo->prepare("UPDATE users SET username = :username, first_name = :first_name, photo_url = :photo_url, uid = :uid, status = 'pending', created_at = CURRENT_TIMESTAMP WHERE telegram_id = :tg_id");
            $update->execute([
                ':username'   => $username,
                ':first_name'  => $firstName,
                ':photo_url'   => $photoUrl,
                ':uid'        => $uid,
                ':tg_id'      => $telegramId
            ]);
        } else {
            $insert = $pdo->prepare("INSERT INTO users (telegram_id, username, first_name, photo_url, uid, status) VALUES (:tg_id, :username, :first_name, :photo_url, :uid, 'pending')");
            $insert->execute([
                ':tg_id'      => $telegramId,
                ':username'   => $username,
                ':first_name'  => $firstName,
                ':photo_url'   => $photoUrl,
                ':uid'        => $uid
            ]);
        }

        echo json_encode(['success' => true, 'message' => 'UID submitted successfully for admin approval']);
        break;

    // 3. Admin: Get all users
    case 'admin_get_users':
        $stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
        $users = $stmt->fetchAll();
        echo json_encode(['success' => true, 'users' => $users]);
        break;

    // 4. Admin: Update user status (approve/reject)
    case 'admin_update_status':
        $rawInput = file_get_contents('php://input');
        $data = json_decode($rawInput, true) ?? $_POST;

        $telegramId = trim($data['telegram_id'] ?? '');
        $newStatus  = trim($data['status'] ?? '');

        if (!$telegramId || !in_array($newStatus, ['approved', 'rejected', 'pending'])) {
            echo json_encode(['success' => false, 'error' => 'Invalid parameters']);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE users SET status = :status WHERE telegram_id = :tg_id");
        $stmt->execute([':status' => $newStatus, ':tg_id' => $telegramId]);

        echo json_encode(['success' => true, 'message' => 'User status updated to ' . $newStatus]);
        break;

    // 5. Admin: Delete user record
    case 'admin_delete_user':
        $rawInput = file_get_contents('php://input');
        $data = json_decode($rawInput, true) ?? $_POST;

        $telegramId = trim($data['telegram_id'] ?? '');
        if (!$telegramId) {
            echo json_encode(['success' => false, 'error' => 'Telegram ID required']);
            exit;
        }

        $stmt = $pdo->prepare("DELETE FROM users WHERE telegram_id = :tg_id");
        $stmt->execute([':tg_id' => $telegramId]);

        echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
        break;

    // 6. Get global system settings
    case 'get_settings':
        $stmt = $pdo->query("SELECT setting_key, setting_value FROM settings");
        $rows = $stmt->fetchAll();
        $settings = [];
        foreach ($rows as $r) {
            $settings[$r['setting_key']] = $r['setting_value'];
        }
        echo json_encode(['success' => true, 'settings' => $settings]);
        break;

    // 7. Admin: Save system settings
    case 'admin_save_settings':
        $rawInput = file_get_contents('php://input');
        $data = json_decode($rawInput, true) ?? $_POST;
        $settingsPayload = $data['settings'] ?? $data;

        if (is_array($settingsPayload)) {
            $stmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (:key, :val) ON CONFLICT(setting_key) DO UPDATE SET setting_value = :val");
            foreach ($settingsPayload as $k => $v) {
                if (in_array($k, ['app_name', 'logo_url', 'register_link', 'welcome_message', 'tg_owner_link'])) {
                    $stmt->execute([':key' => $k, ':val' => (string)$v]);
                }
            }
        }

        echo json_encode(['success' => true, 'message' => 'Settings saved successfully']);
        break;

    default:
        echo json_encode(['success' => false, 'error' => 'Invalid action']);
        break;
}
?>
