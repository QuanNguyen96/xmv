<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content=">" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="robots" content="noindex, nofollow"/>
        <style>
           table{
           }
           table td{
            border:1px solid #ccc;
            padding:10px;
           }
        </style>
</head>

<body>

   <table>
      <thead>
         <th>STT</th>
         <th>Codes</th>
         <th>Phone</th>
         <th>Created date</th>
      </thead>
      <tbody>
        <?php $i = 0; foreach( $list as $key => $val ):
                $i++;
        ?>
         <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $val['codes']; ?></td>
          <td><?php echo $val['phone']; ?></td>
          <td><?php echo date('G:i - j/n/Y',$val['created_date']); ?></td>
         </tr> 
        <?php endforeach; ?>
      </tbody>
   </table>

</body>
</html>