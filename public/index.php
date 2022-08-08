<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

use \PDO;

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '@2022Tt@';
    private $dbname = 'bioslim_api';

    public function connect()
    {
        $conn_str = "mysql:host=$this->host;dbname=$this->dbname";
        $conn = new PDO($conn_str, $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}

// Criando as rotas para solicitações http.
// use Slim\App\Models\Models\Db\DB;

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

  //  Operações no banco:
  // Saque  
  $app->get('/saque', function (Request $request, Response $response) {
    $sql = "SELECT * FROM saque";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $saque = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($saque));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    } catch (PDOException $e) {
      $error = array(
        "message" => $e->getMessage()
      );
   
      $response->getBody()->write(json_encode($error));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
    }
   });

  //  Saque por conta
   $app->get('/saque/{conta}', function (Request $request, Response $response) {
    $conta = $request->getAttribute('conta');
    $sql = "SELECT * FROM saque Where conta = $conta";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $saque = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($saque));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    } catch (PDOException $e) {
      $error = array(
        "message" => $e->getMessage()
      );
   
      $response->getBody()->write(json_encode($error));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
    }
   });

     // Deposito  
  $app->get('/deposito', function (Request $request, Response $response) {
    $sql = "SELECT * FROM deposito";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $saque = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($saque));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    } catch (PDOException $e) {
      $error = array(
        "message" => $e->getMessage()
      );
   
      $response->getBody()->write(json_encode($error));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
    }
   });

  //  Deposito por conta
   $app->get('/deposito/{conta}', function (Request $request, Response $response) {
    $conta = $request->getAttribute('conta');
    $sql = "SELECT * FROM deposito Where conta = $conta";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $saque = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($saque));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    } catch (PDOException $e) {
      $error = array(
        "message" => $e->getMessage()
      );
   
      $response->getBody()->write(json_encode($error));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
    }
   });

        // Saldo  
  $app->get('/saldo', function (Request $request, Response $response) {
    $sql = "SELECT * FROM saldo";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $saque = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($saque));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    } catch (PDOException $e) {
      $error = array(
        "message" => $e->getMessage()
      );
   
      $response->getBody()->write(json_encode($error));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
    }
   });

  //  Saldo por conta
   $app->get('/saldo/{conta}', function (Request $request, Response $response) {
    $conta = $request->getAttribute('conta');
    $sql = "SELECT * FROM saldo Where conta = $conta";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $saque = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($saque));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    } catch (PDOException $e) {
      $error = array(
        "message" => $e->getMessage()
      );
   
      $response->getBody()->write(json_encode($error));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
    }
   });

// inserir deposito

$app->post('/deposito-add/{conta}/{valor}/{moeda}', function (Request $request) {
  $dep = json_decode($request->getBody());
         
  $sql = "INSERT INTO deposito (conta, valor, moeda) VALUES (:conta, :valor, :moeda)";
  try {
      $db = new DB();
      $conn = $db->connect();
      $stmt->bindParam("conta", $dep->conta);
      $stmt->bindParam("valor", $dep->valor);
      $stmt->bindParam("moeda", $dep->moeda);
      $stmt = $conn->query($sql);
      $stmt->execute();
      $deposito = $stmt->fetchAll(PDO::FETCH_OBJ);
      $dep->id = $db->lastInsertId();
      $db = null;
      echo json_encode($dep);
  } catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}';
  }
});

$app->run();