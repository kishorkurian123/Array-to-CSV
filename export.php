
<?php
//Easy to use snippet to export your database into a csv. 
//Really handy and useful when you have scraping projects one after the other like me.
//Coded by- Kishor Mathew Kurian

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
