<?php
// --------------------
// JSON response header
// --------------------
header('Content-Type: application/json');

// --------------------
// Database configuration - update with your host info
// --------------------
$host = 'localhost';           // Usually 'localhost' on shared hosting
$db   = 'askme';               // Your database name
$user = 'root';                // Database username
$pass = '';                    // Database password
$charset = 'utf8mb4';          // UTF-8 charset

// --------------------
// Emails
// --------------------
// This is the email visible to users as the sender
$fromEmail = 'no-reply@yourdomain.com'; 

// This is the domain email that receives messages (developer/admin)
$adminEmail = 'contact@yourdomain.com';  

// --------------------
// Get POST data safely
// --------------------
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// --------------------
// Basic validation
// --------------------
if (empty($name) || empty($email) || empty($message)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Please fill all required fields.'
    ]);
    exit;
}

// --------------------
// Sanitize inputs
// --------------------
$name    = htmlspecialchars(trim($name), ENT_QUOTES, 'UTF-8');
$email   = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(trim($message), ENT_QUOTES, 'UTF-8');

// --------------------
// Validate email format
// --------------------
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid email address.'
    ]);
    exit;
}

// --------------------
// Prevent email header injection
// --------------------
if (preg_match('/[\r\n]/', $email)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid email address.'
    ]);
    exit;
}

try {
    // --------------------
    // Connect to database
    // --------------------
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);

    // --------------------
    // Insert message into database
    // --------------------
    $stmt = $pdo->prepare(
        "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)"
    );
    $stmt->execute([$name, $email, $message]);

    // --------------------
    // Send confirmation email to customer (no message echo, no dev email exposed)
    // --------------------
    $subjectUser = "Thank you for contacting us!";
    $bodyUser    = "Hi $name,\n\nThank you for reaching out. Our support team will review your request and get back to you as soon as possible.\n\nBest regards,\nYour Company";

    // Customer sees only no-reply email
    $headersUser = "From: $fromEmail\r\nReply-To: $fromEmail\r\nContent-Type: text/plain; charset=UTF-8";
    mail($email, $subjectUser, $bodyUser, $headersUser);

    // --------------------
    // Send notification email to admin (includes customer message)
    // --------------------
    $subjectAdmin = "New Contact Message from $name";
    $bodyAdmin    = "You received a new message via your website contact form:\n\n"
                  . "Name: $name\n"
                  . "Email: $email\n"
                  . "Message:\n$message\n\n"
                  . "You can reply directly to this email to reach the customer.";

    // Admin can reply directly to customer
    $headersAdmin = "From: $fromEmail\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
    mail($adminEmail, $subjectAdmin, $bodyAdmin, $headersAdmin);

    // --------------------
    // Respond with success to front-end
    // --------------------
    echo json_encode([
        'status' => 'success',
        'message' => 'Message sent successfully!'
    ]);

} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode([
        'status' => 'error',
        'message' => 'Server error. Please try again later.'
    ]);
}
