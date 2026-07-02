<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<title>FitConnect</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --primary: #ff4500;
        --primary-dark: #d63a00;
        --secondary: #00e676;
        --dark: #0d1117;
        --dark-2: #161b22;
        --gray: #8b949e;
        --light: #f5f5f5;
        --radius: 12px;
    }

    body.bg-light {
        background: linear-gradient(135deg, var(--dark) 0%, var(--dark-2) 100%) !important;
        font-family: 'Segoe UI', Roboto, Arial, sans-serif;
        color: var(--light);
        min-height: 100vh;
    }

    h1 {
        text-transform: uppercase;
        letter-spacing: 4px;
        font-weight: 800;
        color: var(--light);
        position: relative;
        padding-bottom: 15px;
    }

    h1::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 90px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    p.lead {
        color: var(--gray);
        font-weight: 500;
        letter-spacing: 1px;
    }

    .row {
        align-items: stretch;
    }

    .card {
        background: var(--dark-2) !important;
        border: none !important;
        border-radius: var(--radius) !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
        border-top: 4px solid var(--primary) !important;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(255, 69, 0, 0.35) !important;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-body h4 {
        color: var(--light);
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 1.1rem;
        min-height: 2.6em;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-body p {
        color: var(--gray);
        font-size: 0.9rem;
        flex-grow: 1;
    }

    .btn {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        font-size: 0.85rem;
        border-radius: var(--radius) !important;
        border: none !important;
        padding: 10px 24px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-3px);
    }

    .btn-primary {
        background: linear-gradient(135deg, #3d8bfd, #0d6efd) !important;
        box-shadow: 0 4px 14px rgba(13, 110, 253, 0.4);
    }

    .btn-success {
        background: linear-gradient(135deg, var(--secondary), #00b359) !important;
        color: #05130a !important;
        box-shadow: 0 4px 14px rgba(0, 230, 118, 0.4);
    }

    .btn-warning {
        background: linear-gradient(135deg, #ffc107, #e0a800) !important;
        color: #1a1300 !important;
        box-shadow: 0 4px 14px rgba(255, 193, 7, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
        box-shadow: 0 4px 14px rgba(255, 69, 0, 0.4);
    }
</style>

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="text-center">

<h1 class="mb-4">
 FitConnect
</h1>

<p class="lead">
Gestion des salles de sport
</p>

</div>

<div class="row mt-5">

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h4>Adhérents</h4>

<p>Gestion des adhérents</p>

<a href="../views/adherents/index.php"
class="btn btn-primary">

Ouvrir

</a>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h4>Abonnements</h4>

<p>Gestion des abonnements</p>

<a href="../views/abonnements/index.php"
class="btn btn-success">

Ouvrir

</a>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h4>Salles</h4>

<p>Gestion des salles</p>

<a href="../views/salles/index.php"
class="btn btn-warning">

Ouvrir

</a>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h4>Séances</h4>

<p>Gestion des séances</p>

<a href="../views/seances/index.php"
class="btn btn-danger">

Ouvrir

</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>