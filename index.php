<?php
session_start();

// Portfolio configuration
$name         = "Simon";
$tagline      = "Web Developer &amp; Designer";
$email        = "simon@example.com";
$phone        = "+1 (555) 000-0000";
$location     = "Your City, Country";
$github_url   = "https://github.com/rick-c-star";
$linkedin_url = "#";

// Flash messages from contact form
$success_msg = "";
$error_msg   = "";
if (isset($_SESSION['form_success'])) {
    $success_msg = $_SESSION['form_success'];
    unset($_SESSION['form_success']);
}
if (isset($_SESSION['form_error'])) {
    $error_msg = $_SESSION['form_error'];
    unset($_SESSION['form_error']);
}

$skills = [
    ["name" => "PHP",        "level" => 90],
    ["name" => "HTML / CSS", "level" => 95],
    ["name" => "JavaScript", "level" => 80],
    ["name" => "MySQL",      "level" => 75],
    ["name" => "Bootstrap",  "level" => 85],
    ["name" => "Git",        "level" => 70],
];

$projects = [
    [
        "title"       => "Portfolio Website",
        "description" => "A personal portfolio built with PHP and hosted on Infinity Free.",
        "tech"        => ["PHP", "CSS", "HTML"],
        "link"        => "#",
        "github"      => "#",
    ],
    [
        "title"       => "Project Two",
        "description" => "Brief description of your second project. Replace with your real project.",
        "tech"        => ["PHP", "MySQL", "Bootstrap"],
        "link"        => "#",
        "github"      => "#",
    ],
    [
        "title"       => "Project Three",
        "description" => "Brief description of your third project. Replace with your real project.",
        "tech"        => ["JavaScript", "HTML", "CSS"],
        "link"        => "#",
        "github"      => "#",
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($name); ?>'s personal portfolio — <?php echo htmlspecialchars(strip_tags($tagline)); ?>">
    <title><?php echo htmlspecialchars($name); ?> | Portfolio</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- ========== NAVIGATION ========== -->
<nav class="navbar" id="navbar">
    <div class="container nav-inner">
        <a class="nav-logo" href="#hero"><?php echo htmlspecialchars($name); ?></a>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
        </button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>
</nav>

<!-- ========== HERO ========== -->
<section class="hero" id="hero">
    <div class="container hero-content">
        <p class="hero-greeting">Hi there, I&rsquo;m</p>
        <h1 class="hero-name"><?php echo htmlspecialchars($name); ?></h1>
        <h2 class="hero-tagline"><?php echo $tagline; ?></h2>
        <p class="hero-sub">I build clean, functional web experiences.</p>
        <div class="hero-cta">
            <a href="#projects" class="btn btn-primary">View My Work</a>
            <a href="#contact"  class="btn btn-outline">Get In Touch</a>
        </div>
    </div>
    <div class="hero-scroll-hint"><span></span></div>
</section>

<!-- ========== ABOUT ========== -->
<section class="section" id="about">
    <div class="container">
        <h2 class="section-title">About <span>Me</span></h2>
        <div class="about-grid">
            <div class="about-avatar">
                <div class="avatar-placeholder"><?php echo htmlspecialchars(strtoupper($name[0])); ?></div>
            </div>
            <div class="about-text">
                <p>
                    Hello! I&rsquo;m <strong><?php echo htmlspecialchars($name); ?></strong>, a passionate web developer
                    who loves turning ideas into real, functional websites. I enjoy working with PHP,
                    HTML, CSS, and JavaScript to build projects that look great and work even better.
                </p>
                <p>
                    When I&rsquo;m not coding, you&rsquo;ll find me exploring new technologies, contributing to
                    open-source projects, or sharpening my design skills.
                </p>
                <ul class="about-details">
                    <li><span>&#128205;</span> <?php echo htmlspecialchars($location); ?></li>
                    <li><span>&#9993;</span>  <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></li>
                    <li><span>&#128222;</span> <?php echo htmlspecialchars($phone); ?></li>
                </ul>
                <a href="#contact" class="btn btn-primary" style="margin-top:1rem;">Hire Me</a>
            </div>
        </div>
    </div>
</section>

<!-- ========== SKILLS ========== -->
<section class="section section-alt" id="skills">
    <div class="container">
        <h2 class="section-title">My <span>Skills</span></h2>
        <div class="skills-grid">
            <?php foreach ($skills as $skill): ?>
            <div class="skill-card">
                <div class="skill-header">
                    <span class="skill-name"><?php echo htmlspecialchars($skill['name']); ?></span>
                    <span class="skill-percent"><?php echo (int)$skill['level']; ?>%</span>
                </div>
                <div class="skill-bar">
                    <div class="skill-fill" style="width:<?php echo (int)$skill['level']; ?>%"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========== PROJECTS ========== -->
<section class="section" id="projects">
    <div class="container">
        <h2 class="section-title">My <span>Projects</span></h2>
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
            <div class="project-card">
                <div class="project-body">
                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                    <div class="project-tech">
                        <?php foreach ($project['tech'] as $t): ?>
                        <span class="badge"><?php echo htmlspecialchars($t); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="project-footer">
                    <?php if ($project['github'] !== '#'): ?>
                    <a href="<?php echo htmlspecialchars($project['github']); ?>" class="btn btn-sm btn-outline" target="_blank" rel="noopener noreferrer">GitHub</a>
                    <?php endif; ?>
                    <?php if ($project['link'] !== '#'): ?>
                    <a href="<?php echo htmlspecialchars($project['link']); ?>"   class="btn btn-sm btn-primary" target="_blank" rel="noopener noreferrer">Live Demo</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ========== CONTACT ========== -->
<section class="section section-alt" id="contact">
    <div class="container">
        <h2 class="section-title">Get In <span>Touch</span></h2>

        <?php if ($success_msg): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success_msg); ?></div>
        <?php endif; ?>
        <?php if ($error_msg): ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($error_msg); ?></div>
        <?php endif; ?>

        <div class="contact-grid">
            <div class="contact-info">
                <p>Have a project in mind or just want to say hello? Feel free to reach out!</p>
                <ul class="contact-list">
                    <li>
                        <span class="contact-icon">&#9993;</span>
                        <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
                    </li>
                    <li>
                        <span class="contact-icon">&#128222;</span>
                        <?php echo htmlspecialchars($phone); ?>
                    </li>
                    <li>
                        <span class="contact-icon">&#128279;</span>
                        <a href="<?php echo htmlspecialchars($github_url); ?>" target="_blank" rel="noopener noreferrer">GitHub</a>
                    </li>
                </ul>
            </div>
            <form class="contact-form" action="contact.php" method="POST">
                <?php
                    $csrf_token = bin2hex(random_bytes(16));
                    $_SESSION['csrf_token'] = $csrf_token;
                ?>
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Your message..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</section>

<!-- ========== FOOTER ========== -->
<footer class="footer">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($name); ?>. All rights reserved.</p>
        <div class="footer-links">
            <a href="<?php echo htmlspecialchars($github_url); ?>"   target="_blank" rel="noopener noreferrer">GitHub</a>
            <a href="<?php echo htmlspecialchars($linkedin_url); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
        </div>
    </div>
</footer>

<script src="js/main.js"></script>
</body>
</html>
