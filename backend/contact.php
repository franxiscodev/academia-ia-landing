<?php
/**
 * Backend para procesar formulario de contacto
 * Academia IA Landing Page - ialogía
 */

// Iniciar output buffering para evitar que warnings contaminen el JSON
ob_start();

// Suprimir warnings en la salida (se guardan en logs)
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');

// Headers para CORS y JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Cargar variables de entorno
if (file_exists(__DIR__ . '/../.env')) {
    $env = @parse_ini_file(__DIR__ . '/../.env');
    if ($env !== false) {
        foreach ($env as $key => $value) {
            $_ENV[$key] = $value;
        }
    }
}

// Función para sanitizar input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Función para validar email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para validar teléfono (formato español e internacional)
function validatePhone($phone) {
    // Permite números, espacios, guiones, paréntesis y símbolo +
    return preg_match('/^[0-9+\s\-()]+$/', $phone);
}

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido. Usa POST.'
    ]);
    exit;
}

// Recoger y sanitizar datos
$parent_name = isset($_POST['parent_name']) ? sanitizeInput($_POST['parent_name']) : '';
$email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
$phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
$student_name = isset($_POST['student_name']) ? sanitizeInput($_POST['student_name']) : '';
$student_age = isset($_POST['student_age']) ? sanitizeInput($_POST['student_age']) : '';
$message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';
$privacy = isset($_POST['privacy']) ? true : false;

// Array de errores
$errors = [];

// Validaciones OBLIGATORIAS (solo 3 campos)
if (empty($parent_name) || strlen($parent_name) < 2) {
    $errors[] = 'El nombre del padre/madre es requerido (mínimo 2 caracteres)';
}

if (empty($email) || !validateEmail($email)) {
    $errors[] = 'Email inválido';
}

if (!$privacy) {
    $errors[] = 'Debes aceptar la política de privacidad';
}

// Validaciones OPCIONALES (solo si se proporcionan)
if (!empty($phone) && !validatePhone($phone)) {
    $errors[] = 'Teléfono inválido (si lo proporcionas, debe ser válido)';
}

if (!empty($student_age) && !in_array($student_age, ['10', '11', '12', '13', '14', '15', '16'])) {
    $errors[] = 'Edad del estudiante inválida (debe estar entre 10 y 16)';
}

if (!empty($student_name) && strlen($student_name) < 2) {
    $errors[] = 'El nombre del estudiante debe tener al menos 2 caracteres';
}

// Si hay errores, devolver
if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => 'Errores de validación: ' . implode(', ', $errors),
        'errors' => $errors
    ]);
    exit;
}

// Intentar guardar en base de datos (si está configurada)
$saved_to_db = false;
$db_error = null;

try {
    $db_host = $_ENV['DB_HOST'] ?? 'localhost';
    $db_port = $_ENV['DB_PORT'] ?? '3306';
    $db_name = $_ENV['DB_NAME'] ?? 'academia_ia';
    $db_user = $_ENV['DB_USER'] ?? 'root';
    $db_pass = $_ENV['DB_PASSWORD'] ?? '';

    // Intentar conectar a la base de datos
    $dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Preparar query
    $sql = "INSERT INTO contacts (parent_name, email, phone, student_name, student_age, message, created_at)
            VALUES (:parent_name, :email, :phone, :student_name, :student_age, :message, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':parent_name' => $parent_name,
        ':email' => $email,
        ':phone' => !empty($phone) ? $phone : null,
        ':student_name' => !empty($student_name) ? $student_name : null,
        ':student_age' => !empty($student_age) ? (int)$student_age : null,
        ':message' => !empty($message) ? $message : null
    ]);

    $saved_to_db = true;

} catch (PDOException $e) {
    // Si falla la BD, continuamos (el email se enviará igual)
    $db_error = $e->getMessage();
    error_log("Error de base de datos: " . $e->getMessage());
}

// Enviar email
$email_sent = false;
$email_error = null;

try {
    $to_email = $_ENV['CONTACT_EMAIL'] ?? 'info@ialogia.es';
    $from_email = $_ENV['FROM_EMAIL'] ?? 'noreply@ialogia.es';
    $subject = "Nueva solicitud de inscripción - Academia IA";

    // Construir mensaje de email
    $email_body = "
    ╔════════════════════════════════════════════════════════════╗
    ║  NUEVA SOLICITUD DE INSCRIPCIÓN - ACADEMIA IA             ║
    ╚════════════════════════════════════════════════════════════╝

    📋 INFORMACIÓN DEL PADRE/MADRE:
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    Nombre:   $parent_name
    Email:    $email
    Teléfono: $phone

    👦 INFORMACIÓN DEL ESTUDIANTE:
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    Nombre:   $student_name
    Edad:     $student_age años

    💬 MENSAJE:
    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    " . ($message ? $message : '(Sin mensaje adicional)') . "

    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    📅 Fecha: " . date('d/m/Y H:i:s') . "
    🌐 IP: " . $_SERVER['REMOTE_ADDR'] . "
    ";

    // Headers del email
    $headers = [
        'From: ' . $from_email,
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . phpversion(),
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8'
    ];

    // Enviar email
    $email_sent = mail($to_email, $subject, $email_body, implode("\r\n", $headers));

    if (!$email_sent) {
        $email_error = "Error al enviar el email con la función mail()";
        error_log($email_error);
    }

} catch (Exception $e) {
    $email_error = $e->getMessage();
    error_log("Error al enviar email: " . $e->getMessage());
}

// Respuesta final
$response = [
    'success' => true,
    'message' => '¡Gracias! Hemos recibido tu solicitud de inscripción. Te contactaremos pronto al email proporcionado.',
    'data' => [
        'parent_name' => $parent_name,
        'student_name' => $student_name,
        'student_age' => $student_age
    ],
    'debug' => []
];

// Añadir información de debug (solo si está en modo desarrollo)
if (isset($_ENV['DEBUG']) && $_ENV['DEBUG'] === 'true') {
    $response['debug'] = [
        'database_saved' => $saved_to_db,
        'email_sent' => $email_sent,
        'db_error' => $db_error,
        'email_error' => $email_error
    ];
}

// Si ninguno funcionó, marcar como error
if (!$saved_to_db && !$email_sent) {
    $response['success'] = false;
    $response['message'] = 'Hubo un error al procesar tu solicitud. Por favor, contacta directamente a info@ialogia.es';
    $response['errors'] = [
        'db' => $db_error,
        'email' => $email_error
    ];
}

// Limpiar cualquier output anterior (warnings, notices, etc.)
ob_clean();

// Enviar solo el JSON
echo json_encode($response);

// Finalizar output buffering
ob_end_flush();
