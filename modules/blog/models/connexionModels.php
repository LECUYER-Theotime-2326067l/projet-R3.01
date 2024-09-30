<?php
// Vérifier si la session est déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    ini_set('session.gc_maxlifetime', 86400); //1jour
    session_set_cookie_params(86400);
    session_start();
} else {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new PDO('mysql:host=localhost;dbname=ton_database', 'username', 'password');

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];
        header('Location: index.php?action=homepage');
    } else {
        echo 'Identifiants incorrects.';
    }
}
?>
