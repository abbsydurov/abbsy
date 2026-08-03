<?php
// admin.php - PRIVATE WINGO Admin Control Panel (PHP + SQL Backend)
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>PRIVATE WINGO - Admin Control Panel</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --wp--preset--aspect-ratio--square: 1;
      --wp--preset--aspect-ratio--4-3: 4 / 3;
      --wp--preset--aspect-ratio--3-4: 3 / 4;
      --wp--preset--aspect-ratio--3-2: 3 / 2;
      --wp--preset--aspect-ratio--2-3: 2 / 3;
      --wp--preset--aspect-ratio--16-9: 16 / 9;
      --wp--preset--aspect-ratio--9-16: 9 / 16;
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #ffffff;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgb(6, 147, 227) 0%, rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgb(252, 185, 0) 0%, rgb(255, 105, 0) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgb(255, 105, 0) 0%, rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
      --wp--preset--font-size--small: 13px;
      --wp--preset--font-size--normal: 16px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36px;
      --wp--preset--font-size--x-large: 42px;
      --wp--preset--font-size--huge: 42px;
      --wp--preset--spacing--20: 0.44rem;
      --wp--preset--spacing--30: 0.67rem;
      --wp--preset--spacing--40: 1rem;
      --wp--preset--spacing--50: 1.5rem;
      --wp--preset--spacing--60: 2.25rem;
      --wp--preset--spacing--70: 3.38rem;
      --wp--preset--spacing--80: 5.06rem;
      --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
      --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--outlined: 6px 6px 0px -3px rgb(255, 255, 255), 6px 6px rgb(0, 0, 0);
      --wp--preset--shadow--crisp: 6px 6px 0px rgb(0, 0, 0);

      --bg-dark: #080c14;
      --panel-dark: #0f172a;
      --panel-card: #1e293b;
      --border-line: rgba(255, 255, 255, 0.12);
      --text-main: #f8fafc;
      --text-muted: #94a3b8;
      --accent-cyan: #0693e3;
      --accent-purple: #9b51e0;
      --accent-green: #00d084;
      --accent-orange: #ff6900;
      --accent-red: #cf2e2e;
    }

    ::selection {
      background: #F0D200;
      color: #000;
      text-shadow: none;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: var(--bg-dark);
      background-image: 
        radial-gradient(circle at 15% 15%, rgba(6, 147, 227, 0.15), transparent 40%),
        radial-gradient(circle at 85% 85%, rgba(155, 81, 224, 0.15), transparent 40%);
      color: var(--text-main);
      min-height: 100vh;
      padding: 2rem 1rem;
    }

    /* Security Passcode Modal */
    .lockModal {
      position: fixed;
      inset: 0;
      background: rgba(8, 12, 20, 0.95);
      backdrop-filter: blur(20px);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    .lockBox {
      background: var(--panel-dark);
      border: 1px solid var(--border-line);
      border-radius: 24px;
      padding: 2.5rem 2rem;
      max-width: 400px;
      width: 100%;
      text-align: center;
      box-shadow: var(--wp--preset--shadow--deep);
    }

    .lockIcon {
      font-size: 3rem;
      margin-bottom: 1rem;
      display: inline-block;
    }

    .lockBox h2 {
      font-size: 1.5rem;
      font-weight: 800;
      margin-bottom: 0.5rem;
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple);
      -webkit-background-clip: text;
      color: transparent;
    }

    .lockBox p {
      font-size: var(--wp--preset--font-size--small);
      color: var(--text-muted);
      margin-bottom: 1.5rem;
      font-family: 'JetBrains Mono', monospace;
    }

    .passInput {
      width: 100%;
      padding: 14px 18px;
      border-radius: 12px;
      background: rgba(0, 0, 0, 0.5);
      border: 1px solid var(--border-line);
      color: #fff;
      font-family: 'JetBrains Mono', monospace;
      font-size: 1.1rem;
      text-align: center;
      margin-bottom: 1.2rem;
      outline: none;
      transition: 0.2s;
    }

    .passInput:focus {
      border-color: var(--accent-cyan);
      box-shadow: 0 0 20px rgba(6, 147, 227, 0.3);
    }

    .unlockBtn {
      width: 100%;
      padding: 14px;
      border-radius: 12px;
      border: 0;
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple);
      color: #fff;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      font-size: 1rem;
      cursor: pointer;
      box-shadow: 0 4px 20px rgba(6, 147, 227, 0.35);
      transition: 0.2s;
    }

    .unlockBtn:hover {
      transform: translateY(-2px);
      filter: brightness(1.1);
    }

    /* Header Bar */
    header {
      max-width: 1200px;
      margin: 0 auto 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid var(--border-line);
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .brandSigil {
      width: 52px;
      height: 52px;
      border-radius: 16px;
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple);
      display: grid;
      place-items: center;
      font-size: 1.5rem;
      box-shadow: 0 0 25px rgba(6, 147, 227, 0.4);
    }

    .brandText h1 {
      font-size: 1.5rem;
      font-weight: 900;
      letter-spacing: -0.5px;
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple);
      -webkit-background-clip: text;
      color: transparent;
    }

    .brandText p {
      font-family: 'JetBrains Mono', monospace;
      font-size: var(--wp--preset--font-size--small);
      color: var(--text-muted);
    }

    .topRightActions {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .liveBadge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 14px;
      border-radius: 999px;
      background: rgba(0, 208, 132, 0.12);
      border: 1px solid rgba(0, 208, 132, 0.3);
      color: var(--accent-green);
      font-size: var(--wp--preset--font-size--small);
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
    }

    .livePulse {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--accent-green);
      box-shadow: 0 0 10px var(--accent-green);
      animation: pulse 1.2s infinite alternate;
    }

    @keyframes pulse { to { opacity: 0.3; transform: scale(0.7); } }

    .logoutBtn {
      background: rgba(207, 46, 46, 0.15);
      border: 1px solid rgba(207, 46, 46, 0.3);
      color: #ff8585;
      padding: 8px 16px;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
      transition: 0.2s;
    }
    .logoutBtn:hover {
      background: var(--accent-red);
      color: #fff;
    }

    /* Layout Container */
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    /* Metrics Grid Cards */
    .metricsGrid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.2rem;
      margin-bottom: 2rem;
    }

    .metricCard {
      background: var(--panel-dark);
      border: 1px solid var(--border-line);
      border-radius: 20px;
      padding: 1.5rem;
      box-shadow: var(--wp--preset--shadow--deep);
      position: relative;
      overflow: hidden;
    }

    .metricCard::after {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      width: 80px;
      height: 80px;
      background: radial-gradient(circle, rgba(255,255,255,0.05), transparent 70%);
      pointer-events: none;
    }

    .metricLabel {
      font-family: 'JetBrains Mono', monospace;
      font-size: var(--wp--preset--font-size--small);
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .metricVal {
      font-size: 2.2rem;
      font-weight: 900;
      margin-top: 0.5rem;
      font-family: 'JetBrains Mono', monospace;
    }

    .metricVal.blue { color: var(--accent-cyan); }
    .metricVal.gold { color: var(--accent-orange); }
    .metricVal.green { color: var(--accent-green); }
    .metricVal.red { color: var(--accent-red); }

    /* Control Tabs & Search Bar */
    .panelHeader {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .tabGroup {
      display: flex;
      gap: 0.5rem;
      background: var(--panel-dark);
      padding: 6px;
      border-radius: 14px;
      border: 1px solid var(--border-line);
    }

    .tabBtn {
      padding: 10px 18px;
      border-radius: 10px;
      border: 0;
      background: transparent;
      color: var(--text-muted);
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
      transition: 0.2s;
    }

    .tabBtn.active {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple);
      color: #fff;
      box-shadow: 0 4px 15px rgba(6, 147, 227, 0.3);
    }

    .searchBox {
      position: relative;
      min-width: 280px;
    }

    .searchInput {
      width: 100%;
      padding: 11px 16px 11px 40px;
      border-radius: 12px;
      background: var(--panel-dark);
      border: 1px solid var(--border-line);
      color: #fff;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      outline: none;
    }

    .searchInput:focus {
      border-color: var(--accent-cyan);
    }

    .searchIcon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: 14px;
    }

    /* Main Data Table */
    .tableCard {
      background: var(--panel-dark);
      border: 1px solid var(--border-line);
      border-radius: 24px;
      box-shadow: var(--wp--preset--shadow--deep);
      overflow: hidden;
    }

    .tableWrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
    }

    th {
      background: rgba(0, 0, 0, 0.4);
      padding: 1rem 1.2rem;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 1px solid var(--border-line);
    }

    td {
      padding: 1.1rem 1.2rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      font-size: 14px;
      vertical-align: middle;
    }

    tr:last-child td {
      border-bottom: 0;
    }

    tr:hover td {
      background: rgba(255, 255, 255, 0.02);
    }

    .userProfileCell {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .userAvatar {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      object-fit: cover;
      border: 1.5px solid var(--accent-cyan);
    }

    .avatarFallback {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple);
      display: grid;
      place-items: center;
      font-weight: 800;
      font-size: 14px;
      color: #fff;
    }

    .userName {
      font-weight: 700;
      color: #fff;
    }

    .userHandle {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      color: var(--text-muted);
    }

    .codeBadge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 8px;
      background: rgba(0, 0, 0, 0.4);
      border: 1px solid var(--border-line);
      color: var(--accent-cyan);
    }

    .statusBadge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 12px;
      border-radius: 999px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 800;
      text-transform: uppercase;
    }

    .statusBadge.pending {
      background: rgba(255, 105, 0, 0.12);
      border: 1px solid rgba(255, 105, 0, 0.35);
      color: var(--accent-orange);
    }

    .statusBadge.approved {
      background: rgba(0, 208, 132, 0.12);
      border: 1px solid rgba(0, 208, 132, 0.35);
      color: var(--accent-green);
    }

    .statusBadge.rejected {
      background: rgba(207, 46, 46, 0.12);
      border: 1px solid rgba(207, 46, 46, 0.35);
      color: #ff8585;
    }

    .actionGroup {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btnApprove {
      padding: 7px 14px;
      border-radius: 8px;
      border: 0;
      background: var(--accent-green);
      color: #000;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 800;
      cursor: pointer;
      transition: 0.2s;
    }

    .btnApprove:hover {
      filter: brightness(1.15);
      box-shadow: 0 0 12px rgba(0, 208, 132, 0.4);
    }

    .btnReject {
      padding: 7px 14px;
      border-radius: 8px;
      border: 0;
      background: rgba(207, 46, 46, 0.2);
      border: 1px solid rgba(207, 46, 46, 0.4);
      color: #ff8585;
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      font-weight: 800;
      cursor: pointer;
      transition: 0.2s;
    }

    .btnReject:hover {
      background: var(--accent-red);
      color: #fff;
    }

    .btnDelete {
      padding: 7px 10px;
      border-radius: 8px;
      border: 1px solid var(--border-line);
      background: rgba(0,0,0,0.3);
      color: var(--text-muted);
      cursor: pointer;
      font-size: 13px;
    }

    .btnDelete:hover {
      border-color: var(--accent-red);
      color: var(--accent-red);
    }

    /* System Settings Editor Form */
    .settingsCard {
      background: var(--panel-dark);
      border: 1px solid var(--border-line);
      border-radius: 24px;
      padding: 2rem;
      box-shadow: var(--wp--preset--shadow--deep);
    }

    .settingsCard h3 {
      font-size: 1.3rem;
      font-weight: 800;
      margin-bottom: 1.5rem;
      color: var(--accent-cyan);
    }

    .formGrid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 1.5rem;
    }

    .formGroup {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .formGroup.full {
      grid-column: 1 / -1;
    }

    .formGroup label {
      font-family: 'JetBrains Mono', monospace;
      font-size: 12px;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .formGroup input, .formGroup textarea {
      padding: 12px 16px;
      border-radius: 12px;
      background: rgba(0, 0, 0, 0.4);
      border: 1px solid var(--border-line);
      color: #fff;
      font-family: 'JetBrains Mono', monospace;
      font-size: 14px;
      outline: none;
    }

    .formGroup input:focus, .formGroup textarea:focus {
      border-color: var(--accent-cyan);
    }

    .saveBtn {
      padding: 14px 28px;
      border-radius: 12px;
      border: 0;
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple);
      color: #fff;
      font-family: 'JetBrains Mono', monospace;
      font-size: 1rem;
      font-weight: 800;
      cursor: pointer;
      margin-top: 1rem;
      box-shadow: 0 4px 20px rgba(6, 147, 227, 0.4);
      transition: 0.2s;
    }

    .saveBtn:hover {
      filter: brightness(1.15);
      transform: translateY(-2px);
    }

    /* Toast Notification */
    .toast {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      background: var(--panel-dark);
      border: 1px solid var(--accent-cyan);
      color: #fff;
      padding: 12px 24px;
      border-radius: 999px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      transform: translateY(100px);
      opacity: 0;
      transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      z-index: 10000;
    }

    .toast.show {
      transform: translateY(0);
      opacity: 1;
    }
  </style>
</head>
<body>

  <!-- Passcode Protection Modal -->
  <div id="lockModal" class="lockModal">
    <div class="lockBox">
      <div class="lockIcon">🔐</div>
      <h2>ADMIN CONTROL PANEL</h2>
      <p>Enter master passcode to unlock management suite</p>
      <input type="password" id="passInput" class="passInput" placeholder="Enter Passcode" autofocus autocomplete="off">
      <button id="unlockBtn" class="unlockBtn">UNLOCK SYSTEM</button>
    </div>
  </div>

  <div id="toast" class="toast">Action completed successfully</div>

  <header>
    <div class="brand">
      <div class="brandSigil">⚙️</div>
      <div class="brandText">
        <h1>PRIVATE WINGO ADMIN</h1>
        <p>PHP + SQL USER MANAGEMENT & SYSTEM CORE</p>
      </div>
    </div>
    <div class="topRightActions">
      <div class="liveBadge"><span class="livePulse"></span> SQL LIVE CONNECTED</div>
      <button id="logoutBtn" class="logoutBtn">LOCK PANEL</button>
    </div>
  </header>

  <main class="container">
    <!-- Metric Cards Overview -->
    <section class="metricsGrid">
      <div class="metricCard">
        <div class="metricLabel">Total Registered Users</div>
        <div id="metricTotal" class="metricVal blue">0</div>
      </div>
      <div class="metricCard">
        <div class="metricLabel">Pending Approvals</div>
        <div id="metricPending" class="metricVal gold">0</div>
      </div>
      <div class="metricCard">
        <div class="metricLabel">Approved Users</div>
        <div id="metricApproved" class="metricVal green">0</div>
      </div>
      <div class="metricCard">
        <div class="metricLabel">Rejected Users</div>
        <div id="metricRejected" class="metricVal red">0</div>
      </div>
    </section>

    <!-- Controls Header (Tabs & Search Bar) -->
    <section class="panelHeader">
      <div class="tabGroup">
        <button class="tabBtn active" data-filter="pending">⏳ PENDING (<span id="countPendingTab">0</span>)</button>
        <button class="tabBtn" data-filter="approved">✅ APPROVED</button>
        <button class="tabBtn" data-filter="rejected">❌ REJECTED</button>
        <button class="tabBtn" data-filter="all">👥 ALL USERS</button>
        <button class="tabBtn" data-filter="settings">⚙️ SETTINGS</button>
      </div>

      <div id="searchBoxWrap" class="searchBox">
        <span class="searchIcon">🔍</span>
        <input type="text" id="searchInput" class="searchInput" placeholder="Filter by Name, Username, TG ID, UID...">
      </div>
    </section>

    <!-- Data Table View -->
    <section id="tableContainer" class="tableCard">
      <div class="tableWrapper">
        <table>
          <thead>
            <tr>
              <th>Telegram User</th>
              <th>Telegram ID</th>
              <th>Submitted Game UID</th>
              <th>Registration Date</th>
              <th>Status</th>
              <th style="text-align: right;">Actions</th>
            </tr>
          </thead>
          <tbody id="userTableBody">
            <tr>
              <td colspan="6" style="text-align:center; padding:3rem; color:var(--text-muted); font-family:'JetBrains Mono';">
                Loading SQL user records...
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Settings View (Hidden by default) -->
    <section id="settingsContainer" class="settingsCard" style="display: none;">
      <h3>⚙️ SYSTEM CORE CONFIGURATION</h3>
      <div class="formGrid">
        <div class="formGroup">
          <label>APP / BOT NAME</label>
          <input type="text" id="cfgAppName" placeholder="PRIVATE WINGO">
        </div>
        <div class="formGroup">
          <label>APP LOGO IMAGE URL</label>
          <input type="text" id="cfgLogoUrl" placeholder="https://...">
        </div>
        <div class="formGroup">
          <label>REGISTER BUTTON LINK (Game URL)</label>
          <input type="text" id="cfgRegisterLink" placeholder="https://t.me/abbsydurov">
        </div>
        <div class="formGroup">
          <label>TELEGRAM OWNER / SUPPORT LINK</label>
          <input type="text" id="cfgTgOwnerLink" placeholder="https://t.me/abbsydurov">
        </div>
        <div class="formGroup full">
          <label>WELCOME / SUPPORT MESSAGE</label>
          <textarea id="cfgWelcomeMsg" rows="3" placeholder="Support message..."></textarea>
        </div>
      </div>
      <button id="saveCfgBtn" class="saveBtn">SAVE SYSTEM CONFIGURATION</button>
    </section>
  </main>

  <script>
    let allUsersList = [];
    let currentFilter = 'pending';

    const $ = id => document.getElementById(id);

    // Passcode Unlock Logic
    const PASSCODE = "admin123";
    
    $('unlockBtn').addEventListener('click', checkPasscode);
    $('passInput').addEventListener('keypress', e => { if (e.key === 'Enter') checkPasscode(); });

    function checkPasscode() {
      const input = $('passInput').value;
      if (input === PASSCODE || input === "admin") {
        $('lockModal').style.display = 'none';
        showToast('🔓 Admin Panel Unlocked!');
        loadUsersData();
        loadSettingsData();
      } else {
        alert('❌ Incorrect Admin Passcode!');
      }
    }

    $('logoutBtn').addEventListener('click', () => {
      $('lockModal').style.display = 'flex';
      $('passInput').value = '';
    });

    function showToast(msg) {
      const t = $('toast');
      t.textContent = msg;
      t.classList.add('show');
      setTimeout(() => t.classList.remove('show'), 2500);
    }

    // Load Users from api.php
    function loadUsersData() {
      fetch('api.php?action=admin_get_users')
        .then(r => r.json())
        .then(res => {
          if (res.success) {
            allUsersList = res.users || [];
            updateMetrics();
            renderTable();
          }
        })
        .catch(err => console.error(err));
    }

    // Load Settings from api.php
    function loadSettingsData() {
      fetch('api.php?action=get_settings')
        .then(r => r.json())
        .then(res => {
          if (res.success && res.settings) {
            const s = res.settings;
            $('cfgAppName').value = s.app_name || '';
            $('cfgLogoUrl').value = s.logo_url || '';
            $('cfgRegisterLink').value = s.register_link || '';
            $('cfgTgOwnerLink').value = s.tg_owner_link || '';
            $('cfgWelcomeMsg').value = s.welcome_message || '';
          }
        })
        .catch(err => console.error(err));
    }

    // Metrics Overview Calculator
    function updateMetrics() {
      const total = allUsersList.length;
      const pending = allUsersList.filter(u => u.status === 'pending').length;
      const approved = allUsersList.filter(u => u.status === 'approved').length;
      const rejected = allUsersList.filter(u => u.status === 'rejected').length;

      $('metricTotal').textContent = total;
      $('metricPending').textContent = pending;
      $('metricApproved').textContent = approved;
      $('metricRejected').textContent = rejected;
      $('countPendingTab').textContent = pending;
    }

    // Render Data Table with Filters & Search
    function renderTable() {
      const tbody = $('userTableBody');
      const searchQuery = $('searchInput').value.toLowerCase().trim();

      let filtered = allUsersList.filter(u => {
        if (currentFilter === 'pending' && u.status !== 'pending') return false;
        if (currentFilter === 'approved' && u.status !== 'approved') return false;
        if (currentFilter === 'rejected' && u.status !== 'rejected') return false;

        if (searchQuery) {
          const matchName = (u.first_name || '').toLowerCase().includes(searchQuery);
          const matchUser = (u.username || '').toLowerCase().includes(searchQuery);
          const matchTg = String(u.telegram_id || '').includes(searchQuery);
          const matchUid = String(u.uid || '').toLowerCase().includes(searchQuery);
          return matchName || matchUser || matchTg || matchUid;
        }

        return true;
      });

      if (filtered.length === 0) {
        tbody.innerHTML = `
          <tr>
            <td colspan="6" style="text-align:center; padding:3rem; color:var(--text-muted); font-family:'JetBrains Mono';">
              No matching user records found in database.
            </td>
          </tr>`;
        return;
      }

      tbody.innerHTML = filtered.map(u => {
        const photo = u.photo_url 
          ? `<img class="userAvatar" src="${u.photo_url}" onerror="this.style.display='none';this.nextElementSibling.style.display='grid'">
             <div class="avatarFallback" style="display:none">${(u.first_name || 'U').charAt(0)}</div>`
          : `<div class="avatarFallback">${(u.first_name || 'U').charAt(0)}</div>`;

        const dateStr = u.created_at ? new Date(u.created_at).toLocaleString() : 'N/A';

        return `
          <tr>
            <td>
              <div class="userProfileCell">
                ${photo}
                <div>
                  <div class="userName">${u.first_name || 'User'}</div>
                  <div class="userHandle">@${u.username || 'no_handle'}</div>
                </div>
              </div>
            </td>
            <td><code class="codeBadge">${u.telegram_id}</code></td>
            <td><code class="codeBadge" style="color:var(--accent-green);">${u.uid || 'N/A'}</code></td>
            <td style="font-family:'JetBrains Mono'; font-size:12px; color:var(--text-muted);">${dateStr}</td>
            <td><span class="statusBadge ${u.status}">${u.status}</span></td>
            <td style="text-align: right;">
              <div class="actionGroup" style="justify-content: flex-end;">
                ${u.status !== 'approved' ? `<button class="btnApprove" onclick="updateStatus('${u.telegram_id}', 'approved')">✅ Approve</button>` : ''}
                ${u.status !== 'rejected' ? `<button class="btnReject" onclick="updateStatus('${u.telegram_id}', 'rejected')">❌ Reject</button>` : ''}
                <button class="btnDelete" onclick="deleteUser('${u.telegram_id}')" title="Delete User">🗑️</button>
              </div>
            </td>
          </tr>
        `;
      }).join('');
    }

    // Action Handlers
    window.updateStatus = function(tgId, newStatus) {
      fetch('api.php?action=admin_update_status', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ telegram_id: tgId, status: newStatus })
      })
      .then(r => r.json())
      .then(res => {
        if (res.success) {
          showToast(`✅ Status updated to ${newStatus.toUpperCase()}`);
          loadUsersData();
        } else {
          alert('Error: ' + res.error);
        }
      });
    };

    window.deleteUser = function(tgId) {
      if (!confirm(`Are you sure you want to delete user ${tgId}?`)) return;

      fetch('api.php?action=admin_delete_user', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ telegram_id: tgId })
      })
      .then(r => r.json())
      .then(res => {
        if (res.success) {
          showToast('🗑️ User record deleted');
          loadUsersData();
        }
      });
    };

    // Tab Navigation
    document.querySelectorAll('.tabBtn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.tabBtn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentFilter = btn.dataset.filter;

        if (currentFilter === 'settings') {
          $('tableContainer').style.display = 'none';
          $('searchBoxWrap').style.display = 'none';
          $('settingsContainer').style.display = 'block';
        } else {
          $('settingsContainer').style.display = 'none';
          $('tableContainer').style.display = 'block';
          $('searchBoxWrap').style.display = 'block';
          renderTable();
        }
      });
    });

    // Search Input Listener
    $('searchInput').addEventListener('input', renderTable);

    // Save Settings Form
    $('saveCfgBtn').addEventListener('click', () => {
      const settingsPayload = {
        app_name: $('cfgAppName').value.trim(),
        logo_url: $('cfgLogoUrl').value.trim(),
        register_link: $('cfgRegisterLink').value.trim(),
        tg_owner_link: $('cfgTgOwnerLink').value.trim(),
        welcome_message: $('cfgWelcomeMsg').value.trim()
      };

      fetch('api.php?action=admin_save_settings', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ settings: settingsPayload })
      })
      .then(r => r.json())
      .then(res => {
        if (res.success) {
          showToast('✅ System Settings Saved & Live Synced!');
        } else {
          alert('Error: ' + res.error);
        }
      })
      .catch(err => alert('Save failed: ' + err.message));
    });

    // Auto-refresh users every 5 seconds
    setInterval(() => {
      if ($('lockModal').style.display === 'none') {
        loadUsersData();
      }
    }, 5000);
  </script>
</body>
</html>
