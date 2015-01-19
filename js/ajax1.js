// JavaScript Document
$(document).ready(function(){
	
	
	
	/*******Thông báo trạng thái đăng nhập nếu có lỗi thì show k thì ẩn***/
	$(function(){
		var info=$('#log_info').val();
		if(info!=''){
			$('#logbox').css("visibility","visible");
		}else{
			$('#logbox').css("visibility","hidden");
		}
	});
	
	
	
	
	//Nhập SP
		//Out focus sau khi nhập mã sp
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
////////////////////////////Xuất SP
		//Out focus sau khi nhập mã sp
		$('#nhap_msp').focusout(function(e) {
            var msp=$(this).val();
			$.ajax({
				type:"POST",
				url:"modules/nvbh/modules/xuat/xuly.php",
				data:"msp="+msp,
				dataType:"json",
				success: function(data){
					
					$('#gia_sp').val(data[0].gia_ban);
					$('#ten_sp').val(data[0].ten_sanpham);
					$('#slc_sp').val(data[0].soluong);
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
/////////////////////////Gui vao bang hoa don
		///Khi ấn nút nhập thì 1 bảng ghi đc thêm vào bảng
		$('#nhap_hd').click(function(){
			var slclick=$('#solanclick').val();
			slclick=parseInt(slclick)+1;
			$('#solanclick').val(slclick);
			var masp=$('#nhap_msp').val();
			var tensp=$('#ten_sp').val();
			var giasp=$('#gia_sp').val();
			var slsp=$('#sl_sp').val();
			var slcsp=$('#slc_sp').val();
			var lenght_slcsp=$('#slc_sp').length;
			var lgt=(masp.length);
			var sodu=slsp%1;
			if(lgt!=0){
				if(giasp!=0){
					if(slsp!=0){
						if(slsp>0){
							if(sodu>=1 || sodu==0){
								if(lenght_slcsp!=0){	
									
									if((slcsp-slsp)>=0){
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
										$('#chk').html("Không đủ Sản phẩm! để giao dịch");	
									}
								}else{
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
								}
							}else{
								$('#chk').html("Số lượng phải là số nguyên!");
								}
						}else{
							$('#chk').html("Số lượng không thể nhỏ hơn 0!");
						}	
					}else{
						$('#chk').html("Chưa nhập số lượng!");	
							}
				}else{
					$('#chk').html("Không có Sản phẩm! trong kho");
				}
			}else{
				$('#chk').html("Chưa nhập Mã Sản phẩm!");	
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
///////////////Gửi hđ nhập vào db bằng ajax
		$('form#formHDnhap').submit(function(event){
			event.preventDefault();
			var form=new FormData($(this)[0]);
			
			/***Check số lg hóa đơn nếu k có thì k thưc hiện gd**/
			
			var amt_record=$('table.nhap_xuat >tbody >tr').length;
            
			if(amt_record>0){
				
				$.ajax({
					type:"POST",
					url:"modules/nvk/modules/nhap/xuly.php",
					data:form,
					async:false,// 1 boolean val xđ việc ngăn cản đồng bộ xử lý, df = true
					cache:false,// 1 boolean val xđ việc lưu bộ nhớ trang request, df = true
					processData:false, //1 giá trị boolean xác định dữ liệu request có đc tao trong 1 string k, default là true
					contentType:false, //kiểu data chuyền đi defaeult là enctype="application/x-www-form-urlencoded",
										//Muốn post file thì phải dùng kiểu enctype="multipart/form-data" 
					success: function(nn){
							alert("Giao dich thành công!");
							document.location.reload();
					}
				});
			}else{
					$('.thongbao').html("Không có sản phẩm nào được giao dich!")	
			}
		});
/////////////Gửi hđ xuất vào db
		$('form#formHDxuat').submit(function(event){
			event.preventDefault();
			var form=new FormData($(this)[0]);
			var amt_record=$('table.nhap_xuat >tbody >tr').length;
			if(amt_record>0){
			$.ajax({
				type:"POST",
				url:"modules/nvbh/modules/xuat/xuly.php",
				data:form,
				async:false,
				cache:false,
				processData:false,
				contentType:false,
				success: function(nn){
						alert("Giao dich thành công!");
						document.location.reload();
				}
			});
            	}else{
					$('.thongbao').html("Không có sản phẩm nào được giao dich!")	
			}
		});
/////////////////////////////////////////////Hủy gd
		
		
		
		$('#hgd_but').click(function(){
			$('#solanclick').val(0);
			$('tbody#detail_hd').empty();
		});
		
		
//////////////////////////////Thêm nhân viên mới
		/*Post bang ajax ma khong can refesh*/
		$('#add-emp-form').submit(function(event){
			event.preventDefault();
			var add_ten=$('#add_ten').val();
			var add_avt=$('#add_avt').val();
			var add_pass=$('#add_pass').val();
			var add_add=$('#add_add').val();
			var add_date=$('#add_date').val();
			var add_phone=$('#add_phone').val();
			var date=new Date();
			var now=date.getFullYear();
			var year=add_date.substr(0,4);
			if(add_ten!=""){
				if(add_avt!=""){
					if(add_pass!=""){
						if(add_add!=""){
								if(add_phone!=""){
										if(add_date!=""){
											if((now-year)>=16){
											
											
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
														
												}
											}
										});
											}else{
												$('#add_emp_notify').html("Năm sinh không hợp lệ!");
											}
										}else{
											$('#add_emp_notify').html("Hãy nhập Ngày sinh Nhân viên!");
										}

								}else{
									$('#add_emp_notify').html("Hãy nhập Số Phone!");		
								}
						}else{
							$('#add_emp_notify').html("Hãy nhập Địa chỉ!");		
						}
					}else{
						$('#add_emp_notify').html("Hãy nhập Password!");	
					}
				}else{
					$('#add_emp_notify').html("Hãy thêm Ảnh!");	
				}
			}else{
				$('#add_emp_notify').html("Hãy nhập Tên Nhân viên!");	
			}	
	});
	
//////////////////////////////////Sửa thông tin nhân viên
	
		$('#edit-emp-form').submit(function(event){
			event.preventDefault()
			var form_edit_emp=new FormData($(this)[0]);
			var add_ten=$('#ename').val();
			var add_add=$('#eaddress').val();
			var add_date=$('#edateofbirth').val();
			var add_phone=$('#ephone').val();
			var date=new Date();
			var now=date.getFullYear();
			var year=add_date.substr(0,4);
			if(add_ten!=""){
						if(add_add!=""){
								if(add_phone!=""){
										if(add_date!=""){
											if((now-year)>=16){
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
							
					}
				}
			});
											}else{
												$('#edit_emp_notify').html("Năm sinh không hợp lệ!");
											}
										}else{
											$('#edit_emp_notify').html("Hãy nhập Ngày sinh Nhân viên!");
										}

								}else{
									$('#edit_emp_notify').html("Hãy nhập Số Phone!");		
								}
						}else{
							$('#edit_emp_notify').html("Hãy nhập Địa chỉ!");		
						}
			}else{
				$('#edit_emp_notify').html("Hãy nhập Tên Nhân viên!");	
			}	
	});

		
////////////////////////////////////***********Xóa nhân viên**************/
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
////////////////////////*******************Sản phẩm**************************/

///////////////// Thêm
		$('#add-sp-form').submit(function(event){
			event.preventDefault();
			var add_ten_sp=$('#add_ten_sp').val();
			var add_anh_sp=$('#add_anh_sp').val();
			var add_gn_sp=$('#add_gn_sp').val();
			var add_gb_sp=$('#add_gb_sp').val();
			var add_km_sp=$('#add_km_sp').val();
			if(add_ten_sp!=""){
				if(add_anh_sp!=""){
					if(add_gn_sp!=""){
						if(add_gn_sp>=1){
								if(add_gb_sp!=""){
									if(add_gb_sp>=1){
											if(add_km_sp>=0){
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
											
											}else{
												$('#add_sp_notify').html("Giá nhập phải lớn hơn hoặc bằng 0!");	
											}	
											
									}else{
										$('#add_sp_notify').html("Giá Bán phải lớn hơn 0!");	
									}	
									
								}else{
									$('#add_sp_notify').html("Hãy nhập Giá bán!");	
										
								}
							}else{
								$('#add_sp_notify').html("Giá nhập phải lớn hơn 0!");	
							}	
					}else{
						$('#add_sp_notify').html("Hãy nhập Giá nhập!");	
						
					}
				}else{
					$('#add_sp_notify').html("Hãy thêm Ảnh!");	
				}
			}else{
				$('#add_sp_notify').html("Hãy nhập Tên Sản phẩm!");	
			}		
		});
//////////////////////////Sửa thông tin SP
		$('#edit-sp-form').submit(function(event){
			event.preventDefault();
			var form_edit_sp=new FormData($(this)[0]);
			var add_ten_sp=$('#ename').val();
			var add_gn_sp=$('#egianhap').val();
			var add_gb_sp=$('#egiaban').val();
			var add_km_sp=$('#ekm').val();
				if(add_ten_sp!=""){	
					if(add_gn_sp!=""){
						if(add_gn_sp>=1){
								if(add_gb_sp!=""){
									if(add_gb_sp>=1){
											if(add_km_sp>=0){
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
														}else{
												$('#edit_sp_notify').html("Giá nhập phải lớn hơn hoặc bằng 0!");	
											}	
											
									}else{
										$('#edit_sp_notify').html("Giá Bán phải lớn hơn 0!");	
									}	
									
								}else{
									$('#edit_sp_notify').html("Hãy nhập Giá bán!");	
										
								}
							}else{
								$('#edit_sp_notify').html("Giá nhập phải lớn hơn 0!");	
							}	
					}else{
						$('#edit_sp_notify').html("Hãy nhập Giá nhập!");	
						
					}
				}else{
				$('#add_sp_notify').html("Hãy nhập Tên Sản phẩm!");	
			}	
						
		});
		
///////////////////////////////////////***********Xóa SP**************/
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

////////////////////////////////////////////////////// Thêm NCC
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
////////////////////////////////***********Xóa NCC**************/
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
					$('.delete-ncc-box').hide();
				}
			});
		})

////////////////////////////////////////////////////// Thêm DV
		$('#add-dv-submit').click(function(){
			var add_dv=$('#ten_dv').val();
			$.ajax({
				url:"modules/ql/modules/qlkho/xuly.php",
				type:"POST",
				data:"add_dv="+add_dv,
				success: function(notify){
					if(notify=='Ok'){
						window.location.reload();
					}else{
						alert(notify);	
					}
				}
			});
		});
////////////////////////////////***********Xóa NCC**************/
		$('.delete-dv-submit').click(function(){
			var id_del=$('#id_dv_del').val();
			var get_id_row=$('#id_dv_row').val();
			var id_row="#"+get_id_row;
			$.ajax({
				url:"modules/ql/modules/qlkho/xuly.php",
				type:"POST",
				data:"id_dv_del="+id_del,
				success: function(){
					$(id_row).parent().parent().remove();
					$('.delete-dv-box').hide();
				}
			});
		})
/**************************************************Thiết lập*/
		//Thay đổi mk
		$('#change_pass_form').submit(function(event){
			event.preventDefault();
			var new_p=$('#re_pass').val();
			var idu=$('#idu').val()
			var old_pass=$('input#old_pass').val();
			$.ajax({
				type:"POST",
				url:"modules/ql/modules/thietlap/xuly.php",
				data:"old_pass="+old_pass+"&idu="+idu,
				success: function(nof){
					if(nof=="Ok"){
						$.ajax({
						type:"POST",
						url:"modules/ql/modules/thietlap/xuly.php",
						data:"new_pass="+new_p+"&idu="+idu,
						success: function(ok){
							if(ok=='Ok'){
							window.location.reload();}
						}
						});
					}else{
						alert("Mật khẩu cũ sai!");
					}
					
				}
			});
			
		});
		
		//Check nhập lại mk
		$('input#re_pass').focusout(function(e) {
        	var new_p=$('input#new_pass').val();
			var re_p=$(this).val();
			if(re_p==new_p){
				$('div.chk_n_p').html("OK!");
			}else{
				$('div.chk_n_p').html("Re_Wrong!");
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
	
	