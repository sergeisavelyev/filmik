$(function() {
	
	$('.rating').on('click', '.rating-like', function (e) {
		e.preventDefault();
		const link = $(this);
		const id = link.data('id');
		const icon = $('.icon', link);
		$.ajax({
			url: '/rating/like',
			type: 'GET',
			data: {id: id},
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.status == 'success') {
					if (icon[0].classList.contains('fa-solid')){
						icon.removeClass('fa-solid').addClass('fa-regular');
					} else {
						icon.removeClass('fa-regular').addClass('fa-solid');
					}
					$('.counter',link).html(json.count);
				}
				Swal.fire(
					json.message,
					'',
					json.status
				);
			},
			error: function () {
				alert('Error!');
			}
		})
	});

	$('.disrating').on('click', '.rating-dislike', function (e) {
		e.preventDefault();
		const link = $(this);
		const id = link.data('id');
		const icon = $('.dis-icon', link);
		$.ajax({
			url: '/rating/dislike',
			type: 'GET',
			data: {id: id},
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.status == 'success') {
					if (icon[0].classList.contains('fa-solid')){
						icon.removeClass('fa-solid').addClass('fa-regular');
					} else {
						icon.removeClass('fa-regular').addClass('fa-solid');
					}
					$('.dis-counter',link).html(json.count);
				}
				Swal.fire(
					json.message,
					'',
					json.status
				);
			},
			error: function () {
				alert('Error!');
			}
		})
	});

	$('button.comment').on('click', function (e) {
		e.preventDefault();
		var text = $('textarea.text').val();
		var id = $('textarea').attr('id');
		$.ajax({
			url:'/comments/add',
			type: 'POST',
			data: {text: text, id: id},
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					if (json.status == 'error') {
						Swal.fire(
							json.message,
							'',
							json.status
						);
					} else {
						Swal.fire(
							json.message,
							'',
							json.status
						);
						// $('textarea.text').val('');
						$('div.comments').prepend($('<hr>'));
						$('div.comments').prepend($('<div>', {
							'class': 'text',
							'text': json.text,
						}));
						$('div.comments').prepend($('<div>', {
							'class': 'date',
							'text': json.comment_date,
						}));
						$('div.comments').prepend($('<div>', {
							'class': 'user',
							'text': json.user,
						}));
					}

				}
			},
			error: function () {
				alert('Error!');
			}
		})
	});
	
	$('.comment-item').on('click', '.delete-comment', function (e) {
		e.preventDefault();
		const del = $(this);
		const commentId = del.attr('id');
		$.ajax({
			url: '/comments/delete',
			type: 'POST',
			data: {id: commentId},
			success: function (result) {
				console.log(result);
				json = jQuery.parseJSON(result);
				Swal.fire(
					json.message,
					'',
					json.status
				);
			}, 
			error: function () {
				alert('Error!');
			}
		})
	});

	$('#live_search').keyup(function() {
		let input = $(this).val();
		if (input != '') {
			$.ajax({
				url: '/search/livesearch',
				type: 'POST',
				data: {data: input},
				success: function (result) {
					$('#searchresult').html(result);
					$('#searchresult').css("display", "block");
				}
			});
		} else {
			$('#searchresult').css("display", "none");
		}

	});

	// $('form.search').submit(function(e) {
	// 	e.preventDefault();
	// 	var input = $('input', this).val();
	// 	if (input != '') {
	// 		$.ajax({
	// 			url: '/search/results',
	// 			type: 'POST',
	// 			data: {data: input},
	// 			success: function (result) {
	// 				json = jQuery.parseJSON(result);
	// 				console.log(result);
	// 				window.location.href = '/' + json.url;
	// 			}
	// 		})
	// 	}
	// });

	$('#admin').on('submit', function (e) {
		e.preventDefault();
		let login = $('.login', this).val();
		let password = $('.password', this).val();
		$.ajax({
			url: '/admin/login',
			type: 'POST',
			data: {login: login, password: password},
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					Swal.fire(
						json.message,
						'',
						json.status
					);
				}
			}
		})
	})

	$('form.admin-add').on('submit', function (e) {
		e.preventDefault();
		$.ajax({
			url: '/admin/add',
			type: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			success: function (result) {
				json = jQuery.parseJSON(result);
				Swal.fire(
					json.message,
					'',
					json.status
				);
			},
		});
	})

});