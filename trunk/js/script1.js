function delete_emp(cnt){
		var get_delete_emp_id="#ma_nv"+cnt;
		var delete_emp_id=$(get_delete_emp_id).val();
		document.getElementById('id_emp_del').value=delete_emp_id;
		$('.delete-emp-box').show();
	}