<!DOCTYPE html>
<html>
    <head>
    <title>Datatable</title>

    <script src="http://code.jquery.com/jquery-3.1.0.min.js"> </script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
 
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <table id="example" class="display" style="width:100%">
    <form id="showTask">
        <thead>
            <tr>
            <th hidden="true">Task Tidfd</th> 
            <th>Task Title</th>
            <th>Mission</th>
            <th>Approval Status</th>
            <th >Edit Status</th>
            <th >Delete Status</th>
            </tr>
        </thead>
        <tbody>
       <!-- <form id="showTask"> -->
        <?php foreach ($taskdata as $row): ?>
              <tr>
                  <td class="idcls" style="display:none;"><?= $row['task_id'] ?></td>
                     <td><?= $row['task_title'] ?></td>
                      <td><?= $row['task_mission'] ?></td>
                      <td><?= $row['task_check'] ?></td>
                      <td> <button type="button"  class="btncls" data-toggle="modal" data-target="#myModalUpdate" >Edit</button></td>
                      <td> <button type="button" value="<?= $row['task_id']; ?>"  class="btnclsdlt">Delete</button></td>
                </tr>
          
          <?php endforeach; ?>

        </tbody>
    </table>
    <button type="button" class="openModal" data-toggle="modal" data-target="#myModal">Add Task</button>



    <!-- Data add Modal -->
    
 <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>ADD TASK</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  
      <form id="addtaskform">
      <div class="row">
      <div class="col-8"> <label class="col-6" for="textTitle"><b>Task Title</b></label>
        <input type="text" id="textTitle" name="task_title" class="form-control" /></div>
     
        <div class="col-8"><label class="col-6" for="textMission"><b>Task</b></label>
        <input type="text" id="textMission" name="task_mission" class="form-control"/></div>
        
        <div class="col-8" ><label class="col-6" for="textCheck"><b>Task Approve Status</b></label>
         <select name ="task_check" id="textCheck" class="form-control">
                    <option value="Kabul">Kabul</option>
                    <option value="Red">Red</option>
                   
                  </select></div>
        </div>
      
      
                  </form> 
                  
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="button" class="butonAdddata">Add Task</button>
        
       </div>
       
     </div>
   </div>
 </div>


    </body>
    <script>
        new DataTable('#example',{
         
            columnDefs:[
                 {
            target: 0,
            visible: false,
            searchable: false
        },
        {
            target: 0,
            visible: false
        },
        {
          orderable: true,
            targets: [1, 2, 3]
           
        }
            ]
          

        });
    </script>
    
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Validation library file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        
     $(function() {


    //$('#addtaskform').validate();
 

    $('.butonAdddata').click(function() {
   
        
   
       

    $.ajax({
        url: "<?= site_url('/DatatableController/addTaskData') ?>",
        type: "POST",
        cache: false,
        data: $('#addtaskform').serialize(),
        processData: false,
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: "JSON",
        success: function(data) {
            if (data.success == true) {
              
              location.reload();
               
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          //location.reload();
        }
    });
});

});

</script>



        
</html>