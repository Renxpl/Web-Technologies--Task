<?php
session_start();


$users = [
    'b1812100001@sakarya.edu.tr' => 'b1812100001',
];

$email = $_POST['email'];
$password = $_POST['password'];


if (empty($email) || empty($password)) {
    echo "Kullanıcı adı ve şifre boş geçilemez. Lütfen tekrar deneyin.";
    header("Refresh: 3; url=login.html"); 
    exit;
}


if (filter_var($email, FILTER_VALIDATE_EMAIL) && isset($users[$email]) && $users[$email] === $password) {
    $_SESSION['user'] = $email;
    echo "Hoşgeldiniz “$email”. Giriş başarılı!";
    header("Refresh: 5; url=index.html");
} else {
    echo "Kullanıcı adı veya şifre hatalı. Lütfen tekrar deneyin.";
    header("Refresh: 3; url=login.html"); 
    exit;
}
?>