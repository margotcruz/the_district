<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="asset/header.scss" />
    <link rel="stylesheet" href="asset/footer.scss" />
    <link rel="stylesheet" href="asset/body.scss" />
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check-circle-fill" viewBox="0 0 16 16">
        <path
          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
        />
      </symbol>
      <symbol id="info-fill" viewBox="0 0 16 16">
        <path
          d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
        />
      </symbol>
      <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path
          d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
        />
      </symbol>
    </svg>
    <?php require('asset/PDO_connect.php') ?>
    <title>Accueil</title>
  </head>

  <header>
    <nav class="navbar">
      <div
        class="navbar navbar-expand-md bg-body-tertiary bg-dark d-flex p-0 row"
        data-bs-theme="dark"
      >
        <div class="container-fluid nav-bar-custom">
          <img
            src="img/Logo/logo_transparent.png"
            alt="LOGO"
            class="col-2 d-none d-md-flex"
          />
          <img
            src="img/Logo/logo_transparent.png"
            alt="LOGO"
            class="col-4 d-md-none"
          />
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- DESTOCK -->
          <div
            class="collapse navbar-collapse justify-content-around"
            id="navbarTogglerDemo01"
          >
            <ul class="navbar-nav d-none d-md-flex">
              <li class="nav-item m-4 d-flex justify-content-center">
                <a
                  class="nav-link link-active"
                  aria-current="page"
                  href="index.php"
                  >ACCUEIL</a
                >
              </li>
              <li class="nav-item m-4 d-flex justify-content-center">
                <a class="nav-link" href="categorie.php">CATEGORIE</a>
              </li>
              <li class="nav-item m-4 d-flex justify-content-center">
                <a class="nav-link" href="menu.php">PLATS</a>
              </li>
              <li class="nav-item m-4 d-flex justify-content-center">
                <a class="nav-link" href="contact.php">CONTACT</a>
              </li>
            </ul>

            <form class="d-none d-md-flex mt-0 search-container" role="search" method="POST">
            <input type="text" name="searchTerm" placeholder="Entrez votre terme de recherche" aria-label="Search">
    <button class="bi" id="search-button">
        <svg id="search-icon" class="search-icon" viewBox="0 0 24 24">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
</form>

          </div>

          <!-- MOBILE -->
          <div
            class="collapse navbar-collapse nav_custom_mobile"
            id="navbarTogglerDemo01"
          >
            <ul class="navbar-nav me-auto mb-lg-0 d-sm-flex d-md-none">
              <li class="nav-item m-5 d-flex justify-content-center">
                <a
                  class="nav-link link-active"
                  aria-current="page"
                  href="index.php"
                  >ACCUEIL</a
                >
              </li>
              <li class="nav-item m-5 d-flex justify-content-center">
                <a class="nav-link" href="categorie.php">CATEGORIE</a>
              </li>
              <li class="nav-item m-5 d-flex justify-content-center">
                <a class="nav-link" href="plats.php">PLATS</a>
              </li>
              <li class="nav-item m-5 d-flex justify-content-center">
                <a class="nav-link" href="contact.php">CONTACT</a>
              </li>
            </ul>
            <div></div>
          </div>
        </div>
      </div>
    </nav>
    
    </div>
</div>
  </header>
  <?php require_once 'search.php' ?>
