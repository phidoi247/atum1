$(document).ready(function(e) {
        $('.login-but').click(function(){
			$('#logbox').show();
		});
		$('.cancellog').click(function(){
			$('#logbox').hide();
		});
			$('#add-emp-but').click(function(){
				$('.add-emp-box').show();
			});
			$('.add-emp-close').click(function(){
				$('.add-emp-box').hide();
			});
			$('.delete-emp-close').click(function(){
				$('.delete-emp-box').hide();
			});
			
    });