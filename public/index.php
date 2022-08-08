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

$app->get('/', function (Request $request, Response $response) {
   $response->getBody()->write('Hello World!');
   return $response;
});

$app->get('/operacoes', function (Request $request, Response $response, $args) {
  $operacoes = [
      '1' => 'deposito',
      '2' => 'saldo',
      '3' => 'saque',
  ];
  $response->getBody()->write(json_encode($operacoes));
  return $response->withHeader('Content-type', 'application/json');
});
$app->get('/operacoes/{id}', function (Request $request, Response $response, $args) {
  $operacoes = [
      '1' => 'deposito',
      '2' => 'saldo',
      '3' => 'saque',
  ];
  $operacao[$args['id']] = $operacoes[$args['id']];
  $response->getBody()->write(json_encode($operacao));
  
  return $response->withHeader('Content-type', 'application/json');
});


// Trazendo dados do banco.
$app->get('/operacoes/{id}/deposito/', function (Request $request, Response $response) {
    $sql = "SELECT * FROM deposito";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $deposito = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($deposito));
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

   $app->get('/operacoes/{id}/saldo/', function (Request $request, Response $response) {
    $sql = "SELECT * FROM saldo";
   
    try {
      $db = new DB();
      $conn = $db->connect();
      $stmt = $conn->query($sql);
      $saldo = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
     
      $response->getBody()->write(json_encode($saldo));
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

   $app->get('/operacoes/{id}/saque/', function (Request $request, Response $response) {
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

$app->run();