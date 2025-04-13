<<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <!-- Seu CSS -->
  <link rel="stylesheet" href="/css/style.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header>
  <div class="container" id="nav-container">
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <a href="#" class="navbar-brand">
        <img id="logo" src="/img/logo-singulare.png" alt="singulare">
      </a>
      <div class="d-flex flex-wrap justify-content-end align-items-center ms-auto me-3 gap-4">
        <a class="nav-item nav-link" id="home-menu" href="/">Home</a>
        <a class="nav-item nav-link" id="create-menu" href="/eventos/create">Criar evento</a>
        @auth
          <a class="nav-item nav-link" href="/dashboard">Meus eventos</a>
          <form action="/logout" method="POST" class="d-inline m-0 p-0">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-white p-0 m-0" style="text-decoration: none;">
              Sair
            </button>
          </form>
        @endauth

        @guest
          <a class="nav-item nav-link" id="login-menu" href="/login">Entrar</a>
          <a class="nav-item nav-link" id="cadastre-menu" href="/register">Cadastrar</a>
        @endguest
      </div>
    </nav>
  </div>
</header>

<main>
  <div class="container-fluid">
    <div class="row">
      @if(session('success'))
        <div style="background-color: green; color: white; padding: 10px; text-align: center;">
          {{ session('success') }}
        </div>
      @endif
      @yield('content')
    </div>
  </div>
</main>

<footer class="dark text-white text-center py-1 mt-5">
  <div class="container">
    <small>&copy; {{ date('Y') }} Matheus Lobão. Todos os direitos reservados.</small>
    <ul class="social-links">
      <li>
        <a href="https://wa.me/5599981089014" target="_blank">
          <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
      </li>
      <li>
        <a href="https://instagram.com/dev_matheus_lobao_/" target="_blank">
          <i class="fab fa-instagram"></i> Instagram
        </a>
      </li>
    </ul>
  </div>
</footer>

<!-- Bootstrap JS Bundle (com Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A2z02tPqdj+7i6f4jAC5DkC4V1pGyfFH0/jbM2z3pVmmDGMN5t9UJ0Zr49+AK" crossorigin="anonymous"></script>

</body>
</html>
