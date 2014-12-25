// JavaScript Document
$(document).ready(function(){
	/*******notyfy***/
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
			$.ajax({
				url:"modules/ql/modules/qlnhanvien/xuly.php",
				type:"POST",
				data:"id_emp_del="+id_del,
				success: function(){
					window.location.reload();
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
			$.ajax({
				url:"modules/qlkho/xuly.php",
				type:"POST",
				data:"id_sp_del="+id_del,
				success: function(){
					window.location.reload();
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
	
	