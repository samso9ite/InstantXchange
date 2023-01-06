$(document).on("submit","form#contact_home", function () {
	$el = $(this);
	$url = $el.attr("action");
	$data = $el.serializeArray();
	$.ajax({
		type: 'POST',
		url: $url,
		data: $data,
		beforeSend: function () {
			$el.find("input").attr("disabled",true);
			$('#submit-contact-home')
				.after('<i class="icon-spin4 animate-spin loader"></i>')
		},
		success: function (r) {
			$el.find("input").attr("disabled",false);
			$('.icon-spin4').remove();
			if(r == 1) {
				window.location = window.location.href
			}
			else {
				$("#message-home").html("<div class='alert alert-danger'>"+r+"</div>")
			}
		},
		error: function (r) {
			$el.find("input").attr("disabled",false);
			$("#message-home").html("<div class='alert alert-danger'>"+r.statusText+"</div>")
			$('.icon-spin4').remove();
		}
	})
	return false
})