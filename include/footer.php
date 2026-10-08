<?php $sitePrefix = isset($assetPrefix) ? $assetPrefix : ''; ?>

<!-- Floating Contact Widget -->
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


<div class="floating-contact">

    <a href="tel:+918938810900" class="contact-item call">
        <i class="fa-solid fa-phone"></i>
    </a>

    <a href="https://wa.me/918938810900"
       target="_blank"
       class="contact-item whatsapp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

</div>

<div id="google_translate_element" style="display:none;"></div>

    <script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,hi',
        autoDisplay: false
    }, 'google_translate_element');
}
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<style>
  .lang-switch {
    display: flex;
    justify-content: flex-end; /* Right align */
    align-items: center;
    gap: 10px;
    width: 100%;
    margin: -20px 0;
}

.lang-switch button {
    padding: 8px 16px;
    border: 1px solid #ddd;
    background: #fff;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.lang-switch button:hover {
    background: #4d2d7e;
    color: #fff;
    border-color: #4d2d7e;
}

/* Hide Google Translate top banner */
.goog-te-banner-frame,
.skiptranslate {
    display: none !important;
}

body {
    top: 0 !important;
}

/* Hide the translation tooltip */
.goog-tooltip,
.goog-tooltip:hover,
.goog-text-highlight {
    display: none !important;
    background: none !important;
    box-shadow: none !important;
    border: none !important;
}

.goog-text-highlight {
    background-color: transparent !important;
    box-shadow: none !important;
}

/* Hide the feedback popup */
.VIpgJd-ZVi9od-aZ2wEe-wOHMyf,
.VIpgJd-ZVi9od-ORHb-OEVmcd,
.VIpgJd-ZVi9od-aZ2wEe {
    display: none !important;
}
</style>


<script>
function setLang(lang) {
    localStorage.setItem("siteLang", lang);
    applyLang(lang);
}

function applyLang(lang) {
    let combo = document.querySelector(".goog-te-combo");

    if (combo) {
        combo.value = lang;
        combo.dispatchEvent(new Event("change"));
    }

    removeGoogleBar();
}

// restore language after reload
window.addEventListener("load", function () {
    let lang = localStorage.getItem("siteLang");

    setTimeout(() => {
        if (lang) applyLang(lang);
    }, 1200);
});

// remove google translate header bar
function removeGoogleBar() {
    let frame = document.querySelector(".goog-te-banner-frame");
    if (frame) {
        frame.style.display = "none";
        frame.remove();
    }

    document.body.style.top = "0px";
    document.documentElement.style.top = "0px";
}

// keep forcing removal (important)
setInterval(removeGoogleBar, 300);

// prevent reset when user clicks "Show original"
document.addEventListener("click", function () {
    setTimeout(() => {
        let lang = localStorage.getItem("siteLang");
        if (lang && lang !== "en") {
            applyLang(lang);
        }
    }, 500);
});
</script>


<script>
function setLang(lang) {
    localStorage.setItem("siteLang", lang);
    applyLang(lang);
}

function applyLang(lang) {
    let combo = document.querySelector(".goog-te-combo");

    if (combo) {
        combo.value = lang;
        combo.dispatchEvent(new Event("change"));
    }

    removeGoogleBar();
}

document.addEventListener("click", function () {
    setTimeout(() => {
        let lang = localStorage.getItem("siteLang");
        if (lang && lang !== "en") {
            applyLang(lang);
        }
    }, 500);
});
</script>

<style>
    .language-switcher{
    position: fixed;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 99999;
}

.language-switcher button{
    width: 90px;
    padding: 10px;
    border: none;
    border-radius: 8px;
    background: #4d2d7e;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,0,0,.2);
    transition: .3s;
}

.language-switcher button:hover{
    background: #2f1b4c;
}
</style>


<div class="language-switcher">
    <button onclick="setLang('en')">English</button>
    <button onclick="setLang('hi')">हिन्दी</button>
</div>



<style>
 .floating-contact{
    position: fixed;
  right: 20px;
    bottom: 20px;
    z-index: 99999;

    display: flex;
    flex-direction: column;
    gap: 12px;
}

.contact-item{
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: #fff;
    font-size: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,.2);
    transition: .3s;
}

.contact-item:hover{
    transform: scale(1.08);
}

.call{
    background:#2d9cdb;
}

.whatsapp{
    background:#25d366;
}
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('contactToggle');
    const contactOptions = document.getElementById('contactOptions');

    if (!toggleBtn || !contactOptions) {
      return;
    }

    toggleBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      contactOptions.classList.toggle('active');
      const expanded = contactOptions.classList.contains('active');
      toggleBtn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    });

    document.addEventListener('click', function(e) {
      if (!toggleBtn.contains(e.target) && !contactOptions.contains(e.target)) {
        contactOptions.classList.remove('active');
        toggleBtn.setAttribute('aria-expanded', 'false');
      }
    });
  });
</script>

<footer
  class="footer color-scheme-1 gradient section-sections--20655586279489__footer-padding">
  <div class="footer__content-top page-width">
    <div
      class="footer__blocks-wrapper grid grid--1-col grid--2-col grid--4-col-tablet scroll-trigger animate--slide-in"
      data-cascade>
      <div
        class="footer-block grid__item scroll-trigger animate--slide-in"
        data-cascade
        style="--animation-order: 1">
        <div class="footer-block__brand-info">
          <div
            class="footer-block__image-wrapper"
            style="max-width: min(100%, 210px); background: white;
    border-radius: 22px;">

           <a href="/"> <img
              src="<?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png"
              alt="My Store"
              srcset="
                  <?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png 240w,
                   <?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png 360w,
                   <?= $sitePrefix ?>assets/images/MadanBiharigraphiclogo(3).png 480w
                  "
              width="210"
              height="61.6"
              loading="eager"
              class="header__footer-logo motion-reduce"
              sizes="(max-width: 480px) 50vw, 240px" /></a>
          </div>
          <!-- <h2 class="footer-block__heading rte">About Us</h2> -->
          <div class="rte">
            <p>
              <br />Madan Bihari Handicraft is dedicated to preserving the timeless traditions of Braj through handcrafted devotional paintings made with passion, faith, and skilled craftsmanship.<br /><br />
            </p>
          </div>

          <ul
            class="list-unstyled list-social footer__list-social"
            role="list">
            <li class="list-social__item">
              <a
                href="https://www.facebook.com/madanbiharihandicraft/"
                class="link list-social__link">
                <span class="svg-wrapper"><svg class="icon icon-facebook" viewBox="0 0 20 20">
                    <path
                      fill="currentColor"
                      d="M18 10.049C18 5.603 14.419 2 10 2s-8 3.603-8 8.049C2 14.067 4.925 17.396 8.75 18v-5.624H6.719v-2.328h2.03V8.275c0-2.017 1.195-3.132 3.023-3.132.874 0 1.79.158 1.79.158v1.98h-1.009c-.994 0-1.303.621-1.303 1.258v1.51h2.219l-.355 2.326H11.25V18c3.825-.604 6.75-3.933 6.75-7.951" />
                  </svg>
                </span>
                <span class="visually-hidden">Facebook</span>
              </a>
            </li>
            <li class="list-social__item">
              <a
                href="https://www.instagram.com/madanbiharihandicraft/"
                class="link list-social__link">
                <span class="svg-wrapper"><svg class="icon icon-instagram" viewBox="0 0 20 20">
                    <path
                      fill="currentColor"
                      fill-rule="evenodd"
                      d="M13.23 3.492c-.84-.037-1.096-.046-3.23-.046-2.144 0-2.39.01-3.238.055-.776.027-1.195.164-1.487.273a2.4 2.4 0 0 0-.912.593 2.5 2.5 0 0 0-.602.922c-.11.282-.238.702-.274 1.486-.046.84-.046 1.095-.046 3.23s.01 2.39.046 3.229c.004.51.097 1.016.274 1.495.145.365.319.639.602.913.282.282.538.456.92.602.474.176.974.268 1.479.273.848.046 1.103.046 3.238.046s2.39-.01 3.23-.046c.784-.036 1.203-.164 1.486-.273.374-.146.648-.329.921-.602.283-.283.447-.548.602-.922.177-.476.27-.979.274-1.486.037-.84.046-1.095.046-3.23s-.01-2.39-.055-3.229c-.027-.784-.164-1.204-.274-1.495a2.4 2.4 0 0 0-.593-.913 2.6 2.6 0 0 0-.92-.602c-.284-.11-.703-.237-1.488-.273ZM6.697 2.05c.857-.036 1.131-.045 3.302-.045a63 63 0 0 1 3.302.045c.664.014 1.321.14 1.943.374a4 4 0 0 1 1.414.922c.41.397.728.88.93 1.414.23.622.354 1.279.365 1.942C18 7.56 18 7.824 18 10.005c0 2.17-.01 2.444-.046 3.292-.036.858-.173 1.442-.374 1.943-.2.53-.474.976-.92 1.423a3.9 3.9 0 0 1-1.415.922c-.51.191-1.095.337-1.943.374-.857.036-1.122.045-3.302.045-2.171 0-2.445-.009-3.302-.055-.849-.027-1.432-.164-1.943-.364a4.15 4.15 0 0 1-1.414-.922 4.1 4.1 0 0 1-.93-1.423c-.183-.51-.329-1.085-.365-1.943C2.009 12.45 2 12.167 2 10.004c0-2.161 0-2.435.055-3.302.027-.848.164-1.432.365-1.942a4.4 4.4 0 0 1 .92-1.414 4.2 4.2 0 0 1 1.415-.93c.51-.183 1.094-.33 1.943-.366Zm.427 4.806a4.105 4.105 0 1 1 5.805 5.805 4.105 4.105 0 0 1-5.805-5.805m1.882 5.371a2.668 2.668 0 1 0 2.042-4.93 2.668 2.668 0 0 0-2.042 4.93m5.922-5.942a.958.958 0 1 1-1.355-1.355.958.958 0 0 1 1.355 1.355"
                      clip-rule="evenodd" />
                  </svg>
                </span>
                <span class="visually-hidden">Instagram</span>
              </a>
            </li>
            
            <!-- LinkedIn --> <li class="list-social__item"> <a href="http://linkedin.com/company/madan-bihari-handicraft/?viewAsMember=true" class="link list-social__link" target="_blank" rel="noopener noreferrer"> <span class="svg-wrapper"> <svg class="icon icon-linkedin" viewBox="0 0 20 20" aria-hidden="true"> <path fill="currentColor" d="M4.7 3.2a1.7 1.7 0 1 1-3.4 0 1.7 1.7 0 0 1 3.4 0ZM1.5 6.2h3.3V17H1.5V6.2Zm5.4 0h3.2v1.5h.1c.4-.8 1.5-1.8 3.2-1.8 3.4 0 4 2.2 4 5.1V17h-3.3v-5.3c0-1.3 0-3-1.8-3s-2 1.4-2 2.9V17H6.9V6.2Z" /> </svg> </span> <span class="visually-hidden">LinkedIn</span> </a> </li>
            
            <!-- YouTube --> <li class="list-social__item"> <a href="https://www.youtube.com/@MadanBihariHandicraft2026" class="link list-social__link" target="_blank" rel="noopener noreferrer"> <span class="svg-wrapper"> <svg class="icon icon-youtube" viewBox="0 0 20 20" aria-hidden="true"> <path fill="currentColor" d="M19.6 5.1a2.5 2.5 0 0 0-1.8-1.8C16.2 2.9 10 2.9 10 2.9s-6.2 0-7.8.4A2.5 2.5 0 0 0 .4 5.1C0 6.7 0 10 0 10s0 3.3.4 4.9a2.5 2.5 0 0 0 1.8 1.8c1.6.4 7.8.4 7.8.4s6.2 0 7.8-.4a2.5 2.5 0 0 0 1.8-1.8C20 13.3 20 10 20 10s0-3.3-.4-4.9ZM8 13.5v-7l6 3.5-6 3.5Z" /> </svg> </span> <span class="visually-hidden">YouTube</span> </a> </li>
        
          </ul>
        </div>
      </div>
      <div
        class="footer-block grid__item footer-block--menu scroll-trigger animate--slide-in"
        data-cascade
        style="--animation-order: 2">
        <h2 class="footer-block__heading inline-richtext">Quick links</h2>
        <ul class="footer-block__details-content list-unstyled">
          <li>
            <a
              href="<?= $sitePrefix ?>index.php"
              class="link link--text list-menu__item list-menu__item--link list-menu__item--active">
              Home
            </a>
          </li>
          <li>
            <a
              href="<?= $sitePrefix ?>about.php"
              class="link link--text list-menu__item list-menu__item--link">
              About Us
            </a>
          </li>
          <li>
            <a
              href="<?= $sitePrefix ?>services.php"
              class="link link--text list-menu__item list-menu__item--link">
              Services
            </a>
          </li>
          
          <li>
            <a
              href="<?= $sitePrefix ?>product.php"
              class="link link--text list-menu__item list-menu__item--link">
              Products
            </a>
          </li>
          <li>
            <a
              href="categories.php"
              class="link link--text list-menu__item list-menu__item--link">
              Categories
            </a>
          </li>
          <li>
            <a
              href="<?= $sitePrefix ?>blog.php"
              class="link link--text list-menu__item list-menu__item--link">
              Blogs
            </a>
          </li>
          <li>
            <a
              href="<?= $sitePrefix ?>contact.php"
              class="link link--text list-menu__item list-menu__item--link">
              Contact
            </a>
          </li>
        </ul>
      </div>
      <div
        class="footer-block grid__item footer-block--menu scroll-trigger animate--slide-in"
        data-cascade
        style="--animation-order: 3">
        <h2 class="footer-block__heading inline-richtext">Legal links</h2>
        <ul class="footer-block__details-content list-unstyled">
          <li>
            <a
              href="<?= $sitePrefix ?>policies/privacy-policy.php"
              class="link link--text list-menu__item list-menu__item--link">
              Privacy
            </a>
          </li>
          <li>
            <a
              href="<?= $sitePrefix ?>policies/refund-policy.php"
              class="link link--text list-menu__item list-menu__item--link">
              Refund Policy
            </a>
          </li>
          <li>
            <a
              href="<?= $sitePrefix ?>policies/terms-of-service.php"
              class="link link--text list-menu__item list-menu__item--link">
              Terms of Service
            </a>
          </li>
            <li>
            <a
              href="<?= $sitePrefix ?>policies/shipping-policy.php"
              class="link link--text list-menu__item list-menu__item--link">
              Shipping Policy
            </a>
          </li>
        </ul>
      </div>
      <div
        class="footer-block grid__item scroll-trigger animate--slide-in"
        data-cascade
        style="--animation-order: 4">
        <h2 class="footer-block__heading inline-richtext">Contact Us</h2>
        <div class="footer-block__details-content rte">
          <p><strong>Phone Numbers:</strong></p>
          <p><strong>+91</strong> <strong>8938810900</strong><br /></p>
          <p><strong>Email Addresses:</strong></p>
          <p>
            <a
              href="mailto:rocksaurabhsharma16@gmail.com"
              title="mailto:rocksaurabhsharma16@gmail.com">rocksaurabhsharma16@gmail.com</a><br /><a
              href="mailto:info@madanbiharihandicraft.com"
              title="mailto:info@madanbiharihandicraft.com">info@madanbiharihandicraft.com</a>
          </p>
          <p><strong>Address:</strong></p>
          <a href="https://share.google/YJnriBOTOuU0M1z1c" target="_blank"><p>
            <strong>Madan Bihari Handicraft </strong>Madan Mohan Banke
            Bihari Path, VIP Road, Bankebihari Colony, Vrindavan, Uttar
            Pradesh – 281121, India
          </p></a>
        </div>
      </div>
    </div>
    <div
      class="footer-block--newsletter scroll-trigger animate--slide-in"
      data-cascade></div>
  </div>
  <div
    class="footer__content-bottom scroll-trigger animate--slide-in"
    data-cascade>
    <div class="footer__content-bottom-wrapper page-width">
      <div class="footer__column footer__localization isolate"></div>
      <div class="footer__column footer__column--info"></div>
    </div>
    <div class="footer__content-bottom-wrapper page-width">
      <div class="footer__copyright caption">
        <small class="copyright__store ">&copy; 2026, <a href="https://www.madanbiharihandicraft.com/" title="" style="font-size: 16px;
    color: white;">Madan Bihari Handicraft</a>--</small>
        <small class="copyright__content"><a
            target="_blank"
            rel="nofollow"
            href="https://digitechhealthcare.com/"> Designed & Developed By Digitech Healthcare</a></small>
      </div>
    </div>
  </div>
</footer>

<style>
  .footer {
    background: linear-gradient(135deg, #4d2d7e 0%, #a843b6 50%, #f5a23f 100%);
    color: #ffffff;
    border-top: none;
  }

  .footer .footer-block__heading,
  .footer .footer-block__details-content,
  .footer .copyright__content,
  .footer .footer-block__brand-info p,
  .footer .footer-block__details-content a,
  .footer .footer-block__brand-info a {
    color: rgba(255, 255, 255, 0.95);
  }

  .footer .footer-block__details-content .list-menu__item--link:hover,
  .footer .copyright__content a:hover,
  .footer .footer-block__heading {
    color: #ffffff;
  }
  .footer .copyright__store{
    color: rgba(255, 255, 255, 0.95);
    font-size: 14px;
  }



  .footer .footer__list-social .list-social__link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    transition: transform .2s ease, color .2s ease;
  }

  .footer .footer__list-social .svg-wrapper {
    width: 30px;
    height: 30px;
    min-width: 30px;
    min-height: 30px;
  }

  .footer .footer__list-social .svg-wrapper>svg {
    width: 100%;
    height: 100%;
  }

  .footer .footer__list-social .list-social__link:hover {
    transform: translateY(-2px);
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {

    const panel = document.getElementById("socialPanel");
    const button = document.getElementById("socialToggle");
    const arrow = document.getElementById("toggleArrow");

    button.addEventListener("click", function() {

      panel.classList.toggle("panel-hidden");
      button.classList.toggle("btn-hidden");

      if (panel.classList.contains("panel-hidden")) {
        arrow.innerHTML = "&#10095;"; // >
      } else {
        arrow.innerHTML = "&#10094;"; // <
      }

    });

  });
</script>