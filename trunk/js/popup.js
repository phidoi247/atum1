$(document).ready(function(e) {
        $('.login-but').click(function(){
			$('#logbox').show();
		});
		$('.cancellog').click(function(){
			$('#logbox').hide();
		});
	///////////////////////////Employees
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
	/////////////////////////SP
			
			$('#add-sp-but').click(function(){
				$('.add-sp-box').show();
				/*
				$.ajax({
					type:"POST",
					url:"modules/ql/modules/qlkho/xuly.php",
					data:"get_danhmuc=true",
					dataType:"json",
					success: function(danhmuc){
						var cnt=(Object.keys(danhmuc).length);
							var i=0;
							while(i<=cnt){
								$('#danhmuc').append("<option value='"+danhmuc[i].danhmuc_id+"'>"+danhmuc[i].ten_danhmuc+"</option>");
								i++;
							}
					}
				});
				
				$.ajax({
					type:"POST",
					url:"modules/ql/modules/qlkho/xuly.php",
					data:"get_donvi=true",
					dataType:"json",
					success: function(donvi){
						var cnt=(Object.keys(donvi).length);
							var i=0;
							while(i<=cnt){
								$('#donvi').append("<option value='"+donvi[i].donvi_id+"'>"+donvi[i].ten_donvi+"</option>");
								i++;
							}
					}
				});
				$.ajax({
					type:"POST",
					url:"modules/ql/modules/qlkho/xuly.php",
					data:"get_ncc=true",
					dataType:"json",
					success: function(ncc){
						var cnt=(Object.keys(ncc).length);
							var i=0;
							while(i<=cnt){
								$('#ncc').append("<option value='"+ncc[i].nhacungcap_id+"'>"+ncc[i].ten_nhacungcap+"</option>");
								i++;
							}
					}
				});*/
			});
			
			
			///////////////////////////////////////////////////////////////
			$('.add-sp-close').click(function(){
				$('.add-sp-box').hide();
			});
			
			$('.edit-sp-close').click(function(){
				$('.edit-sp-box').hide();
			});
			$('.delete-sp-close').click(function(){
				$('.delete-sp-box').hide();
			});

			$('#doanh_so_but').click(function(){
				$('.doanh_so_box').show();
				$('.thu_chi_box').hide();
				$('.doanh_thu_box').hide();
			});
			$('.doanh_so_close').click(function(){
				$('.doanh_so_box').hide();
			});
			
			$('#doanh_thu_but').click(function(){
				$('.doanh_thu_box').show();
				$('.doanh_so_box').hide();
				$('.thu_chi_box').hide();
			});
			$('.doanh_thu_close').click(function(){
				$('.doanh_thu_box').hide();
			});
			
			$('#thu_chi_but').click(function(){
				$('.thu_chi_box').show();
				$('.doanh_so_box').hide();
				$('.doanh_thu_box').hide();
			});
			$('.thu_chi_close').click(function(){
				$('.thu_chi_box').hide();
			});
////////////////NCC
			$('#add-ncc-but').click(function(){
				$('.add-ncc-box').show();
			});
			$('.add-ncc-close').click(function(){
				$('.add-ncc-box').hide();
			});
			$('#ncc-but').click(function(){
				$('.ncc-box').show();
			});
			$('.ncc-close').click(function(){
				$('.ncc-box').hide();
			});			
			$('.delete-ncc-close').click(function(){
				$('.delete-ncc-box').hide();
			});
			///////////////////////Chi tiet hoa don//////////////
			
			$('.chitiet-close').click(function(){
				$('.chitiet-box').hide();
			});
    });
	