
<?php
include 'include/conn.php';

$priceFrom = isset($_GET['filter.v.price.gte']) ? (float)preg_replace('/[^0-9.]/', '', $_GET['filter.v.price.gte']) : 0;
$priceTo = isset($_GET['filter.v.price.lte']) ? (float)preg_replace('/[^0-9.]/', '', $_GET['filter.v.price.lte']) : 0;
$availability = isset($_GET['filter.v.availability']) ? (int)$_GET['filter.v.availability'] : null;
$sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'most-relevant';

$where = ['status = 1'];
$priceWhere = ['status = 1'];
$priceExpression = '(CASE WHEN sale_price > 0 THEN sale_price ELSE price END)';

if ($availability === 0) {
  $where[] = '1 = 0';
}
if ($priceFrom > 0) {
  $where[] = $priceExpression . ' >= ' . $priceFrom;
  $priceWhere[] = $priceExpression . ' >= ' . $priceFrom;
}
if ($priceTo > 0) {
  $where[] = $priceExpression . ' <= ' . $priceTo;
  $priceWhere[] = $priceExpression . ' <= ' . $priceTo;
}

$orderBy = [
  'title-ascending' => 'name ASC',
  'title-descending' => 'name DESC',
  'price-ascending' => $priceExpression . ' ASC',
  'price-descending' => $priceExpression . ' DESC',
  'created-ascending' => 'id ASC',
  'created-descending' => 'id DESC',
  'best-selling' => 'id DESC',
  'manual' => 'id ASC',
  'most-relevant' => 'id DESC'
];
$orderSql = isset($orderBy[$sortBy]) ? $orderBy[$sortBy] : $orderBy['most-relevant'];
$whereSql = implode(' AND ', $where);
$priceWhereSql = implode(' AND ', $priceWhere);

if (!empty($whereSql)) {
    $whereSql .= " AND department_id = 2 ";
} else {
    $whereSql = "department_id = 2";
}

if (!empty($priceWhereSql)) {
    $priceWhereSql .= " AND department_id = 2";
} else {
    $priceWhereSql = "department_id = 2";
}



$countResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM products  WHERE $whereSql ");
$productCount = (int)mysqli_fetch_assoc($countResult)['total'];
$inStockCountResult = mysqli_query($con, "SELECT COUNT(*) AS total FROM products WHERE $priceWhereSql  ");
$inStockCount = (int)mysqli_fetch_assoc($inStockCountResult)['total'];
$outOfStockCount = 0;
$productResult = mysqli_query(
    $con,
    "SELECT * FROM products WHERE $whereSql ORDER BY $orderSql"
);
?>
<!doctype html>
<html class="js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<?php include('include/head.php'); ?>

  <body class="gradient animate--hover-3d-lift">
    <a class="skip-to-content-link button visually-hidden" href="#MainContent">
      Skip to content
    </a><!-- BEGIN sections: header-group -->
<div id="shopify-section-sections--20655586246721__announcement-bar" class="shopify-section shopify-section-group-header-group announcement-bar-section"><link href="assets/css/component-slideshow244c.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/component-sliderf699.css" rel="stylesheet" type="text/css" media="all" />

  <link href="assets/css/component-list-socialf800.css" rel="stylesheet" type="text/css" media="all" />

  <?php include('links/topheader.php') ?>

      
        <link rel="stylesheet" href="assets/css/updated.css" />
</div><div id="shopify-section-sections--20655586246721__blocks_8Ht9HN" class="shopify-section shopify-section-group-header-group">

</div>
<div id="shopify-section-sections--20655586246721__header" class="shopify-section shopify-section-group-header-group section-header"><link rel="stylesheet" href="assets/css/component-list-menu717c.css" media="print" onload="this.media='all'">

<link rel="stylesheet"
      href="assets/css/component-list-menu717c.css"
      media="print"
      onload="this.media='all'">

<link rel="stylesheet"
      href="assets/css/component-search2677.css"
      media="print"
      onload="this.media='all'">

<link rel="stylesheet"
      href="assets/css/component-menu-drawer97e4.css"
      media="print"
      onload="this.media='all'">

<link rel="stylesheet"
      href="assets/css/component-cart-notification585f.css"
      media="print"
      onload="this.media='all'">

<link rel="stylesheet"
      href="assets/css/component-priced9e8.css"
      media="print"
      onload="this.media='all'">

<link rel="stylesheet"
      href="assets/css/component-mega-menu3890.css"
      media="print"
      onload="this.media='all'">

<style data-shopify>.header {
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
  }</style><script src="assets/js/cart-notification58c3.js" defer="defer"></script>

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
        <h2 class="cart-notification__heading caption-large text-body"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-checkmark" viewBox="0 0 12 9"><path fill="currentColor" fill-rule="evenodd" d="M11.35.643a.5.5 0 0 1 .006.707l-6.77 6.886a.5.5 0 0 1-.719-.006L.638 4.845a.5.5 0 1 1 .724-.69l2.872 3.011 6.41-6.517a.5.5 0 0 1 .707-.006z" clip-rule="evenodd"/></svg>
Item added to your cart
        </h2>
        <button
          type="button"
          class="cart-notification__close modal__close-button link link--text focus-inset"
          aria-label="Close"
        >
          <span class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-close" viewBox="0 0 18 17"><path fill="currentColor" d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z"/></svg>
</span>
        </button>
      </div>
      <div id="cart-notification-product" class="cart-notification-product"></div>
      <div class="cart-notification__links">
        <a
          href="cart.php"
          id="cart-notification-button"
          class="button button--secondary button--full-width"
        >View cart</a>
        <form action="cart.php" method="post" id="cart-notification-form">
          <button class="button button--primary button--full-width" name="checkout">
            Check out
          </button>
        </form>
        <button type="button" class="link button-label">Continue shopping</button>
      </div>
    </div>
  </div>
</cart-notification>
<style data-shopify>
  .cart-notification {
    display: none;
  }
</style>
</div><div id="shopify-section-sections--20655586246721__blocks_D9A789" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__blocks_qNNJmA" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__blocks_QYhRKX" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__blocks_U47FDL" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__blocks_mtTyPT" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__1783582282c0a89740" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__17834971636385ef0d" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__blocks_QVD3Kt" class="shopify-section shopify-section-group-header-group">

</div><div id="shopify-section-sections--20655586246721__blocks_VUEKXk" class="shopify-section shopify-section-group-header-group">

</div>
<!-- END sections: header-group -->

    <main
      id="MainContent"
      class="content-for-layout focus-none"
      role="main"
      tabindex="-1"
      data-template="collection"
    >
      <div id="shopify-section-template--20655585689665__banner" class="shopify-section section">
<link href="assets/css/component-collection-hero57a2.css" rel="stylesheet" type="text/css" media="all" />
<style data-shopify>@media screen and (max-width: 749px) {
    .collection-hero--with-image .collection-hero__inner {
      padding-bottom: calc(4px + 2rem);
    }
  }</style><div class="collection-hero color-scheme-1 gradient">
  <div class="collection-hero__inner page-width  scroll-trigger animate--fade-in">
    <div class="collection-hero__text-wrapper">
      <h1 class="collection-hero__title">
        <span class="visually-hidden">Collection: </span>Wooden Paintings</h1><div class="collection-hero__description rte"></div></div></div>
</div>


</div><div id="shopify-section-template--20655585689665__product-grid" class="shopify-section section"><link href="assets/css/template-collection8887.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/component-cardd404.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/component-priced9e8.css" rel="stylesheet" type="text/css" media="all" />

<style data-shopify>.section-template--20655585689665__product-grid-padding {
    padding-top: 27px;
    padding-bottom: 27px;
  }

  @media screen and (min-width: 750px) {
    .section-template--20655585689665__product-grid-padding {
      padding-top: 36px;
      padding-bottom: 36px;
    }
  }</style><collection-component
  view-event-payload="{&quot;collection&quot;:{&quot;id&quot;:308067237953,&quot;handle&quot;:&quot;wooden-painting&quot;,&quot;productsCount&quot;:<?php echo $productCount; ?>}}"
  data-collection-id="308067237953"
>
  <div class="section-template--20655585689665__product-grid-padding gradient color-scheme-1">
<div class="">
        <link href="assets/css/component-facetsbbe2.css" rel="stylesheet" type="text/css" media="all" />
        <script src="assets/js/facets5779.js" defer="defer"></script><aside
            aria-labelledby="verticalTitle"
            class="facets-wrapper page-width"
            id="main-collection-filters"
            data-id="template--20655585689665__product-grid"
          >
            

<link href="assets/css/component-show-more03fd.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/component-swatch-input7610.css" rel="stylesheet" type="text/css" media="all" />
<link href="assets/css/component-swatch15ca.css" rel="stylesheet" type="text/css" media="all" />
<div
  class="facets-container scroll-trigger animate--fade-in"
  data-collection-id="308067237953"
  data-collection-handle="wooden-painting"
  data-template="collection"
><facet-filters-form class="facets small-hide">
      <form action="product.php" method="get"
        id="FacetFiltersForm"
        class="facets__form"
      >
                                    <?php echo $availability === 1 ? 'checked' : ''; ?>
          <div
            id="FacetsWrapperDesktop"
            
              class="facets__wrapper"
            
          ><h2 class="facets__heading caption-large text-body" id="verticalTitle" tabindex="-1">
                Filter:
              </h2>
<script src="assets/js/show-more814a.js" defer="defer"></script>
            


              
                  <details
                    id="Details-filter.v.availability-template--20655585689665__product-grid"
                    class="disclosure-has-popup facets__disclosure js-filter"
                    data-index="1"
                    
                  >
                    <summary
                      class="facets__summary caption-large focus-offset"
                      aria-label="Availability (0 selected)"
                    >
                      <div>
                        <span class="facets__summary-label">Availability
</span><svg class="icon icon-caret" viewBox="0 0 10 6"><path fill="currentColor" fill-rule="evenodd" d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708" clip-rule="evenodd"/></svg>
</div>
                    </summary>
                    <div
                      id="Facet-1-template--20655585689665__product-grid"
                      class="parent-display facets__display"
                    ><div class="facets__header">
                          <div>
                            <span class="facets__selected">0 selected</span></div>
                          <facet-remove>
                            <a href="wooden-painting.html" class="facets__reset link underlined-link">
                              Reset
                            </a>
                          </facet-remove>
                        </div><fieldset class="facets-wrap parent-wrap ">
                        <legend class="visually-hidden">Availability</legend><ul
                          class="facets-layout facets-layout-list facets-layout-list--text facets__list list-unstyled"
                          role="list"
                        >
<li class="list-menu__item facets__item"><label for="Filter-filter.v.availability-1" class="facets__label facet-checkbox
">
                                  <input
                                    type="checkbox"
                                    name="filter.v.availability"
                                    value="1"
                                    id="Filter-filter.v.availability-1"
                                    
                                    
                                  ><svg width="16px" height="16px" viewBox="0 0 16 16"><rect width="16" height="16" fill="none" stroke="currentColor"/></svg>
<div class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-checkmark" viewBox="0 0 12 9"><path fill="currentColor" fill-rule="evenodd" d="M11.35.643a.5.5 0 0 1 .006.707l-6.77 6.886a.5.5 0 0 1-.719-.006L.638 4.845a.5.5 0 1 1 .724-.69l2.872 3.011 6.41-6.517a.5.5 0 0 1 .707-.006z" clip-rule="evenodd"/></svg>
</div><span class="facet-checkbox__text" aria-hidden="true">
                                <span class="facet-checkbox__text-label">In stock</span> (<?php echo $inStockCount; ?>)
                              </span>
                              <span class="visually-hidden">In stock (3 products)
                              </span>
                                </label></li>
<li class="list-menu__item facets__item"><label for="Filter-filter.v.availability-2" class="facets__label facet-checkbox disabled
">
                                  <input
                                    type="checkbox"
                                    name="filter.v.availability"
                                    value="0"
                                    id="Filter-filter.v.availability-2"
                                    
                                    
                                      disabled
                                    
                                  ><svg width="16px" height="16px" viewBox="0 0 16 16"><rect width="16" height="16" fill="none" stroke="currentColor"/></svg>
<div class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-checkmark" viewBox="0 0 12 9"><path fill="currentColor" fill-rule="evenodd" d="M11.35.643a.5.5 0 0 1 .006.707l-6.77 6.886a.5.5 0 0 1-.719-.006L.638 4.845a.5.5 0 1 1 .724-.69l2.872 3.011 6.41-6.517a.5.5 0 0 1 .707-.006z" clip-rule="evenodd"/></svg>
</div><span class="facet-checkbox__text" aria-hidden="true">
                                <span class="facet-checkbox__text-label">Out of stock</span> (<?php echo $outOfStockCount; ?>)
                              </span>
                              <span class="visually-hidden">Out of stock (0 products)
                              </span>
                                </label></li></ul>
                      </fieldset>
                    </div>
                  </details>
                


              
                  <details
                    id="Details-filter.v.price-template--20655585689665__product-grid"
                    class="disclosure-has-popup facets__disclosure js-filter"
                    data-index="2"
                    
                  >
                    <summary class="facets__summary caption-large focus-offset">
                      <div>
                        <span>Price</span><svg class="icon icon-caret" viewBox="0 0 10 6"><path fill="currentColor" fill-rule="evenodd" d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708" clip-rule="evenodd"/></svg>
</div>
                    </summary>
                    <div
                      id="Facet-2-template--20655585689665__product-grid"
                      class="facets__display"
                    >
                      <div class="facets__header"><span class="facets__selected">The highest price is Rs. 9,999.00</span><facet-remove>
                            <a href="wooden-painting.html" class="facets__reset link underlined-link">
                              Reset
                            </a>
                          </facet-remove></div>
                      <price-range class="facets__price">
                        <span class="field-currency">₹</span>

<div class="field">
  <input
    class="field__input"
    name="filter.v.price.gte"
    id="Filter-Price-GTE"type="text"
    value="<?php echo $priceFrom > 0 ? htmlspecialchars((string)$priceFrom) : ''; ?>"
    inputmode="decimal"
    placeholder="0"
    data-pattern="\d| |,|\."
    data-min="0"
    data-max="9,999.00"
  >
  <label class="field__label" for="Filter-Price-GTE">From</label>
</div><span class="field-currency">₹</span><div class="field">
  <input
    class="field__input"
    name="filter.v.price.lte"
    id="Filter-Price-LTE"type="text"
    value="<?php echo $priceTo > 0 ? htmlspecialchars((string)$priceTo) : ''; ?>"
    inputmode="decimal"
    placeholder="9,999.00"
    data-pattern="\d| |,|\."
    data-min="0"
    data-max="9,999.00"
  >
  <label class="field__label" for="Filter-Price-LTE">To</label>
</div>

                      </price-range>
                    </div>
                  </details>
              
</div>
          
<div class="active-facets active-facets-desktop">

                  
                  

<facet-remove class="active-facets__button-wrapper">
                <a href="wooden-painting.html" class="active-facets__button-remove underlined-link">
                  <span>Remove all</span>
                </a>
              </facet-remove>
            </div>

        

<div class="facet-filters sorting caption">
              <div class="facet-filters__field">
                <h2 class="facet-filters__label caption-large text-body">
                  <label for="SortBy">Sort by:</label>
                </h2>
                <div class="select"><select
                    name="sort_by"
                    class="facet-filters__sort select__select caption-large"
                    id="SortBy"
                    aria-describedby="a11y-refresh-page-message"
                  ><option
                        value="manual"
                        
                      >
                        Featured
                      </option><option
                        value="most-relevant"
                        
                          <?php echo $sortBy === 'most-relevant' ? 'selected="selected"' : ''; ?>
                        
                      >
                        Most relevant
                      </option><option
                        value="best-selling"
                        
                      >
                        Best selling
                      </option><option
                        value="title-ascending"
                        
                      >
                        Alphabetically, A-Z
                      </option><option
                        value="title-descending"
                        
                      >
                        Alphabetically, Z-A
                      </option><option
                        value="price-ascending"
                        
                      >
                        Price, low to high
                      </option><option
                        value="price-descending"
                        
                      >
                        Price, high to low
                      </option><option
                        value="created-ascending"
                        
                      >
                        Date, old to new
                      </option><option
                        value="created-descending"
                        
                      >
                        Date, new to old
                      </option></select>
                  <span class="svg-wrapper"><svg class="icon icon-caret" viewBox="0 0 10 6"><path fill="currentColor" fill-rule="evenodd" d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708" clip-rule="evenodd"/></svg>
</span>
                </div>
              </div>
            </div><div class="product-count light" role="status">
            <h2 class="product-count__text text-body">
              <span id="ProductCountDesktop"><?php echo $productCount; ?> products
</span>
            </h2>

<div class="loading__spinner hidden">
  <svg xmlns="http://www.w3.org/2000/svg" class="spinner" viewBox="0 0 66 66"><circle stroke-width="6" cx="33" cy="33" r="30" fill="none" class="path"/></svg>

</div>
</div></form>
    </facet-filters-form>
  <menu-drawer
    class="mobile-facets__wrapper medium-hide large-up-hide"
    data-breakpoint="mobile"
  >
    <details class="mobile-facets__disclosure disclosure-has-popup">
      <summary class="mobile-facets__open-wrapper focus-offset">
        <span class="mobile-facets__open">
          <span class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-filter" viewBox="0 0 20 20"><path fill="currentColor" fill-rule="evenodd" d="M4.833 6.5a1.667 1.667 0 1 1 3.334 0 1.667 1.667 0 0 1-3.334 0M4.05 7H2.5a.5.5 0 0 1 0-1h1.55a2.5 2.5 0 0 1 4.9 0h8.55a.5.5 0 0 1 0 1H8.95a2.5 2.5 0 0 1-4.9 0m11.117 6.5a1.667 1.667 0 1 0-3.334 0 1.667 1.667 0 0 0 3.334 0M13.5 11a2.5 2.5 0 0 1 2.45 2h1.55a.5.5 0 0 1 0 1h-1.55a2.5 2.5 0 0 1-4.9 0H2.5a.5.5 0 0 1 0-1h8.55a2.5 2.5 0 0 1 2.45-2"/></svg>
</span>
          <span class="mobile-facets__open-label button-label medium-hide large-up-hide">Filter and sort
</span>
          <span class="mobile-facets__open-label button-label small-hide">Filter
</span>
        </span>
        <span tabindex="0" class="mobile-facets__close">
          <span class="svg-wrapper"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-close" viewBox="0 0 18 17"><path fill="currentColor" d="M.865 15.978a.5.5 0 0 0 .707.707l7.433-7.431 7.579 7.282a.501.501 0 0 0 .846-.37.5.5 0 0 0-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 1 0-.707-.708L8.991 7.853 1.413.573a.5.5 0 1 0-.693.72l7.563 7.268z"/></svg>
</span>
        </span>
      </summary>
      <facet-filters-form>
        <form action="product.php" method="get" id="FacetFiltersFormMobile" class="mobile-facets">
          <div class="mobile-facets__inner gradient">
            <div class="mobile-facets__header">
              <div class="mobile-facets__header-inner">
                <h2 class="mobile-facets__heading medium-hide large-up-hide">Filter and sort
</h2>
                <h2 class="mobile-facets__heading small-hide">Filter
</h2>
                <p class="mobile-facets__count"><?php echo $productCount; ?> products
</p>
              </div>
            </div>
            <div
              id="FacetsWrapperMobile"
              class="mobile-facets__main has-submenu gradient"
            >

                  
                      <details
                        id="Details-Mobile-filter.v.availability-template--20655585689665__product-grid"
                        class="mobile-facets__details js-filter"
                        data-index="mobile-1"
                      >
                        <summary class="mobile-facets__summary focus-inset">
                          <div>
                            <span>Availability</span>
                            <span class="mobile-facets__arrow"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-arrow" viewBox="0 0 14 10"><path fill="currentColor" fill-rule="evenodd" d="M8.537.808a.5.5 0 0 1 .817-.162l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 1 1-.708-.708L11.793 5.5H1a.5.5 0 0 1 0-1h10.793L8.646 1.354a.5.5 0 0 1-.109-.546" clip-rule="evenodd"/></svg>
</span>
                          </div>
                        </summary>
                        <div
                          id="FacetMobile-1-template--20655585689665__product-grid"
                          class="mobile-facets__submenu gradient"
                        >
                          <button
                            class="mobile-facets__close-button link link--text focus-inset"
                            aria-expanded="true"
                            type="button"
                          ><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-arrow" viewBox="0 0 14 10"><path fill="currentColor" fill-rule="evenodd" d="M8.537.808a.5.5 0 0 1 .817-.162l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 1 1-.708-.708L11.793 5.5H1a.5.5 0 0 1 0-1h10.793L8.646 1.354a.5.5 0 0 1-.109-.546" clip-rule="evenodd"/></svg>
<span>Availability</span></button>
                          <ul class="facets-layout facets-layout-list facets-layout-list--text mobile-facets__list list-unstyled" role="list">
<li class="mobile-facets__item list-menu__item">
                                
                                  <label for="Filter-filter.v.availability-mobile-1" class="facets__label mobile-facets__label
">
                                    <input
                                      class="mobile-facets__checkbox"
                                      type="checkbox"
                                      name="filter.v.availability"
                                      value="1"
                                      id="Filter-filter.v.availability-mobile-1"
                                      <?php echo $availability === 1 ? 'checked' : ''; ?>
                                      
                                      
                                    ><span class="mobile-facets__highlight"></span><svg width="16px" height="16px" viewBox="0 0 16 16"><rect width="16" height="16" fill="none" stroke="currentColor"/></svg>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-checkmark" viewBox="0 0 12 9"><path fill="currentColor" fill-rule="evenodd" d="M11.35.643a.5.5 0 0 1 .006.707l-6.77 6.886a.5.5 0 0 1-.719-.006L.638 4.845a.5.5 0 1 1 .724-.69l2.872 3.011 6.41-6.517a.5.5 0 0 1 .707-.006z" clip-rule="evenodd"/></svg>


                                    <span class="facet-checkbox__text" aria-hidden="true">
                                  <span class="facet-checkbox__text-label">In stock</span> (<?php echo $inStockCount; ?>)
                                </span>
                                <span class="visually-hidden">In stock (3 products)
                                </span>
                                  </label>
                                
                              </li>
<li class="mobile-facets__item list-menu__item">
                                
                                  <label for="Filter-filter.v.availability-mobile-2" class="facets__label mobile-facets__label disabled
">
                                    <input
                                      class="mobile-facets__checkbox"
                                      type="checkbox"
                                      name="filter.v.availability"
                                      value="0"
                                      id="Filter-filter.v.availability-mobile-2"
                                      
                                      
                                        disabled
                                      
                                    ><span class="mobile-facets__highlight"></span><svg width="16px" height="16px" viewBox="0 0 16 16"><rect width="16" height="16" fill="none" stroke="currentColor"/></svg>
<svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-checkmark" viewBox="0 0 12 9"><path fill="currentColor" fill-rule="evenodd" d="M11.35.643a.5.5 0 0 1 .006.707l-6.77 6.886a.5.5 0 0 1-.719-.006L.638 4.845a.5.5 0 1 1 .724-.69l2.872 3.011 6.41-6.517a.5.5 0 0 1 .707-.006z" clip-rule="evenodd"/></svg>


                                    <span class="facet-checkbox__text" aria-hidden="true">
                                  <span class="facet-checkbox__text-label">Out of stock</span> (<?php echo $outOfStockCount; ?>)
                                </span>
                                <span class="visually-hidden">Out of stock (0 products)
                                </span>
                                  </label>
                                
                              </li></ul>

                          <div class="mobile-facets__footer gradient">
                            <facet-remove class="mobile-facets__clear-wrapper">
                              <a href="wooden-painting.html" class="mobile-facets__clear underlined-link">Clear</a>
                            </facet-remove>
                            <button
                              type="button"
                              class="button button--primary"
                              onclick="this.closest('.mobile-facets__wrapper').querySelector('summary').click()"
                            >
                              Apply
                            </button>
                          </div>
                        </div>
                      </details>
                    


                  
                      <details
                        id="Details-Mobile-filter.v.price-template--20655585689665__product-grid"
                        class="mobile-facets__details js-filter"
                        data-index="mobile-2"
                      >
                        <summary class="mobile-facets__summary focus-inset">
                          <div>
                            <span>Price</span>
                            <span class="mobile-facets__arrow"><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-arrow" viewBox="0 0 14 10"><path fill="currentColor" fill-rule="evenodd" d="M8.537.808a.5.5 0 0 1 .817-.162l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 1 1-.708-.708L11.793 5.5H1a.5.5 0 0 1 0-1h10.793L8.646 1.354a.5.5 0 0 1-.109-.546" clip-rule="evenodd"/></svg>
</span>
                          </div>
                        </summary>
                        <div
                          id="FacetMobile-2-template--20655585689665__product-grid"
                          class="mobile-facets__submenu gradient"
                        >
                          <button
                            class="mobile-facets__close-button link link--text focus-inset"
                            aria-expanded="true"
                            type="button"
                          ><svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-arrow" viewBox="0 0 14 10"><path fill="currentColor" fill-rule="evenodd" d="M8.537.808a.5.5 0 0 1 .817-.162l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 1 1-.708-.708L11.793 5.5H1a.5.5 0 0 1 0-1h10.793L8.646 1.354a.5.5 0 0 1-.109-.546" clip-rule="evenodd"/></svg>
Price
                          </button><p class="mobile-facets__info">
                            The highest price is Rs. 9,999.00
                          </p>

                          <price-range class="facets__price">
                            <span class="field-currency">₹</span>

<div class="field">
  <input
    class="field__input"
    name="filter.v.price.gte"
    id="Mobile-Filter-Price-GTE"type="text"
    value="<?php echo $priceFrom > 0 ? htmlspecialchars((string)$priceFrom) : ''; ?>"
    inputmode="decimal"
    placeholder="0"
    data-pattern="\d| |,|\."
    data-min="0"
    data-max="9,999.00"
  >
  <label class="field__label" for="Mobile-Filter-Price-GTE">From</label>
</div><span class="field-currency">₹</span><div class="field">
  <input
    class="field__input"
    name="filter.v.price.lte"
    id="Mobile-Filter-Price-LTE"type="text"
    value="<?php echo $priceTo > 0 ? htmlspecialchars((string)$priceTo) : ''; ?>"
    inputmode="decimal"
    placeholder="9,999.00"
    data-pattern="\d| |,|\."
    data-min="0"
    data-max="9,999.00"
  >
  <label class="field__label" for="Mobile-Filter-Price-LTE">To</label>
</div>

                          </price-range>
                          <div class="mobile-facets__footer">
                            <facet-remove class="mobile-facets__clear-wrapper">
                              <a href="wooden-painting.html" class="mobile-facets__clear underlined-link">Clear</a>
                            </facet-remove>
                            <button
                              type="button"
                              class="button button--primary"
                              onclick="this.closest('.mobile-facets__wrapper').querySelector('summary').click()"
                            >
                              Apply
                            </button>
                          </div>
                        </div>
                      </details>
                  
<div
                  id="Details-Mobile-SortBy-template--20655585689665__product-grid"
                  class="mobile-facets__details js-filter"
                  data-index="mobile-"
                >
                  <div class="mobile-facets__summary">
                    <div class="mobile-facets__sort">
                      <label for="SortBy-mobile">Sort by:</label>
                      <div class="select">
                        <select
                          name="sort_by"
                          class="select__select"
                          id="SortBy-mobile"
                          aria-describedby="a11y-refresh-page-message"
                        ><option
                              value="manual"
                              
                            >
                              Featured
                            </option><option
                              value="most-relevant"
                              
                                selected="selected"
                              
                            >
                              Most relevant
                            </option><option
                              value="best-selling"
                              
                            >
                              Best selling
                            </option><option
                              value="title-ascending"
                              
                            >
                              Alphabetically, A-Z
                            </option><option
                              value="title-descending"
                              
                            >
                              Alphabetically, Z-A
                            </option><option
                              value="price-ascending"
                              
                            >
                              Price, low to high
                            </option><option
                              value="price-descending"
                              
                            >
                              Price, high to low
                            </option><option
                              value="created-ascending"
                              
                            >
                              Date, old to new
                            </option><option
                              value="created-descending"
                              
                            >
                              Date, new to old
                            </option></select>
                        <span class="svg-wrapper"><svg class="icon icon-caret" viewBox="0 0 10 6"><path fill="currentColor" fill-rule="evenodd" d="M9.354.646a.5.5 0 0 0-.708 0L5 4.293 1.354.646a.5.5 0 0 0-.708.708l4 4a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.708" clip-rule="evenodd"/></svg>
</span>
                      </div>
                    </div>
                  </div>
                </div><div class="mobile-facets__footer">
                <facet-remove class="mobile-facets__clear-wrapper">
                  <a href="wooden-painting.html" class="mobile-facets__clear underlined-link">Remove all</a>
                </facet-remove>
                <button
                  type="button"
                  class="button button--primary"
                  onclick="this.closest('.mobile-facets__wrapper').querySelector('summary').click()"
                >
                  Apply
                </button>
              </div>
            </div>

            
</div>
        </form>
      </facet-filters-form>
    </details>
  </menu-drawer>

  <div class="active-facets active-facets-mobile medium-hide large-up-hide">
        
<facet-remove class="active-facets__button-wrapper">
      <a href="wooden-painting.html" class="active-facets__button-remove underlined-link">
        <span>Remove all</span>
      </a>
    </facet-remove>
  </div>
  
<div
    class="product-count light medium-hide large-up-hide"
    role="status"
  >
    <h2 class="product-count__text text-body">
      <span
        id="ProductCount"
        data-product-count="<?php echo $productCount; ?>"
        data-total-count="<?php echo $productCount; ?>"
      ><?php echo $productCount; ?> products
</span>
    </h2>

<div class="loading__spinner hidden">
  <svg xmlns="http://www.w3.org/2000/svg" class="spinner" viewBox="0 0 66 66"><circle stroke-width="6" cx="33" cy="33" r="30" fill="none" class="path"/></svg>

</div>
</div></div>

          </aside><div
          class="product-grid-container scroll-trigger animate--slide-in"
          id="ProductGridContainer"
          
            data-cascade
          
        ><div
              class="collection page-width"
            >
              <div class="loading-overlay gradient"></div>
              <ul
                id="product-grid"
                data-id="template--20655585689665__product-grid"
                class="
                  grid product-grid grid--2-col-tablet-down
                  grid--4-col-desktop
                  
                "
              >

 <?php while($row = mysqli_fetch_assoc($productResult))
{
?>
                

<li
                    class="grid__item scroll-trigger animate--slide-in"
                    
                      data-cascade
                      style="--animation-order: 1;"
                    
                  >
                    
<link href="assets/css/component-rating1a99.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/component-volume-pricing8e11.css" rel="stylesheet" type="text/css" media="all" />

  <link href="assets/css/component-priced9e8.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/quick-order-list675f.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/quantity-popover7f94.css" rel="stylesheet" type="text/css" media="all" />
<product-component view-event-payload="{&quot;product&quot;:{&quot;id&quot;:7977959161921,&quot;title&quot;:&quot;Portrait Paintings&quot;,&quot;handle&quot;:&quot;portrait-paintings&quot;,&quot;selectedVariant&quot;:null},&quot;context&quot;:&quot;collection&quot;,&quot;selectedOptions&quot;:[]}">
    <div class="card-wrapper product-card-wrapper underline-links-hover">
      <div
        class="
          card card--card
           card--media
           color-scheme-471aafc6-5de7-4806-a2ae-3a69e6ac03ba gradient
          
          
          
          
        "
        style="--ratio-percent: 111.39999999999999%;"
      >
        <div
          class="card__inner  ratio"
          style="--ratio-percent: 111.39999999999999%;"
        ><div class="card__media">
              <div class="media media--transparent media--hover-effect">
                
                 <img
                        src="admin/assets/images/products/<?php echo $row['image']; ?>"
                        alt="<?php echo $row['name']; ?>"
                        width="500"
                        height="557">
                
</div>
            </div><div class="card__content">
            <div class="card__information">
              <h3
                class="card__heading"
                
              >
              
                 <a href="product.php?id=<?php echo $row['id']; ?>"  id="CardLink-template--20655585689665__product-grid-7977964798017"
                class="full-unstyled-link"
                aria-labelledby="CardLink-template--20655585689665__product-grid-7977964798017 Badge-template--20655585689665__product-grid-7977964798017">
                    <?php echo $row['name']; ?>
                </a>
              </h3>
            </div>
            <div class="card__badge bottom left">
                
                <?php if ($row['on_sale'] == 1 || $row['in_stock'] == 1) { ?>
    <span  id="NoMediaStandardBadge-template--20655585689665__product-grid-7977959161921"
                  class="badge badge--bottom-left color-scheme-5">
        Available
    </span>
    <?php } else { ?>
    <span id="NoMediaStandardBadge-template--20655585689665__product-grid-7977959161921"
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
              
                id="title-template--20655585689665__product-grid-7977959161921"
              
            >
                <a href="product-details.php?id=<?php echo $row['id']; ?>" id="CardLink-template--20655585689665__product-grid-7977964798017"
                class="full-unstyled-link"
                aria-labelledby="CardLink-template--20655585689665__product-grid-7977964798017 Badge-template--20655585689665__product-grid-7977964798017">
                    <?php echo $row['name']; ?>
                </a>
            </h3>
            <div class="card-information"><span class="caption-large light"></span>
<div
    class="
      price  price--on-sale"
  >
    <div class="price__container"><div class="price__regular"><span class="visually-hidden visually-hidden--inline">Regular price</span>
          <span class="price-item price-item--regular">
           Rs. <?php echo number_format($row['price'],2); ?>
          </span></div>
      <div class="price__sale">
          <span class="visually-hidden visually-hidden--inline">Regular price</span>
          <span>
            <s class="price-item price-item--regular">
              
             Rs. <?php echo number_format($row['price'],2); ?>
              
            </s>
          </span><span class="visually-hidden visually-hidden--inline">Sale price</span>
        <span class="price-item price-item--sale price-item--last">
            Rs. <?php echo number_format($row['sale_price'],2); ?>
        </span>
      </div></div></div>


</div>
          </div>
          
          
          <div class="card__badge bottom left"><span
                id="Badge-template--20655585689665__product-grid-7977959161921"
                class="badge badge--bottom-left color-scheme-5"
              >Sale</span></div>
        </div>
      </div>
    </div>
  </product-component>
                  </li>
                   <?php
}
?>
</ul></div></div>
      </div></div>
      
      
      
       <div id="shopify-section-template--20655585689665__banner" class="shopify-section section">
<link href="assets/css/component-collection-hero57a2.css" rel="stylesheet" type="text/css" media="all" />
<style data-shopify>@media screen and (max-width: 749px) {
    .collection-hero--with-image .collection-hero__inner {
      padding-bottom: calc(4px + 2rem);
    }
  }</style><div class="collection-hero color-scheme-1 gradient">
  <div class="collection-hero__inner page-width  scroll-trigger animate--fade-in">
    <div class="collection-hero__text-wrapper">
      <h1 class="collection-hero__title">
        <span class="visually-hidden">Collection: </span>Cotton Gold Hand Painting
</h1><div class="collection-hero__description rte"></div></div></div>
</div>


</div>
      
        <div class="section-template--20655585689665__product-grid-padding gradient color-scheme-1">
<div class="">
        <link href="assets/css/component-facetsbbe2.css" rel="stylesheet" type="text/css" media="all" />
        <script src="assets/js/facets5779.js" defer="defer"></script><div
          class="product-grid-container scroll-trigger animate--slide-in"
          id="ProductGridContainer"
          
            data-cascade
          
        ><div
              class="collection page-width"
            >
              <div class="loading-overlay gradient"></div>
              <ul
                id="product-grid"
                data-id="template--20655585689665__product-grid"
                class="
                  grid product-grid grid--2-col-tablet-down
                  grid--4-col-desktop
                  
                "
              >
               <?php
include 'include/conn.php';

$sql = "SELECT * FROM products where department_id=4 AND status = 1 limit 6";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>
                

<li
                    class="grid__item scroll-trigger animate--slide-in"
                    
                      data-cascade
                      style="--animation-order: 1;"
                    
                  >
                    
<link href="assets/css/component-rating1a99.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/component-volume-pricing8e11.css" rel="stylesheet" type="text/css" media="all" />

  <link href="assets/css/component-priced9e8.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/quick-order-list675f.css" rel="stylesheet" type="text/css" media="all" />
  <link href="assets/css/quantity-popover7f94.css" rel="stylesheet" type="text/css" media="all" />
<product-component view-event-payload="{&quot;product&quot;:{&quot;id&quot;:7977959161921,&quot;title&quot;:&quot;Portrait Paintings&quot;,&quot;handle&quot;:&quot;portrait-paintings&quot;,&quot;selectedVariant&quot;:null},&quot;context&quot;:&quot;collection&quot;,&quot;selectedOptions&quot;:[]}">
    <div class="card-wrapper product-card-wrapper underline-links-hover">
      <div
        class="
          card card--card
           card--media
           color-scheme-471aafc6-5de7-4806-a2ae-3a69e6ac03ba gradient
          
          
          
          
        "
        style="--ratio-percent: 111.39999999999999%;"
      >
        <div
          class="card__inner  ratio"
          style="--ratio-percent: 111.39999999999999%;"
        ><div class="card__media">
              <div class="media media--transparent media--hover-effect">
                
                 <img
                        src="admin/assets/images/products/<?php echo $row['image']; ?>"
                        alt="<?php echo $row['name']; ?>"
                        width="500"
                        height="557">
                
</div>
            </div><div class="card__content">
            <div class="card__information">
              <h3
                class="card__heading"
                
              >
              
                 <a href="product.php?id=<?php echo $row['id']; ?>"  id="CardLink-template--20655585689665__product-grid-7977964798017"
                class="full-unstyled-link"
                aria-labelledby="CardLink-template--20655585689665__product-grid-7977964798017 Badge-template--20655585689665__product-grid-7977964798017">
                    <?php echo $row['name']; ?>
                </a>
              </h3>
            </div>
            <div class="card__badge bottom left">
                
                <?php if ($row['on_sale'] == 1 || $row['in_stock'] == 1) { ?>
    <span  id="NoMediaStandardBadge-template--20655585689665__product-grid-7977959161921"
                  class="badge badge--bottom-left color-scheme-5">
        Available
    </span>

    <?php }else{ ?>
     <span id="NoMediaStandardBadge-template--20655585689665__product-grid-7977959161921"
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
              
                id="title-template--20655585689665__product-grid-7977959161921"
              
            >
                <a href="product-details.php?id=<?php echo $row['id']; ?>" id="CardLink-template--20655585689665__product-grid-7977964798017"
                class="full-unstyled-link"
                aria-labelledby="CardLink-template--20655585689665__product-grid-7977964798017 Badge-template--20655585689665__product-grid-7977964798017">
                    <?php echo $row['name']; ?>
                </a>
            </h3>
            <div class="card-information"><span class="caption-large light"></span>
<div
    class="
      price  price--on-sale"
  >
    <div class="price__container"><div class="price__regular"><span class="visually-hidden visually-hidden--inline">Regular price</span>
          <span class="price-item price-item--regular">
           Rs. <?php echo number_format($row['price'],2); ?>
          </span></div>
      <div class="price__sale">
          <span class="visually-hidden visually-hidden--inline">Regular price</span>
          <span>
            <s class="price-item price-item--regular">
              
             Rs. <?php echo number_format($row['price'],2); ?>
              
            </s>
          </span><span class="visually-hidden visually-hidden--inline">Sale price</span>
        <span class="price-item price-item--sale price-item--last">
            Rs. <?php echo number_format($row['sale_price'],2); ?>
        </span>
      </div></div></div>


</div>
          </div>
          
          
          <div class="card__badge bottom left"><span
                id="Badge-template--20655585689665__product-grid-7977959161921"
                class="badge badge--bottom-left color-scheme-5"
              >Sale</span></div>
        </div>
      </div>
    </div>
  </product-component>
                  </li>
                   <?php
}
?>
</ul></div></div>
      </div></div>
</collection-component>


</div>
    </main>

    <!-- BEGIN sections: footer-group -->
<div id="shopify-section-sections--20655586279489__17830699969fd6d15e" class="shopify-section shopify-section-group-footer-group">

</div><div id="shopify-section-sections--20655586279489__17831623028ba192ca" class="shopify-section shopify-section-group-footer-group">

</div><div id="shopify-section-sections--20655586279489__blocks_zxxdaN" class="shopify-section shopify-section-group-footer-group">

</div><div id="shopify-section-sections--20655586279489__footer" class="shopify-section shopify-section-group-footer-group">

<style data-shopify>.footer {
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

<style> #shopify-section-sections--20655586279489__footer .footer__content-bottom { padding-bottom: 5px;} </style></div>
<!-- END sections: footer-group -->

    <ul hidden>
      <li id="a11y-refresh-page-message">Choosing a selection results in a full page refresh.</li>
      <li id="a11y-new-window-message">Opens in a new window.</li>
    </ul>

  
</body>
</html>
