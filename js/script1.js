//Nhap xuat
//Xóa chi tiet
function delete_emp(cnt){
		
		var get_delete_emp_id="#ma_nv"+cnt;
		var delete_emp_id=$(get_delete_emp_id).val();
		document.getElementById('id_emp_del').value=delete_emp_id;
		$('#id_emp_row').val("ma_nv"+cnt);
		$('.delete-emp-box').show();
		$('.edit-emp-box').hide();
		$('.add-emp-box').hide();
	}
function edit_emp(cnt){
		$('.edit-emp-box').show();
		$('.delete-emp-box').hide();
		$('.add-emp-box').hide();
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
				$('#eposition').val(arr[3]);
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
		$('#id_sp_row').val("ma_sp"+cnt);
		$('.delete-sp-box').show();
		$('.add-sp-box').hide();
	}
function edit_sp(cnt){
		$('.add-sp-box').hide();
		$('.delete-sp-box').hide();
		$('.edit-sp-box').show();
		var get_edit_sp_id="#ma_sp"+cnt;
		var edit_sp_id=$(get_edit_sp_id).val();
		$('#eid').val(edit_sp_id);
		
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
////////////////////NCC
function delete_ncc(cnt){
		var get_delete_ncc_id="#ma_ncc"+cnt;
		var delete_ncc_id=$(get_delete_ncc_id).val();
		$('#id_ncc_del').val(delete_ncc_id);
		$('#id_ncc_row').val("ma_ncc"+cnt);
		$('.delete-ncc-box').show();
	}

////////////////////DV
function delete_dv(cnt){
		var get_delete_dv_id="#ma_dv"+cnt;
		var delete_dv_id=$(get_delete_dv_id).val();
		$('#id_dv_del').val(delete_dv_id);
		$('#id_dv_row').val("ma_dv"+cnt);
		$('.delete-dv-box').show();
	}

//////////////////////////////////////Chi tiet don hang
function chitiet(cnt){
		$('.chitiet-box').show();
		var get_chitiet_id="#ma_hd"+cnt;
		var get_loai_hd="#loaihd"+cnt;
		var chitiet_id=$(get_chitiet_id).val();
		var loai_hd=$(get_loai_hd).val();;
		$('#ma_hd').val(chitiet_id);
	
		$.ajax({
			type:"POST",
			url:"modules/ql/modules/lichsu/xuly.php",
			data:"chitiet="+chitiet_id+"&loai="+loai_hd,
			dataType:"json",
			success: function(obb){
		      var cntt=(Object.keys(obb).length);
				var i=0;
				$('#tbody_chitiet').empty();
				while(i<=cntt){
					$('#tbody_chitiet').append("<tr><td>"+obb[i].sanpham_id+"</td><td class='td_ten'>"+obb[i].ten_sanpham+"</td><td class='td_giatri'>"+obb[i].gia+"</td><td class='td_giatri'>"+obb[i].soluong+"</td><td class='td_giatri'>"+obb[i].thanhtien+"</td></tr>");
					i++;
				}
			}
		});
}

////////////////////////////////
function bh_chitiet(cnt){
		$('.chitiet-box').show();
		var get_chitiet_id="#ma_hd"+cnt;
		var chitiet_id=$(get_chitiet_id).val();
		$('#ma_hd').val(chitiet_id);
		$.ajax({
			type:"POST",
			url:"modules/nvbh/modules/lichsu/xuly.php",
			data:"chitiet="+chitiet_id,
			dataType:"json",
			success: function(obb){
		      var cntt=(Object.keys(obb).length);
				var i=0;
				$('#tbody_chitiet').empty();
				while(i<=cntt){
					$('#tbody_chitiet').append("<tr><td>"+obb[i].sanpham_id+"</td><td class='td_ten'>"+obb[i].ten_sanpham+"</td><td class='td_giatri'>"+obb[i].gia_ban+"</td><td class='td_giatri'>"+obb[i].soluong+"</td><td class='td_giatri'>"+obb[i].thanhtien+"</td></tr>");
					i++;
				}
			}
		});
}

////////////////////////////////
function nh_chitiet(cnt){
		$('.chitiet-box').show();
		var get_chitiet_id="#ma_hd"+cnt;
		var chitiet_id=$(get_chitiet_id).val();
		$('#ma_hd').val(chitiet_id);
		$.ajax({
			type:"POST",
			url:"modules/nvk/modules/lichsu/xuly.php",
			data:"chitiet="+chitiet_id,
			dataType:"json",
			success: function(obb){
		      var cntt=(Object.keys(obb).length);
				var i=0;
				$('#tbody_chitiet').empty();
				while(i<=cntt){
					$('#tbody_chitiet').append("<tr><td>"+obb[i].sanpham_id+"</td><td class='td_ten'>"+obb[i].ten_sanpham+"</td><td class='td_giatri'>"+obb[i].gia_nhap+"</td><td class='td_giatri'>"+obb[i].soluong+"</td><td class='td_giatri'>"+obb[i].thanhtien+"</td></tr>");
					i++;
				}
			}
		});
}
