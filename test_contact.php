<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$successMessage = '';
$errorMessage = '';

// Handle POST submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // DB config
    $host = 'localhost';
    $db   = 'askme';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // Gmail config
    $adminEmail = 'shnyarmhamad89@gmail.com'; 
    $gmailUser  = 'shnyarmhamad89@gmail.com';
    $gmailPass  = 'wrpl ekkc tubo cdvs';

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!$name || !$email || !$message) {
        echo json_encode(['status'=>'error','message'=>'Please fill all fields']);
        exit;
    }

    $name = htmlspecialchars(trim($name), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($message), ENT_QUOTES, 'UTF-8');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status'=>'error','message'=>'Invalid email']);
        exit;
    }

    try {
        // Connect to DB
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->prepare("INSERT INTO contact_messages (name,email,message) VALUES (?,?,?)");
        $stmt->execute([$name,$email,$message]);

        // Send emails with PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $gmailUser;
        $mail->Password = $gmailPass;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Confirmation email to user
        $mail->setFrom($gmailUser,'Portfolio');
        $mail->addAddress($email,$name);
        $mail->Subject = "Thank you!";
        $mail->Body = "Hi $name,\n\nThanks for your message i will answer as soon as posible owowowow:\n$message";
        $mail->send();

        // Notify admin
        $mail->clearAddresses();
        $mail->addAddress($adminEmail);
        $mail->Subject = "New Contact Form Message";
        $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $mail->send();

        echo json_encode(['status'=>'success','message'=>'Message sent successfully!']);
    } catch (Exception $e) {
        echo json_encode(['status'=>'error','message'=>'Server error: '.$e->getMessage()]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Form Test</title>
<style>
/* Minimal styling for testing */
body { font-family: Arial, sans-serif; background:#111; color:#fff; padding:2rem;}
input, textarea { width:100%; padding:0.5rem; margin:0.5rem 0; background:#222; color:#fff; border:1px solid #555; border-radius:4px;}
button { padding:0.5rem 1rem; background:#f06; color:#fff; border:none; border-radius:4px; cursor:pointer;}
button:hover { background:#f39;}
.modal { display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center;}
.modal-content { background:#222; padding:2rem; border-radius:8px; max-width:400px; width:90%;}
</style>
</head>
<body>

<h2>Contact Form Test</h2>

<form id="contactForm">
    <input type="text" id="name" name="name" placeholder="Your Name" required>
    <input type="email" id="email" name="email" placeholder="Your Email" required>
    <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
    <button type="submit">Send Message</button>
</form>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p>Send this message?</p>
        <button id="confirmSendBtn">Yes, Send</button>
        <button id="editMessageBtn">Edit</button>
    </div>
</div>

<div id="successModal" class="modal">
    <div class="modal-content">
        <p>Message sent successfully!</p>
        <button id="closeSuccessModalBtn">Close</button>
    </div>
</div>

<script>
const form = document.getElementById('contactForm');
const confirmationModal = document.getElementById('confirmationModal');
const successModal = document.getElementById('successModal');

form.addEventListener('submit', e => {
    e.preventDefault();
    confirmationModal.style.display = 'flex';
});

document.getElementById('editMessageBtn').addEventListener('click', () => {
    confirmationModal.style.display = 'none';
});

document.getElementById('confirmSendBtn').addEventListener('click', () => {
    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const message = form.message.value.trim();

    fetch('', {
        method:'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: new URLSearchParams({name,email,message})
    })
    .then(res => res.json())
    .then(data => {
        confirmationModal.style.display = 'none';
        if(data.status === 'success'){
            successModal.style.display = 'flex';
            form.reset();
        } else {
            alert('Error: '+data.message);
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error sending message. See console.');
    });
});

document.getElementById('closeSuccessModalBtn').addEventListener('click', () => {
    successModal.style.display = 'none';
});
</script>

</body>
</html>
