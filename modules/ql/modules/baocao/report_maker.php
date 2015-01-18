<div class="baocao">
    <figure class="doanh_thu_but">
    	<img width="325px" src="sourse/doanh_thu.png"/>
    <figcaption>Báo cáo doanh thu</figcaption>
    </figure>
    <figure class="doanh_so_but">
    	<img width="325px" src="sourse/doanh_so.png"/>
    <figcaption>Báo cáo doanh số</figcaption></figure>
    <figure class="thu_chi_but">
    	<img width="325px" src="sourse/thu_chi.png"/>
        <figcaption>Báo cáo nhập xuất</figcaption>
    </figure>
</div>
<div class="doanh_so_box">
	<img alt="" class="doanh_so_close" src="sourse/close.png">
	<form action="modules/ql/modules/baocao/doanh_so.php" method="post" target="_blank">
   	 	<table>
            	<thead><tr>
            		<th colspan="2">Tạo báo cáo doanh số sản phẩm</th>
            	</tr></thead>
        		<tbody>
        		<tr>
        			<td><label>Mã sản phẩm: </label></td>
        			<td><input type="text" name="maSanPham" required placeholder="VD: SA00001,SA00002"></td>
        		</tr>
        		<tr>
        			<td><label>Từ ngày: </label></td>
        			<td><input type="text" name="tuNgay" placeholder="dd-mm-yyyy" required></td>
        		</tr>
        		<tr>
        			<td><label>Đến ngày: </label></td>
        			<td><input type="text" name="denNgay" placeholder="dd-mm-yyyy" required></td>
        		</tr>
        		<tr><td></td><th><input type="submit" name="submit" value="Tạo"></th></tr>
        	</tbody></table>
    </form>
</div>
<div class="doanh_thu_box">
<img alt="" class="doanh_thu_close" src="sourse/close.png">
    <form action="modules/ql/modules/baocao/doanh_thu.php" method="post" target="_blank">
        	<table>
            	<thead><tr>
                	<th colspan="2">Tạo báo cáo doanh thu sản phẩm</th>
                </tr></thead>
        		<tbody>               
        		<tr>
        			<td><label>Từ ngày: </label></td>
        			<td><input type="text" name="tuNgay" placeholder="dd-mm-yyyy" required></td>
        		</tr>
        		<tr>
        			<td><label>Đến ngày: </label></td>
        			<td><input type="text" name="denNgay" placeholder="dd-mm-yyyy" required></td>
        		</tr>
        		<tr><td></td><th><input type="submit" name="submit" value="Tạo"></th></tr>
                </tbody>
        	</table>
    </form>
</div>
<div class="thu_chi_box">
<img alt="" class="thu_chi_close" src="sourse/close.png">
    <form action="modules/ql/modules/baocao/thu_chi.php" method="post" target="_blank">
        	<table>
            	<thead><tr>
                	<th colspan="2">Tạo báo cáo nhập xuất hàng</th>
                </tr></thead>
        		<tbody>
        		<tr>
        			<td><label>Từ ngày: </label></td>
        			<td><input type="text" name="tuNgay" placeholder="dd-mm-yyyy" required></td>
        		</tr>
        		<tr>
        			<td><label>Đến ngày: </label></td>
        			<td><input type="text" name="denNgay" placeholder="dd-mm-yyyy" required></td>
        		</tr>
        		<tr><td></td><th><input type="submit" name="submit" value="Tạo"></th></tr>
                </tbody>
        	</table>
    </form>
</div>