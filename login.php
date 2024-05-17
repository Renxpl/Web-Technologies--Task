<?php
session_start();

// Basit bir kullanıcı veritabanı örneği (gerçek uygulamalarda bu veriler veritabanında saklanır)
$users = [
    'b1812100001@sakarya.edu.tr' => 'b1812100001',
    // Diğer kullanıcılar...
];
// Formdan gelen verileri al
$email = $_POST['email'];
$password = $_POST['password'];

// E-posta ve şifrenin boş olup olmadığını kontrol et
if (empty($email) || empty($password)) {
    echo "Kullanıcı adı ve şifre boş geçilemez. Lütfen tekrar deneyin.";
    header("Refresh: 3; url=login.html"); // 3 saniye sonra login sayfasına geri yönlendir
    exit;
}

// Kullanıcı adı (e-posta) ve şifre kontrolü
if (filter_var($email, FILTER_VALIDATE_EMAIL) && isset($users[$email]) && $users[$email] === $password) {
    $_SESSION['user'] = $email;
    echo "Hoşgeldiniz “$email”. Giriş başarılı!";
    // Giriş başarılı, başka bir sayfaya yönlendirilebilir
    header("Refresh: 5; url=index.html");
} else {
    echo "Kullanıcı adı veya şifre hatalı. Lütfen tekrar deneyin.";
    header("Refresh: 3; url=login.html"); // 3 saniye sonra login sayfasına geri yönlendir
    exit;
}
?>