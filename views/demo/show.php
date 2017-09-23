<table>
	<?php foreach ($data as $key => $value) {?>
	<tr>
		<td><?php echo $value['username'] ?></td>
		<td><?php echo $value['userpwd'] ?></td>
	</tr>
	<?php } ?>
</table>