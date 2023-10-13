<?php
require_once('../assets/setup/db.inc.php');
$q = "SELECT ulh.id, ulh.user_id, u.username, ulh.login_time
    FROM user_login_history as ulh
    INNER JOIN users as u
    ON ulh.user_id = u.id
    ORDER BY ulh.id ASC";
$result = @mysqli_query($conn, $q);
if ($result) { // If no error, this will run
    echo '
    <div class="table-responsive">
    <table class="table table-dark table-bordered table-striped" width="100%">
      <thread>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User ID</th>
          <th scope="col">Username</th>
          <th scope="col">Login Time</th>
        </tr>
      </thread>';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '
      <tbody>
        <tr>
          <th scope="col">' . $row['id'] . '</th>
          <th scope="col">' . $row['user_id'] . '</th>
          <th scope="col">' . $row['username'] . '</th>
          <td>' . $row['login_time'] . '</td>
        </tr>';
    }
    echo '
      </tbody>
    </table>
    <div>';
    mysqli_free_result($result);
} else { // If an error occurs, this will run
    echo '<p style="color:#ff0000ff; font-weight:bold;"> The user login history could not be retrieved. We apologize for the inconvenience.</p>';
    echo '<p>' . mysqli_error($conn) . '</p>';
}
mysqli_close($conn);
?>