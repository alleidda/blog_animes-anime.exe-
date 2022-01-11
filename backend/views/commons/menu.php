<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(!Securite::verifAccessSession()) :?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL ?>back/login">Login</a>
        </li>
          <?php else : ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL ?>back/admin">Accueil</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Animes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>back/animes/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>back/animes/creation">Création</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Studios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>back/studios/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>back/studios/creation">Création</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Genres
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>back/genres/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>back/genres/creation">Création</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL ?>back/deconnexion">Deconnexion</a>
        </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>