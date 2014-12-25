function delete_emp(cnt){
		var get_delete_emp_id="#ma_nv"+cnt;
		var delete_emp_id=$(get_delete_emp_id).val();
		document.getElementById('id_emp_del').value=delete_emp_id;
		$('.delete-emp-box').show();
	}
function edit_emp(cnt){
		$('.edit-emp-box').show();
		var get_edit_emp_id="#ma_nv"+cnt;
		var edit_emp_id=$(get_edit_emp_id).val();
		$('#eid').val(edit_emp_id);
		$.ajax({
			type:"POST",
			url:"modules/ql/modules/qlnhanvien/xuly.php",
			data:"get_emp_info="+edit_emp_id,
			dataType:"json",
			success: function(arr){
				$('#ename').val(arr[2]);
				$('#elevel').val(arr[3]);
				$('#eposition').val(edit_emp_id.substr(0,2));
				$('#eaddress').val(arr[5]);
				$('#edateofbirth').val(arr[4]);
				$('#ephone').val(arr[9]);
				$('#old_avt').attr("src",arr[7]);
			}
		});
	}
//////////////////////////////SP
function delete_sp(cnt){
		var get_delete_sp_id="#ma_sp"+cnt;
		var delete_sp_id=$(get_delete_sp_id).val();
		document.getElementById('id_sp_del').value=delete_sp_id;
		$('.delete-sp-box').show();
	}
function edit_sp(cnt){
		$('.edit-sp-box').show();
		var get_edit_sp_id="#ma_sp"+cnt;
		var edit_sp_id=$(get_edit_sp_id).val();
		$('#eid').val(edit_sp_id);
		$.ajax({
					type:"POST",
					url:"modules/ql/modules/qlkho/xuly.php",
					data:"get_danhmuc=true",
					dataType:"json",
					success: function(danhmuc){
						var cnt=(Object.keys(danhmuc).length);
							var i=0;
							while(i<=cnt){
								$('#edanhmuc').append("<option value='"+danhmuc[i].danhmuc_id+"'>"+danhmuc[i].ten_danhmuc+"</option>");
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
								$('#edonvi').append("<option value='"+donvi[i].donvi_id+"'>"+donvi[i].ten_donvi+"</option>");
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
								$('#encc').append("<option value='"+ncc[i].nhacungcap_id+"'>"+ncc[i].ten_nhacungcap+"</option>");
								i++;
							}
					}
				});
		$.ajax({
			type:"POST",
			url:"modules/ql/modules/qlkho/xuly.php",
			data:"get_sp_info="+edit_sp_id,
			dataType:"json",
			success: function(arr){
				$('#ename').val(arr[2]);
				$('#edanhmuc').val(arr[3]);
				$('#edonvi').val(arr[5]);
				$('#encc').val(arr[4]);
				$('#egianhap').val(arr[6]);
				$('#egiaban').val(arr[7]);
				$('#ekm').val(arr[9]);
				$('#old_avt').attr("src",arr[10]);
			}
		});
}