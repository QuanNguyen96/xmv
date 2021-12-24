<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			width: 100%;
			text-align: center;
		}
		table td{
			border: 1px solid #ccc;
			padding: 5px;
		}
		ul{
			list-style: none;
			margin: 0px;
			padding: 0px;
		}
	</style>
</head>
<body>
		<table>
		<?php foreach ($data as $key => $value): ?>
				<?php foreach ($value as $key1 => $value1): ?>
					<tr>
						<td>
							<?php echo 'Tháng:'. $key1.'/'.$key; ?>
						</td>
						<?php foreach ($value1 as $key2 => $value2): ?>
						<td>
							    <p><b><?php echo $key2; ?></b></p>
								<?php foreach ($value2 as $key3 => $value3): ?>
										<?php echo $value3; ?>
								<?php endforeach ?>
						<td>
						<?php endforeach;?>	
					</tr>
				<?php endforeach ?>
		<?php endforeach ?>
		</table>
</body>
</html>