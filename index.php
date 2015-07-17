<?PHP

session_start();
//Enable display all errors
error_reporting(E_ALL & ~E_NOTICE);

include '/config.php';

//Connecting to DB
try {
    $dbObject = new PDO(DSN, DB_USER, DB_PASS);
    $dbObject->exec('SET CHARACTER SET utf8');
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

include (SITE_PATH . DS . 'core' . DS . 'core.php');
//loading router
$router = new Router($registry);
//Setting controllers path
$router->setPath(SITE_PATH . 'controllers');
$router->start();





















