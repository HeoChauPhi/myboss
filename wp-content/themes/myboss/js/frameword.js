function remove_unicode(str)
{
	  str= str.toLowerCase();
	  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
	  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
	  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
	  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
	  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
	  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
	  str= str.replace(/đ/g,"d");
	  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");

	  str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
	  str= str.replace(/^\-+|\-+$/g,"");

	  return str;
}

jQuery(document).ready(function($) {
  // init Isotope
  $(".package-product .isotope .item").equalHeight();
  $(".package-product .isotope .item .group-content").equalHeight();
  $(".package-product #filters .filters-items").equalHeight();
  $(".package-product #filters .filters-items").Height();
  $(".package-product #filters .filters-items button").equalHeight();
  $(".package-product #filters .filters-items button").Height();

  var $container = $('.isotope').isotope({
    itemSelector: '.item',
    layoutMode: 'fitRows',
    getSortData: {
      number: '.number parseInt',
      category: '[data-category]'
    },
    animate: {
      duration: 750,
      easing: 'linear',
      queue: false
    }
  });

  var filters_items = $(".package-product #filters .filters-items")
  filters_items.click(function(){
    filters_items.removeClass("active");
    $(this).addClass("active");
  });
  $(".package-product #filters > .description").equalHeight();
  var height_des = $(".package-product #filters > .description").outerHeight();
  $(".package-product #filters").css("padding-bottom", height_des);

  // filter items on button click
  $('#filters').on( 'click', '.filters-items', function() {
    var filterValue = $(this).find("button").attr('data-filter');
    $container.isotope({
      filter: filterValue
    });
  });
  // bind sort button click
  /* $('#sorts').on( 'click', 'button', function() {
    var sortByValue = $(this).attr('data-sort-by');
    $container.isotope({ sortBy: sortByValue });
  }); */
  // add equahright for filter category
  $(".filters-content .filters-items").equalHeight();
  $(".package-products .package-product-content .group-image, .package-products .package-product-content .group-content").equalHeight();
  $(".page-taoxonomy .list-product-category .items-content .group-content").equalHeight();

  // add js for product package page

  //alert(form_class);
  $(".package-products .relationship form > div").each(function(){
    var class_name = $(this).attr('class');
    $("."+class_name).wrapAll("<div class='relationship-group "+class_name+"'></div>");
    //$(".relationship-group").prepend( "<h2>"+ +"</h2>" );
    $(this).addClass("relationship-items");
    $(".relationship-group .relationship-group").remove();
  });

  var form_class = $(".relationship form").attr("class");
  if ($(".relationship form").length) {
    var substr = form_class.split(' ');
    for(var i=0; i< substr.length; i++) {
      $("#"+substr[i]).attr("data-filter", 1);
    }
  }
  var price_product = parseInt($(".package-product-content .product-price input").val(),10);
  $(".relationship-group").each(function(){
    $(this).find(".relationship-items:first-child").before($(this).find(".relationship-items:first-child .category"));
    $(this).find(".relationship-items .category").remove();
    $(this).find('.relationship-items[data-filter*="1"] .chose-items').attr("checked", "checked");
    var link_items_product = $(this).find('.relationship-items[data-filter*="1"] .read-more').attr("href");
    var name_items_product = $(this).find('.relationship-items[data-filter*="1"] .product-title').text();
    $(".group-product-items-package").append(name_items_product + ": " + link_items_product + " ---------- ");
    $(this).find(".chose-items").click(function(){
      //$(this).parents('.relationship-items').find(".chose-items").removeAttr("checked");
      $(this).parents('.relationship-group').find('.relationship-items').removeAttr("data-filter");
      //$(this).attr("checked", "checked");
      $(this).parents(".relationship-items").attr("data-filter", 1);
      $(".package-product-content .product-price input").val(price_product);
      /* var price_items = parseInt($(this).val(),10);
      var new_price = price_product + price_items;
      $(".package-product-content .product-price input").attr("value", new_price); */
      $(".group-product-items-package").empty();
      $(".relationship-group").each(function(){
        var link_items_product = $(this).find('.relationship-items[data-filter*="1"] .read-more').attr("href");
        var name_items_product = $(this).find('.relationship-items[data-filter*="1"] .product-title').text();
        $(".group-product-items-package").append(name_items_product + ": " + link_items_product + " ---------- ");
      });
    });
  });

  var sum_sale = parseInt($(".sale-package-price").attr("value"));
  //$("#sum-sale").html(sum_sale);
  $('.chose-items:checked').each(function() {
    calculateSum();
  });
  function calculateSum() {

    var sum = 0;
    //iterate through each textboxes and add the values
    $(".chose-items:checked").each(function() {

      //add only if the value is number
      if(!isNaN(this.value) && this.value.length!=0) {
      sum += parseFloat(this.value);
      }

    });
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $("#sum").html(sum.toFixed());
    var new_price = sum.toFixed() - sum_sale.toFixed();
    $("#sum-sale").html(new_price);
    $(".price-value").attr("value", new_price);
    //alert(total);
    $(".chose-items").click(function(){
      var total = 0;
      $(this).parents('.relationship-items').find(".chose-items").removeAttr("checked");
      $(this).attr("checked", "checked");
      $(".chose-items:checked").each(function() {

        //add only if the value is number
        if(!isNaN(this.value) && this.value.length!=0) {
          total += parseFloat(this.value);
        }

      });
      $("#sum").html(total.toFixed());
      var new_price = total.toFixed() - sum_sale.toFixed();
      $("#sum-sale").html(new_price);
      $(".price-value").attr("value", new_price);
      $("#sum, #sum-sale").number( true );
    });

  }
    // for list package product
    $(".isotope .item").each(function() {
      var sum_sale = parseInt($(this).find(".sale-package-price").attr("value"));
      var total_price = 0;
      $(this).find('.price-total-item').each(function() {
          total_price += Number($(this).val());
      });
      var new_price = total_price.toFixed() - sum_sale.toFixed();
      $(this).find("#sum").html(new_price);
    });
  //var product_price = $(".product-price");
  $(".package-products .product-price").scrollToFixed();

  //add js creat popup pay
  $('#my-button').bind('click', function(e) {
    e.preventDefault();
    $('.product-add-cart').bPopup({
      modalClose: false,
      opacity: 0.6,
      positionStyle: 'fixed' //'fixed' or 'absolute'
    });
  });

  //add number
  $(".price-total, .sale-package-price, #sum, #sum-sale").number( true );
  //$(".sale-package-price").number( true );

  //change position message
  $("#my-button").after($(".product-add-cart .wpcf7-response-output"));

  //change position relationship-group
  $(".relationship .cpu-bo-vi-xu-ly, .get-product .cpu-bo-vi-xu-ly").addClass("relationship-group-0");
  $(".relationship .mainboard-bo-mach-chu, .get-product .mainboard-bo-mach-chu").addClass("relationship-group-1");
  $(".relationship .ram-bo-nho-trong, .get-product .ram-bo-nho-trong").addClass("relationship-group-2");
  $(".relationship .vga-card-man-hinh, .get-product .vga-card-man-hinh").addClass("relationship-group-3");
  $(".relationship .hdd-o-cung, .get-product .hdd-o-cung").addClass("relationship-group-4");
  $(".relationship .ssd-o-cung-the-ran, .get-product .ssd-o-cung-the-ran").addClass("relationship-group-5");
  $(".relationship .psu-nguon-may-tinh, .get-product .psu-nguon-may-tinh").addClass("relationship-group-6");
  $(".relationship .case-vo-may-tinh, .get-product .case-vo-may-tinh").addClass("relationship-group-7");
  $(".relationship .den-led, .get-product .den-led").addClass("relationship-group-8");
  $(".relationship .do-choi-pc, .get-product .do-choi-pc").addClass("relationship-group-9");
  $(".relationship .monitor-man-hinh-may-tinh, .get-product .monitor-man-hinh-may-tinh").addClass("relationship-group-10");
  $(".relationship > form, .get-product > form").prepend($(".relationship-group.cpu-bo-vi-xu-ly"));
  $(".relationship-group.relationship-group-0").after($(".relationship-group.relationship-group-1"));
  $(".relationship-group.relationship-group-1").after($(".relationship-group.relationship-group-2"));
  $(".relationship-group.relationship-group-2").after($(".relationship-group.relationship-group-3"));
  $(".relationship-group.relationship-group-3").after($(".relationship-group.relationship-group-4"));
  $(".relationship-group.relationship-group-4").after($(".relationship-group.relationship-group-5"));
  $(".relationship-group.relationship-group-5").after($(".relationship-group.relationship-group-6"));
  $(".relationship-group.relationship-group-6").after($(".relationship-group.relationship-group-7"));
  $(".relationship-group.relationship-group-7").after($(".relationship-group.relationship-group-8"));
  $(".relationship-group.relationship-group-8").after($(".relationship-group.relationship-group-9"));
  $(".relationship-group.relationship-group-9").after($(".relationship-group.relationship-group-10"));

  // add js for get product
  function displayVals() {
    var total_product = 0;

    $(".get-product-item .getproducts").each(function() {

        //add only if the value is number
        if(!isNaN(this.value) && this.value.length!=0) {
        total_product += parseFloat(this.value);
        }
    });
    $(".total").html(total_product);
    $(".price-get-value").attr("value", total_product);
    $(".total").number( true );
  }
  $( "select" ).change( displayVals );
  displayVals();

  $('.generate-product-action .single_add_to_cart_button').on('click', function() {
  	$('.product-add-cart textarea.group-product-get-items').empty();
	  $(".get-product-item").each(function() {
	    var product_selected_price = $(this).find(".getproducts").val();
	    var product_selected_label = $(this).find("> span").text();
	    var product_selected_name = $(this).find(".getproducts option:selected").text();

	    $('.product-add-cart textarea.group-product-get-items').append(product_selected_label + ": " + product_selected_name + " ---------- ");
	  });
	});

  $(".generate-product").on('click', function() {
    $(".generate-product-wrapper").empty();
    $('#history-form .panel-group').empty();
    $("#editor").empty();
    $(".get-product-item").each(function() {
      var product_selected_price = $(this).find(".getproducts").val();
      var product_selected_label = $(this).find("> span").text();
      var product_selected_name = $(this).find(".getproducts option:selected").text();

      // for img get product
      $(".generate-product-wrapper").append(
        '<div class="generate-product-item"><label>'
        + product_selected_label +
        '</label><span class="title-product">'
        + product_selected_name +
        '</span><span class="price-product-wrap"><span class="price-product">'
        + product_selected_price +
        '</span> đ</span></div>'
      );
      $(".price-product").number( true );

	    // for PDF get product
	    $('#history-form .panel-group').append(
	      '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#">'
	      + remove_unicode(product_selected_label) +
	      '</a></h4></div>'+
	      '<div class="panel-collapse collapse"><div class="panel-body">'+
	      	'<div class="form-group unuelement-input">'+
		      	'<label for="Ten linh kien" class="control-label">Ten linh kien</label>'+
		      	'<input type="text" class="form-control" id="'+ remove_unicode(product_selected_name) +'" value="'+ remove_unicode(product_selected_name) +'">'+
	      	'</div>'+
	      	'<div class="form-group unuelement-input">'+
		      	'<label for="Gia" class="control-label">Gia</label>'+
		      	'<input type="text" class="form-control pfd-price-product" id="'+ product_selected_price +'" value="'+ product_selected_price +' vnd">'+
	      	'</div>'+
	      '</div></div></div>'
	    );
    });
    $(".generate-product-wrapper").append(
      '<div class="generate-product-total"><label>Tổng giá: </label><label class="generate-total">'
      + $(".get-product-total .total").text() +
      '</label><label> đ</label></div>'
    );

    $('#history-form .panel-group').append(
	      '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#">Tong gia</a></h4></div>'+
	      '<div class="panel-collapse collapse"><div class="panel-body">'+
	      	'<div class="form-group unuelement-input">'+
		      	'<label for="Ten linh kien" class="control-label"></label>'+
		      	'<input type="text" class="form-control" id="'+ $(".get-product-total .total").text() +'" value="'+ $(".get-product-total .total").text() +' vnd">'+
	      	'</div>'+
	      '</div></div></div>'
	    );
  });

  $(".reset-generate-product").on('click', function() {
    $(".generate-product-wrapper").empty();
    $('#history-form .panel-group').empty();
    $("#editor").empty();
    $(".get-product-total .total").text("0");
  });

  $('.get-product-total').scrollToFixed( {
    bottom: 0,
    limit: $('.get-product-total').offset().top,
  });


  $("#history-form").UNUGeneratePDF();
  $("#pdfGenerate").on('click', function(event){
    $("#history-form").UNUGeneratePDF('generatePDF');
    event.preventDefault();
  });
});
