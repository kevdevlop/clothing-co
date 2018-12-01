<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	
	<script type="text/javascript">
		// $('.block2-btn-addcart').each(function(){
		// 	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		// 	$(this).on('click', function(){
		// 		swal(nameProduct, "is added to cart !", "success");
		// 	});
		// });

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.method_pay').on('change', function () {
			// body...
			$( ".method_pay option:selected" ).each(function() {
		      str = $( this ).val();
		      var value= "";
				if (str === "pay_cash") {
					value = "<input type=\"hidden\" name=\"cash\" value=\"cash\">\n" +
								"<input type=\"hidden\" name=\"name_bank_cash\" value=\"Banamex\">"+
								"<input type=\"hidden\" name=\"account_cash\" value=\"345432345324532\">"+
						        "\t\t\t\t\t\t\t<p class=\"s-text8\">\n" +
						        "\t\t\t\t\t\t\t\tNúmero de cuenta para hacer el deposito\n" +
						        "\t\t\t\t\t\t\t</p>\n" +
						        "\t\t\t\t\t\t\t<div class=\"size13 bo4 m-b-12\">\n" +
						        "\t\t\t\t\t\t\t\t<p class=\"sizefull s-text7 p-l-15 p-r-15\">Banamex</p>\n" +
						        "\t\t\t\t\t\t\t</div>\n" +
						        "\t\t\t\t\t\t\t<div class=\"size13 bo4 m-b-12\">\n" +
						       "\t\t\t\t\t\t\t\t<p class=\"sizefull s-text7 p-l-15 p-r-15\">345432345324532</p>\n" +
						        "\t\t\t\t\t\t\t</div>";
					
				}else if (str === "pay_card"){
					value = "<input type=\"hidden\" name=\"card\" value=\"card\">\n" +
					        "\t\t\t\t\t\t\t<div class=\"size13 bo4 m-b-12\">\n" +
					        "\t\t\t\t\t\t\t\t<input class=\"sizefull s-text7 p-l-15 p-r-15\" type=\"text\" name=\"name_bank_card\" placeholder=\"Banco\" required>\n" +
					        "\t\t\t\t\t\t\t</div>\n" +
					        "\t\t\t\t\t\t\t<div class=\"size13 bo4 m-b-12\">\n" +
					        "\t\t\t\t\t\t\t\t<input class=\"sizefull s-text7 p-l-15 p-r-15\" type=\"text\" name=\"name_client_card\" placeholder=\"Nombre del Titular\" required>\n" +
					        "\t\t\t\t\t\t\t</div>\n" +
					        "\t\t\t\t\t\t\t<div class=\"size13 bo4 m-b-22\">\n" +
					        "\t\t\t\t\t\t\t\t<input class=\"sizefull s-text7 p-l-15 p-r-15\" type=\"text\" name=\"number_card\" placeholder=\"Número de tarjeta\" required>\n" +
					        "\t\t\t\t\t\t\t</div>\n" +
					        "\t\t\t\t\t\t\t<div class=\"size13 bo4 m-b-22\">\n" +
					        "\t\t\t\t\t\t\t\t<input class=\"sizefull s-text7 p-l-15 p-r-15\" type=\"text\" name=\"cvv\" placeholder=\"cvv\" required>\n" +
					        "\t\t\t\t\t\t\t</div>";
					
				}
				$('.pay').html("");
				$('.pay').html(value);
		    });
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 5000 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 5000
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>