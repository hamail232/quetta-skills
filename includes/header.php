<?php
$pageTitle = $pageTitle ?? 'Quetta Skills';
$active = basename($_SERVER['PHP_SELF']);
?>
<!doctype html><html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle) ?> · Quetta Skills</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head><body>
<nav class="navbar"><div class="container nav-inner">
<a class="brand" href="index.php"><span class="brand-mark">Q</span><span>Quetta<span class="brand-accent">Skills</span></span></a>
<button class="menu-toggle" aria-label="Open menu">☰</button>
<div class="nav-links"><a class="<?= $active==='index.php'?'active':'' ?>" href="index.php">Home</a><a class="<?= $active==='about.php'?'active':'' ?>" href="about.php">About</a><a class="<?= $active==='courses.php'?'active':'' ?>" href="courses.php">Courses</a><a class="<?= $active==='freelancers.php'?'active':'' ?>" href="freelancers.php">Freelancers</a><a class="<?= $active==='contact.php'?'active':'' ?>" href="contact.php">Contact</a><a class="nav-cta" href="contact.php">Get started <span>↗</span></a></div>
</div></nav>
<main>