<!doctype html>
<html class="js" lang="en">
<meta
    http-equiv="content-type"
    content="text/html;charset=utf-8"
  />
<?php include('include/head.php'); ?>

  <body class="gradient animate--hover-3d-lift">
    <a class="skip-to-content-link button visually-hidden" href="#MainContent">
      Skip to content </a
    >
    <div
      id="shopify-section-sections--20655586246721__announcement-bar"
      class="shopify-section shopify-section-group-header-group announcement-bar-section"
    >
      <link
        href="assets/css/component-slideshow244c.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />
      <link
        href="assets/css/component-sliderf699.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />

      <link
        href="assets/css/component-list-socialf800.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />

    <?php include('links/topheader.php'); ?>
    </div>
    <div
      id="shopify-section-sections--20655586246721__blocks_8Ht9HN"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__header"
      class="shopify-section shopify-section-group-header-group section-header"
    >
      <link
        rel="stylesheet"
        href="assets/css/component-list-menu717c.css"
        media="print"
        onload="this.media = 'all'"
      />
      <link
        rel="stylesheet"
        href="assets/css/component-search2677.css"
        media="print"
        onload="this.media = 'all'"
      />
      <link
        rel="stylesheet"
        href="assets/css/component-menu-drawer97e4.css"
        media="print"
        onload="this.media = 'all'"
      />
      <link
        rel="stylesheet"
        href="assets/css/component-cart-notification585f.css"
        media="print"
        onload="this.media = 'all'"
      /><link
        rel="stylesheet"
        href="assets/css/component-priced9e8.css"
        media="print"
        onload="this.media = 'all'"
      /><link
        rel="stylesheet"
        href="assets/css/component-mega-menu3890.css"
        media="print"
        onload="this.media = 'all'"
      /><style>
        header-drawer {
          justify-self: start;
          margin-left: -1.2rem;
        }
        @media screen and (min-width: 990px) {
          header-drawer {
            display: none;
          }
        }
        .menu-drawer-container {
          display: flex;
        }

        .list-menu {
          list-style: none;
          padding: 0;
          margin: 0;
        }

        .list-menu--inline {
          display: inline-flex;
          /*flex-wrap: wrap;*/
        }

        summary.list-menu__item {
          padding-right: 2.7rem;
        }

        .list-menu__item {
          display: flex;
          align-items: center;
          line-height: calc(1 + 0.3 / var(--font-body-scale));
            font-size:18px;
        }

        .list-menu__item--link {
          text-decoration: none;
          padding-bottom: 1rem;
          padding-top: 1rem;
          line-height: calc(1 + 0.8 / var(--font-body-scale));
        }

        @media screen and (min-width: 750px) {
          .list-menu__item--link {
            padding-bottom: 0.5rem;
            padding-top: 0.5rem;
          }
        }</style
      ><style data-shopify>
        .header {
          padding: 0px 3rem 0px 3rem;
        }

        .section-header {
          position: sticky; /* This is for fixing a Safari z-index issue. PR #2147 */
          margin-bottom: 0px;
        }

        @media screen and (min-width: 750px) {
          .section-header {
            margin-bottom: 0px;
          }
        }

        @media screen and (min-width: 990px) {
          .header {
            padding-top: 0px;
            padding-bottom: 0px;
          }
        }
 
      </style>
      <script src="assets/js/cart-notification58c3.js" defer="defer"></script>

      <sticky-header
        data-sticky-type="on-scroll-up"
        class="header-wrapper "
        >
        <?php include('include/header.php'); ?>
      </sticky-header>

      <cart-notification>
        <div class="cart-notification-wrapper page-width">
          <div
            id="cart-notification"
            class="cart-notification focus-inset color-scheme-5 gradient"
            aria-modal="true"
            aria-label="Item added to your cart"
            role="dialog"
            tabindex="-1"
          >
            <div class="cart-notification__header">
              <h2 class="cart-notification__heading caption-large text-body">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  class="icon icon-checkmark"
                  viewBox="0 0 12 9"
                >
                  <path
                    fill="currentColor"
                    fill-rule="evenodd"
                    d="M11.35.643a.5.5 0 0 1 .006.707l-6.77 6.886a.5.5 0 0 1-.719-.006L.638 4.845a.5.5 0 1 1 .724-.69l2.872 3.011 6.41-6.517a.5.5 0 0 1 .707-.006z"
                    clip-rule="evenodd"
                  />
                </svg>
                Item added to your cart
              </h2>
              <button
                type="button"
                class="cart-notification__close modal__close-button link link--text focus-inset"
                aria-label="Close"
              >
                <span class="svg-wrapper"
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    class="icon icon-close"
                    viewBox="0 0 18 17"
                  >
                    <path
                      fill="currentColor"
                      d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z"
                    />
                  </svg>
                </span>
              </button>
            </div>
            <div
              id="cart-notification-product"
              class="cart-notification-product"
            ></div>
            <div class="cart-notification__links">
              <a
                href="../cart.php"
                id="cart-notification-button"
                class="button button--secondary button--full-width"
                >View cart</a
              >
              <form
                action="../cart.php"
                method="post"
                id="cart-notification-form"
              >
                <button
                  class="button button--primary button--full-width"
                  name="checkout"
                >
                  Check out
                </button>
              </form>
              <button type="button" class="link button-label">
                Continue shopping
              </button>
            </div>
          </div>
        </div>
      </cart-notification>
      <style data-shopify>
        .cart-notification {
          display: none;
        }
      </style>

      <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Organization",
          "name": "My Store",

          "logo": "https:\/\/c1esm2-av.myshopify.com\/cdn\/shop\/files\/Madan_Bihari_graphic_logo_15f2c70d-f090-4dc8-bd4d-d8265e4181da.svg?v=1783409269\u0026width=500",

          "sameAs": [
            "",
            "index.html\/\/www.facebook.com\/profile.php?id=61590971671129",
            "",
            "index.html\/\/www.instagram.com\/madan_bihari_handicraft?utm_source=qr",
            "",
            "",
            "",
            "",
            ""
          ],
          "url": "https:\/\/c1esm2-av.myshopify.com"
        }
      </script>
      <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "WebSite",
          "name": "My Store",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https:\/\/c1esm2-av.myshopify.com\/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
          },
          "url": "https:\/\/c1esm2-av.myshopify.com"
        }
      </script>
    </div>
    <div
      id="shopify-section-sections--20655586246721__blocks_D9A789"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__blocks_qNNJmA"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__blocks_QYhRKX"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__blocks_U47FDL"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__blocks_mtTyPT"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__1783582282c0a89740"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__17834971636385ef0d"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__blocks_QVD3Kt"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <div
      id="shopify-section-sections--20655586246721__blocks_VUEKXk"
      class="shopify-section shopify-section-group-header-group"
    ></div>
    <!-- END sections: header-group -->

    <main
      id="MainContent"
      class="content-for-layout focus-none"
      role="main"
      tabindex="-1"
      data-template="index"
    >
      <section
        id="shopify-section-template--20655585787969__slideshow_qJCgQU"
        class="shopify-section section"
      >
        <link
          href="assets/css/section-image-banner41f2.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-sliderf699.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-slideshow244c.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <slideshow-component
          class="slider-mobile-gutter"
          role="region"
          aria-roledescription="Carousel"
          aria-label=""
          ><div
            class="slideshow banner banner--medium grid grid--1-col slider slider--everywhere slideshow--placeholder scroll-trigger animate--fade-in"
            id="Slider-template--20655585787969__slideshow_qJCgQU"
            aria-live="polite"
            aria-atomic="true"
            data-autoplay="true"
            data-speed="3"
          ></div
        ></slideshow-component>
      </section>
      <div
        id="shopify-section-template--20655585787969__blocks_WdMYmt"
        class="shopify-section"
      >
        <style data-shopify>
          .ai-video-block-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 {
            display: block;
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
          }

          .ai-video-wrapper-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 0px;
          }

          .ai-video-aspect-ratio-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
          }

          .ai-video-element-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
          }

          .ai-video-placeholder-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 16px;
          }

          .ai-video-placeholder-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 svg {
            width: 80px;
            height: 80px;
            opacity: 0.3;
          }

          .ai-video-placeholder-text-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 {
            color: #121212;
            font-size: 14px;
            opacity: 0.6;
          }

          @media screen and (max-width: 749px) {
            .ai-video-block-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8 {
              width: 100%;
            }
          }
        </style>

        <video-autoplay-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8
          class="ai-video-block-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8"
        >
          <div
            class="ai-video-wrapper-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8"
          >
            <div
              class="ai-video-aspect-ratio-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8"
            >
              <video
                class="ai-video-element-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8"
                autoplay
                muted
                loop
                playsinline
              >
                <source
                  src="assets/images/a68ef2a3fd37463c854a7834e96178d5a4f0.m3u8"
                  type="application/x-mpegURL"
                />

                <source
                  src="assets/images/a68ef2a3fd37463c854a7834e96178d5.HD-1080p-7.2Mbps-89369766a4f0.mp4"
                  type="video/mp4"
                />

                Your browser does not support the video tag.
              </video>
            </div>
          </div>
        </video-autoplay-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8>

        <script>
          (function () {
            class VideoAutoplayattdca21rtlp6l1rotaigenblock7cf3605bcpmx8 extends HTMLElement {
              constructor() {
                super();
              }

              connectedCallback() {
                this.video = this.querySelector(
                  ".ai-video-element-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8",
                );

                if (this.video) {
                  this.setupVideo();
                }
              }

              setupVideo() {
                this.video.setAttribute("muted", "");
                this.video.muted = true;

                const playPromise = this.video.play();

                if (playPromise !== undefined) {
                  playPromise.catch((error) => {
                    console.log("Autoplay prevented:", error);
                  });
                }

                this.video.addEventListener("loadedmetadata", () => {
                  this.video.play().catch((error) => {
                    console.log("Play prevented:", error);
                  });
                });
              }
            }

            customElements.define(
              "video-autoplay-attdca21rtlp6l1rotaigenblock7cf3605bcpmx8",
              VideoAutoplayattdca21rtlp6l1rotaigenblock7cf3605bcpmx8,
            );
          })();
        </script>
      </div>
      
   
     
      
      <section class="mbh-paintings-section">

    <div class="mbh-paintings-container">

        <!-- Section Heading -->
        <div class="mbh-paintings-heading">
            <h2>Wooden Paintings</h2>
        </div>


        <!-- Carousel Wrapper -->
        <div class="mbh-paintings-carousel">

            <!-- Previous Button -->
            <button
                type="button"
                class="mbh-paintings-arrow mbh-paintings-prev"
                aria-label="Previous paintings">
                
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>

            </button>


            <!-- Viewport -->
            <div class="mbh-paintings-viewport">

                <!-- Track -->
                <div class="mbh-paintings-track">

                    <?php

                    include 'include/conn.php';

                    $sql = "SELECT * FROM products 
                            WHERE department_id = 2 
                            AND status = 1
                            ORDER BY id DESC";

                    $result = mysqli_query($con, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <!-- Single Slide -->
                        <div class="mbh-painting-slide">

                            <div class="mbh-painting-card">

                                <!-- Product Image -->
                                <div class="mbh-painting-image">

                                    <a href="product-details.php?id=<?php echo (int)$row['id']; ?>">

                                        <img
                                            src="admin/assets/images/products/<?php echo htmlspecialchars($row['image']); ?>"
                                            alt="<?php echo htmlspecialchars($row['name']); ?>"
                                            loading="lazy">

                                    </a>

                                    <!-- Sale Badge -->
                                    <span >
                                        Sale
                                    </span>
                                    <?php if ($row['on_sale'] == 1 || $row['in_stock'] == 1) { ?>
    <span class="mbh-painting-sale">
       Available
    </span>
    <?php } else { ?>
    <span class="mbh-product-sale-badge">
        On Demand
    </span>
<?php } ?>

                                </div>


                                <!-- Product Details -->
                                <div class="mbh-painting-info">

                                    <h3 class="mbh-painting-title">

                                        <a href="product-details.php?id=<?php echo (int)$row['id']; ?>">

                                            <?php echo htmlspecialchars($row['name']); ?>

                                        </a>

                                    </h3>


                                    <!-- Price -->
                                    <div class="mbh-painting-price">

                                        <?php if (!empty($row['sale_price']) && $row['sale_price'] < $row['price']) { ?>

                                            <span class="mbh-painting-old-price">

                                                Rs. <?php echo number_format($row['price'], 2); ?>

                                            </span>

                                            <span class="mbh-painting-new-price">

                                                Rs. <?php echo number_format($row['sale_price'], 2); ?>

                                            </span>

                                        <?php } else { ?>

                                            <span class="mbh-painting-new-price">

                                                Rs. <?php echo number_format($row['price'], 2); ?>

                                            </span>

                                        <?php } ?>

                                    </div>


                                    <!-- View Product -->
                                    <a
                                        href="product-details.php?id=<?php echo (int)$row['id']; ?>"
                                        class="mbh-painting-view-btn">

                                        View Product

                                    </a>

                                </div>

                            </div>

                        </div>

                    <?php

                        }

                    } else {

                    ?>

                        <div class="mbh-paintings-empty">

                            <p>No paintings available at the moment.</p>

                        </div>

                    <?php

                    }

                    ?>

                </div>

            </div>


            <!-- Next Button -->
            <button
                type="button"
                class="mbh-paintings-arrow mbh-paintings-next"
                aria-label="Next paintings">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>

            </button>

        </div>


        <!-- Carousel Dots -->
        <div class="mbh-paintings-dots"></div>

    </div>

</section>


 <section
        id="shopify-section-template--20655585787969__rich_text_HKNRjK"
        class="shopify-section section"
      >
        <link
          href="assets/css/section-rich-textf4b0.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <style data-shopify>
          .section-template--20655585787969__rich_text_HKNRjK-padding {
            padding-top: 30px;
            padding-bottom: 39px;
          }

          @media screen and (min-width: 750px) {
            .section-template--20655585787969__rich_text_HKNRjK-padding {
              padding-top: 40px;
              padding-bottom: 52px;
            }
          }
        </style>
        <div class="isolate">
          <div
            class="rich-text content-container color-scheme-1 gradient rich-text--full-width content-container--full-width section-template--20655585787969__rich_text_HKNRjK-padding"
          >
            <div
              class="rich-text__wrapper rich-text__wrapper--center page-width"
            >
              <div class="rich-text__blocks center">
                <h2
                  class="rich-text__heading rte inline-richtext h1 scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 1"
                >
                  <strong>About Us </strong>
                </h2>
                <div
                  class="rich-text__text rte scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 2"
                >
                  <p>
                    Welcome to Madan Bihari Handicraft, where every artwork is
                    created with devotion, tradition, and skilled craftsmanship.
                    We believe that a painting is more than just decoration—it
                    is a reflection of faith, culture, and timeless
                    spirituality. Every brushstroke, every color, and every
                    handcrafted detail is created with the intention of bringing
                    the divine presence of Shri Radha Krishna, Shrinathji, Banke
                    Bihari Ji, and the sacred land of Vrindavan into your home.
                  </p>
                </div>
                <div
                  class="rich-text__buttons scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 3"
                >
                  <a href="about.php" class="button button--primary"
                    >Read More</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>





<script>

document.addEventListener("DOMContentLoaded", function () {

    const carousel = document.querySelector(".mbh-paintings-carousel");

    if (!carousel) {
        return;
    }

    const track = carousel.querySelector(".mbh-paintings-track");
    const slides = carousel.querySelectorAll(".mbh-painting-slide");

    const previousButton =
        carousel.querySelector(".mbh-paintings-prev");

    const nextButton =
        carousel.querySelector(".mbh-paintings-next");

    const dotsContainer =
        document.querySelector(".mbh-paintings-dots");


    if (!track || slides.length === 0) {
        return;
    }


    /*
     * Current slide
     */
    let currentIndex = 0;


    /*
     * Number of visible products
     */
    function getVisibleSlides() {

        const width = window.innerWidth;

        if (width <= 480) {
            return 1;
        }

        if (width <= 767) {
            return 2;
        }

        if (width <= 1199) {
            return 3;
        }

        return 4;
    }


    /*
     * Maximum possible index
     */
    function getMaxIndex() {

        const visibleSlides = getVisibleSlides();

        return Math.max(
            0,
            slides.length - visibleSlides
        );
    }


    /*
     * Move carousel
     */
    function moveCarousel() {

        const visibleSlides = getVisibleSlides();

        const percentage =
            currentIndex * (100 / visibleSlides);

        track.style.transform =
            "translate3d(-" + percentage + "%, 0, 0)";

        updateDots();

    }


    /*
     * Create dots
     */
    function createDots() {

        dotsContainer.innerHTML = "";

        const maxIndex = getMaxIndex();

        /*
         * Don't show dots if everything fits
         */
        if (maxIndex <= 0) {
            return;
        }


        for (let i = 0; i <= maxIndex; i++) {

            const dot =
                document.createElement("button");

            dot.type = "button";

            dot.className =
                "mbh-painting-dot";


            dot.setAttribute(
                "aria-label",
                "Go to painting slide " + (i + 1)
            );


            dot.addEventListener(
                "click",
                function () {

                    currentIndex = i;

                    moveCarousel();

                    resetAutoSlide();

                }
            );


            dotsContainer.appendChild(dot);

        }


        updateDots();

    }


    /*
     * Update active dot
     */
    function updateDots() {

        const dots =
            dotsContainer.querySelectorAll(
                ".mbh-painting-dot"
            );

        dots.forEach(function (dot, index) {

            dot.classList.toggle(
                "active",
                index === currentIndex
            );

        });

    }


    /*
     * Next
     */
    function goNext() {

        const maxIndex = getMaxIndex();

        if (maxIndex <= 0) {
            return;
        }


        if (currentIndex >= maxIndex) {

            currentIndex = 0;

        } else {

            currentIndex++;

        }


        moveCarousel();

    }


    /*
     * Previous
     */
    function goPrevious() {

        const maxIndex = getMaxIndex();

        if (maxIndex <= 0) {
            return;
        }


        if (currentIndex <= 0) {

            currentIndex = maxIndex;

        } else {

            currentIndex--;

        }


        moveCarousel();

    }


    /*
     * Buttons
     */
    nextButton.addEventListener(
        "click",
        function () {

            goNext();

            resetAutoSlide();

        }
    );


    previousButton.addEventListener(
        "click",
        function () {

            goPrevious();

            resetAutoSlide();

        }
    );


    /*
     * Auto slide
     */
    let autoSlide;


    function startAutoSlide() {

        clearInterval(autoSlide);

        /*
         * Slide every 3.5 seconds
         */
        autoSlide = setInterval(
            function () {

                goNext();

            },
            3500
        );

    }


    function resetAutoSlide() {

        clearInterval(autoSlide);

        startAutoSlide();

    }


    /*
     * Pause when mouse is over carousel
     */
    carousel.addEventListener(
        "mouseenter",
        function () {

            clearInterval(autoSlide);

        }
    );


    carousel.addEventListener(
        "mouseleave",
        function () {

            startAutoSlide();

        }
    );


    /*
     * Touch / swipe support
     */
    let touchStartX = 0;
    let touchEndX = 0;


    carousel.addEventListener(
        "touchstart",
        function (event) {

            touchStartX =
                event.changedTouches[0].screenX;

            clearInterval(autoSlide);

        },
        {
            passive: true
        }
    );


    carousel.addEventListener(
        "touchend",
        function (event) {

            touchEndX =
                event.changedTouches[0].screenX;

            handleSwipe();

            startAutoSlide();

        },
        {
            passive: true
        }
    );


    function handleSwipe() {

        const swipeDistance =
            touchEndX - touchStartX;


        /*
         * Swipe left
         */
        if (swipeDistance < -50) {

            goNext();

        }


        /*
         * Swipe right
         */
        if (swipeDistance > 50) {

            goPrevious();

        }

    }


    /*
     * Recalculate on resize
     */
    let resizeTimer;

    window.addEventListener(
        "resize",
        function () {

            clearTimeout(resizeTimer);

            resizeTimer = setTimeout(
                function () {

                    const maxIndex =
                        getMaxIndex();


                    if (currentIndex > maxIndex) {

                        currentIndex = maxIndex;

                    }


                    createDots();

                    moveCarousel();

                },
                150
            );

        }
    );


    /*
     * Initialize
     */
    createDots();

    moveCarousel();

    startAutoSlide();

});

</script>



 <section
        id="shopify-section-template--20655585787969__featured_collection_4Lqq3b"
        class="shopify-section section"
      >
        <link
          href="assets/css/component-cardd404.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-priced9e8.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />

        <link
          href="assets/css/component-sliderf699.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/template-collection8887.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />

        <style data-shopify>
          .section-template--20655585787969__featured_collection_4Lqq3b-padding {
            padding-top: 27px;
            padding-bottom: 27px;
            margin-left: 77px;
          }

          @media screen and (min-width: 750px) {
            .section-template--20655585787969__featured_collection_4Lqq3b-padding {
              padding-top: 36px;
              padding-bottom: 36px;
            }
          }
        </style>
        <div class="color-scheme-5 isolate gradient">
          <div
            class="collection section-template--20655585787969__featured_collection_4Lqq3b-padding"
            id="collection-template--20655585787969__featured_collection_4Lqq3b"
            data-id="template--20655585787969__featured_collection_4Lqq3b"
          >
            <div
              class="collection__title title-wrapper title-wrapper--no-top-margin page-width title-wrapper--self-padded-tablet-down"
            >
              <h2  class="rich-text__heading rte inline-richtext h1 scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 1;display:flex;justify-content:center;"
              >
                <strong>Canvas Collection</strong>
              </h2>
            </div>

            <slider-component
              >
              <ul
                id="Slider-template--20655585787969__featured_collection_4Lqq3b"
                data-id="template--20655585787969__featured_collection_4Lqq3b"
                class="grid product-grid contains-card contains-card--product grid--4-col-desktop grid--2-col-tablet-down slider slider--tablet grid--peek"
                role="list"
                aria-label="Slider"
              >
<?php
include 'include/conn.php';

$sql = "SELECT * FROM products where department_id=1";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>
                <li
                  id="Slide-template--20655585787969__featured_collection_4Lqq3b-1"
                  class="grid__item slider__slide scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 1"
                >
                  <link
                    href="assets/css/component-rating1a99.css"
                    rel="stylesheet"
                    type="text/css"
                    media="all"
                  />
                  <link
                    href="assets/css/component-volume-pricing8e11.css"
                    rel="stylesheet"
                    type="text/css"
                    media="all"
                  />

                  <link
                    href="assets/css/component-priced9e8.css"
                    rel="stylesheet"
                    type="text/css"
                    media="all"
                  />
                  <link
                    href="assets/css/quick-order-list675f.css"
                    rel="stylesheet"
                    type="text/css"
                    media="all"
                  />
                  <link
                    href="assets/css/quantity-popover7f94.css"
                    rel="stylesheet"
                    type="text/css"
                    media="all"
                  />
                  <product-component
                    view-event-payload='{"product":{"id":7977964798017,"title":"Religious Paintings","handle":"religious-paintings","selectedVariant":null},"context":"collection","selectedOptions":[]}'
                  >
                    <div
                      class="card-wrapper product-card-wrapper underline-links-hover"
                    >
                      <div
                        class="card card--card card--media color-scheme-471aafc6-5de7-4806-a2ae-3a69e6ac03ba gradient"
                        style="--ratio-percent: 111.39999999999999%"
                      >
                        <div
                          class="card__inner ratio"
                          style="--ratio-percent: 111.39999999999999%"
                        >
                          <div class="card__media">
                            <div
                              class="media media--transparent media--hover-effect"
                            >
                              <img
                        src="admin/assets/images/products/<?php echo $row['image']; ?>"
                        alt="<?php echo $row['name']; ?>"
                        width="500"
                        height="557">
                            </div>
                          </div>
                          <div class="card__content">
                            <div class="card__information">
                              <h3 class="card__heading">
                                <a
                                  href="../products/religious-paintings.php"
                                  id="StandardCardNoMediaLink-template--20655585787969__featured_collection_4Lqq3b-7977964798017"
                                  class="full-unstyled-link"
                                  aria-labelledby="StandardCardNoMediaLink-template--20655585787969__featured_collection_4Lqq3b-7977964798017 NoMediaStandardBadge-template--20655585787969__featured_collection_4Lqq3b-7977964798017"
                                >
                                  Religious Paintings
                                </a>
                              </h3>
                            </div>
                            <div class="card__badge bottom left">
                              
                              <?php if ($row['on_sale'] == 1 || $row['in_stock'] == 1) { ?>
    <span id="NoMediaStandardBadge-template--20655585787969__featured_collection_4Lqq3b-7977964798017"
                                class="badge badge--bottom-left color-scheme-5">
        Available
    </span>
    <?php } else { ?>
    <span id="NoMediaStandardBadge-template--20655585787969__featured_collection_4Lqq3b-7977964798017"
                                class="badge badge--bottom-left color-scheme-5">
        On Demand
    </span>
<?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="card__content">
                          <div class="card__information">
                            <h3
                              class="card__heading h5"
                              id="title-template--20655585787969__featured_collection_4Lqq3b-7977964798017"
                            >
                               <a href="product-details.php?id=<?php echo $row['id']; ?>"  id="CardLink-template--20655585689665__product-grid-7977964798017"
                class="full-unstyled-link"
                aria-labelledby="CardLink-template--20655585689665__product-grid-7977964798017 Badge-template--20655585689665__product-grid-7977964798017">
                    <?php echo $row['name']; ?>
                </a>
                            </h3>
                            <div class="card-information">
                              <span class="caption-large light"></span>
                              <div class="price price--on-sale">
                                <div class="price__container">
                                  <div class="price__regular">
                                    <span
                                      class="visually-hidden visually-hidden--inline"
                                      >Regular price</span
                                    >
                                    <span
                                      class="price-item price-item--regular"
                                    >
                                     Rs. <?php echo number_format($row['price'],2); ?>
                                    </span>
                                  </div>
                                  <div class="price__sale">
                                    <span
                                      class="visually-hidden visually-hidden--inline"
                                      >Regular price</span
                                    >
                                    <span>
                                      <s class="price-item price-item--regular">
                                        Rs. <?php echo number_format($row['price'],2); ?>
                                      </s> </span
                                    ><span
                                      class="visually-hidden visually-hidden--inline"
                                      >Sale price</span
                                    >
                                    <span
                                      class="price-item price-item--sale price-item--last"
                                    >
                                       Rs. <?php echo number_format($row['sale_price'],2); ?>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="card__badge bottom left">
                            <span
                              id="Badge-template--20655585787969__featured_collection_4Lqq3b-7977964798017"
                              class="badge badge--bottom-left color-scheme-5"
                              >Sale</span
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </product-component>
                </li>
                 <?php
}
?>
                
                
              </ul>
              <div class="slider-buttons">
                <button
                  type="button"
                  class="slider-button slider-button--prev"
                  name="previous"
                  aria-label="Slide left"
                  aria-controls="Slider-template--20655585787969__featured_collection_4Lqq3b"
                >
                  <span class="svg-wrapper"
                    ><svg class="icon icon-caret" viewBox="0 0 10 6">
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </span>
                </button>
                <div class="slider-counter caption">
                  <span class="slider-counter--current">1</span>
                  <span aria-hidden="true"> / </span>
                  <span class="visually-hidden">of</span>
                  <span class="slider-counter--total">4</span>
                </div>
                <button
                  type="button"
                  class="slider-button slider-button--next"
                  name="next"
                  aria-label="Slide right"
                  aria-controls="Slider-template--20655585787969__featured_collection_4Lqq3b"
                >
                  <span class="svg-wrapper"
                    ><svg class="icon icon-caret" viewBox="0 0 10 6">
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </span>
                </button></div
            ></slider-component>
            <div
              class="center collection__view-all scroll-trigger animate--slide-in"
            >
              <a
                href="product.php"
                class="button"
                aria-label="View all products in the canvas painting collection"
              >
                View all
              </a>
            </div>
          </div>
        </div>
      </section>

      
      <div
        id="shopify-section-template--20655585787969__image_with_text_9kdza9"
        class="shopify-section section"
      >
        <link
          href="assets/css/component-image-with-text0292.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <style data-shopify>
          .section-template--20655585787969__image_with_text_9kdza9-padding {
            padding-top: 27px;
            padding-bottom: 27px;
          }

          @media screen and (min-width: 750px) {
            .section-template--20655585787969__image_with_text_9kdza9-padding {
              padding-top: 36px;
              padding-bottom: 36px;
            }
          }
        </style>
        <div
          class="section-template--20655585787969__image_with_text_9kdza9-padding gradient color-scheme-1"
        >
          <div class="page-width">
            <div
              class="image-with-text image-with-text--no-overlap isolate scroll-trigger animate--slide-in"
            >
              <div
                class="image-with-text__grid grid grid--gapless grid--1-col grid--2-col-tablet image-with-text__grid--reverse"
              >
                <div
                  class="image-with-text__media-item image-with-text__media-item--medium image-with-text__media-item--top grid__item"
                >
                  <div
                    class="image-with-text__media image-with-text__media--small global-media-settings background-transparent media"
                  >
                    <img
                      src="assets/images/gallery_79632.png"
                      alt=""
                      srcset="
                        assets/images/gallery_79632.png  165w,
                        assets/images/gallery_79632.png  360w,
                        assets/images/gallery_79632.png  535w,
                        assets/images/gallery_79632.png  750w,
                        assets/images/gallery_79632.png 1070w,
                        assets/images/gallery_79632.png 1500w
                      "
                      width="1500"
                      height="1313"
                      loading="lazy"
                      sizes="(min-width: 1200px) 550px,
              (min-width: 750px) calc((100vw - 130px) / 2), calc((100vw - 50px) / 2)"
                      fetchpriority="auto"
                    />
                  </div>
                </div>
                <div class="image-with-text__text-item grid__item">
                  <div
                    id="ImageWithText--template--20655585787969__image_with_text_9kdza9"
                    class="image-with-text__content image-with-text__content--top image-with-text__content--desktop-left image-with-text__content--mobile-left image-with-text__content--small content-container background-transparent"
                  >
                    <h2 class="image-with-text__heading inline-richtext h2">
                      <strong>Premium Religious Paintings Crafted</strong>
                    </h2>
                    <div class="image-with-text__text rte subtitle">
                      <p>
                        Welcome to <strong>Madan Bihari Handicraft</strong>,
                        where every artwork is created with devotion, tradition,
                        and exceptional craftsmanship. We believe that a
                        painting is much more than a decorative piece—it is a
                        reflection of faith, culture, and timeless spirituality.
                        Every brushstroke, every color, and every handcrafted
                        detail is thoughtfully created to bring the divine
                        presence of
                        <strong
                          >Shri Radha Krishna, Shrinathji, Banke Bihari
                          Ji</strong
                        >, and the sacred essence of
                        <strong>Vrindavan</strong> into your home.<br /><br />We'd
                        love to hear<br />from you! Whether you're looking for
                        <strong
                          >Gold Wooden Paintings, Canvas<br />Paintings,
                          Religious Paintings</strong
                        >, or customized devotional artwork, our team<br />is
                        here to assist you. Feel free to contact us for product
                        inquiries, custom<br />orders, or any assistance.<br />
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <!-- ============================================
     MADAN BIHARI HANDICRAFT
     ALL PRODUCTS SMOOTH CAROUSEL
============================================= -->

<section class="mbh-all-products-carousel-section">

    <div class="mbh-all-products-wrapper">

        <!-- Section Header -->
        <div class="mbh-all-products-heading">
            <h2 class="mbh-all-products-title">All Products</h2>
            <p class="mbh-all-products-subtitle">
                Explore our complete collection of handcrafted paintings
            </p>
        </div>


        <!-- Carousel -->
        <div class="mbh-products-carousel">

            <!-- Previous Button -->
            <button
                type="button"
                class="mbh-products-arrow mbh-products-arrow-prev"
                aria-label="Previous products"
            >
                &#10094;
            </button>


            <!-- Carousel Viewport -->
            <div class="mbh-products-viewport">

                <!-- Carousel Track -->
                <div class="mbh-products-track">

                    <?php
                    include 'include/conn.php';

                    $sql = "SELECT * FROM products WHERE status = 1 && department_id!=6 ORDER BY id DESC";
                    $result = mysqli_query($con, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <!-- Product Slide -->
                        <div class="mbh-product-slide">

                            <div class="mbh-product-card">

                                <!-- Product Image -->
                                <a
                                    href="product-details.php?id=<?php echo $row['id']; ?>"
                                    class="mbh-product-image-link"
                                >

                                    <div class="mbh-product-image-box">

                                        <img
                                            src="admin/assets/images/products/<?php echo htmlspecialchars($row['image']); ?>"
                                            alt="<?php echo htmlspecialchars($row['name']); ?>"
                                            class="mbh-product-image"
                                            loading="lazy"
                                        >

                                        <?php
                                        $regularPrice = (float)$row['price'];
                                        $salePrice = (float)$row['sale_price'];

                                       
                                        ?>
                                            
                                            <?php if ($row['on_sale'] == 1 || $row['in_stock'] == 1) { ?>
    <span class="mbh-painting-sale">
        Available
    </span>
    <?php } else { ?>
    <span class="mbh-product-sale-badge">
        On Demand
    </span>
<?php } ?>
                                        

                                    </div>

                                </a>


                                <!-- Product Information -->
                                <div class="mbh-product-details">

                                    <h3 class="mbh-product-name">
                                        <a
                                            href="product-details.php?id=<?php echo $row['id']; ?>"
                                        >
                                            <?php echo htmlspecialchars($row['name']); ?>
                                        </a>
                                    </h3>


                                    <!-- Price -->
                                    <div class="mbh-product-pricing">

                                        <?php
                                        if ($salePrice > 0 && $salePrice < $regularPrice) {
                                        ?>

                                            <span class="mbh-product-old-price">
                                                Rs. <?php echo number_format($regularPrice, 2); ?>
                                            </span>

                                            <span class="mbh-product-current-price">
                                                Rs. <?php echo number_format($salePrice, 2); ?>
                                            </span>

                                        <?php
                                        } else {
                                        ?>

                                            <span class="mbh-product-current-price">
                                                Rs. <?php echo number_format($regularPrice, 2); ?>
                                            </span>

                                        <?php } ?>

                                    </div>


                                    <!-- View Product Button -->
                                    <a
                                        href="product-details.php?id=<?php echo $row['id']; ?>"
                                        class="mbh-product-view-button"
                                    >
                                        View Product
                                    </a>

                                </div>

                            </div>

                        </div>

                    <?php
                        }

                    } else {
                    ?>

                        <div class="mbh-no-products">
                            <p>No products available at the moment.</p>
                        </div>

                    <?php } ?>

                </div>
                <!-- End Track -->

            </div>
            <!-- End Viewport -->


            <!-- Next Button -->
            <button
                type="button"
                class="mbh-products-arrow mbh-products-arrow-next"
                aria-label="Next products"
            >
                &#10095;
            </button>

        </div>
        <!-- End Carousel -->


        <!-- Carousel Dots -->
        <div
            class="mbh-products-dots"
            aria-label="Product carousel navigation"
        ></div>

    </div>

</section>
<script>

document.addEventListener("DOMContentLoaded", function () {

    const carousel = document.querySelector(".mbh-products-carousel");

    if (!carousel) {
        return;
    }

    const track = carousel.querySelector(".mbh-products-track");
    const slides = Array.from(
        carousel.querySelectorAll(".mbh-product-slide")
    );

    const previousButton = carousel.querySelector(
        ".mbh-products-arrow-prev"
    );

    const nextButton = carousel.querySelector(
        ".mbh-products-arrow-next"
    );

    const dotsContainer = document.querySelector(
        ".mbh-products-dots"
    );


    /* ============================================
       VARIABLES
    ============================================= */

    let currentIndex = 0;
    let visibleSlides = 4;
    let maxIndex = 0;

    let autoplayTimer = null;

    let startX = 0;
    let endX = 0;


    /* ============================================
       GET NUMBER OF VISIBLE PRODUCTS
    ============================================= */

    function getVisibleSlides() {

        const width = window.innerWidth;

        if (width <= 480) {
            return 1;
        }

        if (width <= 767) {
            return 2;
        }

        if (width <= 1199) {
            return 3;
        }

        return 4;
    }


    /* ============================================
       UPDATE CAROUSEL
    ============================================= */

    function updateCarousel() {

        visibleSlides = getVisibleSlides();

        maxIndex = Math.max(
            0,
            slides.length - visibleSlides
        );


        /*
         * Make sure current index
         * never exceeds maximum.
         */
        if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }


        /*
         * Calculate movement.
         *
         * Each slide has percentage based
         * on visible slides.
         */
        const slidePercentage = 100 / visibleSlides;

        const moveAmount =
            currentIndex * slidePercentage;


        track.style.transform =
            "translate3d(-" +
            moveAmount +
            "%, 0, 0)";


        updateDots();

        updateArrowVisibility();
    }


    /* ============================================
       CREATE DOTS
    ============================================= */

    function createDots() {

        if (!dotsContainer) {
            return;
        }

        dotsContainer.innerHTML = "";


        /*
         * If all products fit on screen,
         * dots are not required.
         */
        if (slides.length <= visibleSlides) {

            dotsContainer.style.display = "none";

            return;
        }


        dotsContainer.style.display = "flex";


        const numberOfDots = maxIndex + 1;


        for (let i = 0; i < numberOfDots; i++) {

            const dot = document.createElement("button");

            dot.type = "button";

            dot.className = "mbh-product-dot";

            dot.setAttribute(
                "aria-label",
                "Go to product slide " + (i + 1)
            );


            dot.addEventListener("click", function () {

                currentIndex = i;

                updateCarousel();

                restartAutoplay();

            });


            dotsContainer.appendChild(dot);
        }

        updateDots();
    }


    /* ============================================
       UPDATE DOTS
    ============================================= */

    function updateDots() {

        if (!dotsContainer) {
            return;
        }

        const dots = dotsContainer.querySelectorAll(
            ".mbh-product-dot"
        );

        dots.forEach(function (dot, index) {

            if (index === currentIndex) {

                dot.classList.add(
                    "mbh-product-dot-active"
                );

            } else {

                dot.classList.remove(
                    "mbh-product-dot-active"
                );

            }

        });
    }


    /* ============================================
       ARROW VISIBILITY
    ============================================= */

    function updateArrowVisibility() {

        if (slides.length <= visibleSlides) {

            previousButton.style.display = "none";
            nextButton.style.display = "none";

            return;
        }


        previousButton.style.display = "flex";
        nextButton.style.display = "flex";
    }


    /* ============================================
       NEXT SLIDE
    ============================================= */

    function goToNext() {

        if (slides.length <= visibleSlides) {
            return;
        }


        if (currentIndex >= maxIndex) {

            /*
             * Smoothly go back to first position.
             */
            currentIndex = 0;

        } else {

            currentIndex++;
        }


        updateCarousel();
    }


    /* ============================================
       PREVIOUS SLIDE
    ============================================= */

    function goToPrevious() {

        if (slides.length <= visibleSlides) {
            return;
        }


        if (currentIndex <= 0) {

            currentIndex = maxIndex;

        } else {

            currentIndex--;
        }


        updateCarousel();
    }


    /* ============================================
       BUTTON EVENTS
    ============================================= */

    if (nextButton) {

        nextButton.addEventListener(
            "click",
            function () {

                goToNext();

                restartAutoplay();

            }
        );

    }


    if (previousButton) {

        previousButton.addEventListener(
            "click",
            function () {

                goToPrevious();

                restartAutoplay();

            }
        );

    }


    /* ============================================
       AUTOPLAY
    ============================================= */

    function startAutoplay() {

        stopAutoplay();


        if (slides.length <= visibleSlides) {
            return;
        }


        autoplayTimer = setInterval(
            function () {

                goToNext();

            },
            3500
        );
    }


    function stopAutoplay() {

        if (autoplayTimer) {

            clearInterval(autoplayTimer);

            autoplayTimer = null;
        }
    }


    function restartAutoplay() {

        stopAutoplay();

        startAutoplay();
    }


    /* ============================================
       PAUSE WHEN MOUSE IS OVER CAROUSEL
    ============================================= */

    carousel.addEventListener(
        "mouseenter",
        function () {

            stopAutoplay();

        }
    );


    carousel.addEventListener(
        "mouseleave",
        function () {

            startAutoplay();

        }
    );


    /* ============================================
       TOUCH / SWIPE SUPPORT
    ============================================= */

    track.addEventListener(
        "touchstart",
        function (event) {

            startX = event.touches[0].clientX;

            stopAutoplay();

        },
        {
            passive: true
        }
    );


    track.addEventListener(
        "touchmove",
        function (event) {

            endX = event.touches[0].clientX;

        },
        {
            passive: true
        }
    );


    track.addEventListener(
        "touchend",
        function () {

            const swipeDistance =
                startX - endX;


            /*
             * Swipe left
             */
            if (swipeDistance > 50) {

                goToNext();

            }


            /*
             * Swipe right
             */
            if (swipeDistance < -50) {

                goToPrevious();

            }


            startAutoplay();

        }
    );


    /* ============================================
       KEYBOARD ACCESSIBILITY
    ============================================= */

    carousel.addEventListener(
        "keydown",
        function (event) {

            if (event.key === "ArrowLeft") {

                goToPrevious();

                restartAutoplay();

            }


            if (event.key === "ArrowRight") {

                goToNext();

                restartAutoplay();

            }

        }
    );


    carousel.setAttribute(
        "tabindex",
        "0"
    );


    /* ============================================
       RESIZE
    ============================================= */

    let resizeTimer;

    window.addEventListener(
        "resize",
        function () {

            clearTimeout(resizeTimer);


            resizeTimer = setTimeout(
                function () {

                    /*
                     * Recalculate everything
                     * when screen size changes.
                     */
                    visibleSlides = getVisibleSlides();

                    maxIndex = Math.max(
                        0,
                        slides.length - visibleSlides
                    );


                    if (currentIndex > maxIndex) {
                        currentIndex = maxIndex;
                    }


                    createDots();

                    updateCarousel();

                    restartAutoplay();

                },
                150
            );

        }
    );


    /* ============================================
       INITIALIZE
    ============================================= */

    visibleSlides = getVisibleSlides();

    maxIndex = Math.max(
        0,
        slides.length - visibleSlides
    );

    createDots();

    updateCarousel();

    startAutoplay();

});

</script>
      
      
      <div
        id="shopify-section-template--20655585787969__17830550215609ddfc"
        class="shopify-section"
      ></div>
     
     
     
      <div
        id="shopify-section-template--20655585787969__17830602420de4bee5"
        class="shopify-section"
      ></div>
      
      
         
      <div
        id="shopify-section-template--20655585787969__17833156212242bb80"
        class="shopify-section"
      >
        <style data-shopify>
          .ai-icon-cards-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 40px 20px;
          }

          .ai-icon-cards-container-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
          }

          .ai-icon-card-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
            background-color: #cdb0cc;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            transition:
              transform 0.3s ease,
              box-shadow 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
          }

          .ai-icon-card-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
          }

          .ai-icon-wrapper-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
          }

          .ai-icon-wrapper-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd img {
            width: 60%;
            height: 60%;
            object-fit: contain;
          }

          .ai-icon-wrapper-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd svg {
            width: calc(70px * 0.5);
            height: calc(70px * 0.5);
            stroke: #ffffff;
            fill: none;
          }

          .ai-icon-card-title-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
            font-size: 20px;
            font-weight: 600;
            color: #121212;
            margin: 0 0 12px;
          }

          .ai-icon-card-text-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
            font-size: 15px;
            color: #666666;
            line-height: 1.6;
            margin: 0;
          }

          @media screen and (max-width: 990px) {
            .ai-icon-cards-container-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
              grid-template-columns: repeat(2, 1fr);
            }
          }

          @media screen and (max-width: 768px) {
            .ai-icon-cards-container-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
              grid-template-columns: 1fr;
              gap: 22.5px;
            }

            .ai-icon-card-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd {
              padding: 32px;
            }
          }
        </style>

        <icon-cards-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd
          class="ai-icon-cards-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
        >
          <div
            class="ai-icon-cards-container-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
          >
            <div class="ai-icon-card-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd">
              <div
                class="ai-icon-wrapper-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                <img
                  src="assets/images/Free_shippingc844.svg"
                  alt="Free shipping"
                  loading="lazy"
                />
              </div>
              <h3
                class="ai-icon-card-title-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                 Shipping All over India
              </h3>
              <p
                class="ai-icon-card-text-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                Fast Delievery
              </p>
            </div>

            <div class="ai-icon-card-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd">
              <div
                class="ai-icon-wrapper-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                <img
                  src="assets/images/Secure_paymentc844.svg"
                  alt="Secure payment"
                  loading="lazy"
                />
              </div>
              <h3
                class="ai-icon-card-title-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                Secure payment
              </h3>
              <p
                class="ai-icon-card-text-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                100% secure transactions
              </p>
            </div>

            <div class="ai-icon-card-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd">
              <div
                class="ai-icon-wrapper-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                <img
                  src="assets/images/Customer_supportc844.svg"
                  alt="Customer support"
                  loading="lazy"
                />
              </div>
              <h3
                class="ai-icon-card-title-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                Customer support
              </h3>
              <p
                class="ai-icon-card-text-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                24/7 dedicated support
              </p>
            </div>

            <div class="ai-icon-card-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd">
              <div
                class="ai-icon-wrapper-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                <img
                  src="assets/images/Easy_returnsc844.svg"
                  alt="Easy returns"
                  loading="lazy"
                />
              </div>
              <h3
                class="ai-icon-card-title-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                Easy returns
              </h3>
              <p
                class="ai-icon-card-text-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd"
              >
                30-day return policy
              </p>
            </div>
          </div>
        </icon-cards-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd>

        <script>
          (function () {
            class IconCardsauvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd extends HTMLElement {
              constructor() {
                super();
              }

              connectedCallback() {
                this.style.display = "block";
              }
            }

            customElements.define(
              "icon-cards-auvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd",
              IconCardsauvp3mzlvs2hbqlzzzaigenblock1b27830tq8kgd,
            );
          })();
        </script>
      </div>
      
      
      <div
        id="shopify-section-template--20655585787969__blocks_pTWpEc"
        class="shopify-section"
      >
        <style data-shopify>
          .ai-testimonials-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 50px 20px;
            background-color: #f7e9be;
          }

          .ai-testimonials-container-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            max-width: 1200px;
            margin: 0 auto;
          }

          .ai-testimonials-header-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            text-align: center;
            margin-bottom: 40px;
          }

          .ai-testimonials-heading-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            font-size: 36px;
            color: #121212;
            margin: 0 0 16px;
          }

          .ai-testimonials-subheading-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            font-size: 16px;
            color: #121212;
            margin: 0;
          }

          .ai-testimonials-slider-wrapper-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            position: relative;
          }

          .ai-testimonials-slider-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            overflow: hidden;
            position: relative;
          }

          .ai-testimonials-track-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            display: flex;
            gap: 30px;
            transition: transform 0.3s ease;
            cursor: grab;
            user-select: none;
          }

          .ai-testimonials-track-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp.dragging {
            cursor: grabbing;
            transition: none;
          }

          .ai-testimonial-card-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            background-color: #f3f3f3;
            padding: 30px;
            border-radius: 8px;
            border: 0px solid #e0e0e0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 16px;
            flex-shrink: 0;
            width: calc((100% - (2 * 30px)) / 3);
          }

          .ai-testimonial-stars-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            display: flex;
            gap: 4px;
            color: #ffc107;
          }

          .ai-testimonial-stars-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
          }

          .ai-testimonial-quote-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            font-size: 16px;
            line-height: 1.6;
            color: #121212;
            margin: 0;
          }

          .ai-testimonial-author-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: auto;
          }

          .ai-testimonial-avatar-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            background-color: #f4f4f4;
          }

          .ai-testimonial-avatar-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp img {
            width: 100%;
            height: 100%;
            object-fit: cover;
          }

          .ai-testimonial-avatar-placeholder-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e0e0e0;
            color: #121212;
            font-size: 25px;
            font-weight: 600;
          }

          .ai-testimonial-author-info-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            display: flex;
            flex-direction: column;
            gap: 4px;
          }

          .ai-testimonial-author-name-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            font-size: 14px;
            font-weight: 600;
            color: #121212;
            margin: 0;
          }

          .ai-testimonial-author-title-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            font-size: 12px;
            color: #121212;
            margin: 0;
          }

          .ai-testimonials-nav-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            margin-top: 30px;
          }

          .ai-testimonials-nav-button-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            background-color: #121212;
            color: #ffffff;
            border: none;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: opacity 0.3s ease;
          }

          .ai-testimonials-nav-button-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp:hover {
            opacity: 0.8;
          }

          .ai-testimonials-nav-button-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp:disabled {
            opacity: 0.3;
            cursor: not-allowed;
          }

          .ai-testimonials-nav-button-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp
            svg {
            width: 20px;
            height: 20px;
          }

          .ai-testimonials-dots-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            display: flex;
            gap: 8px;
          }

          .ai-testimonials-dot-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #121212;
            opacity: 0.3;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: opacity 0.3s ease;
          }

          .ai-testimonials-dot-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp.active {
            opacity: 1;
          }

          @media screen and (max-width: 989px) {
            .ai-testimonial-card-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
              width: calc((100% - (1 * 30px)) / 2);
            }
          }

          @media screen and (max-width: 749px) {
            .ai-testimonial-card-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
              width: 100%;
            }

            .ai-testimonials-heading-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp {
              font-size: 28.8px;
            }
          }
        </style>

        <testimonials-section-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp
          class="ai-testimonials-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
        >
        
          <div
            class="ai-testimonials-container-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
          >
            <div
              class="ai-testimonials-header-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
            >
              <h2
                class="rich-text__heading rte inline-richtext h1 scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 1"
              >
                <strong>What our customers say</strong>
              </h2>

              <div
                class="ai-testimonials-subheading-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
              >
                <p>Hear from people who love our products</p>
              </div>
            </div>

            <div
              class="ai-testimonials-slider-wrapper-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
            >
              <div
                class="ai-testimonials-slider-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
              >
                <div
                  class="ai-testimonials-track-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                >
                 <?php
              $query = "SELECT * FROM testimonial WHERE status = 1 ";
              if (!isset($con)) {
                include('include/conn.php');
              }
              $result = mysqli_query($con, $query);

              $count = 1;

              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <div
                    class="ai-testimonial-card-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                  >
                    <div
                      class="ai-testimonial-stars-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                        />
                      </svg>

                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                        />
                      </svg>
                    </div>

                    <div
                      class="ai-testimonial-quote-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                    >
                     <?= $row['comment'] ?>
                    </div>

                    <div
                      class="ai-testimonial-author-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                    >
                      <div
                        class="ai-testimonial-avatar-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                      >

                      </div>
                      <div
                        class="ai-testimonial-author-info-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                      >
                        <div
                          class="ai-testimonial-author-name-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                        >
                        <?= $row['name'] ?>
                        </div>

                        <div
                          class="ai-testimonial-author-title-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                        >
                          Verified Customer
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                
                  
              <div
                class="ai-testimonials-nav-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
              >
                <button
                  class="ai-testimonials-nav-button-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp ai-testimonials-prev-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                  aria-label="Previous testimonial"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <polyline points="15 18 9 12 15 6"></polyline>
                  </svg>
                </button>
                <div
                  class="ai-testimonials-dots-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                ></div>
                <button
                  class="ai-testimonials-nav-button-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp ai-testimonials-next-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp"
                  aria-label="Next testimonial"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <polyline points="9 18 15 12 9 6"></polyline>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </testimonials-section-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp>

        <script>
          (function () {
            class TestimonialsSectionak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp extends HTMLElement {
              constructor() {
                super();
                this.currentIndex = 0;
                this.isDragging = false;
                this.startPos = 0;
                this.currentTranslate = 0;
                this.prevTranslate = 0;
                this.animationID = 0;
              }

              connectedCallback() {
                this.track = this.querySelector(
                  ".ai-testimonials-track-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
                );
                this.cards = this.querySelectorAll(
                  ".ai-testimonial-card-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
                );
                this.prevButton = this.querySelector(
                  ".ai-testimonials-prev-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
                );
                this.nextButton = this.querySelector(
                  ".ai-testimonials-next-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
                );
                this.dotsContainer = this.querySelector(
                  ".ai-testimonials-dots-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
                );

                if (!this.track || this.cards.length === 0) return;

                this.slidesPerView = this.getSlidesPerView();
                this.totalSlides = Math.ceil(
                  this.cards.length / this.slidesPerView,
                );

                this.setupDots();
                this.setupEventListeners();
                this.updateButtons();

                window.addEventListener("resize", () => {
                  this.slidesPerView = this.getSlidesPerView();
                  this.totalSlides = Math.ceil(
                    this.cards.length / this.slidesPerView,
                  );
                  this.currentIndex = Math.min(
                    this.currentIndex,
                    this.totalSlides - 1,
                  );
                  this.setupDots();
                  this.goToSlide(this.currentIndex);
                });
              }

              getSlidesPerView() {
                const width = window.innerWidth;
                if (width <= 749) return 1;
                if (width <= 989) return 2;
                return 3;
              }

              setupDots() {
                if (!this.dotsContainer) return;
                this.dotsContainer.innerHTML = "";
                for (let i = 0; i < this.totalSlides; i++) {
                  const dot = document.createElement("button");
                  dot.classList.add(
                    "ai-testimonials-dot-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
                  );
                  if (i === this.currentIndex) dot.classList.add("active");
                  dot.setAttribute("aria-label", `Go to slide ${i + 1}`);
                  dot.addEventListener("click", () => this.goToSlide(i));
                  this.dotsContainer.appendChild(dot);
                }
              }

              setupEventListeners() {
                if (this.prevButton) {
                  this.prevButton.addEventListener("click", () => this.prev());
                }
                if (this.nextButton) {
                  this.nextButton.addEventListener("click", () => this.next());
                }

                this.track.addEventListener(
                  "mousedown",
                  this.touchStart.bind(this),
                );
                this.track.addEventListener(
                  "touchstart",
                  this.touchStart.bind(this),
                );
                this.track.addEventListener(
                  "mouseup",
                  this.touchEnd.bind(this),
                );
                this.track.addEventListener(
                  "touchend",
                  this.touchEnd.bind(this),
                );
                this.track.addEventListener(
                  "mousemove",
                  this.touchMove.bind(this),
                );
                this.track.addEventListener(
                  "touchmove",
                  this.touchMove.bind(this),
                );
                this.track.addEventListener(
                  "mouseleave",
                  this.touchEnd.bind(this),
                );

                this.track.addEventListener("dragstart", (e) =>
                  e.preventDefault(),
                );
              }

              touchStart(event) {
                this.isDragging = true;
                this.startPos = this.getPositionX(event);
                this.track.classList.add("dragging");
              }

              touchMove(event) {
                if (!this.isDragging) return;
                const currentPosition = this.getPositionX(event);
                this.currentTranslate =
                  this.prevTranslate + currentPosition - this.startPos;
              }

              touchEnd() {
                if (!this.isDragging) return;
                this.isDragging = false;
                this.track.classList.remove("dragging");

                const movedBy = this.currentTranslate - this.prevTranslate;

                if (movedBy < -50 && this.currentIndex < this.totalSlides - 1) {
                  this.next();
                } else if (movedBy > 50 && this.currentIndex > 0) {
                  this.prev();
                } else {
                  this.goToSlide(this.currentIndex);
                }
              }

              getPositionX(event) {
                return event.type.includes("mouse")
                  ? event.pageX
                  : event.touches[0].clientX;
              }

              prev() {
                if (this.currentIndex > 0) {
                  this.currentIndex--;
                  this.goToSlide(this.currentIndex);
                }
              }

              next() {
                if (this.currentIndex < this.totalSlides - 1) {
                  this.currentIndex++;
                  this.goToSlide(this.currentIndex);
                }
              }

              goToSlide(index) {
                this.currentIndex = index;
                const cardWidth = this.cards[0].offsetWidth;
                const gap = 30;
                const offset = -(cardWidth + gap) * this.slidesPerView * index;

                this.prevTranslate = offset;
                this.currentTranslate = offset;
                this.track.style.transform = `translateX(${offset}px)`;

                this.updateButtons();
                this.updateDots();
              }

              updateButtons() {
                if (this.prevButton) {
                  this.prevButton.disabled = this.currentIndex === 0;
                }
                if (this.nextButton) {
                  this.nextButton.disabled =
                    this.currentIndex === this.totalSlides - 1;
                }
              }

              updateDots() {
                if (!this.dotsContainer) return;
                const dots = this.dotsContainer.querySelectorAll(
                  ".ai-testimonials-dot-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
                );
                dots.forEach((dot, index) => {
                  if (index === this.currentIndex) {
                    dot.classList.add("active");
                  } else {
                    dot.classList.remove("active");
                  }
                });
              }
            }

            customElements.define(
              "testimonials-section-ak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp",
              TestimonialsSectionak2rucjdxeg1ualzcsaigenblockf0dc9c2hfemgp,
            );
          })();
        </script>

        <div
          id="shopify-block-ATlUxbWNxbWxCYitrQ__ai_gen_block_53ca0e2_RRDbhy"
          class="shopify-block"
        >
          <style data-shopify>
            .ai-faq-container-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              display: block;
              width: 80%;
              max-width: 100%;
              margin: 0 auto;
              padding: 40px 20px;
            }

            .ai-faq-header-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              text-align: center;
              margin-bottom: 15px;
            }

            .ai-faq-title-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              margin: 0 0 12px;
              color: #121212;
              font-size: 32px;
            }

            .ai-faq-description-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              margin: 0;
              color: #797f06;
              font-size: 16px;
            }

            .ai-faq-list-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              list-style: none;
              padding: 0;
              margin: 0;
            }

            .ai-faq-item-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              border: 2px solid #c4dec5;
              border-radius: 4px;
              margin-bottom: 15px;
              overflow: hidden;
              background-color: #91a0ca;
            }

            .ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              width: 100%;
              padding: 20px;
              background: none;
              border: none;
              text-align: left;
              cursor: pointer;
              display: flex;
              justify-content: space-between;
              align-items: center;
              gap: 16px;
              color: #121212;
              font-size: 16px;
              font-weight: 600;
              transition: background-color 0.3s ease;
            }

            .ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy:hover {
              background-color: #ebebed;
            }

            .ai-faq-question-text-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              flex: 1;
            }

            .ai-faq-icon-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              flex-shrink: 0;
              width: 24px;
              height: 24px;
              transition: transform 0.3s ease;
              color: #121212;
            }

            .ai-faq-item-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy.active
              .ai-faq-icon-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              transform: rotate(180deg);
            }

            .ai-faq-answer-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              max-height: 0;
              overflow: hidden;
              transition: max-height 0.3s ease;
            }

            .ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
              padding: 0 20px 20px;
              color: #fcfcfc;
              font-size: 14px;
              line-height: 1.6;
            }

            @media screen and (max-width: 749px) {
              .ai-faq-container-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
                width: 100%;
              }

              .ai-faq-title-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
                font-size: calc(32px * 0.8);
              }

              .ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy {
                font-size: calc(16px * 0.9);
              }
            }
          </style>

          <faq-accordion-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy
            class="ai-faq-container-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
          >
            <div
              class="ai-faq-header-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
            >
              <h2
                class="ai-faq-title-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
              >
                <strong>Frequently asked questions</strong>
              </h2>

              <div
                class="ai-faq-description-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
              >
                <p>
                  Find answers to common questions about our products and
                  services
                </p>
              </div>
            </div>

            <ul class="ai-faq-list-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy">
              <li
                class="ai-faq-item-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy active"
                data-faq-item
              >
                <button
                  class="ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  aria-expanded="true"
                  data-faq-button
                >
                  <span
                    class="ai-faq-question-text-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    >1. What is Madan Bihari Handicraft known for?</span
                  >
                  <svg
                    class="ai-faq-icon-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </button>
                <div
                  class="ai-faq-answer-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  data-faq-answer
                >
                  <div
                    class="ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  >
                    <p>
                      Madan Bihari Handicraft specializes in handcrafted
                      devotional artwork, including Gold Wooden Paintings,
                      Canvas Paintings, Religious Paintings, Radha Krishna
                      Paintings, Shrinathji Paintings, Banke Bihari Ji
                      Paintings, customized spiritual artwork, and handcrafted
                      religious nameplates inspired by the sacred traditions of
                      Vrindavan.
                    </p>
                  </div>
                </div>
              </li>

              <li
                class="ai-faq-item-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                data-faq-item
              >
                <button
                  class="ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  aria-expanded="false"
                  data-faq-button
                >
                  <span
                    class="ai-faq-question-text-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    >2. Are all your paintings handmade?</span
                  >
                  <svg
                    class="ai-faq-icon-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </button>
                <div
                  class="ai-faq-answer-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  data-faq-answer
                >
                  <div
                    class="ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  >
                    <p>
                      Yes. Every painting is completely handcrafted by skilled
                      artisans. From sketching and painting to detailing, gold
                      finishing, and framing, each artwork is created by hand,
                      making every piece unique.
                    </p>
                  </div>
                </div>
              </li>

              <li
                class="ai-faq-item-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                data-faq-item
              >
                <button
                  class="ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  aria-expanded="false"
                  data-faq-button
                >
                  <span
                    class="ai-faq-question-text-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    >3. What types of paintings do you offer?</span
                  >
                  <svg
                    class="ai-faq-icon-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </button>
                <div
                  class="ai-faq-answer-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  data-faq-answer
                >
                  <div
                    class="ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  >
                    <p>
                      Our collection includes Gold Wooden Paintings, Canvas
                      Paintings, Religious Paintings, Radha Krishna Paintings,
                      Shrinathji Paintings, Banke Bihari Ji Paintings, Krishna
                      Leela artwork, Vrindavan-inspired paintings, and custom
                      devotional wall art.
                    </p>
                  </div>
                </div>
              </li>

              <li
                class="ai-faq-item-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                data-faq-item
              >
                <button
                  class="ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  aria-expanded="false"
                  data-faq-button
                >
                  <span
                    class="ai-faq-question-text-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    >4. Do you offer customized paintings?</span
                  >
                  <svg
                    class="ai-faq-icon-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </button>
                <div
                  class="ai-faq-answer-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  data-faq-answer
                >
                  <div
                    class="ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  >
                    <p>
                      Yes. We create customized handcrafted artwork based on
                      your preferred deity, size, frame style, background, color
                      combination, and devotional theme while maintaining
                      traditional craftsmanship.
                    </p>
                  </div>
                </div>
              </li>

              <li
                class="ai-faq-item-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                data-faq-item
              >
                <button
                  class="ai-faq-question-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  aria-expanded="false"
                  data-faq-button
                >
                  <span
                    class="ai-faq-question-text-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    >5. What materials are used in your paintings?</span
                  >
                  <svg
                    class="ai-faq-icon-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 9l-7 7-7-7"
                    />
                  </svg>
                </button>
                <div
                  class="ai-faq-answer-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  data-faq-answer
                >
                  <div
                    class="ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy"
                  >
                    <p>
                      We use premium-quality wood, canvas, vibrant colors,
                      decorative stones, embossed textures, gold foil finishing,
                      handcrafted wooden frames, and other high-quality
                      materials to ensure durability and beauty.
                    </p>
                  </div>
                </div>
              </li>
            </ul>
          </faq-accordion-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy>

          <script>
            (function () {
              class FaqAccordionatluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy extends HTMLElement {
                constructor() {
                  super();
                }

                connectedCallback() {
                  this.items = this.querySelectorAll("[data-faq-item]");
                  this.setupAccordion();
                }

                setupAccordion() {
                  this.items.forEach((item) => {
                    const button = item.querySelector("[data-faq-button]");
                    const answer = item.querySelector("[data-faq-answer]");
                    const answerContent = answer.querySelector(
                      ".ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy",
                    );

                    if (item.classList.contains("active")) {
                      answer.style.maxHeight =
                        answerContent.scrollHeight + "px";
                    }

                    button.addEventListener("click", () => {
                      const isActive = item.classList.contains("active");

                      if (isActive) {
                        item.classList.remove("active");
                        answer.style.maxHeight = "0";
                        button.setAttribute("aria-expanded", "false");
                      } else {
                        item.classList.add("active");
                        answer.style.maxHeight =
                          answerContent.scrollHeight + "px";
                        button.setAttribute("aria-expanded", "true");
                      }
                    });
                  });

                  window.addEventListener("resize", () => {
                    this.items.forEach((item) => {
                      if (item.classList.contains("active")) {
                        const answer = item.querySelector("[data-faq-answer]");
                        const answerContent = answer.querySelector(
                          ".ai-faq-answer-content-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy",
                        );
                        answer.style.maxHeight =
                          answerContent.scrollHeight + "px";
                      }
                    });
                  });
                }
              }

              customElements.define(
                "faq-accordion-atluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy",
                FaqAccordionatluxbwnxbwxcyitrqaigenblock53ca0e2rrdbhy,
              );
            })();
          </script>
        </div>
      </div>
      <div
        id="shopify-section-template--20655585787969__17830817098d8ba021"
        class="shopify-section"
      >
        <style data-shopify>
          .ai-gallery-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 40px 0;
          }

          .ai-gallery-container-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
          }

          .ai-gallery-header-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            text-align: center;
            margin-bottom: 40px;
          }

          .ai-gallery-title-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            font-size: 32px;
            color: #121212;
            margin: 0 0 12px;
          }

          .ai-gallery-description-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            font-size: 16px;
            color: #121212;
            margin: 0;
          }

          .ai-gallery-grid-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
          }

          .ai-gallery-item-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            aspect-ratio: 1 / 1;
          }

          .ai-gallery-image-wrapper-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            width: 100%;
            height: 100%;
            position: relative;
          }

          .ai-gallery-image-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
          }

          .ai-gallery-placeholder-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            width: 100%;
            height: 100%;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
          }

          .ai-gallery-placeholder-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93
            svg {
            width: 60%;
            height: 60%;
            opacity: 0.3;
          }

          .ai-gallery-overlay-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000000;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
          }

          .ai-gallery-item-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93:hover
            .ai-gallery-overlay-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            opacity: 0.5;
          }

          .ai-gallery-caption-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            color: #ffffff;
            font-size: 14px;
            text-align: center;
          }

          .ai-gallery-empty-state-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 12px 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
            pointer-events: none;
          }

          @media screen and (max-width: 749px) {
            .ai-gallery-grid-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
              grid-template-columns: repeat(2, 1fr);
            }

            .ai-gallery-title-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
              font-size: calc(32px * 0.8);
            }

            .ai-gallery-description-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93 {
              font-size: calc(16px * 0.9);
            }
          }
        </style>

        <gallery-block-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93
          class="ai-gallery-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93"
        >
          <div
            class="ai-gallery-container-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93"
          >
            <div
              class="ai-gallery-header-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93"
            >
              <h2
                 class="rich-text__heading rte inline-richtext h1 scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 1"
              >
                <strong>Our Gallery</strong>
              </h2>

              <div
                class="ai-gallery-description-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93"
              >
                Explore our collection of beautiful images
              </div>
            </div>

         <div class="ai-gallery-grid-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93">

<?php
include('include/conn.php');
$query = "SELECT * FROM gallery ORDER BY id DESC";
$result = mysqli_query($con, $query);
 while($row = mysqli_fetch_assoc($result)){ ?>

    <div class="ai-gallery-item-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93">

        <div class="ai-gallery-image-wrapper-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93">

            <img
                src="uploads/gallery/<?php echo $row['image']; ?>"
                alt="<?php echo $row['title']; ?>"
                loading="lazy"
                class="ai-gallery-image-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93"
            >

            <?php if(!empty($row['title'])){ ?>
            <div class="ai-gallery-overlay-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93">
                <div class="ai-gallery-caption-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93">
                    <?php echo $row['title']; ?>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>

<?php } ?>

</div>
            </div>
          </div>
        </gallery-block-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93>

        <script>
          (function () {
            class GalleryBlockacth2sgrsc3hjm1lgcaigenblock6aee85feyad93 extends HTMLElement {
              constructor() {
                super();
              }

              connectedCallback() {
                this.setupGallery();
              }

              setupGallery() {
                const items = this.querySelectorAll(
                  ".ai-gallery-item-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93",
                );
                items.forEach((item) => {
                  item.addEventListener("click", function () {
                    const image = item.querySelector(
                      ".ai-gallery-image-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93",
                    );
                    if (image) {
                      const overlay = item.querySelector(
                        ".ai-gallery-overlay-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93",
                      );
                      if (overlay) {
                        const isActive = overlay.style.opacity === "0.5";
                        overlay.style.opacity = isActive ? "0" : "0.5";
                      }
                    }
                  });
                });
              }
            }

            customElements.define(
              "gallery-block-acth2sgrsc3hjm1lgcaigenblock6aee85feyad93",
              GalleryBlockacth2sgrsc3hjm1lgcaigenblock6aee85feyad93,
            );
          })();
        </script>
      </div>
      <section
        id="shopify-section-template--20655585787969__collage_LVgRnH"
        class="shopify-section section"
      >
        <link
          href="assets/css/collage4635.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-cardd404.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-priced9e8.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-modal-videoef93.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-deferred-mediae97c.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <style data-shopify>
          .section-template--20655585787969__collage_LVgRnH-padding {
            padding-top: 27px;
            padding-bottom: 27px;
          }

          @media screen and (min-width: 750px) {
            .section-template--20655585787969__collage_LVgRnH-padding {
              padding-top: 36px;
              padding-bottom: 36px;
            }
          }
        </style>
        <div
          class="color-scheme-471aafc6-5de7-4806-a2ae-3a69e6ac03ba gradient isolate"
        >
          <div
            class="page-width section-template--20655585787969__collage_LVgRnH-padding"
          >
            <h2
              class="rich-text__heading rte inline-richtext h1 scroll-trigger animate--slide-in"
                  data-cascade
                  style="--animation-order: 1;display: flex; justify-content: center; align-items: center;"
            >
              <strong>Why Choose Us</strong>
            </h2>
            <div class="collage">
              <div
                class="collage__item collage__item--video collage__item--left scroll-trigger animate--slide-in"
                data-cascade
                style="--animation-order: 1"
              >
                <div
                  class="collage-card product-card-wrapper color-scheme-471aafc6-5de7-4806-a2ae-3a69e6ac03ba gradient"
                >
                  <modal-opener data-modal="#PopupModal-video_3M4Ytb">
                    <div class="deferred-media">
                      <button
                        class="deferred-media__poster full-unstyled-link"
                        type="button"
                        aria-label="Load video: Describe the video"
                        aria-haspopup="dialog"
                        data-media-id=""
                      >
                        <div
                          class="media media--transparent ratio"
                          style="--ratio-percent: 105.70962479608482%"
                        >
                          <!-- <span
                            class="deferred-media__poster-button motion-reduce"
                          >
                            <span class="svg-wrapper"
                              ><svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                class="icon icon-play"
                                viewBox="0 0 10 14"
                              >
                                <path
                                  fill="currentColor"
                                  fill-rule="evenodd"
                                  d="M1.482.815A1 1 0 0 0 0 1.69v10.517a1 1 0 0 0 1.525.851L10.54 7.5a1 1 0 0 0-.043-1.728z"
                                  clip-rule="evenodd"
                                />
                              </svg>
                            </span> </span -->
                          ><img
                            src="assets/images/Madan_bihari_why_choose_us56a4.png"
                            alt=""
                            srcset="
                              assets/images/Madan_bihari_why_choose_us56a4.png  550w,
                              assets/images/Madan_bihari_why_choose_us56a4.png  720w,
                              assets/images/Madan_bihari_why_choose_us56a4.png  990w,
                              assets/images/Madan_bihari_why_choose_us56a4.png 1100w,
                              assets/images/Madan_bihari_why_choose_us56a4.png 1500w,
                              assets/images/Madan_bihari_why_choose_us56a4.png 2200w,
                              assets/images/Madan_bihari_why_choose_us56a4.png 3000w
                            "
                            width="3000"
                            height="3171"
                            loading="lazy"
                            sizes="(min-width: 1200px)
                            737px, (min-width: 750px) 500px, calc(100vw - 30px)"
                          />
                        </div>
                      </button>
                    </div>
                  </modal-opener>
                  <modal-dialog
                    id="PopupModal-video_3M4Ytb"
                    class="modal-video media-modal color-scheme-1"
                  >
                    <div
                      class="modal-video__content"
                      role="dialog"
                      aria-label="Describe the video"
                      aria-modal="true"
                      tabindex="-1"
                    >
                      <button
                        id="ModalClose-video_3M4Ytb"
                        type="button"
                        class="modal-video__toggle"
                        aria-label="Close"
                      >
                        <span class="svg-wrapper"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            class="icon icon-close"
                            viewBox="0 0 18 17"
                          >
                            <path
                              fill="currentColor"
                              d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z"
                            />
                          </svg>
                        </span>
                      </button>
                      <div class="modal-video__content-info">
                        <deferred-media
                          class="modal-video__video template-popup"
                        >
                          <template
                            ><iframe
                              src="https://player.vimeo.com/video/"
                              class="js-vimeo"
                              allow="autoplay; encrypted-media"
                              allowfullscreen
                              title="Describe the video"
                            ></iframe
                          ></template>
                        </deferred-media>
                      </div>
                    </div>
                  </modal-dialog>
                </div>
              </div>
              <div
                class="collage__item collage__item--image collage__item--left scroll-trigger animate--slide-in"
                data-cascade
                style="--animation-order: 2"
              >
                <div
                  class="collage-card card-wrapper product-card-wrapper color-scheme-471aafc6-5de7-4806-a2ae-3a69e6ac03ba gradient"
                >
                  <div
                    class="media media--transparent ratio"
                    style="--ratio-percent: 87.5%"
                  >
                    <img
                      src="assets/images/gallery_79632.png"
                      alt=""
                      srcset="
                        assets/images/gallery_79632.png   50w,
                        assets/images/gallery_79632.png   75w,
                        assets/images/gallery_79632.png  100w,
                        assets/images/gallery_79632.png  150w,
                        assets/images/gallery_79632.png  200w,
                        assets/images/gallery_79632.png  300w,
                        assets/images/gallery_79632.png  400w,
                        assets/images/gallery_79632.png  500w,
                        assets/images/gallery_79632.png  750w,
                        assets/images/gallery_79632.png 1000w,
                        assets/images/gallery_79632.png 1250w,
                        assets/images/gallery_79632.png 1500w,
                        assets/images/gallery_79632.png 1750w,
                        assets/images/gallery_79632.png 2000w,
                        assets/images/gallery_79632.png 2250w,
                        assets/images/gallery_79632.png 2500w,
                        assets/images/gallery_79632.png 2750w,
                        assets/images/gallery_79632.png 3000w,
                        assets/images/gallery_79632.png 3200w
                      "
                      width="3200"
                      height="2800"
                      loading="lazy"
                      sizes="(min-width: 1200px) calc((1200px - 100px) * 1 / 3 - 10px),
                           (min-width: 750px) calc((100vw - 100px) * 1 / 3 - 10px),
                           calc(100vw - 30px)
"
                    />
                  </div>
                </div>
              </div>
              <div
                class="collage__item collage__item--image collage__item--left scroll-trigger animate--slide-in"
                data-cascade
                style="--animation-order: 3"
              >
                <div
                  class="collage-card card-wrapper product-card-wrapper color-scheme-471aafc6-5de7-4806-a2ae-3a69e6ac03ba gradient"
                >
                  <div
                    class="media media--transparent ratio"
                    style="--ratio-percent: 87.5%"
                  >
                    <img
                      src="assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png"
                      alt=""
                      srcset="
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png   50w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png   75w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png  100w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png  150w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png  200w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png  300w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png  400w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png  500w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png  750w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 1000w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 1250w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 1500w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 1750w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 2000w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 2250w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 2500w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 2750w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 3000w,
                        assets/images/3_45d385a4-56c4-41ef-9c05-17cbfb1fd58ca348.png 3200w
                      "
                      width="3200"
                      height="2800"
                      loading="lazy"
                      sizes="(min-width: 1200px) calc((1200px - 100px) * 1 / 3 - 10px),
                           (min-width: 750px) calc((100vw - 100px) * 1 / 3 - 10px),
                           calc(100vw - 30px)
"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <style>
          #shopify-section-template--20655585787969__collage_LVgRnH body {
            background: #000;
          }
        </style>
      </section>
      <section
        id="shopify-section-template--20655585787969__featured_blog_NgJmAm"
        class="shopify-section"
      >
        <link
          href="assets/css/component-sliderf699.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-cardd404.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/component-article-cardacc6.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <link
          href="assets/css/section-featured-blogcd56.css"
          rel="stylesheet"
          type="text/css"
          media="all"
        />
        <style data-shopify>
          .section-template--20655585787969__featured_blog_NgJmAm-padding {
            padding-top: 27px;
            padding-bottom: 24px;
          }

          @media screen and (min-width: 750px) {
            .section-template--20655585787969__featured_blog_NgJmAm-padding {
              padding-top: 36px;
              padding-bottom: 32px;
            }
          }
        </style>
        <div class="">
          <div
            class="page-width-desktop isolate section-template--20655585787969__featured_blog_NgJmAm-padding"
          >
            <div
              class="title-wrapper-with-link title-wrapper--self-padded-tablet-down title-wrapper--no-top-margin"
            >
              <h2
                id="SectionHeading-template--20655585787969__featured_blog_NgJmAm"
                class="blog__title inline-richtext h2 scroll-trigger animate--slide-in" style="display: flex;justify-content:center;"
                data-cascade
              >
                <strong>Blog Posts</strong>
              </h2>
            </div>
            
            
             <slider-component class="slider-mobile-gutter scroll-trigger animate--slide-in">
            
            <section class="blog-section">
              <div class="blog-section-inner">
            
                <ul class="blog-grid" role="list">
            
                  <?php
                  if (!isset($con)) {
                    include('include/conn.php');
                  }
            
                 $query = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT 3";
                  $result = mysqli_query($con, $query);
            
                  if ($result && mysqli_num_rows($result) > 0) {
            
                    while ($row = mysqli_fetch_assoc($result)) {
            
                      $image = htmlspecialchars($row['image']);
                      $title = htmlspecialchars($row['title']);
            
                      $blogUrl = urlencode($row['blog_url']);
                  ?>
            
                      <li class="blog-item">
            
                        <article class="blog-card">
            
                          <a
                            href="blog-details.php?url=<?= $blogUrl ?>"
                            class="blog-image-wrapper"
                            aria-label="<?= $title ?>"
                          >
                            <img
                              src="uploads/blogs/<?= $image ?>"
                              class="blog-image"
                              alt="<?= $title ?>"
                              loading="lazy"
                            >
                          </a>
            
                          <div class="blog-content">
            
                            <h2 class="blog-title">
                              <a href="blog-details.php?url=<?= $blogUrl ?>">
                                <?= $title ?>
                              </a>
                            </h2>

                            <a
                            href="blog-details.php?url=<?= $blogUrl ?>"
                              class="blog-read-more"
                            >
                              Read More <span aria-hidden="true">&nbsp;→</span>
                            </a>
            
                          </div>
            
                        </article>
            
                      </li>
            
                  <?php
                    }
            
                  } else {
                  ?>
            
                    <li class="blog-item">
                      <p>No blogs available at the moment.</p>
                    </li>
            
                  <?php } ?>
            
                </ul>
            
              </div>
            </section>
           
            <div class="slider-buttons">
              <button
                type="button"
                class="slider-button slider-button--prev"
                name="previous"
                aria-label="Slide left">
                <span class="svg-wrapper"><svg class="icon icon-caret" viewBox="0 0 10 6">
                    <path fill="currentColor" fill-rule="evenodd" d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708" clip-rule="evenodd" />
                  </svg>
                </span>
              </button>
              <div class="slider-counter caption">
                <span class="slider-counter--current">1</span>
                <span aria-hidden="true"> / </span>
                <span class="visually-hidden">of</span>
                <span class="slider-counter--total">3</span>
              </div>
              <button
                type="button"
                class="slider-button slider-button--next"
                name="next"
                aria-label="Slide right">
                <span class="svg-wrapper"><svg class="icon icon-caret" viewBox="0 0 10 6">
                    <path fill="currentColor" fill-rule="evenodd" d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708" clip-rule="evenodd" />
                  </svg>
                </span>
              </button>
            </div>
          </slider-component>
            
          </div>
        </div>

        <style>
          #shopify-section-template--20655585787969__featured_blog_NgJmAm
            .card {
            border-radius: 50px;
          }
        </style>
      </section>
      <div
        id="shopify-section-template--20655585787969__1783061544a3a178a9"
        class="shopify-section"
      ></div>
      <div
        id="shopify-section-template--20655585787969__1783410141be52bda8"
        class="shopify-section"
      ></div>
    </main>

    <!-- BEGIN sections: footer-group -->
    <div
      id="shopify-section-sections--20655586279489__17830699969fd6d15e"
      class="shopify-section shopify-section-group-footer-group"
    ></div>
    <div
      id="shopify-section-sections--20655586279489__17831623028ba192ca"
      class="shopify-section shopify-section-group-footer-group"
    ></div>
    <div
      id="shopify-section-sections--20655586279489__blocks_zxxdaN"
      class="shopify-section shopify-section-group-footer-group"
    ></div>
    <div
      id="shopify-section-sections--20655586279489__footer"
      class="shopify-section shopify-section-group-footer-group"
    >
      <link
        href="assets/css/section-footerf845.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />
      <link
        href="assets/css/component-newsletter4c4a.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />
      <link
        href="assets/css/component-list-menu717c.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />
      <link
        href="assets/css/component-list-paymentc213.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />
      <link
        href="assets/css/component-list-socialf800.css"
        rel="stylesheet"
        type="text/css"
        media="all"
      />
      <style data-shopify>
        .footer {
          margin-top: 0px;
        }

        .section-sections--20655586279489__footer-padding {
          padding-top: 12px;
          padding-bottom: 0px;
        }

        @media screen and (min-width: 750px) {
          .footer {
            margin-top: 0px;
          }

          .section-sections--20655586279489__footer-padding {
            padding-top: 16px;
            padding-bottom: 0px;
          }
        }
      </style>
    <?php include('include/footer.php'); ?>

      <style>
        #shopify-section-sections--20655586279489__footer
          .footer__content-bottom {
          /* padding-top: 0px; */
          padding-bottom: 5px;
        }
      </style>
    </div>
    <!-- END sections: footer-group -->

    <ul hidden>
      <li id="a11y-refresh-page-message">
        Choosing a selection results in a full page refresh.
      </li>
      <li id="a11y-new-window-message">Opens in a new window.</li>
    </ul>

    <script>
      window.shopUrl = "index.html";
      window.routes = {
        cart_add_url: "/cart/add",
        cart_change_url: "/cart/change",
        cart_update_url: "/cart/update",
        cart_url: "/cart",
        predictive_search_url: "/search/suggest",
      };

      window.cartStrings = {
        error: `There was an error while updating your cart. Please try again.`,
        quantityError: `You can only add [quantity] of this item to your cart.`,
      };

      window.variantStrings = {
        addToCart: `Add to cart`,
        soldOut: `Sold out`,
        unavailable: `Unavailable`,
        unavailable_with_option: `[value] - Unavailable`,
      };

      window.quickOrderListStrings = {
        itemsAdded: `[quantity] items added`,
        itemAdded: `[quantity] item added`,
        itemsRemoved: `[quantity] items removed`,
        itemRemoved: `[quantity] item removed`,
        viewCart: `View cart`,
        each: `[money]/ea`,
        min_error: `This item has a minimum of [min]`,
        max_error: `This item has a maximum of [max]`,
        step_error: `You can only add this item in increments of [step]`,
      };

      window.accessibilityStrings = {
        imageAvailable: `Image [index] is now available in gallery view`,
        shareSuccess: `Link copied to clipboard`,
        pauseSlideshow: `Pause slideshow`,
        playSlideshow: `Play slideshow`,
        recipientFormExpanded: `Gift card recipient form expanded`,
        recipientFormCollapsed: `Gift card recipient form collapsed`,
        countrySelectorSearchCount: `[count] countries/regions found`,
      };
    </script>
    <script src="assets/js/predictive-search8c8a.js" defer="defer"></script>
    <script
      src="../cdn.shopify.com/storefront/standard-actions.js"
      type="module"
      data-source-attribution="shopify.standard_actions"
    ></script>
  </body>
</html>
