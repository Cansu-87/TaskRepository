<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="http://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

<head>
  
<link rel="stylesheet" href="styles.css">
	<title>Task</title>
  
</head>
<body>

    




<?php
// Show data on page 
?>
<form id="showTask">


<button type="button" class="openModal" data-toggle="modal" data-target="#myModal">Add Task</button>
<div class="mx-auto" style="width=800px;">
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" width="600" border="4" cellspacing="5" cellpadding="5" >
    <thead class="thead-dark">
      <tr>
        <th scope="col">Task Id</th>
        <th scope="col">Task Title</th>
        <th scope="col">Mission</th>
        <th scope="col">Approval Status</th>
        <th scope="col">Edit Status</th>
      </tr>
    </thead>
    <tbody>
          <?php foreach($task as $row) : ?>
          <tr>
                <td><?= $row['task_id'] ?></td>
                <td><?= $row['task_title'] ?></td>
                <td><?= $row['task_mission'] ?></td>
                <td><?= $row['task_check'] ?></td>
               <td> <button type="button"  class="btncls" data-toggle="modal" data-target="#myModalUpdate" >Edit</button></td>
                
          </tr>
          
          <?php endforeach; ?>

        </table>
             
    </tbody>
    
  </table>
</div>
</form>

<form id="add_task" >
 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ADD TASK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  
      
  <table width="450" border="1" cellspacing="5" cellpadding="5">
          
    <tr>
      <td >Title</td>
      <td>
        <input type="text" name="task_title" />
      </td>
    </tr>
    <tr>
      <td>Mission</td>
      <td>
        <input type="text" name="task_mission" />
      </td>
    </tr>

    <tr>
      <td>Check</td>
              <td>
                  
                  <select name="task_check" >
                    <option value="Kabul">Kabul</option>
                    <option value="Red">Red</option>
                   
                  </select>
           

          </td>
      </tr>

         
  </table>



</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="button" class="butonAdd">Add Task</button>
        
      </div>
    </div>
  </div>
</div>



</form>



<form id="update" >
 <div class="modal" id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">UPDATE TASK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="false">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

      
  <table width="450" border="1" cellspacing="5" cellpadding="5">
   
    <tr>
      <td >Title</td>
      <td>
        <input type="text" class ="inpt" name="task_title"  />
      </td>
    </tr>
    
    <tr>
      <td>Mission</td>
      <td>
        <input type="text" class ="inpt" name="task_mission" />
      </td>
    </tr>

    <tr>
      <td>Check</td>
              <td>
                  
                  <select name="task_check" class ="inpt" >
                    <option class ="inpt" value="Kabul">Kabul</option>
                    <option  class ="inpt"value="Red">Red</option>
                   
                  </select>
           

          </td>
      </tr>

      
  </table>



</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="buttonUpdate" class="btn btn-primary">Update</button>
        
      </div>
    </div>
  </div>
</div>



</form>









</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Validation library file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<!-- Sweetalert library file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>









<script>

$(function() {


$('#add_task').validate();


$('.butonAdd').click(function() {

    

  var formData = $("#add_task").serialize();
    
    

    $.ajax({
        url: "<?= site_url('Task/addTask') ?>",
        type: "POST",
        cache: false,
        data: formData,
        processData: false,
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                //Swal.fire('Saved!', '', 'success')
                location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});
});


</script>

<script>

$(function() {



$('.btn.btn-primary').click(function() {

    

  var formData = $("#update").serialize();
    console.log(formData);
    

    $.ajax({
        url: "<?= site_url('Task/update') ?>",
        type: "POST",
        cache: false,
        data: formData,
        processData: false,
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
                //Swal.fire('Saved!', '', 'success')
                location.reload();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    });
});
});




$('.btncls').click(function()

{
  //var x=document.firstElementChild.lastElementChild.firstElementChild.lastElementChild.firstElementChild.lastElementChild;
  //console.log(x);
  
  var taskid=$(this).parents("tr")[0].children[0].innerText;
  var taskname=$(this).parents("tr")[0].children[1].innerText;
  var taskmission=$(this).parents("tr")[0].children[2].innerText;
  var taskcheck=$(this).parents("tr")[0].children[3].innerText;
  
  /*
  console.log(taskid);
  console.log(taskname);
  console.log(taskmission);
  console.log(taskcheck);
  */
 // document.getElementsByClassName("inpt")[1].value=taskid;
  $(".inpt")[0].value=taskname;
  $(".inpt")[1].value=taskmission;
  $(".inpt")[2].value=taskcheck;


});



/*

const classNameButton=document.getElementsByClassName("btn btn-primary1");
console.log("classNameButton");
var numberOfclassButtons=document.querySelectorAll(".primary1").length;
for (var index = 0; index < numberOfclassButtons; index++) {
 document.querySelectorAll("#primary1")[index].addEventListener("click",function(){
  console.log("clicked");

 });

}
*/

</script>




</html>