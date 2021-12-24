<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=info_code.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<meta charset="utf-8" />
<table border="1">
    <thead>
        <tr>
            <td>Link</td>
            <td>Ngày nhập</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $key => $value):?>
        <tr>
            <td><?php echo $value['url']?></td>
            <td><?php echo date('j-n-Y',$value['date']);?></td>
            <td><?php echo $value['total']?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>   