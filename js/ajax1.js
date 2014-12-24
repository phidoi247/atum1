// JavaScript Document
$(document).ready(function(){
		
		//Thêm nhân viên mới
		/*Post bang ajax ma khong can refesh*/
		$('#add-emp-form').submit(function(event){
			event.preventDefault()
			var form_add_emp=new FormData($(this)[0]);
			$.ajax({
				url:"modules/qlnhanvien/xuly.php",
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
				url:"modules/qlnhanvien/xuly.php",
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
				url:"modules/qlnhanvien/xuly.php",
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
				url:"modules/qlkho/xuly.php",
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
				url:"modules/qlkho/xuly.php",
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
	
});
	
	