<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom CSS -->
  <style>
    html, body {
      height: 100%;
      background-color: #e9ecef;
      font-family: 'Arial', sans-serif;
    }
    .form-signin {
      max-width: 400px;
      padding: 20px;
      margin: auto;
      border-radius: 15px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-signin .form-floating:focus-within {
      z-index: 2;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
      margin-bottom: -1px;
      border-radius: 10px;
    }
    .form-signin .btn {
      border-radius: 10px;
      margin-bottom: 10px;
    }
    .card-header {
      background-color: #0069d9;
      color: #ffffff;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      padding: 20px;
    }
    .btn-primary-custom {
      background-color: #0069d9;
      border-color: #0069d9;
    }
    .btn-primary-custom:hover {
      background-color: #0056b3;
      border-color: #004085;
    }
    .btn-secondary-custom {
      background-color: #6c757d;
      border-color: #6c757d;
    }
    .btn-secondary-custom:hover {
      background-color: #5a6268;
      border-color: #545b62;
    }
    .form-signin .form-label {
      font-weight: bold;
      color: #495057;
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center">
  <main class="form-signin">
    <div class="container">
      <div class="card shadow-sm">
        <div class="card-header text-center">
          <img class="mb-4" src="assets/deped_logo.png" alt="DepEd Logo" width="150">
          <h1 class="h4 mb-3 fw-normal">Sign In</h1>
        </div>
        <div class="card-body">
          <!-- Form start -->
          <form id="login" action="login.php" method="POST">
            <div class="form-floating mb-3">
              <input type="text" class="form-control form-control-lg" id="id" name="id" autocomplete="off" placeholder="ID" required>
              <label for="id" class="form-label">ID</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
              <label for="password" class="form-label">Password</label>
            </div>
            <!-- Custom buttons with hover effects -->
            <button class="btn btn-primary-custom w-100 py-3 mb-2" type="button" onclick="login_user()">Sign in</button>
            <button class="btn btn-secondary-custom w-100 py-3" type="button" onclick="register_user()">Register</button>
          </form>
          <!-- Form end -->
        </div>
      </div>
      <p class="mt-5 mb-3 text-center text-muted">&copy; 2024</p>
    </div>
  </main>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Custom JS for form actions -->
  <script>
    function login_user() {
      $.post("./api/login.php", $("#login").serialize(), function(data) {
        console.log(data);
        if (data === "admin") {
          window.location.href = "./admin/index.php";
        } else if (data === "tech assoc") {
          window.location.href = "./staff/index.php";
        } else {
          alert(data); // Show the error message
        }
      });
    }

    function register_user() {
      // Implement the register functionality here.
    }
  </script>
</body>

</html>
