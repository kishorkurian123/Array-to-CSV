
<?php

/*
| -------------------------------------------------------------------
| Easy to use snippet to export your database into a csv. 
| -------------------------------------------------------------------
| Really handy and useful when you have scraping projects one after the other like me. Edit the codeigniter hooks to use it for pure php projects.
|
| 
| 
|   Author  : Kishor Kurian aka Repulsor
|   https://github.com/kishorkurian123
|   
|
|  “Any fool can write code that a computer can understand. Good programmers write code that humans can understand.”
|   -Martin Fowler
| -------------------------------------------------------------------
*/

    $file = fopen("tmp/export.csv","w");
    $query = "SELECT * FROM  `data`";
    $result = $this->db->query($query);
    $row = $result->unbuffered_row('array');

    //prepare the titles
    $title =array();
    $firstrow = array();
      foreach ($row as $key => $value){
      $title[] = $key;
      $firstrow[] = $value;
      }
    //Write heading titles to the csv
    fputcsv($file,$title);
    fputcsv($file,$firstrow);
      while($row = $result->unbuffered_row('array')){
      $buffer = array();
      foreach ($row as $items){
      $buffer[]=$items;
      }
      fputcsv($file,$buffer);
      }

    fclose($file);
    header("Location: tmp/export.csv");
    
    ?>
