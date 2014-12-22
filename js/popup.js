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
			
			$('.edit-emp-close').click(function(){
				$('.edit-emp-box').hide();
			});
			$('.delete-emp-close').click(function(){
				$('.delete-emp-box').hide();
			});
			
			$('#doanh_so_but').click(function(){
				$('.doanh_so_box').show();
			});
			$('.doanh_so_close').click(function(){
				$('.doanh_so_box').hide();
			});
			
			$('#doanh_thu_but').click(function(){
				$('.doanh_thu_box').show();
			});
			$('.doanh_thu_close').click(function(){
				$('.doanh_thu_box').hide();
			});
			
			$('#thu_chi_but').click(function(){
				$('.thu_chi_box').show();
			});
			$('.thu_chi_close').click(function(){
				$('.thu_chi_box').hide();
			});
    });