<?php
// header.php - include this at the top of pages
if (!isset($site_title)) $site_title = 'MegaTrades';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($site_title); ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    .navbar-custom {
      background-color: #1a73e8;
    }
    .navbar-custom .nav-link {
      color: white !important;
      font-weight: 500;
      padding: 10px 15px;
      border-bottom: 3px solid transparent;
    }
    .navbar-custom .nav-link:hover {
      border-bottom: 3px solid #ffc107;
    }
    .navbar-brand span {
      color: #0d6efd;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-custom shadow-sm">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand d-flex align-items-center text-white" href="/">
      <img src="https://i.ibb.co/KpkwTMZ5/image-1762122409962-2-removebg-preview.png" alt="Logo" style="height:30px;width:auto;margin-right:10px;">
      <div>
        <div style="font-weight:700;">MegaTrades</div>
        <small style="font-size:11px;">Trading & Investments</small>
      </div>
    </a>

    <!-- Toggle button for offcanvas -->
    <button class="border-0 bg-transparent text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
      <i class="bi bi-list" style="font-size: 1.8rem;"></i>
    </button>
  </div>
</nav>

<!-- Offcanvas Sidebar Menu -->
<div class="offcanvas offcanvas-end text-white" tabindex="-1" id="offcanvasMenu"
     style="width: 50%; background-color: #1a73e8; height: auto; max-height: fit-content;">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-white">Menu</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-0">
    <ul class="nav flex-column mb-3">
      <li class="nav-item"><a class="nav-link text-white px-3 py-2" href="/index">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white px-3 py-2" href="/about">About</a></li>
      <li class="nav-item"><a class="nav-link text-white px-3 py-2" href="/services">Services</a></li>
      <li class="nav-item"><a class="nav-link text-white px-3 py-2" href="/blog">Blogs</a></li>
      <li class="nav-item"><a class="nav-link text-white px-3 py-2" href="/contact">Contact</a></li>
      <li class="nav-item"><a class="nav-link text-white px-3 py-2" href="/masterclass">Trading Ebook</a></li>
      <li class="nav-item"><a class="nav-link text-white px-3 py-2" href="/videos">Videos</a></li>
    </ul>

    <!-- Dynamic Island-style Telegram Button (Light Green) -->
    <div class="px-3 pb-4">
      <a href="https://t.me/greatmega_eo" target="_blank"
         class="d-block text-center text-decoration-none"
         style="
           background-color: #90ee90;
           color: #000;
           border-radius: 30px;
           padding: 12px 20px;
           font-weight: 600;
           box-shadow: 0 4px 12px rgba(0,0,0,0.2);
           transition: all 0.3s ease;
         "
         onmouseover="this.style.transform='scale(1.05)'"
         onmouseout="this.style.transform='scale(1)'">
        Free Channel
      </a>
    </div>
  </div>
</div>

<main class="container mt-5 mb-5">