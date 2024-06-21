<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      min-height: -webkit-fill-available;
      background-color: #f8f9fa;
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
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar.hide {
      transform: translateX(-100%);
    }

    .sidebar.show {
      transform: translateX(0);
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
      padding: 1.5rem;
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

    .nav-link.active {
      background-color: #495057 !important;
    }

    .nav-link:hover {
      background-color: #495057 !important;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }

    .table thead th {
      border-bottom: none;
    }

    .table tbody tr {
      transition: background-color 0.3s ease;
    }

    .table tbody tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>

<body>
  <!-- Navbar for burger menu -->
  <nav class="navbar navbar-dark bg-dark d-md-none burger-nav">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" id="sidebarToggle">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <main class="d-flex flex-nowrap" style="height: 100svh">
    <div id="sidebar" class="sidebar text-white text-bg-dark d-none d-md-flex">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img class="mb-4 text-center" src="../assets/deped_logo.png" alt="DepEd Logo" width="240" />
      </a>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link text-white">
            <i class="fas fa-tachometer-alt fa-icon"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="user_mgmt.php" class="nav-link active" aria-current="page">
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
          <a href="teacher.php" class="nav-link text-white">
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
      <button class="btn btn-primary mt-auto" type="button" onclick="logout_user()">
        Logout
      </button>
    </div>
    <!-- sidebar end -->

    <div id="content" class="content">
      <div class="container-fluid">
        <h1 class="display-4 text-center mb-4">User Management</h1>
        <div class="d-flex justify-content-between mb-3">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-user-modal">
            <i class="fas fa-user-plus"></i> Add User
          </button>
        </div>
        <table class="table table-hover text-center" id="users-table">
          <thead>
            <tr>
              <th class="text-center" scope="col">ID</th>
              <th class="text-center" scope="col">Name</th>
              <th class="text-center" scope="col">Userlevel</th>
              <th class="text-center" scope="col">Status</th>
              <th class="text-center" scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("./api/db_connection.php");
            $sql = "SELECT * FROM tbl_user";
            $result = $conn->query($sql);
            $result_set = $result->fetchAll();
            if ($result_set) {
              foreach ($result_set as $row) {
            ?>
                <tr>
                  <td class="text-center"><?= $row["id"]; ?></td>
                  <td class="text-center"><?= $row["fname"] . " " . $row["lname"]; ?></td>
                  <td class="text-center"><?= $row["userlevel"]; ?></td>
                  <td class="text-center"><?= $row["active"] == 1 ? "Active" : "Inactive"; ?></td>
                  <td class="text-center">
                    <button class="btn btn-primary px-2" onclick="edit_user(<?= $row['id']; ?>)">
                      <i class="fas fa-edit"></i> Edit
                    </button>
                    <?php if ($row["active"] == 1) { ?>
                      <button class="btn btn-danger px-2" onclick="deactivate_user(<?= $row['id']; ?>)">
                        <i class="fas fa-ban"></i> Deactivate
                      </button>
                    <?php } else { ?>
                      <button class="btn btn-success px-2" onclick="activate_user(<?= $row['id']; ?>)">
                        <i class="fas fa-check"></i> Activate
                      </button>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              }
            } else {
              ?>
              <tr>
                <td colspan="5" class="text-center">
                  <h4 class="text-muted">No Record</h4>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <?php
  include_once('./includes/add-user-modal.php');
  include_once('./includes/edit-user-modal.php');
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('#users-table').DataTable({
        "pageLength": 5,
        "lengthChange": false,
      });
    });

    document.getElementById('sidebarToggle').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('show');
    });

    window.addEventListener('resize', function() {
      const sidebar = document.getElementById('sidebar');
      if (window.innerWidth > 768) {
        sidebar.classList.remove('show');
      }
    });

    window.addEventListener('load', function() {
      const sidebar = document.getElementById('sidebar');
      if (window.innerWidth <= 768) {
        sidebar.classList.add('hide');
      }
    });
  </script>
  <script src="admin.js"></script>
</body>

</html>
