<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      min-height: 100vh;
      min-height: -webkit-fill-available;
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
      background-color: #343a40;
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
      margin-bottom: 0.5rem; /* Add spacing between nav links */
    }

    .sidebar .nav-link .fa-icon {
      margin-right: 8px;
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
  </style>
</head>

<body>
  <!-- sidebar -->
  <main class="d-flex flex-nowrap" style="height: 100svh">
    <h1 class="visually-hidden">Universal Leaf</h1>

    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img class="mb-4 text-center" src="../assets/deped_logo.png" alt="" width="240" />
      </a>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link text-white">
            <i class="fas fa-tachometer-alt fa-icon"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="user_mgmt.php" class="nav-link text-white">
            <i class="fas fa-users fa-icon"></i>
            Users
          </a>
        </li>
        <li>
          <a href="applicant.php" class="nav-link text-white">
            <i class="fas fa-user-plus fa-icon"></i>
            Applicant
          </a>
        </li>
        <li>
          <a href="application.php" class="nav-link text-white">
            <i class="fas fa-file-alt fa-icon"></i>
            Application
          </a>
        </li>
        <li>
          <a href="assessment.php" class="nav-link text-white">
            <i class="fas fa-clipboard-check fa-icon"></i>
            Assessment
          </a>
        </li>
        <li>
          <a href="evaluator.php" class="nav-link text-white">
            <i class="fas fa-user-check fa-icon"></i>
            Evaluator
          </a>
        </li>
        <li>
          <a href="teacher.php" class="nav-link active" aria-current="page">
            <i class="fas fa-chalkboard-teacher fa-icon"></i>
            Teacher
          </a>
        </li>
        <li>
          <a href="report_generation.php" class="nav-link text-white">
            <i class="fas fa-chart-line fa-icon"></i>
            Report Generation
          </a>
        </li>
      </ul>
      <button class="btn btn-primary float-end mt-3" type="button" onclick="logout_user()">
        Logout
      </button>
    </div>
    <!-- sidebar end -->
    <div class="container w-75">
      <h1 class="display-3 text-center">Teacher</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Specialization</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>john.doe@example.com</td>
            <td>Mathematics</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jane Smith</td>
            <td>jane.smith@example.com</td>
            <td>Science</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Alan Turing</td>
            <td>alan.turing@example.com</td>
            <td>Computer Science</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Ada Lovelace</td>
            <td>ada.lovelace@example.com</td>
            <td>Mathematics</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>

</html>
