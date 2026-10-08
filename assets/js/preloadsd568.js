
    (function() {
      var preconnectOrigins = ["https://cdn.shopify.com"];
      var scripts = ["/cdn/shopifycloud/checkout-web/assets/c1/polyfills-legacy.DHqi3tCc.js","/cdn/shopifycloud/checkout-web/assets/c1/app-legacy.DzKhBitJ.js","/cdn/shopifycloud/checkout-web/assets/c1/esnext-vendor-legacy.Dh5TdVKp.js","/cdn/shopifycloud/checkout-web/assets/c1/context-browser-legacy.DQ1T2lro.js","/cdn/shopifycloud/checkout-web/assets/c1/useShopPayExternalAppContext-legacy.BxB1XaDT.js","/cdn/shopifycloud/checkout-web/assets/c1/addresses-mailing-address-legacy.BhCskTWs.js","/cdn/shopifycloud/checkout-web/assets/c1/Title-legacy.C0qCEsF7.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useShopPayCheckoutGqlVersion-legacy.lY-pFNR4.js","/cdn/shopifycloud/checkout-web/assets/c1/utils-shopId-legacy.CoilhBO4.js","/cdn/shopifycloud/checkout-web/assets/c1/payment-methods-filterAvailableMethods-legacy.CpY1z5EC.js","/cdn/shopifycloud/checkout-web/assets/c1/shop-pay-normalizeBuyerDetails-legacy.9VLxQ3G8.js","/cdn/shopifycloud/checkout-web/assets/c1/graphql-UserPrivacySettingsSetMutation-legacy.BtARxN9b.js","/cdn/shopifycloud/checkout-web/assets/c1/utils-getCommonShopPayExternalTelemetryAttributes-legacy.IlkD3eg-.js","/cdn/shopifycloud/checkout-web/assets/c1/extensions-rpc-legacy.DAmUk3Ci.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useUnauthenticatedErrorModal-legacy.GbLNJyFo.js","/cdn/shopifycloud/checkout-web/assets/c1/hydrate-legacy.BXhEVBAr.js","/cdn/shopifycloud/checkout-web/assets/c1/locale-en-legacy.D2BfJlft.js","/cdn/shopifycloud/checkout-web/assets/c1/page-OnePage-legacy.DKoe3ZHJ.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useWalletsTimeout-legacy.DAY7V0fs.js","/cdn/shopifycloud/checkout-web/assets/c1/MarketsProDisclaimer-legacy.DyrX5fHV.js","/cdn/shopifycloud/checkout-web/assets/c1/remember-me-hooks-legacy.B49ixhdP.js","/cdn/shopifycloud/checkout-web/assets/c1/color-contrast-colorContrast-legacy.-FryoF9Z.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useHasOrdersFromMultipleShops-legacy.D1I1OCiw.js","/cdn/shopifycloud/checkout-web/assets/c1/OffsitePaymentFailed-legacy.cAi3pJuB.js","/cdn/shopifycloud/checkout-web/assets/c1/NoAddressLocationFullDetour-legacy.Dn8_7RbI.js","/cdn/shopifycloud/checkout-web/assets/c1/components-DeliveryTransition-legacy.B2rK25a7.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useGeneralPaymentErrorMessage-legacy.DueY-Qnb.js","/cdn/shopifycloud/checkout-web/assets/c1/ChangeCompanyLocationLink-legacy.MhSg-CxO.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useStableHostMethodsReferences-legacy.CxwAP6lu.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useSandboxTelemetry-legacy.CQt9kFF5.js","/cdn/shopifycloud/checkout-web/assets/c1/BillingAddressForm-legacy.BOiEp-zt.js","/cdn/shopifycloud/checkout-web/assets/c1/PhoneField-legacy.Cof8rbBd.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useFormattedPhoneNumber-legacy.CrW661zv.js","/cdn/shopifycloud/checkout-web/assets/c1/EmptyState-legacy.Csj8FpaA.js","/cdn/shopifycloud/checkout-web/assets/c1/Choice-legacy.C8ztHk3h.js","/cdn/shopifycloud/checkout-web/assets/c1/Checkbox-legacy.Ckhvu7Hg.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-usePostPurchase-legacy.CrKpmXCj.js","/cdn/shopifycloud/checkout-web/assets/c1/Interaction-tracker-legacy.Bn5lfuUp.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useCanChangeCompanyLocation-legacy.BnoZ9V1x.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useForceShopPayUrl-legacy.DSNPk1Qp.js","/cdn/shopifycloud/checkout-web/assets/c1/ShopPayLogo-legacy.KVZZcC4j.js","/cdn/shopifycloud/checkout-web/assets/c1/AutocompleteField-hooks-legacy.CC7pbucF.js","/cdn/shopifycloud/checkout-web/assets/c1/PendingShipping-legacy.D6p_jBaZ.js","/cdn/shopifycloud/checkout-web/assets/c1/ImpressionEventCapture-legacy.DO4niy-s.js","/cdn/shopifycloud/checkout-web/assets/c1/StoreCreditRedemption-StoreCreditRedemptionErrorBanner-legacy.DjqJJEhy.js","/cdn/shopifycloud/checkout-web/assets/c1/PaymentIcon-legacy.CrP1eSHq.js","/cdn/shopifycloud/checkout-web/assets/c1/shop-cash-context-legacy.8JB-Mk-v.js","/cdn/shopifycloud/checkout-web/assets/c1/PaymentLine-legacy.BhLE0tAh.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useShopPayProgressIntercepts-legacy.C_d-sIFu.js","/cdn/shopifycloud/checkout-web/assets/c1/billing-address-hooks-legacy.BWW9XnMW.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useShowShopPayOptin-legacy.CjIJM5cO.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useUpdateCheckoutAddress-legacy.CmMXfZzG.js","/cdn/shopifycloud/checkout-web/assets/c1/Section-legacy.DXAinIPU.js","/cdn/shopifycloud/checkout-web/assets/c1/useShopPaySessionTokenStorage-legacy.BAZbFOqa.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useOnePageFormSubmit-legacy.B3SuvXGz.js","/cdn/shopifycloud/checkout-web/assets/c1/PaymentButtons-legacy.BWHxgLn5.js","/cdn/shopifycloud/checkout-web/assets/c1/utilities-shop-pay-alternative-payment-flow-legacy.CUSUcdxH.js","/cdn/shopifycloud/checkout-web/assets/c1/shop-cash-monorail-legacy.DXCYIqVD.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-useAvailableShopPromotionDiscount-legacy.fUXha7Ro.js","/cdn/shopifycloud/checkout-web/assets/c1/BillingAddressSelector-legacy.iUXkwaS9.js","/cdn/shopifycloud/checkout-web/assets/c1/PaymentErrorBanner-legacy.BC0vFOiz.js","/cdn/shopifycloud/checkout-web/assets/c1/Switch-legacy.DqzwwL92.js","/cdn/shopifycloud/checkout-web/assets/c1/shipping-rates-progressiveShippingRatesLoading-legacy.CEv02itc.js","/cdn/shopifycloud/checkout-web/assets/c1/ShipmentBreakdown-legacy.aq5XztuJ.js","/cdn/shopifycloud/checkout-web/assets/c1/MerchandiseModal-legacy.BuHfNg9i.js","/cdn/shopifycloud/checkout-web/assets/c1/extension-targets-shipping-options-legacy.Cg3qDBSs.js","/cdn/shopifycloud/checkout-web/assets/c1/EstimatedDeliveryContent-legacy.IU29F0ul.js","/cdn/shopifycloud/checkout-web/assets/c1/ShippingMethodRateLabel-legacy.BpV6Dx-f.js","/cdn/shopifycloud/checkout-web/assets/c1/StackedMerchandisePreview-legacy.PhoRMJ6v.js","/cdn/shopifycloud/checkout-web/assets/c1/ShippingMethodSelector-legacy.DqPf-f2K.js","/cdn/shopifycloud/checkout-web/assets/c1/TextArea-legacy.CtIeDx7y.js","/cdn/shopifycloud/checkout-web/assets/c1/SubscriptionPriceBreakdown-legacy.D8hRTxos.js","/cdn/shopifycloud/checkout-web/assets/c1/hooks-usePaypalRowEffects-legacy.C8F5G_29.js","/cdn/shopifycloud/checkout-web/assets/c1/Middot-legacy.rW9VqDLl.js","/cdn/shopifycloud/checkout-web/assets/c1/ShippingGroupsSummaryLine-legacy.Ccd_Xy2U.js","/cdn/shopifycloud/checkout-web/assets/c1/StockProblems-StockProblemsLineItemList-legacy.B2rwyXEO.js","/cdn/shopifycloud/checkout-web/assets/c1/utilities-publishMessage-legacy.bqbsik9C.js"];
      var styles = [];
      var fontPreconnectUrls = [];
      var fontPrefetchUrls = [];
      var imgPrefetchUrls = [];

      function preconnect(url, callback) {
        var link = document.createElement('link');
        link.rel = 'dns-prefetch preconnect';
        link.href = url;
        link.crossOrigin = '';
        link.onload = link.onerror = callback;
        document.head.appendChild(link);
      }

      function preconnectAssets() {
        var resources = preconnectOrigins.concat(fontPreconnectUrls);
        var index = 0;
        (function next() {
          var res = resources[index++];
          if (res) preconnect(res, next);
        })();
      }

      function prefetch(url, as, callback) {
        var link = document.createElement('link');
        if (link.relList.supports('prefetch')) {
          link.rel = 'prefetch';
          link.fetchPriority = 'low';
          link.as = as;
          if (as === 'font') link.type = 'font/woff2';
          link.href = url;
          link.crossOrigin = '';
          link.onload = link.onerror = callback;
          document.head.appendChild(link);
        } else {
          var xhr = new XMLHttpRequest();
          xhr.open('GET', url, true);
          xhr.onloadend = callback;
          xhr.send();
        }
      }

      function prefetchAssets() {
        var resources = [].concat(
          scripts.map(function(url) { return [url, 'script']; }),
          styles.map(function(url) { return [url, 'style']; }),
          fontPrefetchUrls.map(function(url) { return [url, 'font']; }),
          imgPrefetchUrls.map(function(url) { return [url, 'image']; })
        );
        var index = 0;
        function run() {
          var res = resources[index++];
          if (res) prefetch(res[0], res[1], next);
        }
        var next = (self.requestIdleCallback || setTimeout).bind(self, run);
        next();
      }

      function onLoaded() {
        try {
          if (parseFloat(navigator.connection.effectiveType) > 2 && !navigator.connection.saveData) {
            preconnectAssets();
            prefetchAssets();
          }
        } catch (e) {}
      }

      if (document.readyState === 'complete') {
        onLoaded();
      } else {
        addEventListener('load', onLoaded);
      }
    })();
  