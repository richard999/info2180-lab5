<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);

if(isset($_GET['context']) && $_GET['context']=='cities'){
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM countries JOIN cities ON countries.code=cities.country_code WHERE countries.name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  echo "<table id='result-table'>
          <thead>
            <tr>
              <th>
                Name
              </th>
              <th>
                District
              </th>
              <th>
                Population
              </th>
            </tr>
          </thead> 
          <tbody>
        ";

  foreach ($results as $row){
    echo "<tr>";
      echo "<td>";
        echo $row['name'];
      echo "</td>";
      echo "<td>";
        echo $row['district'];
      echo "</td>";
      echo "<td>";
        echo $row['population'];
      echo "</td>";
    echo "</tr>";
  }
  echo "</tbody>
    </table>";
}
else{
  
  $stmt = $conn->query("SELECT name, continent, independence_year, head_of_state FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table id='result-table'>
          <thead>
            <tr>
              <th>
                Name
              </th>
              <th>
                Continent
              </th>
              <th>
                Independence
              </th>
              <th>
                Head of State
              </th>
            </tr>
          </thead> 
          <tbody>
        ";

  foreach ($results as $row){
    echo "<tr>";
      echo "<td>";
        echo $row['name'];
      echo "</td>";
      echo "<td>";
        echo $row['continent'];
      echo "</td>";
      echo "<td>";
        echo $row['independence_year'];
      echo "</td>";
      echo "<td>";
        echo $row['head_of_state'];
      echo "</td>";
    echo "</tr>";
  }
  echo "</tbody>
    </table>";
}