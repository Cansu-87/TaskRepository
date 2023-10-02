<!DOCTYPE html>
<html>

<head>
  <form id="showTask">
    
	<title>Task</title>
</head>
<input type="button" value="Add Task" onclick="Redirect();" />
<table class="table" width="600" border="1" cellspacing="5" cellpadding="5">
    <thead>
      <tr>
        <th scope="col">Task Id</th>
        <th scope="col">Task Title</th>
        <th scope="col">Mission</th>
        <th scope="col">Approval Status</th>
      </tr>
    </thead>
    <tbody>
          <?php foreach($task as $row) : ?>
          <tr>
                <td><?= $row['task_id'] ?></td>
                <td><?= $row['task_title'] ?></td>
                <td><?= $row['task_mission'] ?></td>
                <td><?= $row['task_check'] ?></td>

          </tr>
          <?php endforeach; ?>

        </table>
        
      
    </tbody>
  </table>
          </form>
  <script>
         function Redirect() {
            location.href="http://localhost:8080/";
         }
      </script>

</html>