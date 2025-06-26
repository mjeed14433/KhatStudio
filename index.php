<?php
session_start();

// إعدادات OAuth2
$client_id = '1387386006952476834';
$client_secret = 'cRKhHCZ-DyMGSOG9T8EgrUbbP1sEHHj1';
$redirect_uri = 'https://KhatStudio.com/';

// عند الرجوع من Discord
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $data = [
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirect_uri,
        'scope' => 'identify'
    ];

    $ch = curl_init('https://discord.com/api/oauth2/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    if (isset($response['access_token'])) {
        $access_token = $response['access_token'];

        $ch = curl_init('https://discord.com/api/users/@me');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $access_token]);
        $user = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $_SESSION['user'] = $user;
    }
}

// تسجيل الخروج
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>Khat Studio | تسجيل الدخول</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&display=swap');

    body {
      font-family: 'Tajawal', sans-serif;
      background-color: #f6f7fb;
      margin: 0;
      padding: 0;
      text-align: center;
      direction: rtl;
    }

    header {
      background-color: #181a1f;
      color: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header img {
      height: 40px;
    }

    nav {
      display: flex;
      gap: 1.5rem;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .container {
      padding: 40px 20px;
    }

    .box {
      background: white;
      padding: 30px;
      border-radius: 12px;
      display: inline-block;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .box img.logo {
      height: 80px;
      margin-bottom: 20px;
    }

    h1 {
      color: #8b96d0;
      margin-bottom: 10px;
    }

    p {
      color: #555;
      margin-bottom: 20px;
    }

    a.btn {
      display: inline-block;
      background: #8b96d0;
      color: white;
      padding: 12px 20px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      transition: background 0.3s;
    }

    a.btn:hover {
      background: #7681b5;
    }

    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 15px;
    }

    footer {
      margin-top: 40px;
      color: #aaa;
      font-size: 14px;
    }

    @media (max-width: 600px) {
      nav { display: none; }
    }
  </style>
</head>
<body>

<header>
  <img src="logo.png" alt="شعار Khat Studio">
  <nav>
    <a href="#">الرئيسية</a>
    <a href="#">الخدمات</a>
    <a href="#">الباقات</a>
    <a href="#">تواصل معنا</a>
  </nav>
</header>

<div class="container">
  <div class="box">
    <?php if (isset($_SESSION['user'])): ?>
      <img class="avatar" src="https://cdn.discordapp.com/avatars/<?= $_SESSION['user']['id'] ?>/<?= $_SESSION['user']['avatar'] ?>.png" alt="Avatar">
      <h1>مرحبًا <?= htmlspecialchars($_SESSION['user']['username']) ?>!</h1>
      <p>سعداء بانضمامك إلى Khat Studio</p>
      <a class="btn" href="?logout=true">تسجيل الخروج</a>
    <?php else: ?>
      <img src="logo.png" class="logo" alt="Khat Studio Logo">
      <h1>تسجيل الدخول</h1>
      <p>اضغط للمتابعة باستخدام حساب ديسكورد</p>
      <a class="btn" href="https://discord.com/oauth2/authorize?client_id=1387386006952476834&response_type=code&redirect_uri=https%3A%2F%2FKhatStudio.com%2F&scope=identify">
        تسجيل دخول كعضو
      </a>
    <?php endif; ?>
  </div>
</div>

<footer>
  جميع الحقوق محفوظة © Khat Studio
</footer>

</body>
</html>
