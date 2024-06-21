<?php
session_start();
// if (!isset($_SESSION['userid'])) {
//     header("location: ../index.php");
// }

// if (isset($_SESSION['userid']) && $_SESSION['userlvl'] == "admin") {
//     header("location: ../admin/usermanagement.php");
// } else if (isset($_SESSION['userid']) && $_SESSION['userlvl'] == "employee") {
//     header("location: ../employee/dashboard.php");
// } else {
//     header("location: ../user/dashboard.php");
// }

require("./api/db_connection.php");
$id = $_SESSION['id'];
$query = $conn->query("SELECT fname, lname FROM tbl_user WHERE id = '$id'");
$name = $query->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      min-height: -webkit-fill-available;
      background-color: #f8f9fa;
      color: #333;
    }

    html {
      height: -webkit-fill-available;
    }

    main {
      height: 100vh;
      height: -webkit-fill-available;
      max-height: 100vh;
      overflow-x: hidden;
      overflow-y: auto;
    }

    .fa-icon {
      margin-right: 8px;
    }

    .sidebar {
      display: flex;
      flex-direction: column;
      flex-shrink: 0;
      padding: 1rem;
      background-color: #ffffff;
      border-right: 1px solid #dee2e6;
      width: 280px;
      transition: transform 0.3s ease;
      z-index: 1040;
    }

    .sidebar.hide {
      transform: translateX(-100%);
    }

    .sidebar.show {
      transform: translateX(0);
    }

    .sidebar .nav-link {
      margin-bottom: 1rem;
      color: #495057;
    }

    .sidebar .nav-link.active {
      background-color: #0d6efd;
      color: #fff;
    }

    .sidebar .nav-link:hover {
      background-color: #e9ecef;
    }

    .sidebar .nav-link .fa-icon {
      margin-right: 8px;
    }

    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
      border-color: #0a58ca;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        height: 100%;
      }

      .content {
        margin-left: 0;
      }
    }

    .content {
      flex-grow: 1;
      padding: 1rem;
      transition: margin-left 0.3s ease;
    }

    .content.centered {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
    }

    .burger-nav {
      display: none;
    }

    @media (max-width: 768px) {
      .burger-nav {
        display: block;
      }

      .content {
        display: flex;
        justify-content: center;
        align-items: center;
      }
    }

    .navbar-profile {
      display: flex;
      align-items: center;
    }

    .navbar-profile img {
      border-radius: 50%;
      margin-right: 8px;
    }
  </style>
</head>

<body>
  <!-- Navbar for burger menu and profile dropdown -->
  <nav class="navbar navbar-light bg-light d-md-none burger-nav">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" id="sidebarToggle">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <main class="d-flex flex-nowrap" style="height: 100svh">
    <h1 class="visually-hidden">Universal Leaf</h1>

    <div id="sidebar" class="sidebar d-none d-md-flex">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <img class="mb-4 text-center" src="../assets/deped_logo.png" alt="DepEd Logo" width="240" />
      </a>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">
            <i class="fas fa-tachometer-alt fa-icon"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="user_mgmt.php" class="nav-link">
            <i class="fas fa-users fa-icon"></i>
            Users
          </a>
        </li>
        <li>
          <a href="applicant.php" class="nav-link">
            <i class="fas fa-user-plus fa-icon"></i>
            Applicant
          </a>
        </li>
        <li>
          <a href="application.php" class="nav-link">
            <i class="fas fa-file-alt fa-icon"></i>
            Application
          </a>
        </li>
        <li>
          <a href="assessment.php" class="nav-link">
            <i class="fas fa-clipboard-check fa-icon"></i>
            Assessment
          </a>
        </li>
        <li>
          <a href="evaluator.php" class="nav-link">
            <i class="fas fa-user-check fa-icon"></i>
            Evaluator
          </a>
        </li>
        <li>
          <a href="teacher.php" class="nav-link">
            <i class="fas fa-chalkboard-teacher fa-icon"></i>
            Teacher
          </a>
        </li>
        <li>
          <a href="report_generation.php" class="nav-link">
            <i class="fas fa-chart-line fa-icon"></i>
            Report Generation
          </a>
        </li>
      </ul>
      <button class="btn btn-primary mt-auto" type="button" onclick="logout_user()">
        Logout
      </button>
    </div>
    <!-- sidebar end -->

    <!-- main content -->
    <div id="content" class="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-profile" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://via.placeholder.com/30" alt="Profile Picture">
                  <?php echo $name ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#" onclick="logout_user()">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <h1 class="display-3 text-center">Welcome <?php echo $name ?></h1>
    </div>
    <!-- main content end -->
  </main>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      const content = document.getElementById('content');
      sidebar.classList.toggle('show');
      content.classList.toggle('centered');
    });

    window.addEventListener('resize', function() {
      const sidebar = document.getElementById('sidebar');
      const content = document.getElementById('content');
      if (window.innerWidth > 768) {
        sidebar.classList.remove('show');
        content.classList.remove('centered');
      }
    });

    window.addEventListener('load', function() {
      const sidebar = document.getElementById('sidebar');
      const content = document.getElementById('content');
      if (window.innerWidth <= 768) {
        sidebar.classList.add('hide');
        content.classList.add('centered');
      }
    });
  </script>
  <script src="admin.js"></script>
</body>

</html>
