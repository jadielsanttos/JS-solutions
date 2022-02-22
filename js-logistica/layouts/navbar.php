<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<nav id="nav-single" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">JS Solutions</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
        <div id="box-logout" class="form-inline my-2 my-lg-0">
            <a href="lista.php">Lista</a>
        </div>
        <div id="box-logout" class="form-inline my-2 my-lg-0">
            <a href="index.php">adicionar</a>
        </div>
        <div id="box-logout" class="form-inline my-2 my-lg-0">
            <a href="logout.php" onclick="return confirm('Deseja sair mesmo?')"><i class="fas fa-power-off"></i>&nbsp;sair</a>
        </div>
    </div>
  </div>
</nav>