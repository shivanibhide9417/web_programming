<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

  <?php
  $q = intval($_GET['q']);
  $r = intval($_GET['r']);

    // Create connection
  $con = mysqli_connect('localhost', 'root', 'root','hw3');
  if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
  }

  mysqli_select_db($con,"php_ajax");

  if($q == 'all' && $r == 'both') {
      $query = 'SELECT * FROM babynames WHERE gender = "m"';
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

          $query1 = 'SELECT * FROM hw3.babynames WHERE gender = "f"';
            $data1 = mysqli_query($con, $query1) ;
            echo "&nbsp;&nbsp;&nbsp;&nbsp;<table>
                    <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Ranking</th>
                    <th>Gender</th>
                    </tr>";
                      while ($row = mysqli_fetch_array($data1)) {
                          echo "<tr>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['year'] . "</td>
                                <td>" . $row['ranking'] . "</td>
                                <td>" . $row['gender'] . "</td>
                                </tr>";
                              }
                          echo "</table>";
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
      } // else if ends

      else {
      if($r == 'both') {
        $query2 = 'SELECT * FROM babynames WHERE year = "'.$q.'" AND gender = "m"';
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

          $query4 = 'SELECT * FROM babynames WHERE year = "'.$q.'" AND gender = "f"';
          $data4 = mysqli_query($con, $query4) ;
          echo "&nbsp;&nbsp;&nbsp;&nbsp;<table>
                  <tr>
                  <th>Name</th>
                  <th>Year</th>
                  <th>Ranking</th>
                  <th>Gender</th>
                  </tr>";
                    while ($row = mysqli_fetch_array($data4)) {
                        echo "<tr>
                              <td>" . $row['name'] . "</td>
                              <td>" . $row['year'] . "</td>
                              <td>" . $row['ranking'] . "</td>
                              <td>" . $row['gender'] . "</td>
                              </tr>";
                            }
                        echo "</table>";

      }  // Inner if ends
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

              } // Inner else ends

            } // else ends
  ?>
</body>
</html>
