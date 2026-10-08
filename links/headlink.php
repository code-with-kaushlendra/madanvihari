<?php
$assetPrefix = basename(dirname($_SERVER['SCRIPT_NAME'])) === 'policies' ? '../' : '';
?>
<!-- < ?php include('../include/conn.php'); ?> -->
<!-- about.php code -->

    <script type="module">
      import * as StandardEvents from 'https://cdn.shopify.com/storefront/standard-events.js';

      window.StandardEvents = StandardEvents;

      customElements.define('collection-component', StandardEvents.createViewEventElement());
      customElements.define(
        'product-component',
        StandardEvents.createViewEventElement(HTMLElement, { defaultTrigger: 'intersect' }),
      );

      document.addEventListener('DOMContentLoaded', () => {
        const template = document.querySelector('main[data-template]')?.dataset.template || '';
        document.dispatchEvent(
          new StandardEvents.PageViewEvent({
            page: { template, title: document.title, url: window.location.href },
          })
        );
      }, { once: true });
    </script>

    <script src="<?= $assetPrefix ?>assets/js/constants4779.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/pubsub2751.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/global7d2f.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/cart-disclosure-modalae37.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/cart-disclosure-tooltip3e21.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/details-disclosure6869.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/details-modaleb50.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/search-formd141.js" defer="defer"></script>
    <script src="<?= $assetPrefix ?>assets/js/standard-actions-override466b.js" defer="defer"></script><script src="<?= $assetPrefix ?>assets/js/animationsa515.js" defer="defer"></script><script>window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.start');</script><meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/73496068161/digital_wallets/dialog">
<script async="async" src="<?= $assetPrefix ?>assets/js/preloadsd568.js"></script>
<script id="shopify-features" type="application/json">{"accessToken":"6efdee23af272f3e94fbaf72a2e06da5","betas":["rich-media-storefront-analytics"],"domain":"c1esm2-av.myshopify.com","predictiveSearch":true,"shopId":73496068161,"locale":"en"}</script>
<script>var Shopify = Shopify || {};
Shopify.shop = "c1esm2-av.myshopify.com";
Shopify.locale = "en";
Shopify.currency = {"active":"INR","rate":"1.0"};
Shopify.country = "IN";
Shopify.theme = {"name":"Dawn","id":149251981377,"schema_name":"Dawn","schema_version":"15.5.0","theme_store_id":887,"role":"main"};
Shopify.theme.handle = "null";
Shopify.theme.style = {"id":null,"handle":null};
Shopify.cdnHost = "c1esm2-av.myshopify.com/cdn";
Shopify.routes = Shopify.routes || {};
Shopify.routes.root = "../index.html";
Shopify.shopJsCdnBaseUrl = "https://cdn.shopify.com/shopifycloud/shop-js";
Shopify.SignInWithShop = Shopify.SignInWithShop || {};
Shopify.SignInWithShop.User = Shopify.SignInWithShop.User || {};
Shopify.SignInWithShop.User.recognized = false;</script>
<script type="module">!function(o){(o.Shopify=o.Shopify||{}).modules=!0}(window);</script>
<script>!function(o){function n(){var o=[];function n(){o.push(Array.prototype.slice.apply(arguments))}return n.q=o,n}var t=o.Shopify=o.Shopify||{};t.loadFeatures=n(),t.autoloadFeatures=n()}(window);</script>
<script>
  window.Shopify = window.Shopify || {};
  window.Shopify.SignInWithShop = window.Shopify.SignInWithShop || {};
  window.Shopify.SignInWithShop.assetMetrics = { sampleRate: 0.01 };
  window.Shopify.SignInWithShop.eligible = true;
</script>
<script id="shop-js-analytics" type="application/json">{"pageType":"page"}</script>
<script defer="defer" async type="module" src="<?= $assetPrefix ?>assets/js/loader.init-shop-cart-sync.en.esm.js"></script>
<script type="module">
  await import("<?= $assetPrefix ?>assets/js/loader.init-shop-cart-sync.en.esm.js");

  window.Shopify.SignInWithShop?.initShopCartSync?.({"fedCMEnabled":true,"windoidEnabled":true,"experiments":{"f_574743f4a4e7d67652abf981a0b686df":true}});

</script>
<script>
  window.Shopify = window.Shopify || {};
  if (!window.Shopify.featureAssets) window.Shopify.featureAssets = {};
  window.Shopify.featureAssets['shop-js'] = {"shop-toast-manager":["modules/v2/loader.shop-toast-manager.en.esm.js"],"shop-button":["modules/v2/loader.shop-button.en.esm.js"],"shop-cash-offers":["modules/v2/loader.shop-cash-offers.en.esm.js"],"listener":["modules/v2/loader.listener.en.esm.js"],"init-fed-cm":["modules/v2/loader.init-fed-cm.en.esm.js"],"init-shop-user-recognition":["modules/v2/loader.init-shop-user-recognition.en.esm.js"],"init-windoid":["modules/v2/loader.init-windoid.en.esm.js"],"checkout-modal":["modules/v2/loader.checkout-modal.en.esm.js"],"init-shop-cart-sync":["modules/v2/loader.init-shop-cart-sync.en.esm.js"],"init-shop-email-lookup-coordinator":["modules/v2/loader.init-shop-email-lookup-coordinator.en.esm.js"],"init-customer-accounts":["modules/v2/loader.init-customer-accounts.en.esm.js"],"avatar":["modules/v2/loader.avatar.en.esm.js"],"shop-user-recognition":["modules/v2/loader.shop-user-recognition.en.esm.js"],"shop-login":["modules/v2/loader.shop-login.en.esm.js"],"pay-button":["modules/v2/loader.pay-button.en.esm.js"],"shop-login-button":["modules/v2/loader.shop-login-button.en.esm.js"],"init-shop-for-new-customer-accounts":["modules/v2/loader.init-shop-for-new-customer-accounts.en.esm.js"],"init-customer-accounts-sign-up":["modules/v2/loader.init-customer-accounts-sign-up.en.esm.js"],"shop-cart-sync":["modules/v2/loader.shop-cart-sync.en.esm.js"],"shop-follow-button":["modules/v2/loader.shop-follow-button.en.esm.js"],"lead-capture":["modules/v2/loader.lead-capture.en.esm.js"],"payment-terms":["modules/v2/loader.payment-terms.en.esm.js"]};
</script>
<script id="__st">var __st={"a":73496068161,"offset":19800,"reqid":"a2d3e667-eafc-40b0-9ea4-d50e278e8625-1784540753","pageurl":"c1esm2-av.myshopify.com\/pages\/about-us","s":"pages-117508276289","u":"0ade34e1632f","p":"page","rtyp":"page","rid":117508276289};</script>
<script>window.ShopifyPaypalV4VisibilityTracking = true;</script>
<script id="captcha-bootstrap">!function(){'use strict';const t='contact',e='account',n='new_comment',o=[[t,t],['blogs',n],['comments',n],[t,'customer']],c=[[e,'customer_login'],[e,'guest_login'],[e,'recover_customer_password'],[e,'create_customer']],r=t=>t.map((([t,e])=>`form[action*='/${t}']:not([data-nocaptcha='true']) input[name='form_type'][value='${e}']`)).join(','),a=t=>()=>t?[...document.querySelectorAll(t)].map((t=>t.form)):[];function s(){const t=[...o],e=r(t);return a(e)}const i='password',u='form_key',d=['recaptcha-v3-token','g-recaptcha-response','h-captcha-response',i],f=()=>{try{return window.sessionStorage}catch{return}},m='__shopify_v',_=t=>t.elements[u];function p(t,e,n=!1){try{const o=window.sessionStorage,c=JSON.parse(o.getItem(e)),{data:r}=function(t){const{data:e,action:n}=t;return t[m]||n?{data:e,action:n}:{data:t,action:n}}(c);for(const[e,n]of Object.entries(r))t.elements[e]&&(t.elements[e].value=n);n&&o.removeItem(e)}catch(o){console.error('form repopulation failed',{error:o})}}const l='form_type',E='cptcha';function T(t){t.dataset[E]=!0}const w=window,h=w.document,L='Shopify',v='ce_forms',y='captcha';let A=!1;((t,e)=>{const n=(g='f06e6c50-85a8-45c8-87d0-21a2b65856fe',I='../../cdn.shopify.com/shopifycloud/storefront-forms-hcaptcha/ce_storefront_forms_captcha_hcaptcha.v1.5.2.iife.js',D={infoText:'Protected by hCaptcha',privacyText:'Privacy',termsText:'Terms'},(t,e,n)=>{const o=w[L][v],c=o.bindForm;if(c)return c(t,g,e,D).then(n);var r;o.q.push([[t,g,e,D],n]),r=I,A||(h.body.append(Object.assign(h.createElement('script'),{id:'captcha-provider',async:!0,src:r})),A=!0)});var g,I,D;w[L]=w[L]||{},w[L][v]=w[L][v]||{},w[L][v].q=[],w[L][y]=w[L][y]||{},w[L][y].protect=function(t,e){n(t,void 0,e),T(t)},Object.freeze(w[L][y]),function(t,e,n,w,h,L){const[v,y,A,g]=function(t,e,n){const i=e?o:[],u=t?c:[],d=[...i,...u],f=r(d),m=r(i),_=r(d.filter((([t,e])=>n.includes(e))));return[a(f),a(m),a(_),s()]}(w,h,L),I=t=>{const e=t.target;return e instanceof HTMLFormElement?e:e&&e.form},D=t=>v().includes(t);t.addEventListener('submit',(t=>{const e=I(t);if(!e)return;const n=D(e)&&!e.dataset.hcaptchaBound&&!e.dataset.recaptchaBound,o=_(e),c=g().includes(e)&&(!o||!o.value);(n||c)&&t.preventDefault(),c&&!n&&(function(t){try{if(!f())return;!function(t){const e=f();if(!e)return;const n=_(t);if(!n)return;const o=n.value;o&&e.removeItem(o)}(t);const e=Array.from(Array(32),(()=>Math.random().toString(36)[2])).join('');!function(t,e){_(t)||t.append(Object.assign(document.createElement('input'),{type:'hidden',name:u})),t.elements[u].value=e}(t,e),function(t,e){const n=f();if(!n)return;const o=[...t.querySelectorAll(`input[type='${i}']`)].map((({name:t})=>t)),c=[...d,...o],r={};for(const[a,s]of new FormData(t).entries())c.includes(a)||(r[a]=s);n.setItem(e,JSON.stringify({[m]:1,action:t.action,data:r}))}(t,e)}catch(e){console.error('failed to persist form',e)}}(e),e.submit())}));const S=(t,e)=>{t&&!t.dataset[E]&&(n(t,e.some((e=>e===t))),T(t))};for(const o of['focusin','change'])t.addEventListener(o,(t=>{const e=I(t);D(e)&&S(e,y())}));const B=e.get('form_key'),M=e.get(l),P=B&&M;t.addEventListener('DOMContentLoaded',(()=>{const t=y();if(P)for(const e of t)e.elements[l].value===M&&p(e,B);[...new Set([...A(),...v().filter((t=>'true'===t.dataset.shopifyCaptcha))])].forEach((e=>S(e,t)))}))}(h,new URLSearchParams(w.location.search),n,t,e,['guest_login'])})(!0,!0)}();</script>
<script integrity="sha256-JjoPp5ZfB1sSAs5SQaol1x1GgvveM+BgmRzyDexInEQ=" data-source-attribution="shopify.loadfeatures" defer="defer" src="<?= $assetPrefix ?>assets/js/load_feature-1bd60354.js" crossorigin="anonymous"></script>
<script>(function () {var userAgent = navigator.userAgent;var platform = navigator.platform;var maxTouchPoints = navigator.maxTouchPoints || 0;var isIOS = /iPad|iPhone|iPod/.test(platform) || (platform === 'MacIntel' && maxTouchPoints > 1);var isMacSafari = platform.indexOf('Mac') === 0 && /Safari/.test(userAgent) && !/Chrome|Chromium|CriOS|FxiOS|Edg|OPR|Android/.test(userAgent);var isAppleSafari = isIOS || isMacSafari;if (isAppleSafari) {fetch('/sf_private_access_tokens' + location.search).catch(function () {});}function browserMajorVersion(pattern) {var match = userAgent.match(pattern);return match ? parseInt(match[1], 10) : null;}function shouldLoadAutosizesPolyfill() {if (!window.PerformanceObserver?.supportedEntryTypes?.includes('paint')) {return false;}var chromeVersion = browserMajorVersion(/Chrome\/(\d+)/);if (chromeVersion !== null) {return chromeVersion < 126;}var firefoxVersion = browserMajorVersion(/Firefox\/(\d+)/);if (firefoxVersion !== null) {return firefoxVersion < 150;}var safariVersion = isAppleSafari ? browserMajorVersion(/Version\/(\d+).*Safari\//) : null;if (safariVersion !== null) {return safariVersion < 27;}return true;}if (shouldLoadAutosizesPolyfill()) {var autosizesScript = document.createElement('script');autosizesScript.async = true;autosizesScript.crossOrigin = 'anonymous';autosizesScript.src = "<?= $assetPrefix ?>assets/js/autosizes-84416378.js";(document.head || document.documentElement).appendChild(autosizesScript);}window.ShopifyAnalytics = window.ShopifyAnalytics || {};window.ShopifyAnalytics.performance = window.ShopifyAnalytics.performance || {};(function () {var LONG_FRAME_THRESHOLD = 50;var longAnimationFrames = [];var activeRafId = null;function collectLongFrames() {var previousTime = null;function rafMonitor(now) {if (activeRafId === null) {return;}var delta = now - previousTime;if (delta > LONG_FRAME_THRESHOLD) {longAnimationFrames.push({startTime: previousTime,endTime: now,});}previousTime = now;activeRafId = requestAnimationFrame(rafMonitor);}previousTime = performance.now();activeRafId = requestAnimationFrame(rafMonitor);}if (!window.PerformanceObserver?.supportedEntryTypes?.includes('long-animation-frame')) {collectLongFrames();var timeoutId = setTimeout(function () {cancelAnimationFrame(activeRafId);}, 10000);window.ShopifyAnalytics.performance.getLongAnimationFrames = function (stopCollection) {if (stopCollection === undefined) {stopCollection = false;}if (stopCollection) {clearTimeout(timeoutId);cancelAnimationFrame(activeRafId);}return longAnimationFrames;};}})();})();</script><script id="shopify-origin-trials" async="async" integrity="sha256-mqQjA+yhr1DtPsW5MhDIq3zDu+LghfjNT49r/ttG3eY=" src="../../cdn.shopify.com/shopifycloud/storefront/assets/storefront/origin_trials-5059b83f.js" crossorigin="anonymous" onload="window.__shopifyOriginTrialsDone = true" onerror="window.__shopifyOriginTrialsDone = true"></script>
<script data-source-attribution="shopify.dynamic_checkout.dynamic.init">var Shopify=Shopify||{};Shopify.PaymentButton=Shopify.PaymentButton||{isStorefrontPortableWallets:!0,init:function(){window.Shopify.PaymentButton.init=function(){};var t=document.createElement("script");t.src="<?= $assetPrefix ?>assets/js/portable-wallets.en.js",t.type="module",document.head.appendChild(t)}};
</script>
<script data-source-attribution="shopify.dynamic_checkout.buyer_consent">
  function portableWalletsHideBuyerConsent(e){var t=document.getElementById("shopify-buyer-consent"),n=document.getElementById("shopify-subscription-policy-button");t&&n&&(t.classList.add("hidden"),t.setAttribute("aria-hidden","true"),n.removeEventListener("click",e))}function portableWalletsShowBuyerConsent(e){var t=document.getElementById("shopify-buyer-consent"),n=document.getElementById("shopify-subscription-policy-button");t&&n&&(t.classList.remove("hidden"),t.removeAttribute("aria-hidden"),n.addEventListener("click",e))}window.Shopify?.PaymentButton&&(window.Shopify.PaymentButton.hideBuyerConsent=portableWalletsHideBuyerConsent,window.Shopify.PaymentButton.showBuyerConsent=portableWalletsShowBuyerConsent);
</script>
<script data-source-attribution="shopify.dynamic_checkout.cart.bootstrap">document.addEventListener("DOMContentLoaded",(function(){function t(){return document.querySelector("shopify-accelerated-checkout-cart, shopify-accelerated-checkout")}if(t())Shopify.PaymentButton.init();else{new MutationObserver((function(e,n){t()&&(Shopify.PaymentButton.init(),n.disconnect())})).observe(document.body,{childList:!0,subtree:!0})}}));
</script>
<script id="sections-script" data-sections="header" defer="defer" src="<?= $assetPrefix ?>assets/js/scripts96ad.js"></script>
<script id="shopify-cfh-end">window.performance && window.performance.mark && window.performance.mark('shopify.content_for_header.end');</script>


<link href="<?= $assetPrefix ?>assets/css/base2cc8.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= $assetPrefix ?>assets/css/component-cart-itemsfc90.css" media="print" onload="this.media='all'">
      <link rel="preload" as="font" href="<?= $assetPrefix ?>assets/fonts/assistant/assistant_n4.9120912a469cad1cc292572851508ca49d12e768.woff2" type="font/woff2" crossorigin>
      

      <link rel="preload" as="font" href="<?= $assetPrefix ?>assets/fonts/assistant/assistant_n4.9120912a469cad1cc292572851508ca49d12e768.woff2" type="font/woff2" crossorigin>
      <link rel="stylesheet" href="<?= $assetPrefix ?>assets/css/updated.css" />
      
      
<link
        rel="stylesheet"
        href="<?= $assetPrefix ?>assets/css/component-predictive-search95cf.css"
        media="print"
        onload="this.media='all'"
      ><script>
      if (Shopify.designMode) {
        document.documentElement.classList.add('shopify-design-mode');
      }
    </script>
  <link href="https://monorail-edge.shopifysvc.com/" rel="dns-prefetch">
<script>(function(){if ("sendBeacon" in navigator && "performance" in window) {try {var session_token_from_headers = performance.getEntriesByType('navigation')[0].serverTiming.find(x => x.name == '_s').description;} catch {var session_token_from_headers = undefined;}var session_cookie_matches = document.cookie.match(/_shopify_s=([^;]*)/);var session_token_from_cookie = session_cookie_matches && session_cookie_matches.length === 2 ? session_cookie_matches[1] : "";var session_token = session_token_from_headers || session_token_from_cookie || "";function handle_abandonment_event(e) {var entries = performance.getEntries().filter(function(entry) {return /monorail-edge.shopifysvc.com/.test(entry.name);});if (!window.abandonment_tracked && entries.length === 0) {window.abandonment_tracked = true;var currentMs = Date.now();var navigation_start = performance.timing.navigationStart;var payload = {shop_id: 73496068161,url: window.location.href,navigation_start,duration: currentMs - navigation_start,session_token,page_type: "page"};window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({schema_id: "online_store_buyer_site_abandonment/1.1",payload: payload,metadata: {event_created_at_ms: currentMs,event_sent_at_ms: currentMs}}));}}window.addEventListener('pagehide', handle_abandonment_event);}}());</script>
<script>
  window.__TREKKIE_SHIM_QUEUE = window.__TREKKIE_SHIM_QUEUE || [];
</script>
<script>(function(){var wpmLoader=function(){"use strict";var e=/Googlebot|Storebot-Google|bingbot|Baiduspider|YandexBot|DuckDuckBot|Slurp|facebookexternalhit|Twitterbot|LinkedInBot|Applebot|AdsBot-Google|Mediapartners-Google|APIs-Google|PetalBot|SemrushBot|AhrefsBot|MJ12bot|DotBot|Acunetix|PerplexityBot|Perplexity-User/i,r=/bytedance/i;function o(){try{var e=document.cookie;if(!e||"string"!=typeof e)return;for(var r=0,o=e.split(";");r<o.length;r++){var d=o[r],t=d.indexOf("=");if(-1!==t){var n=d.slice(0,t).trim();if(n){var i=void 0;try{i=decodeURIComponent(n)}catch(e){i=n}if("_shopify_s"===i){var a=d.slice(t+1).trim();try{return decodeURIComponent(a)}catch(e){return a}}}}}return}catch(e){return}}function d(e){try{"undefined"!=typeof console&&"function"==typeof console.warn&&console.warn(e)}catch(e){}}return function(t,n,i,a){var s,c,u,l,f=arguments.length>4&&void 0!==arguments[4]?arguments[4]:{},p=(c=(s={modern:/Edge?\/(1{2}[4-9]|1[2-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Firefox\/(1{2}[4-9]|1[2-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Chrom(ium|e)\/(9{2}|\d{3,})\.\d+(\.\d+|)|(Maci|X1{2}).+ Version\/(15\.\d+|(1[6-9]|[2-9]\d|\d{3,})\.\d+)([,.]\d+|)( \(\w+\)|)( Mobile\/\w+|) Safari\/|Chrome.+OPR\/(9{2}|\d{3,})\.\d+\.\d+|(CPU[ +]OS|iPhone[ +]OS|CPU[ +]iPhone|CPU IPhone OS|CPU iPad OS)[ +]+(15[._]\d+|(1[6-9]|[2-9]\d|\d{3,})[._]\d+)([._]\d+|)|Android:?[ /-](14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})(\.\d+|)(\.\d+|)|Android.+Firefox\/(15\d|1[6-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+Chrom(ium|e)\/(14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|SamsungBrowser\/([2-9]\d|\d{3,})\.\d+/,legacy:/Edge?\/(1[6-9]|[2-9]\d|\d{3,})\.\d+(\.\d+|)|Firefox\/(5[4-9]|[6-9]\d|\d{3,})\.\d+(\.\d+|)|Chrom(ium|e)\/(5[1-9]|[6-9]\d|\d{3,})\.\d+(\.\d+|)([\d.]+$|.*Safari\/(?![\d.]+ Edge\/[\d.]+$))|(Maci|X1{2}).+ Version\/(10\.\d+|(1[1-9]|[2-9]\d|\d{3,})\.\d+)([,.]\d+|)( \(\w+\)|)( Mobile\/\w+|) Safari\/|Chrome.+OPR\/(3[89]|[4-9]\d|\d{3,})\.\d+\.\d+|(CPU[ +]OS|iPhone[ +]OS|CPU[ +]iPhone|CPU IPhone OS|CPU iPad OS)[ +]+(10[._]\d+|(1[1-9]|[2-9]\d|\d{3,})[._]\d+)([._]\d+|)|Android:?[ /-](14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})(\.\d+|)(\.\d+|)|Mobile Safari.+OPR\/([89]\d|\d{3,})\.\d+\.\d+|Android.+Firefox\/(15\d|1[6-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+Chrom(ium|e)\/(14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+(UC? ?Browser|UCWEB|U3)[ /]?(15\.([5-9]|\d{2,})|(1[6-9]|[2-9]\d|\d{3,})\.\d+)\.\d+|SamsungBrowser\/(5\.\d+|([6-9]|\d{2,})\.\d+)|Android.+MQ{2}Browser\/(14(\.(9|\d{2,})|)|(1[5-9]|[2-9]\d|\d{3,})(\.\d+|))(\.\d+|)|K[Aa][Ii]OS\/(3\.\d+|([4-9]|\d{2,})\.\d+)(\.\d+|)/}).modern,u=s.legacy,(l=navigator.userAgent).match(e)?"bot":l.match(c)?"modern":l.match(u)?"legacy":l.match(r)?"bot":"unknown"),h=function(e){var r=e.version,t=e.browserTarget,n=e.surface,i=e.shopId,a=e.monorailEndpoint,s=window.location.href;return{emit:function(e){var c,u=e.status,l=e.errorMsg;if(!a)return d("[Web Pixels Manager] No Monorail endpoint provided, skipping logging."),!1;try{var f=(new Date).getTime();c=JSON.stringify({metadata:{event_sent_at_ms:f},events:[{schema_id:"web_pixels_manager_load/3.2",payload:{version:r,bundle_target:t,page_url:s,status:u,surface:n,error_msg:l,shop_id:i,visit_token:o()},metadata:{event_created_at_ms:f}}]})}catch(e){return!1}var p,h=!1;try{"function"==typeof window.navigator.sendBeacon&&-1===(p=window.navigator.userAgent).indexOf("iPhone; CPU iPhone OS 12_")&&-1===p.indexOf("iPad; CPU OS 12_")&&-1===p.indexOf("iPod touch; CPU iPhone OS 12_")&&(h=window.navigator.sendBeacon.bind(window.navigator)(a,c))}catch(e){h=!1}if(h)return!0;try{var m=new XMLHttpRequest;return m.open("POST.html",a,!0),m.setRequestHeader("Content-Type","text/plain"),m.send(c),!0}catch(e){return d("[Web Pixels Manager] Got an unhandled error while logging to Monorail."),!1}}}}({version:i,browserTarget:p,surface:t.surface,shopId:t.shopId,monorailEndpoint:t.monorailEndpoint});if(Boolean(null==(y=null==(m=window.Shopify)?void 0:m.analytics)?void 0:y.replayQueue))h.emit({status:"setup-skipped",errorMsg:"replay queue already initialized."});else{var m,y;h.emit({status:"setup-started"}),window.Shopify=window.Shopify||{};var g=window.Shopify;g.analytics=g.analytics||{};var v=g.analytics;v.replayQueue=[],v.publish=function(e,r,o){return v.replayQueue.push([e,r,o]),!0};try{self.performance.mark("wpm:start")}catch(e){}var w,b="modern"===p?"modern":"legacy",P=(null!=a?a:{modern:"",legacy:""})[b],S=[(w={baseUrl:n,hashVersion:i,buildTarget:b}).baseUrl,"/wpm","/b",w.hashVersion,"modern"===w.buildTarget?"m":"l",".js"].join("");try{f.browserTarget=p,O(function(){try{O(_)}catch(e){h.emit({status:"failed",errorMsg:U(e)})}}),h.emit({status:"loading"})}catch(e){h.emit({status:"failed",errorMsg:U(e)})}}function C(){if(!function(){var e,r;return Boolean(null==(r=null==(e=window.Shopify)?void 0:e.analytics)?void 0:r.initialized)}()){var e=window.webPixelsManager.init(t)||void 0;if(e){var r=window.Shopify.analytics;r.replayQueue.forEach(function(r){var o=r[0],d=r[1],t=r[2];e.publishCustomEvent(o,d,t)}),r.replayQueue=[],r.publish=e.publishCustomEvent,r.visitor=e.visitor,r.initialized=!0}}}function _(){return h.emit({status:"failed",errorMsg:"".concat(S," has failed to load")})}function O(e){var r;!function(e){var r=e.src,o=e.async,d=void 0===o||o,t=e.onload,n=e.onerror,i=e.sri,a=e.scriptDataAttributes,s=void 0===a?{}:a,c=document.createElement("script"),u=document.querySelector("head"),l=document.querySelector("body");if(c.async=d,c.src=r,i&&(c.integrity=i,c.crossOrigin="anonymous"),s)for(var f in s)if(Object.prototype.hasOwnProperty.call(s,f))try{c.dataset[f]=s[f]}catch(e){}if(t&&c.addEventListener("load",t),n&&c.addEventListener("error",n),u)u.appendChild(c);else{if(!l)throw new Error("Did not find a head or body element to append the script");l.appendChild(c)}}({src:S,async:!0,onload:C,onerror:e,sri:(r=P,"string"==typeof r&&/^sha384-[A-Za-z0-9+/=]+$/.test(r)?P:""),scriptDataAttributes:f})}function U(e){return e instanceof Error?e.message:"Unknown error"}}}();wpmLoader({shopId: 73496068161,storefrontBaseUrl: "https://c1esm2-av.myshopify.com",extensionsBaseUrl: "https://extensions.shopifycdn.c../assets/images/web-pixels-manager",monorailEndpoint: "https://c1esm2-av.myshopify.com/.well-known/shopify/monorail/unstable/produce_batch",surface: "storefront-renderer",enabledBetaFlags: ["d5bdd5d0"],webPixelsConfigList: [{"id":"shopify-app-pixel","configuration":"{}","eventPayloadVersion":"v1","runtimeContext":"STRICT","scriptVersion":"0501","apiClientId":"shopify-pixel","type":"APP","privacyPurposes":["ANALYTICS","MARKETING"]},{"id":"shopify-custom-pixel","eventPayloadVersion":"v1","runtimeContext":"LAX","scriptVersion":"0501","apiClientId":"shopify-pixel","type":"CUSTOM","privacyPurposes":["ANALYTICS","MARKETING"]}],isMerchantRequest: false,initData: {"shop":{"name":"My Store","paymentSettings":{"currencyCode":"INR"},"myshopifyDomain":"c1esm2-av.myshopify.com","countryCode":"IN","storefrontUrl":"https:\/\/c1esm2-av.myshopify.com"},"customer":null,"cart":null,"checkout":null,"productVariants":[],"products":[],"purchasingCompany":null},},"../cdn.html","6392291bw48edd0b4p524860cam091f7eea",{"modern":"","legacy":""},{"trekkieShim":true,"agentContext":true,"apiClientId":"580111","themeId":"149251981377","themeStoreId":"887","themePublished":"true","pageType":"page","resourceId":"117508276289","shopId":"73496068161","storefrontBaseUrl":"https:\/\/c1esm2-av.myshopify.com","extensionBaseUrl":"https:\/\/extensions.shopifycdn.com\/cdn\/shopifycloud\/web-pixels-manager","surface":"storefront-renderer","enabledBetaFlags":"[\"d5bdd5d0\"]","isMerchantRequest":"false","hashVersion":"6392291bw48edd0b4p524860cam091f7eea","publish":"custom","events":"[[\"page_viewed\",{}]]"});})();</script><script>
  window.ShopifyAnalytics = window.ShopifyAnalytics || {};
  window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
  window.ShopifyAnalytics.meta.currency = 'INR';
  var meta = {"page":{"pageType":"page","resourceType":"page","resourceId":117508276289,"requestId":"a2d3e667-eafc-40b0-9ea4-d50e278e8625-1784540753"}};
  for (var attr in meta) {
    window.ShopifyAnalytics.meta[attr] = meta[attr];
  }
</script>
<script class="analytics">
  (function () {
    var customDocumentWrite = function(content) {
      var jquery = null;

      if (window.jQuery) {
        jquery = window.jQuery;
      } else if (window.Checkout && window.Checkout.$) {
        jquery = window.Checkout.$;
      }

      if (jquery) {
        jquery('body').append(content);
      }
    };

    var hasLoggedConversion = function(token) {
      if (token) {
        return document.cookie.indexOf('loggedConversion=' + token) !== -1;
      }
      return false;
    }

    var setCookieIfConversion = function(token) {
      if (token) {
        var twoMonthsFromNow = new Date(Date.now());
        twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

        document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
      }
    }

    var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
    window.ShopifyAnalytics.lib.trekkie = window.trekkie;
    if (trekkie.integrations) {
      return;
    }
    trekkie.methods = [
      'identify',
      'page',
      'ready',
      'track',
      'trackForm',
      'trackLink'
    ];
    trekkie.factory = function(method) {
      return function() {
        var args = Array.prototype.slice.call(arguments);
        args.unshift(method);
        trekkie.push(args);
        if (window.__TREKKIE_SHIM_QUEUE && (method == 'track' || method == 'page')) {
          try {
            window.__TREKKIE_SHIM_QUEUE.push({
              from: 'trekkie-stub',
              method: method,
              args: args.slice(1)
            });
          } catch (e) {
            // no-op
          }
        }
        return trekkie;
      };
    };
    for (var i = 0; i < trekkie.methods.length; i++) {
      var key = trekkie.methods[i];
      trekkie[key] = trekkie.factory(key);
    }
    trekkie.load = function(config) {
      trekkie.config = config || {};
      trekkie.config.initialDocumentCookie = document.cookie;
      var first = document.getElementsByTagName('script')[0];
var script = document.createElement('script');
script.type = 'text/javascript';
script.onerror = function(e) {
  var scriptFallback = document.createElement('script');
  scriptFallback.type = 'text/javascript';
  scriptFallback.onerror = function(error) {
          var Monorail = {
      produce: function produce(monorailDomain, schemaId, payload) {
        var currentMs = new Date().getTime();
        var event = {
          schema_id: schemaId,
          payload: payload,
          metadata: {
            event_created_at_ms: currentMs,
            event_sent_at_ms: currentMs
          }
        };
        return Monorail.sendRequest("https://" + monorailDomain + "/v1/produce", JSON.stringify(event));
      },
      sendRequest: function sendRequest(endpointUrl, payload) {
        // Try the sendBeacon API
        if (window && window.navigator && typeof window.navigator.sendBeacon === 'function' && typeof window.Blob === 'function' && !Monorail.isIos12()) {
          var blobData = new window.Blob([payload], {
            type: 'text/plain'
          });

          if (window.navigator.sendBeacon(endpointUrl, blobData)) {
            return true;
          } // sendBeacon was not successful

        } // XHR beacon

        var xhr = new XMLHttpRequest();

        try {
          xhr.open('POST.html', endpointUrl);
          xhr.setRequestHeader('Content-Type', 'text/plain');
          xhr.send(payload);
        } catch (e) {
          console.log(e);
        }

        return false;
      },
      isIos12: function isIos12() {
        return window.navigator.userAgent.lastIndexOf('iPhone; CPU iPhone OS 12_') !== -1 || window.navigator.userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
      }
    };
    Monorail.produce('monorail-edge.shopifysvc.com',
      'trekkie_storefront_load_errors/1.1',
      {shop_id: 73496068161,
      theme_id: 149251981377,
      app_name: "storefront",
      context_url: window.location.href,
      source_url: "<?= $assetPrefix ?>assets/js/trekkie.storefront.51e77662fd67e0d47c7238acfeab529dafb90214.min.js"});

  };
  scriptFallback.async = true;
  scriptFallback.src = '<?= $assetPrefix ?>assets/js/trekkie.storefront.51e77662fd67e0d47c7238acfeab529dafb90214.min.js';
  first.parentNode.insertBefore(scriptFallback, first);
};
script.async = true;
script.src = '<?= $assetPrefix ?>assets/js/trekkie.storefront.51e77662fd67e0d47c7238acfeab529dafb90214.min.js';
first.parentNode.insertBefore(script, first);

    };
    trekkie.load(
      {"Trekkie":{"appName":"storefront","development":false,"defaultAttributes":{"shopId":73496068161,"isMerchantRequest":null,"themeId":149251981377,"themeCityHash":"382954475632359740","contentLanguage":"en","currency":"INR","eventMetadataId":"a1f2879d-263c-47fb-9313-d89e1ea0ef5a"},"isServerSideCookieWritingEnabled":true,"monorailRegion":"shop_domain","enabledBetaFlags":["b5387b81","d5bdd5d0"]},"Session Attribution":{},"S2S":{"facebookCapiEnabled":false,"source":"trekkie-storefront-renderer","apiClientId":580111}}
    );

    var loaded = false;
    trekkie.ready(function() {
      if (loaded) return;
      loaded = true;

      window.ShopifyAnalytics.lib = window.trekkie;

      var originalDocumentWrite = document.write;
      document.write = customDocumentWrite;
      try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
      document.write = originalDocumentWrite;

      var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
      var token = match? match[1]: undefined;
      if (!hasLoggedConversion(token)) {
        setCookieIfConversion(token);
        
      }
    });

    window.ShopifyAnalytics.lib.page(null,{"pageType":"page","resourceType":"page","resourceId":117508276289,"requestId":"a2d3e667-eafc-40b0-9ea4-d50e278e8625-1784540753","shopifyEmitted":true});

    var eventsListenerScript = document.createElement('script');
    eventsListenerScript.async = true;
    eventsListenerScript.src = "<?= $assetPrefix ?>assets/js/shop_events_listener-4e26a9ce.js";
    document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
})();</script>
<script
  defer
  src="<?= $assetPrefix ?>assets/js/shopify-perf-kit-3.7.0.min.js"
  data-application="storefront-renderer"
  data-shop-id="73496068161"
  data-render-region="gcp-asia-southeast1"
  data-page-type="page"
  data-theme-instance-id="149251981377"
  data-theme-name="Dawn"
  data-theme-version="15.5.0"
  data-monorail-region="shop_domain"
  data-resource-timing-sampling-rate="10"
  data-shs="true"
  data-shs-beacon="true"
  data-shs-export-with-fetch="true"
  data-shs-logs-sample-rate="1"
  data-shs-beacon-endpoint="https://c1esm2-av.myshopify.com/api/collect"
></script>

 <link href="<?= $assetPrefix ?>assets/css/base2cc8.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= $assetPrefix ?>assets/css/component-cart-itemsfc90.css" media="print" onload="this.media='all'">
      <link rel="preload" as="font" href="<?= $assetPrefix ?>assets/fonts/assistant/assistant_n4.9120912a469cad1cc292572851508ca49d12e768.woff2" type="font/woff2" crossorigin>
      

      <link rel="preload" as="font" href="<?= $assetPrefix ?>assets/fonts/assistant/assistant_n4.9120912a469cad1cc292572851508ca49d12e768.woff2" type="font/woff2" crossorigin>
      
<link
        rel="stylesheet"
        href="<?= $assetPrefix ?>assets/css/component-predictive-search95cf.css"
        media="print"
        onload="this.media='all'"
      ><script>
      if (Shopify.designMode) {
        document.documentElement.classList.add('shopify-design-mode');
      }
    </script>
  <link href="https://monorail-edge.shopifysvc.com/" rel="dns-prefetch">
<script>(function(){if ("sendBeacon" in navigator && "performance" in window) {try {var session_token_from_headers = performance.getEntriesByType('navigation')[0].serverTiming.find(x => x.name == '_s').description;} catch {var session_token_from_headers = undefined;}var session_cookie_matches = document.cookie.match(/_shopify_s=([^;]*)/);var session_token_from_cookie = session_cookie_matches && session_cookie_matches.length === 2 ? session_cookie_matches[1] : "";var session_token = session_token_from_headers || session_token_from_cookie || "";function handle_abandonment_event(e) {var entries = performance.getEntries().filter(function(entry) {return /monorail-edge.shopifysvc.com/.test(entry.name);});if (!window.abandonment_tracked && entries.length === 0) {window.abandonment_tracked = true;var currentMs = Date.now();var navigation_start = performance.timing.navigationStart;var payload = {shop_id: 73496068161,url: window.location.href,navigation_start,duration: currentMs - navigation_start,session_token,page_type: "page"};window.navigator.sendBeacon("https://monorail-edge.shopifysvc.com/v1/produce", JSON.stringify({schema_id: "online_store_buyer_site_abandonment/1.1",payload: payload,metadata: {event_created_at_ms: currentMs,event_sent_at_ms: currentMs}}));}}window.addEventListener('pagehide', handle_abandonment_event);}}());</script>
<script>
  window.__TREKKIE_SHIM_QUEUE = window.__TREKKIE_SHIM_QUEUE || [];
</script>
<script>(function(){var wpmLoader=function(){"use strict";var e=/Googlebot|Storebot-Google|bingbot|Baiduspider|YandexBot|DuckDuckBot|Slurp|facebookexternalhit|Twitterbot|LinkedInBot|Applebot|AdsBot-Google|Mediapartners-Google|APIs-Google|PetalBot|SemrushBot|AhrefsBot|MJ12bot|DotBot|Acunetix|PerplexityBot|Perplexity-User/i,r=/bytedance/i;function o(){try{var e=document.cookie;if(!e||"string"!=typeof e)return;for(var r=0,o=e.split(";");r<o.length;r++){var d=o[r],t=d.indexOf("=");if(-1!==t){var n=d.slice(0,t).trim();if(n){var i=void 0;try{i=decodeURIComponent(n)}catch(e){i=n}if("_shopify_s"===i){var a=d.slice(t+1).trim();try{return decodeURIComponent(a)}catch(e){return a}}}}}return}catch(e){return}}function d(e){try{"undefined"!=typeof console&&"function"==typeof console.warn&&console.warn(e)}catch(e){}}return function(t,n,i,a){var s,c,u,l,f=arguments.length>4&&void 0!==arguments[4]?arguments[4]:{},p=(c=(s={modern:/Edge?\/(1{2}[4-9]|1[2-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Firefox\/(1{2}[4-9]|1[2-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Chrom(ium|e)\/(9{2}|\d{3,})\.\d+(\.\d+|)|(Maci|X1{2}).+ Version\/(15\.\d+|(1[6-9]|[2-9]\d|\d{3,})\.\d+)([,.]\d+|)( \(\w+\)|)( Mobile\/\w+|) Safari\/|Chrome.+OPR\/(9{2}|\d{3,})\.\d+\.\d+|(CPU[ +]OS|iPhone[ +]OS|CPU[ +]iPhone|CPU IPhone OS|CPU iPad OS)[ +]+(15[._]\d+|(1[6-9]|[2-9]\d|\d{3,})[._]\d+)([._]\d+|)|Android:?[ /-](14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})(\.\d+|)(\.\d+|)|Android.+Firefox\/(15\d|1[6-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+Chrom(ium|e)\/(14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|SamsungBrowser\/([2-9]\d|\d{3,})\.\d+/,legacy:/Edge?\/(1[6-9]|[2-9]\d|\d{3,})\.\d+(\.\d+|)|Firefox\/(5[4-9]|[6-9]\d|\d{3,})\.\d+(\.\d+|)|Chrom(ium|e)\/(5[1-9]|[6-9]\d|\d{3,})\.\d+(\.\d+|)([\d.]+$|.*Safari\/(?![\d.]+ Edge\/[\d.]+$))|(Maci|X1{2}).+ Version\/(10\.\d+|(1[1-9]|[2-9]\d|\d{3,})\.\d+)([,.]\d+|)( \(\w+\)|)( Mobile\/\w+|) Safari\/|Chrome.+OPR\/(3[89]|[4-9]\d|\d{3,})\.\d+\.\d+|(CPU[ +]OS|iPhone[ +]OS|CPU[ +]iPhone|CPU IPhone OS|CPU iPad OS)[ +]+(10[._]\d+|(1[1-9]|[2-9]\d|\d{3,})[._]\d+)([._]\d+|)|Android:?[ /-](14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})(\.\d+|)(\.\d+|)|Mobile Safari.+OPR\/([89]\d|\d{3,})\.\d+\.\d+|Android.+Firefox\/(15\d|1[6-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+Chrom(ium|e)\/(14[89]|1[5-9]\d|[2-9]\d{2}|\d{4,})\.\d+(\.\d+|)|Android.+(UC? ?Browser|UCWEB|U3)[ /]?(15\.([5-9]|\d{2,})|(1[6-9]|[2-9]\d|\d{3,})\.\d+)\.\d+|SamsungBrowser\/(5\.\d+|([6-9]|\d{2,})\.\d+)|Android.+MQ{2}Browser\/(14(\.(9|\d{2,})|)|(1[5-9]|[2-9]\d|\d{3,})(\.\d+|))(\.\d+|)|K[Aa][Ii]OS\/(3\.\d+|([4-9]|\d{2,})\.\d+)(\.\d+|)/}).modern,u=s.legacy,(l=navigator.userAgent).match(e)?"bot":l.match(c)?"modern":l.match(u)?"legacy":l.match(r)?"bot":"unknown"),h=function(e){var r=e.version,t=e.browserTarget,n=e.surface,i=e.shopId,a=e.monorailEndpoint,s=window.location.href;return{emit:function(e){var c,u=e.status,l=e.errorMsg;if(!a)return d("[Web Pixels Manager] No Monorail endpoint provided, skipping logging."),!1;try{var f=(new Date).getTime();c=JSON.stringify({metadata:{event_sent_at_ms:f},events:[{schema_id:"web_pixels_manager_load/3.2",payload:{version:r,bundle_target:t,page_url:s,status:u,surface:n,error_msg:l,shop_id:i,visit_token:o()},metadata:{event_created_at_ms:f}}]})}catch(e){return!1}var p,h=!1;try{"function"==typeof window.navigator.sendBeacon&&-1===(p=window.navigator.userAgent).indexOf("iPhone; CPU iPhone OS 12_")&&-1===p.indexOf("iPad; CPU OS 12_")&&-1===p.indexOf("iPod touch; CPU iPhone OS 12_")&&(h=window.navigator.sendBeacon.bind(window.navigator)(a,c))}catch(e){h=!1}if(h)return!0;try{var m=new XMLHttpRequest;return m.open("POST.html",a,!0),m.setRequestHeader("Content-Type","text/plain"),m.send(c),!0}catch(e){return d("[Web Pixels Manager] Got an unhandled error while logging to Monorail."),!1}}}}({version:i,browserTarget:p,surface:t.surface,shopId:t.shopId,monorailEndpoint:t.monorailEndpoint});if(Boolean(null==(y=null==(m=window.Shopify)?void 0:m.analytics)?void 0:y.replayQueue))h.emit({status:"setup-skipped",errorMsg:"replay queue already initialized."});else{var m,y;h.emit({status:"setup-started"}),window.Shopify=window.Shopify||{};var g=window.Shopify;g.analytics=g.analytics||{};var v=g.analytics;v.replayQueue=[],v.publish=function(e,r,o){return v.replayQueue.push([e,r,o]),!0};try{self.performance.mark("wpm:start")}catch(e){}var w,b="modern"===p?"modern":"legacy",P=(null!=a?a:{modern:"",legacy:""})[b],S=[(w={baseUrl:n,hashVersion:i,buildTarget:b}).baseUrl,"/wpm","/b",w.hashVersion,"modern"===w.buildTarget?"m":"l",".js"].join("");try{f.browserTarget=p,O(function(){try{O(_)}catch(e){h.emit({status:"failed",errorMsg:U(e)})}}),h.emit({status:"loading"})}catch(e){h.emit({status:"failed",errorMsg:U(e)})}}function C(){if(!function(){var e,r;return Boolean(null==(r=null==(e=window.Shopify)?void 0:e.analytics)?void 0:r.initialized)}()){var e=window.webPixelsManager.init(t)||void 0;if(e){var r=window.Shopify.analytics;r.replayQueue.forEach(function(r){var o=r[0],d=r[1],t=r[2];e.publishCustomEvent(o,d,t)}),r.replayQueue=[],r.publish=e.publishCustomEvent,r.visitor=e.visitor,r.initialized=!0}}}function _(){return h.emit({status:"failed",errorMsg:"".concat(S," has failed to load")})}function O(e){var r;!function(e){var r=e.src,o=e.async,d=void 0===o||o,t=e.onload,n=e.onerror,i=e.sri,a=e.scriptDataAttributes,s=void 0===a?{}:a,c=document.createElement("script"),u=document.querySelector("head"),l=document.querySelector("body");if(c.async=d,c.src=r,i&&(c.integrity=i,c.crossOrigin="anonymous"),s)for(var f in s)if(Object.prototype.hasOwnProperty.call(s,f))try{c.dataset[f]=s[f]}catch(e){}if(t&&c.addEventListener("load",t),n&&c.addEventListener("error",n),u)u.appendChild(c);else{if(!l)throw new Error("Did not find a head or body element to append the script");l.appendChild(c)}}({src:S,async:!0,onload:C,onerror:e,sri:(r=P,"string"==typeof r&&/^sha384-[A-Za-z0-9+/=]+$/.test(r)?P:""),scriptDataAttributes:f})}function U(e){return e instanceof Error?e.message:"Unknown error"}}}();wpmLoader({shopId: 73496068161,storefrontBaseUrl: "https://c1esm2-av.myshopify.com",extensionsBaseUrl: "https://extensions.shopifycdn.c../assets/images/web-pixels-manager",monorailEndpoint: "https://c1esm2-av.myshopify.com/.well-known/shopify/monorail/unstable/produce_batch",surface: "storefront-renderer",enabledBetaFlags: ["d5bdd5d0"],webPixelsConfigList: [{"id":"shopify-app-pixel","configuration":"{}","eventPayloadVersion":"v1","runtimeContext":"STRICT","scriptVersion":"0501","apiClientId":"shopify-pixel","type":"APP","privacyPurposes":["ANALYTICS","MARKETING"]},{"id":"shopify-custom-pixel","eventPayloadVersion":"v1","runtimeContext":"LAX","scriptVersion":"0501","apiClientId":"shopify-pixel","type":"CUSTOM","privacyPurposes":["ANALYTICS","MARKETING"]}],isMerchantRequest: false,initData: {"shop":{"name":"My Store","paymentSettings":{"currencyCode":"INR"},"myshopifyDomain":"c1esm2-av.myshopify.com","countryCode":"IN","storefrontUrl":"https:\/\/c1esm2-av.myshopify.com"},"customer":null,"cart":null,"checkout":null,"productVariants":[],"products":[],"purchasingCompany":null},},"../cdn.html","6392291bw48edd0b4p524860cam091f7eea",{"modern":"","legacy":""},{"trekkieShim":true,"agentContext":true,"apiClientId":"580111","themeId":"149251981377","themeStoreId":"887","themePublished":"true","pageType":"page","resourceId":"117508276289","shopId":"73496068161","storefrontBaseUrl":"https:\/\/c1esm2-av.myshopify.com","extensionBaseUrl":"https:\/\/extensions.shopifycdn.com\/cdn\/shopifycloud\/web-pixels-manager","surface":"storefront-renderer","enabledBetaFlags":"[\"d5bdd5d0\"]","isMerchantRequest":"false","hashVersion":"6392291bw48edd0b4p524860cam091f7eea","publish":"custom","events":"[[\"page_viewed\",{}]]"});})();</script><script>
  window.ShopifyAnalytics = window.ShopifyAnalytics || {};
  window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
  window.ShopifyAnalytics.meta.currency = 'INR';
  var meta = {"page":{"pageType":"page","resourceType":"page","resourceId":117508276289,"requestId":"a2d3e667-eafc-40b0-9ea4-d50e278e8625-1784540753"}};
  for (var attr in meta) {
    window.ShopifyAnalytics.meta[attr] = meta[attr];
  }
</script>
<script class="analytics">
  (function () {
    var customDocumentWrite = function(content) {
      var jquery = null;

      if (window.jQuery) {
        jquery = window.jQuery;
      } else if (window.Checkout && window.Checkout.$) {
        jquery = window.Checkout.$;
      }

      if (jquery) {
        jquery('body').append(content);
      }
    };

    var hasLoggedConversion = function(token) {
      if (token) {
        return document.cookie.indexOf('loggedConversion=' + token) !== -1;
      }
      return false;
    }

    var setCookieIfConversion = function(token) {
      if (token) {
        var twoMonthsFromNow = new Date(Date.now());
        twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

        document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
      }
    }

    var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
    window.ShopifyAnalytics.lib.trekkie = window.trekkie;
    if (trekkie.integrations) {
      return;
    }
    trekkie.methods = [
      'identify',
      'page',
      'ready',
      'track',
      'trackForm',
      'trackLink'
    ];
    trekkie.factory = function(method) {
      return function() {
        var args = Array.prototype.slice.call(arguments);
        args.unshift(method);
        trekkie.push(args);
        if (window.__TREKKIE_SHIM_QUEUE && (method == 'track' || method == 'page')) {
          try {
            window.__TREKKIE_SHIM_QUEUE.push({
              from: 'trekkie-stub',
              method: method,
              args: args.slice(1)
            });
          } catch (e) {
            // no-op
          }
        }
        return trekkie;
      };
    };
    for (var i = 0; i < trekkie.methods.length; i++) {
      var key = trekkie.methods[i];
      trekkie[key] = trekkie.factory(key);
    }
    trekkie.load = function(config) {
      trekkie.config = config || {};
      trekkie.config.initialDocumentCookie = document.cookie;
      var first = document.getElementsByTagName('script')[0];
var script = document.createElement('script');
script.type = 'text/javascript';
script.onerror = function(e) {
  var scriptFallback = document.createElement('script');
  scriptFallback.type = 'text/javascript';
  scriptFallback.onerror = function(error) {
          var Monorail = {
      produce: function produce(monorailDomain, schemaId, payload) {
        var currentMs = new Date().getTime();
        var event = {
          schema_id: schemaId,
          payload: payload,
          metadata: {
            event_created_at_ms: currentMs,
            event_sent_at_ms: currentMs
          }
        };
        return Monorail.sendRequest("https://" + monorailDomain + "/v1/produce", JSON.stringify(event));
      },
      sendRequest: function sendRequest(endpointUrl, payload) {
        // Try the sendBeacon API
        if (window && window.navigator && typeof window.navigator.sendBeacon === 'function' && typeof window.Blob === 'function' && !Monorail.isIos12()) {
          var blobData = new window.Blob([payload], {
            type: 'text/plain'
          });

          if (window.navigator.sendBeacon(endpointUrl, blobData)) {
            return true;
          } // sendBeacon was not successful

        } // XHR beacon

        var xhr = new XMLHttpRequest();

        try {
          xhr.open('POST.html', endpointUrl);
          xhr.setRequestHeader('Content-Type', 'text/plain');
          xhr.send(payload);
        } catch (e) {
          console.log(e);
        }

        return false;
      },
      isIos12: function isIos12() {
        return window.navigator.userAgent.lastIndexOf('iPhone; CPU iPhone OS 12_') !== -1 || window.navigator.userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
      }
    };
    Monorail.produce('monorail-edge.shopifysvc.com',
      'trekkie_storefront_load_errors/1.1',
      {shop_id: 73496068161,
      theme_id: 149251981377,
      app_name: "storefront",
      context_url: window.location.href,
      source_url: "<?= $assetPrefix ?>assets/js/trekkie.storefront.51e77662fd67e0d47c7238acfeab529dafb90214.min.js"});

  };
  scriptFallback.async = true;
  scriptFallback.src = '<?= $assetPrefix ?>assets/js/trekkie.storefront.51e77662fd67e0d47c7238acfeab529dafb90214.min.js';
  first.parentNode.insertBefore(scriptFallback, first);
};
script.async = true;
script.src = '<?= $assetPrefix ?>assets/js/trekkie.storefront.51e77662fd67e0d47c7238acfeab529dafb90214.min.js';
first.parentNode.insertBefore(script, first);

    };
    trekkie.load(
      {"Trekkie":{"appName":"storefront","development":false,"defaultAttributes":{"shopId":73496068161,"isMerchantRequest":null,"themeId":149251981377,"themeCityHash":"382954475632359740","contentLanguage":"en","currency":"INR","eventMetadataId":"a1f2879d-263c-47fb-9313-d89e1ea0ef5a"},"isServerSideCookieWritingEnabled":true,"monorailRegion":"shop_domain","enabledBetaFlags":["b5387b81","d5bdd5d0"]},"Session Attribution":{},"S2S":{"facebookCapiEnabled":false,"source":"trekkie-storefront-renderer","apiClientId":580111}}
    );

    var loaded = false;
    trekkie.ready(function() {
      if (loaded) return;
      loaded = true;

      window.ShopifyAnalytics.lib = window.trekkie;

      var originalDocumentWrite = document.write;
      document.write = customDocumentWrite;
      try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
      document.write = originalDocumentWrite;

      var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
      var token = match? match[1]: undefined;
      if (!hasLoggedConversion(token)) {
        setCookieIfConversion(token);
        
      }
    });

    window.ShopifyAnalytics.lib.page(null,{"pageType":"page","resourceType":"page","resourceId":117508276289,"requestId":"a2d3e667-eafc-40b0-9ea4-d50e278e8625-1784540753","shopifyEmitted":true});

    var eventsListenerScript = document.createElement('script');
    eventsListenerScript.async = true;
    eventsListenerScript.src = "<?= $assetPrefix ?>assets/js/shop_events_listener-4e26a9ce.js";
    document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
})();</script>
<script
  defer
  src="<?= $assetPrefix ?>assets/js/shopify-perf-kit-3.7.0.min.js"
  data-application="storefront-renderer"
  data-shop-id="73496068161"
  data-render-region="gcp-asia-southeast1"
  data-page-type="page"
  data-theme-instance-id="149251981377"
  data-theme-name="Dawn"
  data-theme-version="15.5.0"
  data-monorail-region="shop_domain"
  data-resource-timing-sampling-rate="10"
  data-shs="true"
  data-shs-beacon="true"
  data-shs-export-with-fetch="true"
  data-shs-logs-sample-rate="1"
  data-shs-beacon-endpoint="https://c1esm2-av.myshopify.com/api/collect"
></script>
<meta name="shopify-y" content="42ec3478-6bf2-4fff-84f5-09fc7e7f3c4d">
</head>


  <body class="gradient animate--hover-3d-lift">
    <a class="skip-to-content-link button visually-hidden" href="#MainContent">
      Skip to content
    </a><!-- BEGIN sections: header-group -->
<div id="shopify-section-sections--20655586246721__announcement-bar" class="shopify-section shopify-section-group-header-group announcement-bar-section"><link href="<?= $assetPrefix ?>assets/css/component-slideshow244c.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-sliderf699.css" rel="stylesheet" type="text/css" media="all" />

  <link href="<?= $assetPrefix ?>assets/css/component-list-socialf800.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?= $assetPrefix ?>assets/css/component-search2677.css" media="print" onload="this.media='all'">
<link rel="stylesheet" href="<?= $assetPrefix ?>assets/css/component-menu-drawer97e4.css" media="print" onload="this.media='all'">
<link
  rel="stylesheet"
  href="<?= $assetPrefix ?>assets/css/component-cart-notification585f.css"
  media="print"
  onload="this.media='all'"
><link rel="stylesheet" href="<?= $assetPrefix ?>assets/css/component-priced9e8.css" media="print" onload="this.media='all'"><link rel="stylesheet" href="<?= $assetPrefix ?>assets/css/component-mega-menu3890.css" media="print" onload="this.media='all'">


<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "My Store",
    
      "logo": "https:\/\/c1esm2-av.myshopify.com\/cdn\/shop\/files\/Madan_Bihari_graphic_logo_15f2c70d-f090-4dc8-bd4d-d8265e4181da.svg?v=1783409269\u0026width=500",
    
    "sameAs": [
      "",
      "about-us.html\/\/www.facebook.com\/profile.php?id=61590971671129",
      "",
      "about-us.html\/\/www.instagram.com\/madan_bihari_handicraft?utm_source=qr",
      "",
      "",
      "",
      "",
      ""
    ],
    "url": "https:\/\/c1esm2-av.myshopify.com\/pages\/about-us"
  }
</script>


  <script>
      window.shopUrl = '../index.html';
      window.routes = {
        cart_add_url: '/cart/add',
        cart_change_url: '/cart/change',
        cart_update_url: '/cart/update',
        cart_url: '/cart',
        predictive_search_url: '/search/suggest',
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
    </script><script src="<?= $assetPrefix ?>assets/js/predictive-search8c8a.js" defer="defer"></script><script src="../../cdn.shopify.com/storefront/standard-actions.js" type="module" data-source-attribution="shopify.standard_actions"></script>

    <link href="<?= $assetPrefix ?>assets/css/section-footerf845.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-newsletter4c4a.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-list-menu717c.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-list-paymentc213.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-list-socialf800.css" rel="stylesheet" type="text/css" media="all" />


<!-- canvas-painting.php -->

<link href="<?= $assetPrefix ?>assets/css/component-cardd404.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-priced9e8.css" rel="stylesheet" type="text/css" media="all" />

<link href="<?= $assetPrefix ?>assets/css/component-show-more03fd.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-swatch-input7610.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $assetPrefix ?>assets/css/component-swatch15ca.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?= $assetPrefix ?>assets/js/show-more814a.js" defer="defer"></script>

 <script>
      window.shopUrl = '../index.html';
      window.routes = {
        cart_add_url: '/cart/add',
        cart_change_url: '/cart/change',
        cart_update_url: '/cart/update',
        cart_url: '/cart',
        predictive_search_url: '/search/suggest',
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
    </script><script src="<?= $assetPrefix ?>assets/js/predictive-search8c8a.js" defer="defer"></script><script src="../../cdn.shopify.com/storefront/standard-actions.js" type="module" data-source-attribution="shopify.standard_actions"></script>


        