<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>Khat Studio | تسجيل الدخول</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&display=swap');

    body {
      font-family: 'Tajawal', sans-serif;
      background-color: #f6f7fb;
      margin: 0;
      padding: 0;
      text-align: center;
      direction: rtl;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      justify-content: center;
      align-items: center;
    }

    .container {
      background: white;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 90%;
    }

    h1 {
      color: #8b96d0;
      margin-bottom: 15px;
    }

    p {
      color: #555;
      margin-bottom: 25px;
      font-size: 18px;
    }

    a.btn {
      display: inline-block;
      background: #8b96d0;
      color: white;
      padding: 12px 25px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      transition: background 0.3s;
    }

    a.btn:hover {
      background: #7681b5;
    }

    footer {
      margin-top: 40px;
      color: #aaa;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>تسجيل الدخول</h1>
    <p>اضغط للمتابعة باستخدام حساب ديسكورد</p>
    <a class="btn"
      href="https://discord.com/api/oauth2/authorize?client_id=1387386006952476834&redirect_uri=https%3A%2F%2FKhatStudio.com%2F&response_type=token&scope=identify">
      تسجيل دخول كعضو
    </a>
  </div>

  <footer>
    جميع الحقوق محفوظة © Khat Studio
  </footer>

</body>
</html>