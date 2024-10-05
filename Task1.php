<?php

$data = [
	['Иванов', 'Математика', 5],
	['Иванов', 'Математика', 4],
	['Иванов', 'Математика', 5],
	['Петров', 'Математика', 5],
	['Сидоров', 'Физика', 4],
	['Иванов', 'Физика', 4],
	['Петров', 'ОБЖ', 4]
];

$Ivanov_Math = 0;
$Petrov_Math = 0;
$Sidorov_Phisics = 0;
$Ivanov_Phisics = 0;
$Petrov_OBG = 0;

?>

<?php
for ($i = 0; $i < count($data); $i++)
{
   if ($data[$i][0] == "Иванов" && $data[$i][1] == "Математика") $Ivanov_Math+=$data[$i][2];
   if ($data[$i][0] == "Петров" && $data[$i][1] == "Математика") $Petrov_Math +=$data[$i][2];
   if ($data[$i][0] == "Сидоров" && $data[$i][1] == "Физика") $Sidorov_Phisics+=$data[$i][2];
   if ($data[$i][0] == "Иванов" && $data[$i][1] == "Физика") $Ivanov_Phisics+=$data[$i][2];
   if ($data[$i][0] == "Петров" && $data[$i][1] == "ОБЖ") $Petrov_OBG+=$data[$i][2];
}

?>

<table border="1">
  <tr>
    <th></th>
    <th>Математика</th>
    <th>ОБЖ</th>
    <th>Физика</th>
  </tr>
  <tr>
    <td>Иванов</td>
    <td><?php echo $Ivanov_Math;?></td>
    <td></td>
    <td><?php echo $Ivanov_Phisics;?></td>
  </tr>
  <tr>
    <td>Петров</td>
    <td><?php echo $Petrov_Math;?></td>
    <td><?php echo $Petrov_OBG;?></td>
    <td></td>
  </tr>
  <tr>
    <td>Сидоров</td>
    <td></td>
    <td></td>
    <td><?php echo $Sidorov_Phisics;?></td>
  </tr>
</table>