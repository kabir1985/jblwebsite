

<?php
if (count($log)) {
    echo "<table  class='table table-striped table-bordered'>";
    echo "<thead><tr>";
    echo "<th>ID</th>
		  <th>User Name</th>
		  <th>Department</th>	   
                  <th>Login</th>
                  <th>Logout</th>";
    echo "</tr></thead>";
    echo"<tbody>";
    foreach ($log as $key => $list) {
        echo "<tr>";
        echo "<td>" . $list['id'] . "</td>";
        echo "<td>" . $list['username'] . "</td>";
        echo "<td>" . $list['department'] . "</td>";
        echo "<td>" . $list['login'] . "</td>";
        echo "<td>" . $list['logout'] . "</td>";
        echo "</tr>";
    }
    echo"</tbody>";
    echo "</table>";
}
?>