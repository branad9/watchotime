jQuery(function(_){return"undefined"!=typeof woocommerce_price_slider_params&&(_(document.body).on("price_slider_create price_slider_slide",function(e,r,i){_(".price_slider_amount span.from").html(accounting.formatMoney(r,{symbol:woocommerce_price_slider_params.currency_format_symbol,decimal:woocommerce_price_slider_params.currency_format_decimal_sep,thousand:woocommerce_price_slider_params.currency_format_thousand_sep,precision:woocommerce_price_slider_params.currency_format_num_decimals,format:woocommerce_price_slider_params.currency_format})),_(".price_slider_amount span.to").html(accounting.formatMoney(i,{symbol:woocommerce_price_slider_params.currency_format_symbol,decimal:woocommerce_price_slider_params.currency_format_decimal_sep,thousand:woocommerce_price_slider_params.currency_format_thousand_sep,precision:woocommerce_price_slider_params.currency_format_num_decimals,format:woocommerce_price_slider_params.currency_format})),_(document.body).trigger("price_slider_updated",[r,i])}),e(),_(document.body).on("init_price_filter",e),void("undefined"!=typeof wp&&wp.customize&&wp.customize.selectiveRefresh&&wp.customize.widgetsPreview&&wp.customize.widgetsPreview.WidgetPartial&&wp.customize.selectiveRefresh.bind("partial-content-rendered",function(){e()})));function e(){_("input#min_price, input#max_price").hide(),_(".price_slider, .price_label").show();var e=_(".price_slider_amount #min_price").data("min"),r=_(".price_slider_amount #max_price").data("max"),i=_(".price_slider_amount").data("step")||1,c=_(".price_slider_amount #min_price").val(),o=_(".price_slider_amount #max_price").val();_(".price_slider:not(.ui-slider)").slider({range:!0,animate:!0,min:e,max:r,step:i,values:[c,o],create:function(){_(".price_slider_amount #min_price").val(c),_(".price_slider_amount #max_price").val(o),_(document.body).trigger("price_slider_create",[c,o])},slide:function(e,r){_("input#min_price").val(r.values[0]),_("input#max_price").val(r.values[1]),_(document.body).trigger("price_slider_slide",[r.values[0],r.values[1]])},change:function(e,r){_(document.body).trigger("price_slider_change",[r.values[0],r.values[1]])}})}});
;