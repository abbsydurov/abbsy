<?php
// index.php - PRIVATE WINGO User Application (PHP + SQL Backend)
require_once __DIR__ . '/db.php';

// Fetch initial settings from Database
$stmt = $pdo->query("SELECT setting_key, setting_value FROM settings");
$rows = $stmt->fetchAll();
$initialSettings = [];
foreach ($rows as $r) {
    $initialSettings[$r['setting_key']] = $r['setting_value'];
}

$appName = $initialSettings['app_name'] ?? 'PRIVATE WINGO';
$logoUrl = $initialSettings['logo_url'] ?? 'https://www.image2url.com/r2/default/images/1783499309745-1177cad2-56e0-4922-b8ac-0b895b024146.jpg';
$registerLink = $initialSettings['register_link'] ?? 'https://t.me/abbsydurov';
$welcomeMsg = $initialSettings['welcome_message'] ?? 'Support, setup ya help ke liye Telegram par @abbsydurov se direct contact karo.';
$tgOwnerLink = $initialSettings['tg_owner_link'] ?? 'https://t.me/abbsydurov';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title><?php echo htmlspecialchars($appName); ?> - Cyber Vault</title>
  
  <!-- Telegram WebApp SDK -->
  <script src="https://telegram.org/js/telegram-web-app.js"></script>

  <!-- Lottie Player -->
  <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <!-- Luxury Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Cinzel+Decorative:wght@700;900&family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --bg-dark: #070706;
      --panel-dark: #12100c;
      --panel-card: #1a1712;
      --border-line: rgba(229, 193, 88, 0.35);
      --border-gold-glow: rgba(229, 193, 88, 0.65);
      --gold-primary: #ffd700;
      --gold-secondary: #e5c158;
      --gold-muted: #b89635;
      --text-main: #fcfaf2;
      --text-muted: #a69a80;
      --accent-green: #00e676;
      --accent-red: #ff3366;
      --accent-cyan: #00eaff;
      
      --gradient-gold: linear-gradient(135deg, #ffd700 0%, #e5c158 50%, #b89635 100%);
      --gradient-gold-dark: linear-gradient(180deg, rgba(229, 193, 88, 0.22) 0%, rgba(18, 16, 12, 0.95) 100%);
      
      --font-serif: 'Cinzel', Georgia, serif;
      --font-mono: 'JetBrains Mono', monospace;
      --font-sans: 'Inter', system-ui, sans-serif;
    }

    ::selection {
      background: #ffd700;
      color: #000;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      user-select: none;
      -webkit-user-select: none;
      -webkit-tap-highlight-color: transparent;
    }

    html, body {
      height: 100%;
      background: var(--bg-dark);
      font-family: var(--font-sans);
      color: var(--text-main);
      overflow-x: hidden;
    }

    body {
      display: flex;
      justify-content: center;
      background: var(--bg-dark);
      background-image: 
        radial-gradient(circle at 50% 15%, rgba(229, 193, 88, 0.15), transparent 55%),
        radial-gradient(circle at 10% 90%, rgba(255, 215, 0, 0.08), transparent 45%);
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      pointer-events: none;
      background: linear-gradient(rgba(229, 193, 88, 0.03) 1px, transparent 1px),
                  linear-gradient(90deg, rgba(229, 193, 88, 0.03) 1px, transparent 1px);
      background-size: 36px 36px;
      mask-image: linear-gradient(to bottom, #000 30%, transparent 95%);
    }

    .app {
      width: 100%;
      max-width: 500px;
      min-height: 100dvh;
      position: relative;
      background: linear-gradient(180deg, rgba(18, 16, 12, 0.98), rgba(7, 7, 6, 0.99));
      border-left: 1px solid rgba(229, 193, 88, 0.25);
      border-right: 1px solid rgba(229, 193, 88, 0.25);
      box-shadow: 0 0 60px rgba(0, 0, 0, 0.9), 0 0 30px rgba(229, 193, 88, 0.1);
      display: flex;
      flex-direction: column;
    }

    .scroll {
      flex: 1;
      overflow-y: auto;
      padding: 18px 18px 110px;
      position: relative;
      z-index: 1;
      -webkit-overflow-scrolling: touch;
    }
    .scroll::-webkit-scrollbar { width: 0; }

    .pageView {
      display: none;
      animation: viewIn 0.35s cubic-bezier(0.22, 0.8, 0.24, 1) both;
    }
    .pageView.active { display: block; }
    @keyframes viewIn {
      from { opacity: 0; transform: translateY(12px) scale(0.99); }
      to { opacity: 1; transform: none; }
    }

    .top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
      padding-bottom: 12px;
      border-bottom: 1px solid rgba(229, 193, 88, 0.2);
    }

    .brand {
      display: flex;
      gap: 14px;
      align-items: center;
    }

    .brandLogoWrap {
      width: 58px;
      height: 58px;
      border-radius: 50%;
      padding: 2px;
      background: var(--gradient-gold);
      box-shadow: 0 0 20px rgba(229, 193, 88, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .brandLogo {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #070706;
    }

    .brandText h1 {
      font-family: var(--font-serif);
      font-size: 1.25rem;
      font-weight: 800;
      letter-spacing: 1px;
      line-height: 1.1;
      background: var(--gradient-gold);
      -webkit-background-clip: text;
      color: transparent;
      text-shadow: 0 0 18px rgba(229, 193, 88, 0.3);
    }

    .brandText p {
      font-family: var(--font-mono);
      font-size: 0.6rem;
      color: var(--gold-muted);
      margin-top: 4px;
      letter-spacing: 1px;
    }

    .liveBadge {
      font-family: var(--font-mono);
      font-size: 0.60rem;
      font-weight: 800;
      color: #fff;
      border: 1px solid rgba(229, 193, 88, 0.4);
      border-radius: 999px;
      padding: 6px 12px;
      background: rgba(229, 193, 88, 0.1);
      box-shadow: 0 0 15px rgba(229, 193, 88, 0.15);
      white-space: nowrap;
    }

    .liveBadge i {
      display: inline-block;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: var(--gold-primary);
      box-shadow: 0 0 10px var(--gold-primary);
      margin-right: 6px;
      animation: pulse 1s infinite alternate;
    }
    @keyframes pulse { to { opacity: 0.4; transform: scale(0.75); } }

    .card {
      background: linear-gradient(180deg, rgba(26, 23, 18, 0.95), rgba(14, 12, 9, 0.98));
      border: 1.5px solid var(--border-line);
      border-radius: 20px;
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.8), inset 0 1px 0 rgba(255, 215, 0, 0.12);
      position: relative;
      overflow: hidden;
      margin-bottom: 16px;
    }

    .tgProfileCard {
      padding: 18px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .tgAvatar {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--gold-secondary);
      box-shadow: 0 0 20px rgba(229, 193, 88, 0.35);
    }

    .tgAvatarFallback {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      background: var(--gradient-gold);
      display: grid;
      place-items: center;
      font-family: var(--font-serif);
      font-size: 1.6rem;
      font-weight: 900;
      color: #070706;
      box-shadow: 0 0 20px rgba(229, 193, 88, 0.35);
    }

    .tgDetails h2 {
      font-family: var(--font-serif);
      font-size: 1.15rem;
      font-weight: 800;
      color: #fff;
    }

    .tgDetails p {
      font-family: var(--font-mono);
      font-size: 0.65rem;
      color: var(--text-muted);
      margin-top: 3px;
    }

    .tgBadge {
      display: inline-block;
      font-family: var(--font-mono);
      font-size: 0.58rem;
      font-weight: 800;
      color: var(--gold-primary);
      background: rgba(229, 193, 88, 0.12);
      border: 1px solid rgba(229, 193, 88, 0.35);
      border-radius: 999px;
      padding: 3px 10px;
      margin-top: 6px;
    }

    .lottieBox {
      width: 100%;
      height: 180px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 12px 0;
    }
    .lottieBox dotlottie-player, .lottieBox lottie-player {
      width: 170px;
      height: 170px;
    }

    .registerGlowBtn {
      width: 100%;
      border: 1.5px solid var(--gold-secondary);
      border-radius: 16px;
      padding: 16px;
      background: linear-gradient(135deg, rgba(229, 193, 88, 0.25), rgba(18, 16, 12, 0.95));
      color: var(--gold-primary);
      font-family: var(--font-serif);
      font-size: 0.95rem;
      font-weight: 800;
      letter-spacing: 1px;
      text-transform: uppercase;
      cursor: pointer;
      box-shadow: 0 0 25px rgba(229, 193, 88, 0.25);
      transition: 0.25s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      margin-bottom: 16px;
    }
    .registerGlowBtn:hover {
      background: var(--gradient-gold);
      color: #070706;
      box-shadow: 0 0 35px rgba(229, 193, 88, 0.5);
    }

    .uidCard {
      padding: 22px 18px;
      text-align: center;
    }

    .uidCard h3 {
      font-family: var(--font-serif);
      font-size: 1.1rem;
      font-weight: 800;
      color: var(--gold-primary);
      margin-bottom: 6px;
    }

    .uidCard p {
      font-family: var(--font-mono);
      font-size: 0.65rem;
      color: var(--text-muted);
      margin-bottom: 16px;
      line-height: 1.4;
    }

    .uidInput {
      width: 100%;
      padding: 14px;
      border-radius: 14px;
      background: rgba(0, 0, 0, 0.6);
      border: 1.5px solid var(--border-line);
      color: #fff;
      font-family: var(--font-mono);
      font-size: 1rem;
      font-weight: 700;
      text-align: center;
      outline: none;
      margin-bottom: 12px;
      transition: 0.2s;
    }

    .uidInput:focus {
      border-color: var(--gold-primary);
      box-shadow: 0 0 20px rgba(229, 193, 88, 0.3);
    }

    .submitUidBtn {
      width: 100%;
      border: 0;
      border-radius: 14px;
      padding: 14px;
      background: var(--gradient-gold);
      color: #070706;
      font-family: var(--font-serif);
      font-size: 0.85rem;
      font-weight: 800;
      letter-spacing: 1px;
      cursor: pointer;
      box-shadow: 0 0 25px rgba(229, 193, 88, 0.35);
      transition: 0.2s;
    }
    .submitUidBtn:hover { filter: brightness(1.15); }

    .pendingCard {
      padding: 30px 20px;
      text-align: center;
    }

    .pendingCard h2 {
      font-family: var(--font-serif);
      font-size: 1.25rem;
      font-weight: 800;
      color: var(--gold-primary);
      margin-top: 12px;
    }

    .pendingCard p {
      font-family: var(--font-mono);
      font-size: 0.68rem;
      color: var(--text-muted);
      margin: 12px 0 20px;
      line-height: 1.5;
    }

    .pendingInfoGrid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .pendingBox {
      background: rgba(0, 0, 0, 0.5);
      border: 1px solid var(--border-line);
      border-radius: 14px;
      padding: 12px;
    }
    .pendingBox .lbl { font-family: var(--font-mono); font-size: 0.58rem; color: var(--gold-muted); }
    .pendingBox .val { font-family: var(--font-mono); font-size: 0.95rem; font-weight: 800; color: #fff; margin-top: 4px; }

    .rejectedCard {
      padding: 30px 20px;
      text-align: center;
    }
    .rejectedCard h2 { font-family: var(--font-serif); font-size: 1.3rem; color: var(--accent-red); margin-top: 10px; }
    .rejectedCard p { font-family: var(--font-mono); font-size: 0.7rem; color: var(--text-muted); margin: 10px 0 20px; }

    .modeTabGrid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 18px;
    }

    .modeTabBtn {
      padding: 14px 10px;
      border-radius: 16px;
      border: 1.5px solid var(--border-line);
      background: rgba(0, 0, 0, 0.6);
      color: var(--text-muted);
      font-family: var(--font-serif);
      font-size: 0.85rem;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      cursor: pointer;
      transition: 0.25s ease;
    }

    .modeTabBtn.active {
      background: linear-gradient(135deg, rgba(229, 193, 88, 0.25), rgba(18, 16, 12, 0.95));
      border-color: var(--gold-primary);
      color: var(--gold-primary);
      box-shadow: 0 0 20px rgba(229, 193, 88, 0.3);
    }

    .periodCardGold {
      padding: 20px;
      text-align: center;
      background: linear-gradient(180deg, rgba(26, 23, 18, 0.9), rgba(12, 10, 8, 0.95));
      border: 1.5px solid var(--border-line);
      margin-bottom: 18px;
    }

    .periodCardGold .pTitle {
      font-family: var(--font-serif);
      font-size: 0.68rem;
      color: var(--gold-muted);
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    .periodCardGold .pNumber {
      font-family: var(--font-serif);
      font-size: 2.4rem;
      font-weight: 900;
      color: var(--gold-primary);
      margin-top: 6px;
      text-shadow: 0 0 25px rgba(229, 193, 88, 0.5);
      letter-spacing: 2px;
    }

    .predictionVaultHero {
      padding: 26px 18px;
      text-align: center;
      border: 1.5px solid var(--border-line);
      background: linear-gradient(180deg, rgba(30, 26, 20, 0.95), rgba(14, 12, 9, 0.98));
      position: relative;
    }

    .vaultBadgeHeader {
      display: inline-block;
      font-family: var(--font-serif);
      font-size: 0.65rem;
      font-weight: 800;
      color: var(--gold-primary);
      border: 1px solid var(--border-line);
      border-radius: 999px;
      padding: 4px 14px;
      background: rgba(229, 193, 88, 0.1);
      margin-bottom: 20px;
      letter-spacing: 1.5px;
    }

    .ballGlowDisplay {
      width: 140px;
      height: 140px;
      margin: 0 auto 16px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      background: radial-gradient(circle, rgba(229, 193, 88, 0.4) 0%, rgba(229, 193, 88, 0.1) 50%, transparent 70%);
      box-shadow: 0 0 45px rgba(229, 193, 88, 0.35);
      position: relative;
    }

    .ballGlowDisplay img {
      width: 110px;
      height: 110px;
      object-fit: contain;
      filter: drop-shadow(0 0 15px rgba(0,0,0,0.6));
      animation: ballPop 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    @keyframes ballPop { 0% { transform: scale(0.4) rotate(-90deg); } 100% { transform: scale(1) rotate(0deg); } }

    .bigSmallBanner {
      font-family: var(--font-serif);
      font-size: 3.2rem;
      font-weight: 900;
      letter-spacing: 4px;
      margin: 10px 0;
      text-transform: uppercase;
    }
    .bigSmallBanner.big { color: #ff9900; text-shadow: 0 0 25px rgba(255, 153, 0, 0.6); }
    .bigSmallBanner.small { color: var(--accent-cyan); text-shadow: 0 0 25px rgba(0, 234, 255, 0.6); }

    .lockedTextFooter {
      font-family: var(--font-serif);
      font-size: 0.68rem;
      color: var(--gold-secondary);
      letter-spacing: 1.5px;
      margin-top: 10px;
    }

    .nav {
      height: 72px;
      position: fixed;
      left: 50%;
      bottom: 12px;
      transform: translateX(-50%);
      width: min(100% - 24px, 476px);
      z-index: 90;
      padding: 6px;
      border-radius: 20px;
      background: rgba(18, 16, 12, 0.96);
      border: 1.5px solid var(--border-line);
      box-shadow: 0 10px 40px rgba(0,0,0,0.9);
      backdrop-filter: blur(18px);
      display: flex;
      align-items: center;
      justify-content: space-around;
    }

    .navBtn {
      flex: 1;
      height: 54px;
      border: 0;
      background: transparent;
      color: var(--text-muted);
      font-family: var(--font-serif);
      font-size: 0.65rem;
      font-weight: 700;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 3px;
      border-radius: 14px;
      cursor: pointer;
      transition: 0.2s;
    }
    .navBtn.active {
      background: var(--gradient-gold);
      color: #070706;
      box-shadow: 0 4px 15px rgba(229, 193, 88, 0.35);
    }

    .toast {
      position: fixed;
      left: 50%;
      bottom: 95px;
      z-index: 150;
      transform: translateX(-50%) translateY(16px);
      opacity: 0;
      background: rgba(18, 16, 12, 0.98);
      border: 1px solid var(--gold-primary);
      color: var(--gold-primary);
      font-family: var(--font-mono);
      font-size: 0.72rem;
      border-radius: 999px;
      padding: 9px 18px;
      box-shadow: 0 0 25px rgba(229, 193, 88, 0.3);
      transition: 0.25s;
      white-space: nowrap;
      pointer-events: none;
    }
    .toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }
  </style>
</head>
<body>
  <main class="app">
    <div id="toast" class="toast">Signal locked</div>

    <section class="scroll">
      
      <!-- PAGE 1: START / REGISTRATION LANDING VIEW -->
      <div id="startView" class="pageView active">
        <div class="top">
          <div class="brand">
            <div class="brandLogoWrap">
              <img id="appLogoImg1" class="brandLogo" src="<?php echo htmlspecialchars($logoUrl); ?>" alt="Logo">
            </div>
            <div class="brandText">
              <h1 id="appNameText1"><?php echo htmlspecialchars($appName); ?></h1>
              <p>WINGO 1 MINUTE // SECRET BOT</p>
            </div>
          </div>
          <div class="liveBadge"><i></i>ONLINE</div>
        </div>

        <div class="card tgProfileCard">
          <img id="tgUserPhoto" class="tgAvatar" src="<?php echo htmlspecialchars($logoUrl); ?>" onerror="this.style.display='none';document.getElementById('tgUserPhotoFallback').style.display='grid'">
          <div id="tgUserPhotoFallback" class="tgAvatarFallback" style="display:none">TG</div>
          <div class="tgDetails">
            <h2 id="tgUserName">Telegram User</h2>
            <p>ID: <span id="tgUserId">Loading...</span></p>
            <p>Username: <span id="tgUserHandle">@user</span></p>
            <span class="tgBadge">AUTHENTICATED MINI WEB</span>
          </div>
        </div>

        <div class="lottieBox">
          <dotlottie-player src="https://assets3.lottiefiles.com/packages/lf20_ucbywqin.json" background="transparent" speed="1" style="width:170px;height:170px;" loop autoplay></dotlottie-player>
        </div>

        <button id="registerLinkBtn" class="registerGlowBtn">
          ⚡ REGISTER NOW / OPEN GAME 🚀
        </button>

        <div class="card uidCard">
          <h3>SUBMIT YOUR GAME UID</h3>
          <p>Register on the game link above, then enter your Game UID below to request server access activation.</p>
          <input type="text" id="uidInput" class="uidInput" placeholder="Enter Your Game UID (e.g. 123456)" autocomplete="off">
          <button id="submitUidBtn" class="submitUidBtn">SUBMIT UID FOR APPROVAL</button>
        </div>
      </div>

      <!-- PAGE 2: PENDING APPROVAL VIEW (NATIVE CONTAINER, NO IFRAMES) -->
      <div id="pendingView" class="pageView">
        <div class="top">
          <div class="brand">
            <div class="brandLogoWrap">
              <img id="appLogoImg2" class="brandLogo" src="<?php echo htmlspecialchars($logoUrl); ?>" alt="Logo">
            </div>
            <div class="brandText">
              <h1 id="appNameText2"><?php echo htmlspecialchars($appName); ?></h1>
              <p>STATUS // PENDING APPROVAL</p>
            </div>
          </div>
          <div class="liveBadge"><i></i>CHECKING</div>
        </div>

        <div class="card pendingCard">
          <div class="lottieBox" style="height:140px;">
            <dotlottie-player src="https://assets9.lottiefiles.com/packages/lf20_cbr483v4.json" background="transparent" speed="1" style="width:140px;height:140px;" loop autoplay></dotlottie-player>
          </div>
          <h2>WAITING FOR ADMIN APPROVAL</h2>
          <p>Your registration request has been submitted to the Admin team. Once approved, your Wingo 1M Vault will unlock automatically!</p>
          
          <div class="pendingInfoGrid">
            <div class="pendingBox">
              <div class="lbl">SUBMITTED UID</div>
              <div id="pendingUidVal" class="val">------</div>
            </div>
            <div class="pendingBox">
              <div class="lbl">TELEGRAM ID</div>
              <div id="pendingTgIdVal" class="val">------</div>
            </div>
          </div>
        </div>
      </div>

      <!-- PAGE 3: REJECTED / ACCESS DENIED VIEW -->
      <div id="rejectedView" class="pageView">
        <div class="card rejectedCard">
          <div style="font-size:3rem;margin-bottom:10px;">🚫</div>
          <h2>ACCESS DENIED</h2>
          <p>Your access request was rejected by the admin. Please re-check your Game UID or contact the owner for assistance.</p>
          <button id="reSubmitBtn" class="submitUidBtn">RE-SUBMIT GAME UID</button>
        </div>
      </div>

      <!-- PAGE 4: UNLOCKED WINGO 1M VAULT DASHBOARD (OPEN ONLY AFTER APPROVAL) -->
      <div id="dashboardView" class="pageView">
        <div id="homeSubView" class="subView active">
          <div class="top">
            <div class="brand">
              <div class="brandLogoWrap">
                <img id="appLogoImg3" class="brandLogo" src="<?php echo htmlspecialchars($logoUrl); ?>" alt="Logo">
              </div>
              <div class="brandText">
                <h1 id="appNameText3"><?php echo htmlspecialchars($appName); ?></h1>
                <p>SECRET BOT // UNLOCKED CORE</p>
              </div>
            </div>
            <div class="liveBadge"><i></i>ONLINE</div>
          </div>

          <!-- 2 SECTION PREDICTION TABS -->
          <div class="modeTabGrid">
            <button id="tabModeNumber" class="modeTabBtn active">
              🎯 NUMBER
            </button>
            <button id="tabModeBigSmall" class="modeTabBtn">
              📊 BIG / SMALL
            </button>
          </div>

          <div class="card periodCardGold">
            <div class="pTitle">PERIOD NUMBER</div>
            <div id="periodDisplay" class="pNumber">---</div>
          </div>

          <div class="card predictionVaultHero">
            <div id="heroBadgeHeader" class="vaultBadgeHeader">SURESHOT · PERIOD ---</div>

            <!-- SECTION 1: NUMBER PREDICTION VIEW -->
            <div id="sectionNumberView">
              <div class="ballGlowDisplay">
                <img id="predictedBallImg" src="https://i.postimg.cc/2S5RDhH5/ball-7-c8babe29.png" alt="Ball 7">
              </div>
            </div>

            <!-- SECTION 2: BIG / SMALL PREDICTION VIEW -->
            <div id="sectionBigSmallView" style="display:none;">
              <div id="bigSmallOutcome" class="bigSmallBanner big">BIG</div>
              <div id="colorPill" style="font-family:var(--font-mono); font-size:0.75rem; color:var(--gold-primary); margin-bottom:10px;">COLOR: GREEN</div>
            </div>

            <div class="lockedTextFooter">
              LOCKED PREDICTION · PLAY WITH CONFIDENCE
            </div>
          </div>
        </div>

        <div id="helpSubView" class="subView" style="display:none">
          <div class="card" style="padding:24px; text-align:center;">
            <div style="font-size:2.5rem; margin-bottom:10px;">✈️</div>
            <h2 style="font-family:var(--font-serif); color:var(--gold-primary); margin-bottom:8px;">Contact Owner Support</h2>
            <p id="welcomeMsgText" style="font-family:var(--font-mono); font-size:0.7rem; color:var(--text-muted); margin-bottom:16px;">
              <?php echo htmlspecialchars($welcomeMsg); ?>
            </p>
            <button id="tgOwnerLinkBtn" class="submitUidBtn">OPEN t.me/abbsydurov SUPPORT</button>
          </div>
        </div>
      </div>

    </section>

    <nav id="bottomNav" class="nav" style="display:none">
      <button class="navBtn active" data-dashview="homeSubView"><span>⌬ HOME</span></button>
      <button class="navBtn" data-dashview="helpSubView"><span>✦ HELP</span></button>
    </nav>
  </main>

  <script>
    let isUserApproved = false;
    let appSettings = {
      app_name: "<?php echo addslashes($appName); ?>",
      logo_url: "<?php echo addslashes($logoUrl); ?>",
      register_link: "<?php echo addslashes($registerLink); ?>",
      welcome_message: "<?php echo addslashes($welcomeMsg); ?>",
      tg_owner_link: "<?php echo addslashes($tgOwnerLink); ?>"
    };

    const BALL_IMAGES = {
      0: 'https://i.postimg.cc/Wzrp0gRV/ball-0-053d2b99.png',
      1: 'https://i.postimg.cc/Qt7ZzDfk/ball-1-12ea01b7.png',
      2: 'https://i.postimg.cc/zvSZJjZy/ball-2-7d433738.png',
      3: 'https://i.postimg.cc/7hyr8Rcv/ball-3-a91cceac.png',
      4: 'https://i.postimg.cc/WbTc5Qgg/ball-4-cad06388.png',
      5: 'https://i.postimg.cc/28GRM27J/ball-5-8e182f0c.png',
      6: 'https://i.postimg.cc/c1QNMsgd/ball-6-44a39882.png',
      7: 'https://i.postimg.cc/2S5RDhH5/ball-7-c8babe29.png',
      8: 'https://i.postimg.cc/R03k39x5/ball-8-9d781b7c.png',
      9: 'https://i.postimg.cc/cL5q4CjB/ball-9-19985870.png'
    };

    const $ = id => document.getElementById(id);

    let tgUser = { id: "99887766", first_name: "Demo User", username: "demouser", photo_url: "" };
    if (window.Telegram && window.Telegram.WebApp) {
      window.Telegram.WebApp.ready();
      window.Telegram.WebApp.expand();
      const initUser = window.Telegram.WebApp.initDataUnsafe?.user;
      if (initUser) {
        tgUser.id = String(initUser.id);
        tgUser.first_name = initUser.first_name || "User";
        tgUser.username = initUser.username || "no_username";
        tgUser.photo_url = initUser.photo_url || "";
      }
    }

    $('tgUserId').textContent = tgUser.id;
    $('tgUserName').textContent = tgUser.first_name;
    $('tgUserHandle').textContent = "@" + tgUser.username;
    if (tgUser.photo_url) {
      $('tgUserPhoto').src = tgUser.photo_url;
      $('tgUserPhoto').style.display = 'block';
      $('tgUserPhotoFallback').style.display = 'none';
    }

    function switchPageView(viewId) {
      document.querySelectorAll('.pageView').forEach(el => el.classList.remove('active'));
      const target = $(viewId);
      if (target) target.classList.add('active');
      $('bottomNav').style.display = (viewId === 'dashboardView') ? 'flex' : 'none';
    }

    function checkUserStatus() {
      fetch(`api.php?action=check_status&telegram_id=${encodeURIComponent(tgUser.id)}`)
        .then(r => r.json())
        .then(res => {
          if (!res.registered || res.status === 'not_registered') {
            isUserApproved = false;
            switchPageView('startView');
          } else if (res.status === 'pending') {
            isUserApproved = false;
            $('pendingUidVal').textContent = res.uid || '------';
            $('pendingTgIdVal').textContent = tgUser.id;
            switchPageView('pendingView');
          } else if (res.status === 'rejected') {
            isUserApproved = false;
            switchPageView('rejectedView');
          } else if (res.status === 'approved') {
            if (!isUserApproved) {
              isUserApproved = true;
              switchPageView('dashboardView');
              fetchData();
            }
          }
        }).catch(err => console.error(err));
    }

    $('submitUidBtn').addEventListener('click', () => {
      const uidVal = $('uidInput').value.trim();
      if (!uidVal) return;
      fetch('api.php?action=submit_uid', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          telegram_id: tgUser.id,
          username: tgUser.username,
          first_name: tgUser.first_name,
          photo_url: tgUser.photo_url || "",
          uid: uidVal
        })
      }).then(r => r.json()).then(res => {
        if (res.success) checkUserStatus();
      });
    });

    $('reSubmitBtn').addEventListener('click', () => switchPageView('startView'));

    checkUserStatus();
    setInterval(checkUserStatus, 3000);

    $('tabModeNumber').addEventListener('click', () => {
      $('tabModeNumber').classList.add('active');
      $('tabModeBigSmall').classList.remove('active');
      $('sectionNumberView').style.display = 'block';
      $('sectionBigSmallView').style.display = 'none';
    });

    $('tabModeBigSmall').addEventListener('click', () => {
      $('tabModeBigSmall').classList.add('active');
      $('tabModeNumber').classList.remove('active');
      $('sectionNumberView').style.display = 'none';
      $('sectionBigSmallView').style.display = 'block';
    });

    const API_URL = 'https://draw.ar-lottery01.com/WinGo/WinGo_1M/GetHistoryIssuePage.json';
    let state = { currentPeriod: 'WAITING' };

    function generateRandomPrediction(period) {
      const periodStr = String(period);
      let hash = 0;
      for (let i = 0; i < periodStr.length; i++) hash = ((hash << 5) - hash) + periodStr.charCodeAt(i);
      hash = Math.abs(hash);
      const r1 = Math.abs(Math.sin(hash * 9301 + 49297) * 49297 % 1);
      const number = Math.floor(r1 * 10);
      const pred = number >= 5 ? 'BIG' : 'SMALL';
      let color = 'GREEN';
      if (number === 0) color = 'RED + VIOLET';
      else if (number === 5) color = 'GREEN + VIOLET';
      else if (number % 2 === 0) color = 'RED';
      return { pred, number, color };
    }

    function renderPrediction(p) {
      if (!isUserApproved) return;
      const shortPeriod = String(p.period).slice(-3);
      $('periodDisplay').textContent = shortPeriod;
      $('heroBadgeHeader').textContent = `SURESHOT · PERIOD ${shortPeriod}`;
      $('predictedBallImg').src = BALL_IMAGES[p.number] || BALL_IMAGES[7];
      $('bigSmallOutcome').textContent = p.pred;
      $('bigSmallOutcome').className = 'bigSmallBanner ' + p.pred.toLowerCase();
      $('colorPill').textContent = 'PREDICTED COLOR: ' + p.color;
    }

    async function fetchData() {
      if (!isUserApproved) return;
      try {
        const r = await fetch(API_URL + '?ts=' + Date.now());
        const j = await r.json();
        const list = j?.data?.list || j?.list || [];
        if (list.length > 0) {
          const raw = list[0]?.issueNumber;
          if (raw) {
            const next = (BigInt(String(raw)) + 1n).toString();
            if (next !== state.currentPeriod) {
              state.currentPeriod = next;
              const res = generateRandomPrediction(next);
              renderPrediction({ period: next, ...res });
            }
          }
        }
      } catch(e) {}
    }

    setInterval(() => { if (isUserApproved) fetchData(); }, 5000);
  </script>
</body>
</html>
