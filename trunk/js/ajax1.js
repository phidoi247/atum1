// JavaScript Document
$(document).ready(function(){
	/*******notyfy***/
	$(function(){
		var info=$('#log_info').val();
		if(info!=''){
			$('#logbox').show();
		}else{
			$('#logbox').hide();
		}
	});
	//Nhập SP
		$('#nhap_msp').focusout(function(e) {
            var msp=$(this).val();
			$.ajax({
				type:"POST",
				url:"modules/nvk/modules/nhap/xuly.php",
				data:"msp="+msp,
				dataType:"json",
				success: function(data){
					
					$('#gia_sp').val(data[0].gia);
					$('#ten_sp').val(data[0].ten_sanpham);
					$('#chk_msp').html("Sản phẩm: "+data[0].ten_sanpham);
				}
			});
			$(this).focus(function(){
				$('#gia_sp').val(0);
			});
			var giasp=$('#gia_sp').val();
			if(giasp==0){
			$('#chk_msp').html("Sản phẩm không có trong kho!");
			}
        });
		//Xuất SP
		$('#nhap_msp').focusout(function(e) {
            var msp=$(this).val();
			$.ajax({
				type:"POST",
				url:"modules/nvbh/modules/xuat/xuly.php",
				data:"msp="+msp,
				dataType:"json",
				success: function(data){
					
					$('#gia_sp').val(data[0].gia);
					$('#ten_sp').val(data[0].ten_sanpham);
					$('#chk_msp').html("Sản phẩm: "+data[0].ten_sanpham);
				}
			});
			$(this).focus(function(){
				$('#gia_sp').val(0);
			});
			var giasp=$('#gia_sp').val();
			if(giasp==0){
			$('#chk_msp').html("Sản phẩm không có trong kho!");
			}
        });
		//Gui vao bang hoa don
		$('#nhap_hd').click(function(){
			var slclick=$('#solanclick').val();
			slclick=parseInt(slclick)+1;
			$('#solanclick').val(slclick);
			var masp=$('#nhap_msp').val();
			var tensp=$('#ten_sp').val();
			var giasp=$('#gia_sp').val();
			var slsp=$('#sl_sp').val();
			var lgt=(masp.length)-0;
			if(slsp!=0){
				if(lgt!=0){
					if(giasp!=0){
						$(function(){
							var str;
							str="<tr>";
							str+="<td><input type='text' id=msp"+slclick+" value='"+masp+"' name=msp"+slclick+" readonly/></td>";
							str+="<td><input type='text' id=tensp"+slclick+" value='"+tensp+"' name=tensp"+slclick+" readonly/></td>";
							str+="<td><input type='text' id=slsp"+slclick+" value='"+slsp+"' name=slsp"+slclick+" readonly/></td>";
							str+="<td id=ttsp"+slclick+"></td></tr>";
							var id_del=".del_detail"+slclick;
							$('tbody#detail_hd').append(str);	
							$('#chk').html("**********")
						});
					}else{
						$('#chk').html("Không có Sản phẩm! trong kho");	
					}
				}else{
					$('#chk').html("Chưa nhập Mã Sản phẩm!");
				}
			}else{
				$('#chk').html("Chưa nhập số lượng!");	
			}
			//tính tiền
			$(function(){
				var id_tt="#ttsp"+slclick;
				var id_sl="#slsp"+slclick;
				var sl=$(id_sl).val();
				var tt=sl*giasp;
				$(id_tt).html(tt);
				//dếm số dơn
				$('#slhd').val(slclick);
			});
				
		});
		//Ghi hđ nhập vào db
		$('form#formHDnhap').submit(function(event){
			event.preventDefault();
			var form=new FormData($(this)[0]);
			
			$.ajax({
				type:"POST",
				url:"modules/nvk/modules/nhap/xuly.php",
				data:form,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(nn){
					if(nn=='Ok'){
						alert("Giao dich thành công!");
						document.location.reload();
					}
				}
			});
		});
		//Ghi hđ xuất vào db
		$('form#formHDxuat').submit(function(event){
			event.preventDefault();
			var form=new FormData($(this)[0]);
			
			$.ajax({
				type:"POST",
				url:"modules/nvbh/modules/xuat/xuly.php",
				data:form,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(nn){
					if(nn=='Ok'){
						alert("Giao dich thành công!");
						document.location.reload();
					}
				}
			});
		});
		//Hủy gd
		$('#hgd_but').click(function(){
			$('#solanclick').val(0);
			$('tbody#detail_hd').empty();
		});
		//Thêm nhân viên mới
		/*Post bang ajax ma khong can refesh*/
		$('#add-emp-form').submit(function(event){
			event.preventDefault()
			var form_add_emp=new FormData($(this)[0]);
			$.ajax({
				url:"modules/ql/modules/qlnhanvien/xuly.php",
				type:"POST",
				data:form_add_emp,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(notify){
					if(notify=='Ok'){
						window.location.reload();
					}else{
						alert(notify);	
					}
				}
			});
		})
		//Sửa thông tin nhân viên
		$('#edit-emp-form').submit(function(event){
			event.preventDefault()
			var form_edit_emp=new FormData($(this)[0]);
			$.ajax({
				url:"modules/ql/modules/qlnhanvien/xuly.php",
				type:"POST",
				data:form_edit_emp,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(notify){
					if(notify=='Ok'){
						window.location.reload();
					}else{
						alert(notify);	
					}
				}
			});
		})
		
		/***********Xóa nhân viên**************/
		$('.delete-emp-submit').click(function(){
			var id_del=$('#id_emp_del').val();
			var get_id_row=$('#id_emp_row').val();
			var id_row="#"+get_id_row;
			$.ajax({
				url:"modules/ql/modules/qlnhanvien/xuly.php",
				type:"POST",
				data:"id_emp_del="+id_del,
				success: function(){
					$(id_row).parent().parent().remove();
					$('.delete-emp-box').hide()
				}
			});
		})
		/*******************Sản phẩm**************************/
	// Thêm
		$('#add-sp-form').submit(function(event){
			event.preventDefault();
			var form_add_sp=new FormData($(this)[0]);
			$.ajax({
				url:"modules/ql/modules/qlkho/xuly.php",
				type:"POST",
				data:form_add_sp,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(notify){
					if(notify=='Ok'){
						window.location.reload();
					}else{
						alert(notify);	
					}
				}
			});
		});
		//Sửa thông tin SP
		$('#edit-sp-form').submit(function(event){
			event.preventDefault();
			var form_edit_sp=new FormData($(this)[0]);
			$.ajax({
				url:"modules/ql/modules/qlkho/xuly.php",
				type:"POST",
				data:form_edit_sp,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(notify){
					if(notify=='Ok'){
						window.location.reload();
					}else{
						alert(notify);	
					}
				}
			});
		});
		
		/***********Xóa SP**************/
		$('.delete-sp-submit').click(function(){
			var id_del=$('#id_sp_del').val();
			var get_id_row=$('#id_sp_row').val();
			var id_row="#"+get_id_row;
			$.ajax({
				url:"modules/ql/modules/qlkho/xuly.php",
				type:"POST",
				data:"id_sp_del="+id_del,
				success: function(){
					$(id_row).parent().parent().remove();
					$('.delete-sp-box').hide();
				}
			});
		})
		/***********Xóa NCC**************/
		// Thêm
		$('#add-ncc-submit').click(function(){
			var add_ncc=$('#ten_ncc').val();
			$.ajax({
				url:"modules/ql/modules/qlkho/xuly.php",
				type:"POST",
				data:"add_ncc="+add_ncc,
				success: function(notify){
					if(notify=='Ok'){
						window.location.reload();
					}else{
						alert(notify);	
					}
				}
			});
		});
		$('.delete-ncc-submit').click(function(){
			var id_del=$('#id_ncc_del').val();
			var get_id_row=$('#id_ncc_row').val();
			var id_row="#"+get_id_row;
			$.ajax({
				url:"modules/ql/modules/qlkho/xuly.php",
				type:"POST",
				data:"id_ncc_del="+id_del,
				success: function(){
					$(id_row).parent().parent().remove();
					var so_o=$('table#bangsp >tbody >tr').length; //dem so dong
					var i=1;
					while(i<=so_o){
						var id_o="#ncc"+i;
						var val_o=$(id_o).val();
						if(val_o==id_del){
							$(id_o).parent().parent().remove();
						};
						i++;
					}
					$('.delete-ncc-box').hide();
				}
			});
		})
		/***********Thiết lập*/
		$('#change_pass_form').submit(function(event){
			event.preventDefault();
			var new_p=$('#re_pass').val();
			var idu=$('#idu').val()
			$.ajax({
				type:"POST",
				url:"modules/ql/modules/thietlap/xuly.php",
				data:"new_pass="+new_p+"&idu="+idu,
				success: function(ok){
					if(ok=='Ok'){
					window.location.reload();}
				}
			});
		});
		
		$('input#old_pass').focusout(function(e) {
            var old_pass=$(this).val();
			var idu=$('#idu').val();
			$.ajax({
				type:"POST",
				url:"modules/ql/modules/thietlap/xuly.php",
				data:"old_pass="+old_pass+"&idu="+idu,
				success: function(nof){
					$('span.chk_o_p').html(nof);
				}
			});
        });
		$('input#re_pass').focusout(function(e) {
        	var new_p=$('input#new_pass').val();
			var re_p=$(this).val();
			if(re_p==new_p){
				$('span.chk_n_p').html("OK!");
			}else{
				$('span.chk_n_p').html("Re_password wrong!");
			}
		});
		/****Change AVatar**/
		$('#change_avt_form').submit(function(event){
			event.preventDefault();
			var new_avt=new FormData($(this)[0]);
			$.ajax({
				type:"POST",
				url:"modules/ql/modules/thietlap/xuly.php",
				data:new_avt,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(){
					window.location.reload();
				}
			});
		});
});
	
	