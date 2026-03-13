<?php
/**
 * contact.php — handles the contact form submission
 * After processing, redirects back to index.php#contact
 */

session_start();

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact');
    exit;
}

// ── CSRF validation ──
$csrf_submitted = $_POST['csrf_token'] ?? '';
$csrf_session   = $_SESSION['csrf_token'] ?? '';
if (empty($csrf_submitted) || !hash_equals($csrf_session, $csrf_submitted)) {
    $_SESSION['form_error'] = 'Invalid form submission. Please try again.';
    header('Location: index.php#contact');
    exit;
}
// Invalidate token after use
unset($_SESSION['csrf_token']);

// ── Sanitise inputs ──
$name    = trim(strip_tags($_POST['name']    ?? ''));
$email   = trim(strip_tags($_POST['email']   ?? ''));
$subject = trim(strip_tags($_POST['subject'] ?? 'Portfolio Contact'));
$message = trim(strip_tags($_POST['message'] ?? ''));

// ── Basic validation ──
if (empty($name) || empty($email) || empty($message)) {
    $_SESSION['form_error'] = 'Please fill in all required fields.';
    header('Location: index.php#contact');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['form_error'] = 'Please enter a valid email address.';
    header('Location: index.php#contact');
    exit;
}

// Limit field lengths to prevent abuse
if (strlen($name) > 100 || strlen($subject) > 200 || strlen($message) > 5000) {
    $_SESSION['form_error'] = 'One or more fields exceed the maximum allowed length.';
    header('Location: index.php#contact');
    exit;
}

// ── Prevent email header injection ──
// Strip newline characters from any value used in headers
$safe_email = str_replace(["\r", "\n"], '', $email);
$safe_name  = str_replace(["\r", "\n"], '', $name);

// ── Send email ──
$to           = 'simon@example.com'; // <-- replace with your real email
$mail_subject = 'Portfolio Contact: ' . $subject;
$body         = "Name:    {$safe_name}\nEmail:   {$safe_email}\n\nMessage:\n{$message}";
$headers      = implode("\r\n", [
    'From: noreply@example.com',
    'Reply-To: ' . $safe_email,
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . phpversion(),
]);

$sent = mail($to, $mail_subject, $body, $headers);

if ($sent) {
    $_SESSION['form_success'] = 'Thank you! Your message has been sent.';
} else {
    $_SESSION['form_error'] = 'Sorry, the message could not be sent. Please try again later.';
}

header('Location: index.php#contact');
exit;
