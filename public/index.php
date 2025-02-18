<?php

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/Controllers/' . $class . '.php',
        __DIR__ . '/../app/Models/' . $class . '.php'
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Récupérer le paramètre d'action depuis l'URL
$action = $_GET['action'] ?? '';
$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri    = rtrim($uri, '/');

// Définir les routes de base
switch ($uri) {
    case '':
    case '/':
    case '/login':
        $controller = new UserController();
        if ($action === 'doLogin') {
            $controller->doLogin();
        } else {
            $controller->login();
        }
        break;
        
   
        
  
        
    case '/logout':
        $controller = new UserController();
        $controller->logout();
        break;
        
    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}
?>
