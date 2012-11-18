	//Custom Placeholder?

	$('#contenu').focus(function(){
		$('#contenu').attr('Placeholder', '');
	});

	$('#contenu').focusout(function(){
		$('#contenu').attr('Placeholder', 'Votre lien');
	});

	//Slideshow thingie

	var i = 2;
	var cadre = $(".cadre");
	var cadreLength = $(".cadre a").length;
	var imgCadre = $(".cadre a img");

	imgCadre.css('max-width','100px');
	imgCadre.css('max-height','120px');

	cadre.css('overflow', 'visible');
	cadre.css('height', 'auto');

	$("#imagePrev").css('display', 'inline-block');
	$("#imageNext").css('display', 'inline-block');

	var slider=function(i){
		var prev = i-1;
		var next = i+1;

		$(".cadre a").hide();
		$(".cadre a:nth-child("+prev+")").show();
		$(".cadre a:nth-child("+i+")").show();
		$(".cadre a:nth-child("+next+")").show();
	}

	slider(i);
         
    $("#imagePrev").click(function(){
    	if(i>2)
    	{
    		i= i-1;
    	}
    	slider(i);
    });
        
    $("#imageNext").click(function(){
    	if(i<cadreLength)
    	{
    		i++;
    	}
    	slider(i);
    });

	//Ajax

	$(".supprimerLien").on("click", function(event){

		var $this = $(this);

		event.preventDefault();

		var href= $(this).attr("href");
		
		$.ajax({
			url: href,
			success: function(data){
				
				$this.parent().parent().fadeOut(1000, function() {
					$this.parent().parent().hide().text(data).fadeIn('normal').fadeOut(4000);
				});

			}
		});

	});

	$("#submitFinal").on("click", function(event){

		event.preventDefault();

		var href= $(this).parent().attr("action");

		//récupérer les éléments des champs

		var getLienSupprimer = $(".supprimerLien").attr("href")

		var lienSupprimer = getLienSupprimer .replace(/(\d+)+/g, function(match, number) {
       	return parseInt(number)+1; });

		var getLienModifier = $(".modifierLien").attr("href");

		var lienModifier = getLienModifier.replace(/(\d+)+/g, function(match, number) {
       	return parseInt(number)+1; });

		var lien = $('#contenu').attr("value");
		var description = $('#description').attr("value");
		var titre = $('#titre').attr("value");
		var images = $('#hiddenImages').attr("value");
		var baseUrl =  $('#BaseUrl').attr("value");

		var formData = {'contenu' : lien,
						'hiddenDescription' : description,
						'hiddenTitre' : titre,
						'hiddenImages': images,
						'baseUrl': baseUrl,
						'lienSupprimer':'lienSupprimer',
						'lienModifier':'lienModifier'
						};

		$.ajax({

			url: href,
			type: "POST",
			data: formData,
			success: function(data){

				var formulaire = $("form");

				formulaire.fadeOut('normal', function(){
				});


				var inputContent = "<article class='impair'><h3>"+titre+"</h3><a class='visit' href='"+lien+"'>Visitez ce site !</a><p>"+description+"</p><img src="+images+" /><div id='modify'><a href='"+lienSupprimer+"' class='supprimerLien' title='Supprimez ce lien !'>[X]</a><a href='"+lienModifier+"' class='modifierLien' title='Modifiez ce lien !'>[Modifier]</a></div></article>";

				$("#body section").prepend(inputContent);
				$("#dashboard").append("<form method='post' accept-charset='utf-8' action='"+baseUrl+"lien/verifier'> <label for='contenu'>Votre Lien :</label><input id='contenu' type='text' value='' name='contenu'><input id='submit' type='submit' value='Partager !' name='check'> </form> <p id='ajout'></p> <br />");
				$("#ajout").text("Lien ajouté !").fadeIn('normal').fadeOut(3700);

			}

		});

	});
