<?php 
	namespace views;
 ?>
 <table class="table-border">
 	<tr>
 	<th>ID</th>
 	<th>留言人</th>
 	<th>内容</th>
 	</tr>
 	<?php foreach ($data as $key => $value) {?>
 		<tr>
 			<td><?= $value['id']?></td>
 			<td><?= $value['user']?></td>
 			<td><?= $value['content']?></td>	
 		</tr>
 	<?php } ?>
 </table>