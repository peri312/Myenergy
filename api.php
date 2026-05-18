<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Connessione Altervista
$conn = new mysqli("localhost", "myenergy", "", "my_myenergy");

if ($conn->connect_error) {
    die(json_encode(["error" => "Connessione fallita al database."]));
}

$action = $_GET['action'] ?? '';
$data = json_decode(file_get_contents("php://input"), true);

switch($action) {
    case 'register':
        $n = $conn->real_escape_string($data['name'] ?? ''); 
        $e = $conn->real_escape_string($data['email'] ?? ''); 
        $p = $conn->real_escape_string($data['pwd'] ?? ''); 
        $t = $conn->real_escape_string($data['type'] ?? 'cliente');
        $ind = $conn->real_escape_string($data['indirizzo'] ?? '');
        $pan = isset($data['numero_pannelli']) ? (int)$data['numero_pannelli'] : 1;
        
        $sql = "INSERT INTO users (name, email, pwd, type, indirizzo, numero_pannelli) VALUES ('$n', '$e', '$p', '$t', '$ind', $pan)";
        if($conn->query($sql)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Errore DB: " . $conn->error]);
        }
        break;

    case 'login':
        $e = $conn->real_escape_string($data['email'] ?? '');
        $p = $conn->real_escape_string($data['pwd'] ?? '');
        $res = $conn->query("SELECT name, email, type, indirizzo, numero_pannelli FROM users WHERE email='$e' AND pwd='$p'");
        if($user = $res->fetch_assoc()) {
            echo json_encode($user);
        } else {
            echo json_encode(["error" => "Credenziali errate"]);
        }
        break;

    case 'add_ticket':
        $az = $conn->real_escape_string($data['azienda'] ?? ''); 
        $txt = $conn->real_escape_string($data['testo'] ?? '');
        $conn->query("INSERT INTO tickets (azienda, testo) VALUES ('$az', '$txt')");
        echo json_encode(["success" => true]);
        break;

    case 'add_review':
        $aut = $conn->real_escape_string($data['autore'] ?? ''); 
        $v = (int)($data['voto'] ?? 5); 
        $txt = $conn->real_escape_string($data['testo'] ?? '');
        $conn->query("INSERT INTO reviews (autore, voto, testo) VALUES ('$aut', $v, '$txt')");
        echo json_encode(["success" => true]);
        break;
        
    case 'get_reviews':
        $res = $conn->query("SELECT * FROM reviews ORDER BY id DESC LIMIT 20");
        echo json_encode($res ? $res->fetch_all(MYSQLI_ASSOC) : []);
        break;

    default:
        echo json_encode(["error" => "Azione non valida"]);
}
?>
