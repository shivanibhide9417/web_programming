<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 5px;
    padding: 5px;
    
}

th {text-align: left;}
</style>
</head>
<body>

  <?php
  $q = $_GET['q'];
  $r = $_GET['r'];
  $con = mysqli_connect('localhost', 'root', 'root','hw3');
  if (!$con) {
      die('Connection could not be established: ' . mysqli_error($con));
  }
  
  mysqli_select_db($con,"php_ajax");
  if($q == 'all' && $r == 'both') {
      $query = 'SELECT * FROM babynames';
      $data = mysqli_query($con, $query) ;
      echo "&nbsp;&nbsp;&nbsp;&nbsp;<table>
                <tr>
                <th>Name</th>
                <th>Year</th>
                <th>Ranking</th>
                <th>Gender</th>
                </tr>";
                  while ($row = mysqli_fetch_array($data)) {
                      echo "<tr>
                          <td>" . $row['name'] . "</td>
                          <td>" . $row['year'] . "</td>
                          <td>" . $row['ranking'] . "</td>
                          <td>" . $row['gender'] . "</td>
                        </tr>";
                   }
                   echo "</table>&nbsp;&nbsp;&nbsp;&nbsp;";

         
          }  // if ends

        else if($q == 'all' && !($r == 'both')) {
        $query5 = 'SELECT * FROM babynames WHERE gender = "'.$r.'"';
        $data5 = mysqli_query($con, $query5) ;
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<table>
                <tr>
                <th>Name</th>
                <th>Year</th>
                <th>Ranking</th>
                <th>Gender</th>
                </tr>";
                  while ($row = mysqli_fetch_array($data5)) {
                      echo "<tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['year'] . "</td>
                            <td>" . $row['ranking'] . "</td>
                            <td>" . $row['gender'] . "</td>
                            </tr>";
                          }
                      echo "</table>";
      } 
      else {
      if($r == 'both') {
        $query2 = 'SELECT * FROM babynames WHERE year = "'.$q.'"';
        $data2 = mysqli_query($con, $query2) ;
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<table>
                  <tr>
                  <th>Name</th>
                  <th>Year</th>
                  <th>Ranking</th>
                  <th>Gender</th>
                  </tr>";
                    while ($row = mysqli_fetch_array($data2)) {
                        echo "<tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['year'] . "</td>
                            <td>" . $row['ranking'] . "</td>
                            <td>" . $row['gender'] . "</td>
                          </tr>";
                     }
                     echo "</table>&nbsp;&nbsp;&nbsp;&nbsp;";
      } 
      else {
          $query3 = 'SELECT * FROM babynames WHERE year = "'.$q.'" AND gender = "'.$r.'"';
          $data3 = mysqli_query($con, $query3) ;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;<table>
                  <tr>
                  <th>Name</th>
                  <th>Year</th>
                  <th>Ranking</th>
                  <th>Gender</th>
                  </tr>";
                    while ($row = mysqli_fetch_array($data3)) {
                        echo "<tr>
                              <td>" . $row['name'] . "</td>
                              <td>" . $row['year'] . "</td>
                              <td>" . $row['ranking'] . "</td>
                              <td>" . $row['gender'] . "</td>
                              </tr>";
                            }
                        echo "</table>";

              } 

            }
  ?>
</body>
</html>
