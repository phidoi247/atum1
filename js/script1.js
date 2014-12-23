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
			url:"modules/qlnhanvien/xuly.php",
			data:"get_emp_info="+edit_emp_id,
			dataType:"json",
			success: function(arr){
				$('#ename').val(arr[1]);
				$('#elevel').val(arr[2]);
				$('#eposition').val(edit_emp_id.substr(0,2));
				$('#eaddress').val(arr[4]);
				$('#edateofbirth').val(arr[3]);
				$('#ephone').val(arr[8]);
				$('#old_avt').attr("src",arr[6]);
			}
		});
	}