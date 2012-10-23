	$(".supprimerLien").on("click", function(event){
	
		var $this = $(this);

		event.preventDefault();

		var href= $(this).attr("href");
		
		$.ajax({
			url: href,
			success: function(data){
				
				$this.parent().text(data).fadeOut(4000);

			}
			});
	
	});