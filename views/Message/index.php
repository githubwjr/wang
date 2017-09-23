<?php 
 ?>
 <form action="index.php?c=Message&c_a=add" method="post" enctype="multipart/form-data">
 <table class="table">
 <tr>
 	<th>文件</th>
 	<td><input type="file" name="file" id=""></td>
 </tr>
 	<tr>
 		<th>留言人：</th>
 		<td><input type="text" name="user" class="form-control"></td>
 	</tr>
 	<tr>
 		<th>留言内容：</th>
 		<td><input type="text" name="content" class="form-control"></td>
 	</tr>
 	<tr>
 		<td></td>
 		<td><input type="submit" value="提交留言" class="btn-primary"></td>
 	</tr>
 </table>
 </form>