<?php $sitePrefix = isset($assetPrefix) ? $assetPrefix : ''; ?>

<header
  class="header header--middle-left header--mobile-center page-width header--has-menu header--has-social header--has-account"
  style="    padding-top: 5px;
    padding-bottom: 5px;">
    

  <header-drawer data-breakpoint="tablet">
    <details
      id="Details-menu-drawer-container"
      class="menu-drawer-container">
      <summary
        class="header__icon header__icon--menu header__icon--summary link focus-inset"
        aria-label="Menu">
        <span><svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 18 16">
            <path
              fill="currentColor"
              d="M1 .5a.5.5 0 1 0 0 1h15.71a.5.5 0 0 0 0-1zM.5 8a.5.5 0 0 1 .5-.5h15.71a.5.5 0 0 1 0 1H1A.5.5 0 0 1 .5 8m0 7a.5.5 0 0 1 .5-.5h15.71a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5" />
          </svg>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            class="icon icon-close"
            viewBox="0 0 18 17">
            <path
              fill="currentColor"
              d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z" />
          </svg>
        </span>
      </summary>
      <div
        id="menu-drawer"
        class="gradient menu-drawer motion-reduce color-scheme-5">
        <div class="menu-drawer__inner-container">
          <div class="menu-drawer__navigation-container">
           <?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="menu-drawer__navigation">
    <ul class="menu-drawer__menu has-submenu list-menu" role="list">

        <!-- Home -->
        <li>
            <a
                id="HeaderDrawer-home"
                href="<?= $sitePrefix ?>index.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'index.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'index.php') ? 'aria-current="page"' : '' ?>>
                Home
            </a>
        </li>

        <!-- About Us -->
        <li>
            <a
                id="HeaderDrawer-about-us"
                href="<?= $sitePrefix ?>about.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'about.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'about.php') ? 'aria-current="page"' : '' ?>>
                About Us
            </a>
        </li>

        <!-- Services -->
        <li>
            <a
                id="HeaderDrawer-services"
                href="<?= $sitePrefix ?>services.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'services.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'services.php') ? 'aria-current="page"' : '' ?>>
                Services
            </a>
        </li>
        
          <!-- Products -->
        <li>
            <a
                id="HeaderDrawer-products"
                href="<?= $sitePrefix ?>product.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'product.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'product.php') ? 'aria-current="page"' : '' ?>>
                Products
            </a>
        </li>

        <!-- Categories -->
        <li>
            <a
                id="HeaderDrawer-categories"
                href="<?= $sitePrefix ?>categories.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'categories.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'categories.php') ? 'aria-current="page"' : '' ?>>
                Categories
            </a>
        </li>

        <!-- Premium Paintings -->
        <li>
            <a
                id="HeaderDrawer-premium-paintings"
                href="<?= $sitePrefix ?>premium-paintings.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'premium-paintings.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'premium-paintings.php') ? 'aria-current="page"' : '' ?>>
                Premium Paintings
            </a>
        </li>

      

        <!-- Blogs -->
        <li>
            <a
                id="HeaderDrawer-blogs"
                href="<?= $sitePrefix ?>blog.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'blog.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'blog.php') ? 'aria-current="page"' : '' ?>>
                Blogs
            </a>
        </li>

        <!-- Contact -->
        <li>
            <a
                id="HeaderDrawer-contact"
                href="<?= $sitePrefix ?>contact.php"
                class="menu-drawer__menu-item list-menu__item link link--text focus-inset <?= ($currentPage == 'contact.php') ? 'menu-drawer__menu-item--active' : '' ?>"
                <?= ($currentPage == 'contact.php') ? 'aria-current="page"' : '' ?>>
                Contact
            </a>
        </li>

    </ul>
</nav>
            <div class="menu-drawer__utility-links">
           <!--   <a
                href="https://shopify.com/73496068161/account?buyer_flags=eyJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJjMWVzbTItYXYubXlzaG9waWZ5LmNvbSIsImZsYWdzIjpbXSwiZXhwIjoxNzg1MTQ1NTU1LCJuYmYiOjE3ODQ1NDA3NTV9.lfhp_Lq6umnDz5oUW-GXVk5XBCE-zyOSDwUJGKYAaGI&amp;locale=en&amp;region_country=IN"
                class="menu-drawer__account link focus-inset h5 medium-hide large-up-hide"
                rel="nofollow"><account-icon><span class="svg-wrapper"><svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      class="icon icon-account"
                      viewBox="0 0 18 19">
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M6 4.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8m5.58 12.15c1.12.82 1.83 2.24 1.91 4.85H1.51c.08-2.6.79-4.03 1.9-4.85C4.66 11.75 6.5 11.5 9 11.5s4.35.26 5.58 1.15M9 10.5c-2.5 0-4.65.24-6.17 1.35C1.27 12.98.5 14.93.5 18v.5h17V18c0-3.07-.77-5.02-2.33-6.15-1.52-1.1-3.67-1.35-6.17-1.35"
                        clip-rule="evenodd" />
                    </svg> </span></account-icon>Log in</a>-->
              <div
                class="menu-drawer__localization header-localization"></div>


              <ul class="list list-social list-unstyled" role="list">
                <!-- Facebook -->
                <li>
  <a
    href="https://www.facebook.com/madanbiharihandicraft/"
    class="topbar-social__link facebook"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Facebook">

    <svg
      class="topbar-social__icon"
      xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="currentColor"
      viewBox="0 0 16 16">
      <path d="M16 8.049C16 3.58 12.418 0 8 0S0 3.58 0 8c0 3.993 2.917 7.313 6.75 7.951v-5.625H4.719V8h2.031V6.237c0-2.006 1.194-3.116 3.022-3.116.875 0 1.79.156 1.79.156v1.98h-1.009c-.993 0-1.303.616-1.303 1.248V8h2.219l-.355 2.326H9.25v5.625C13.083 15.313 16 11.993 16 8.049z"/>
    </svg>

  </a>
</li>


<!-- Instagram -->
<li>
  <a
    href="https://www.instagram.com/madanbiharihandicraft/"
    class="topbar-social__link instagram"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Instagram">

    <svg
      class="topbar-social__icon"
      xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="currentColor"
      viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.269.087 3.85.048 4.703.01 5.556 0 5.829 0 8s.01 2.444.048 3.297c.04.853.174 1.434.372 1.943.205.526.48.973.923 1.417.444.443.891.718 1.417.923.509.198 1.09.333 1.943.372C5.556 15.99 5.829 16 8 16s2.444-.01 3.297-.048c.853-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.417-.923 3.9 3.9 0 0 0 .923-1.417c.198-.509.333-1.09.372-1.943C15.99 10.444 16 10.171 16 8s-.01-2.444-.048-3.297c-.04-.853-.174-1.434-.372-1.943a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.509-.198-1.09-.333-1.943-.372C10.444.01 10.171 0 8 0zm0 1.441c2.137 0 2.389.008 3.233.046.78.036 1.204.166 1.486.276.373.137.648.301.931.584.283.283.447.558.584.931.11.282.24.706.276 1.486.038.844.046 1.096.046 3.233s-.008 2.389-.046 3.233c-.036.78-.166 1.204-.276 1.486-.137.373-.301.648-.584.931-.283.283-.558.447-.931.584-.282.11-.706.24-1.486.276-.844.038-1.096.046-3.233.046s-2.389-.008-3.233-.046c-.78-.036-1.204-.166-1.486-.276-.373-.137-.648-.301-.931-.584-.283-.283-.447-.558-.584-.931-.11-.282-.24-.706-.276-1.486C1.449 10.389 1.441 10.137 1.441 8s.008-2.389.046-3.233c.036-.78.166-1.204.276-1.486.137-.373.301-.648.584-.931.283-.283.558-.447.931-.584.282-.11.706-.24 1.486-.276C5.611 1.449 5.863 1.441 8 1.441z"/>
      <path d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm0 6.559A2.559 2.559 0 1 1 8 5.441a2.559 2.559 0 0 1 0 5.118z"/>
      <circle cx="12.406" cy="3.594" r=".96"/>
    </svg>

  </a>
</li>
                <li>
                   <a href="http://linkedin.com/company/madan-bihari-handicraft/?viewAsMember=true"
     class="topbar-social__link linkedin"
     target="_blank"
     aria-label="linkedin">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg>
</a>
</li>

<li>

<a href="https://www.youtube.com/@MadanBihariHandicraft2026"
     class="topbar-social__link instagram"
     target="_blank"
     aria-label="youtube">

    
<svg  class="topbar-social__icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
  <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
</svg>

  </a>
</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </details>
  </header-drawer>
  <h1 class="header__heading">
    <a
      href="<?= $sitePrefix ?>/"
      class="header__heading-link link link--text focus-inset">
      <img
        src="<?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png"
        alt="My Store"
        srcset="
             <?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png 240w,
             <?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png 360w,
             <?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png 480w
                  "
        width="240"
        height="70.4"
        loading="eager"
        class="header__heading-logo motion-reduce"
        sizes="(max-width: 480px) 50vw, 240px" /></a>
  </h1>

  

  <nav class="header__inline-menu">
    <ul class="list-menu list-menu--inline" role="list">

        <!-- Home -->
        <li>
            <a
                id="HeaderMenu-home"
                href="<?= $sitePrefix ?>index.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'index.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'index.php') ? 'header__active-menu-item' : '' ?>">
                    Home
                </span>
            </a>
        </li>

        <!-- About Us -->
        <li>
            <a
                id="HeaderMenu-about-us"
                href="<?= $sitePrefix ?>about.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'about.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'about.php') ? 'header__active-menu-item' : '' ?>">
                    About Us
                </span>
            </a>
        </li>

        <!-- Services -->
        <li>
            <a
                id="HeaderMenu-services"
                href="<?= $sitePrefix ?>services.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'services.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'services.php') ? 'header__active-menu-item' : '' ?>">
                    Services
                </span>
            </a>
        </li>
        
         <!-- Products -->
        <li>
            <a
                id="HeaderMenu-products"
                href="<?= $sitePrefix ?>product.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'product.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'product.php') ? 'header__active-menu-item' : '' ?>">
                    Products
                </span>
            </a>
        </li>

        <!-- Categories -->
        <li>
            <a
                id="HeaderMenu-categories"
                href="<?= $sitePrefix ?>categories.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'categories.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'categories.php') ? 'header__active-menu-item' : '' ?>">
                    Categories
                </span>
            </a>
        </li>

        <!-- Premium Paintings -->
        <li>
            <a
                id="HeaderMenu-premium-paintings"
                href="<?= $sitePrefix ?>premium-paintings.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'premium-paintings.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'premium-paintings.php') ? 'header__active-menu-item' : '' ?>">
                    Premium Paintings
                </span>
            </a>
        </li>

       

        <!-- Blogs -->
        <li>
            <a
                id="HeaderMenu-blogs"
                href="<?= $sitePrefix ?>blog.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'blog.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'blog.php') ? 'header__active-menu-item' : '' ?>">
                    Blogs
                </span>
            </a>
        </li>

        <!-- Contact -->
        <li>
            <a
                id="HeaderMenu-contact"
                href="<?= $sitePrefix ?>contact.php"
                class="header__menu-item list-menu__item link link--text focus-inset"
                <?= ($currentPage == 'contact.php') ? 'aria-current="page"' : '' ?>>

                <span class="<?= ($currentPage == 'contact.php') ? 'header__active-menu-item' : '' ?>">
                    Contact
                </span>
            </a>
        </li>

    </ul>
</nav>

  <!--<div-->
  <!--  class="header__icons header__icons--localization header-localization">-->
  <!--  <div class="desktop-localization-wrapper"></div>-->

  <!--  <details-modal class="header__search">-->
  <!--    <details>-->
  <!--      <summary-->
  <!--        class="header__icon header__icon--search header__icon--summary link focus-inset modal__toggle"-->
  <!--        aria-haspopup="dialog"-->
  <!--        aria-label="Search">-->
          <!--<span>-->
          <!--  <span class="svg-wrapper"><svg-->
          <!--      fill="none"-->
          <!--      class="icon icon-search"-->
          <!--      viewBox="0 0 18 19">-->
          <!--      <path-->
          <!--        fill="currentColor"-->
          <!--        fill-rule="evenodd"-->
          <!--        d="M11.03 11.68A5.784 5.784 0 1 1 2.85 3.5a5.784 5.784 0 0 1 8.18 8.18m.26 1.12a6.78 6.78 0 1 1 .72-.7l5.4 5.4a.5.5 0 1 1-.71.7z"-->
          <!--        clip-rule="evenodd" />-->
          <!--    </svg>-->
          <!--  </span>-->
          <!--  <span class="svg-wrapper header__icon-close"><svg-->
          <!--      xmlns="http://www.w3.org/2000/svg"-->
          <!--      fill="none"-->
          <!--      class="icon icon-close"-->
          <!--      viewBox="0 0 18 17">-->
          <!--      <path-->
          <!--        fill="currentColor"-->
          <!--        d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z" />-->
          <!--    </svg>-->
          <!--  </span>-->
          <!--</span>-->
        <!--</summary>-->
        <!--<div-->
        <!--  class="search-modal modal__content gradient"-->
        <!--  role="dialog"-->
        <!--  aria-modal="true"-->
        <!--  aria-label="Search">-->
        <!--  <div class="modal-overlay"></div>-->
        <!--  <div-->
        <!--    class="search-modal__content search-modal__content-bottom"-->
        <!--    tabindex="-1">-->
        <!--    <predictive-search-->
        <!--      class="search-modal__form"-->
        <!--      data-loading-text="Loading...">-->
        <!--      <form-->
        <!--        action="https://c1esm2-av.myshopify.com/search"-->
        <!--        method="get"-->
        <!--        role="search"-->
        <!--        class="search search-modal__form">-->
        <!--        <div class="field">-->
        <!--          <input-->
        <!--            class="search__input field__input"-->
        <!--            id="Search-In-Modal"-->
        <!--            type="search"-->
        <!--            name="q"-->
        <!--            value=""-->
        <!--            placeholder="Search"-->
        <!--            role="combobox"-->
        <!--            aria-expanded="false"-->
        <!--            aria-owns="predictive-search-results"-->
        <!--            aria-controls="predictive-search-results"-->
        <!--            aria-haspopup="listbox"-->
        <!--            aria-autocomplete="list"-->
        <!--            autocorrect="off"-->
        <!--            autocomplete="off"-->
        <!--            autocapitalize="off"-->
        <!--            spellcheck="false" />-->
        <!--          <label class="field__label" for="Search-In-Modal">Search</label>-->
        <!--          <input-->
        <!--            type="hidden"-->
        <!--            name="options[prefix]"-->
        <!--            value="last" />-->
        <!--          <button-->
        <!--            type="reset"-->
        <!--            class="reset__button field__button hidden"-->
        <!--            aria-label="Clear search term">-->
        <!--            <span class="svg-wrapper"><svg-->
        <!--                fill="none"-->
        <!--                stroke="currentColor"-->
        <!--                class="icon icon-close"-->
        <!--                viewBox="0 0 18 18">-->
        <!--                <circle-->
        <!--                  cx="9"-->
        <!--                  cy="9"-->
        <!--                  r="8.5"-->
        <!--                  stroke-opacity=".2" />-->
        <!--                <path-->
        <!--                  stroke-linecap="round"-->
        <!--                  stroke-linejoin="round"-->
        <!--                  d="M11.83 11.83 6.172 6.17M6.229 11.885l5.544-5.77" />-->
        <!--              </svg>-->
        <!--            </span>-->
        <!--          </button>-->
        <!--          <button-->
        <!--            class="search__button field__button"-->
        <!--            aria-label="Search">-->
        <!--            <span class="svg-wrapper"><svg-->
        <!--                fill="none"-->
        <!--                class="icon icon-search"-->
        <!--                viewBox="0 0 18 19">-->
        <!--                <path-->
        <!--                  fill="currentColor"-->
        <!--                  fill-rule="evenodd"-->
        <!--                  d="M11.03 11.68A5.784 5.784 0 1 1 2.85 3.5a5.784 5.784 0 0 1 8.18 8.18m.26 1.12a6.78 6.78 0 1 1 .72-.7l5.4 5.4a.5.5 0 1 1-.71.7z"-->
        <!--                  clip-rule="evenodd" />-->
        <!--              </svg>-->
        <!--            </span>-->
        <!--          </button>-->
        <!--        </div>-->
        <!--        <div-->
        <!--          class="predictive-search predictive-search--header"-->
        <!--          tabindex="-1"-->
        <!--          data-predictive-search>-->
        <!--          <div class="predictive-search__loading-state">-->
        <!--            <svg-->
        <!--              xmlns="http://www.w3.org/2000/svg"-->
        <!--              class="spinner"-->
        <!--              viewBox="0 0 66 66">-->
        <!--              <circle-->
        <!--                stroke-width="6"-->
        <!--                cx="33"-->
        <!--                cy="33"-->
        <!--                r="30"-->
        <!--                fill="none"-->
        <!--                class="path" />-->
        <!--            </svg>-->
        <!--          </div>-->
        <!--        </div>-->

        <!--        <span-->
        <!--          class="predictive-search-status visually-hidden"-->
        <!--          role="status"-->
        <!--          aria-hidden="true"></span>-->
        <!--      </form>-->
        <!--    </predictive-search><button-->
        <!--      type="button"-->
        <!--      class="search-modal__close-button modal__close-button link link--text focus-inset"-->
        <!--      aria-label="Close">-->
        <!--      <span class="svg-wrapper"><svg-->
        <!--          xmlns="http://www.w3.org/2000/svg"-->
        <!--          fill="none"-->
        <!--          class="icon icon-close"-->
        <!--          viewBox="0 0 18 17">-->
        <!--          <path-->
        <!--            fill="currentColor"-->
        <!--            d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z" />-->
        <!--        </svg>-->
        <!--      </span>-->
        <!--    </button>-->
        <!--  </div>-->
        <!--</div>-->
    <!--  </details>-->
    <!--</details-modal>-->

    <!--<a-->
    <!--  href="https://shopify.com/73496068161/account?buyer_flags=eyJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJjMWVzbTItYXYubXlzaG9waWZ5LmNvbSIsImZsYWdzIjpbXSwiZXhwIjoxNzg1MTQ1NTU1LCJuYmYiOjE3ODQ1NDA3NTd9.wmKChhGLudd_OSEYYYTXrUqBN1i7KGRVoxRxu5pX_Ao&amp;locale=en&amp;region_country=IN"-->
    <!--  class="header__icon header__icon--account link focus-inset small-hide"-->
    <!--  rel="nofollow"><account-icon><span class="svg-wrapper">-->
    <!--      <svg-->
    <!--        xmlns="http://www.w3.org/2000/svg"-->
    <!--        fill="none"-->
    <!--        class="icon icon-account"-->
    <!--        viewBox="0 0 18 19">-->
    <!--        <path-->
    <!--          fill="currentColor"-->
    <!--          fill-rule="evenodd"-->
    <!--          d="M6 4.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8m5.58 12.15c1.12.82 1.83 2.24 1.91 4.85H1.51c.08-2.6.79-4.03 1.9-4.85C4.66 11.75 6.5 11.5 9 11.5s4.35.26 5.58 1.15M9 10.5c-2.5 0-4.65.24-6.17 1.35C1.27 12.98.5 14.93.5 18v.5h17V18c0-3.07-.77-5.02-2.33-6.15-1.52-1.1-3.67-1.35-6.17-1.35"-->
    <!--          clip-rule="evenodd" />-->
    <!--      </svg> </span></account-icon><span class="visually-hidden">Log in</span> </a>-->
          
        <a
    href="<?= $sitePrefix ?>cart.php"
    class="header__icon header__icon--cart link focus-inset"
    id="cart-icon-bubble">

    <span class="svg-wrapper">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            class="icon icon-cart-empty"
            viewBox="0 0 40 40">

            <path
                fill="currentColor"
                fill-rule="evenodd"
                d="M15.75 11.8h-3.16l-.77 11.6a5 5 0 0 0 4.99 5.34h7.38a5 5 0 0 0 4.99-5.33L28.4 11.8zm0 1h-2.22l-.71 10.67a4 4 0 0 0 3.99 4.27h7.38a4 4 0 0 0 4-4.27l-.72-10.67h-2.22v.63a4.75 4.75 0 1 1-9.5 0zm8.5 0h-7.5v.63a3.75 3.75 0 1 0 7.5 0z" />

        </svg>

    </span>

    <span class="visually-hidden">
        Cart
    </span>

    <!-- CART COUNT -->
    <span
        id="cartCount"
        class="cart-count-badge">
        0
    </span>

</a>
  </div>
</header>


<style>
    /* =========================================================
   CART COUNT BADGE
========================================================= */

#cart-icon-bubble {
    position: relative;
}

.cart-count-badge {
    position: absolute;

    top: 2px;
    right: 2px;

    min-width: 18px;
    height: 18px;

    padding: 0 4px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #5d2a91;
    color: #ffffff;

    font-size: 10px;
    font-weight: 700;

    line-height: 1;

    border: 2px solid #ffffff;

    box-sizing: border-box;

    z-index: 5;
}
</style>

