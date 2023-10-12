<?php
require_once('../assets/setup/db.inc.php');
$q = "SELECT id,
    user_level,
    username,
    CONCAT(last_name,', ',first_name) AS Name,
    email,
    DATE_FORMAT(created_at, '%m-%d-%Y') AS regdate, 
    DATE_FORMAT(verified_at, '%m-%d-%Y') AS verified,
    DATE_FORMAT(last_login_at, '%m-%d-%Y') AS last_login
    FROM
    users ORDER BY id ASC";
$result = @mysqli_query($conn, $q);
if ($result && $_SESSION['user_level'] == "3") { //if no error this will run
  echo '
    <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped" width="100%">
      <thread>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Level</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Registration Date</th>
          <th scope="col">Verified</th>
          <th scope="col">Last Login</th>
        </tr>
      </thread>';
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo '
      <tbody>
        <tr>
          <th scope="col">' . $row['id'] . '</th>
          <th scope="col">' . $row['username'] . '</th>
          <th scope="col">' . $row['user_level'] . '</th>
          <td>' . $row['Name'] . '</td>
          <td>' . $row['email'] . '</td>
          <td>' . $row['regdate'] . '</td>
          <td>' . $row['verified'] . '</td>
          <td>' . $row['last_login'] . '</td>
        </tr>';
  }
  echo '
      </tbody>
    </table>
    <div>';
  mysqli_free_result($result);
} elseif ($result && $_SESSION['user_level'] == "2") { //if no error this will run
  echo '
    <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped" width="100%">
    <thread>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Level</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Registration Date</th>
        <th scope="col">Verified</th>
        <th scope="col">Last Login</th>
      </tr>
    </thread>';
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo '
      <tbody>
        <tr>
          <th scope="col">' . $row['id'] . '</th>
          <th scope="col">' . $row['username'] . '</th>
          <th scope="col">' . $row['user_level'] . '</th>
          <td>' . $row['Name'] . '</td>
          <td>' . $row['email'] . '</td>
          <td>' . $row['regdate'] . '</td>
          <td>' . $row['verified'] . '</td>
          <td>' . $row['last_login'] . '</td>
        </tr>';
  }
  echo '
      </tbody>
    </table>
    <div>';
  mysqli_free_result($result);
} else { // error had appeared
  echo '<p style="color:#ff0000ff; font-weight:bold;"> The current users could not be retrieved. We apologize for the inconviniece.</p>';
  echo '<p>' . mysqli_error($conn) . '</p>';
}
mysqli_close($conn);
?>