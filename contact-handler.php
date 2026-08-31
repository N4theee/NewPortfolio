<?php
/*
========================================
CONTACT FORM HANDLER
========================================
Receives the contact form submission via fetch() from script.js
and (attempts to) send it using PHP's built-in mail().

IMPORTANT: PHP's mail() requires a configured local mail server
(sendmail/Postfix) or SMTP relay to actually deliver email. On a
default XAMPP/Laragon install mail() will usually silently fail —
that's normal for local development. For production, consider
swapping the send logic below for PHPMailer + real SMTP credentials.

Where to change the recipient address: see includes/data.php -> $contact['email']
========================================
*/

require_once __DIR__ . '/includes/data.php';

header('Content-Type: application/json');

function respond($success, $message) {
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    respond(false, 'Invalid request method.');
}

// Honeypot check — a filled hidden field means it's almost certainly a bot.
if (!empty($_POST['website'])) {
    // Pretend success so bots don't learn the honeypot is being checked.
    respond(true, 'Thanks! Your message has been sent.');
}

// --- Basic sanitization + validation -------------------------------------
$name    = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim(strip_tags($_POST['subject'])) : '';
$message = isset($_POST['message']) ? trim(strip_tags($_POST['message'])) : '';

if ($name === '' || $email === '' || $subject === '' || $message === '') {
    respond(false, 'Please fill in all fields before sending.');
}

if (mb_strlen($name) > 100 || mb_strlen($subject) > 150 || mb_strlen($message) > 2000) {
    respond(false, 'One of the fields is too long. Please shorten your message.');
}

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Please enter a valid email address.');
}

// Reject header-injection attempts (newlines in any field)
foreach ([$name, $email, $subject, $message] as $field) {
    if (preg_match('/[\r\n]/', $field)) {
        respond(false, 'Invalid characters detected in submission.');
    }
}

// --- Attempt to send ---------------------------------------------------
$to      = $contact['email'];
$mailSubject = 'Portfolio Contact: ' . $subject;
$body    = "You received a new message from your portfolio contact form.\n\n"
         . "Name: {$name}\n"
         . "Email: {$email}\n\n"
         . "Message:\n{$message}\n";

$headers = [
    'From: Portfolio Contact Form <no-reply@' . ($_SERVER['SERVER_NAME'] ?? 'localhost') . '>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8',
];

$sent = @mail($to, $mailSubject, $body, implode("\r\n", $headers));

if ($sent) {
    respond(true, 'Thanks! Your message has been sent — I\'ll get back to you soon.');
}

// mail() commonly fails on local dev environments (no mail server
// configured). Don't leak server configuration details to the client.
respond(false, 'Message could not be sent right now. Please email me directly instead.');
