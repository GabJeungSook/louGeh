<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <script src= 'addStudent.js'></script> 
        <script src= 'jquery-3.5.1.js'></script>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 1310px;
    empty-cells: hide;
    margin: 10px;
}
th{
    background-color: #dddddd; 
    border: 1px solid black;
    text-align: left;
    padding: 8px;
  }

td {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(odd) {
  background-color: #4CAF50;
}

</style>
</head>
<body>
    
<div id="header-text">
    <h1><strong id="top-title">Lou Geh University</strong></h1>
</div>
    <div class="topnav">
          <a href="index.html"><i class="fa fa-fw fa-home"></i>Home</a>
        <a href="courses.php">Courses</a>
  <a class="active" href="students.php">Students</a>
</div>
<div>
      <h1 class = "cLabel"><br>Students</h1>

    
    <table>
          <thead>
          <tr>
           <th>Student Name</th>
           <th>Course</th>
           <th>Birthday</th>
           <th>Year</th>
           <th>Semester</th>
           </tr>
           </thead>
         <?php
                $conn = mysqli_connect("localhost", "root", "", "lou_geh_db") or die(mysqli_error());
    
                $query = "Select a.student_name, a.student_lastName, b.course_name, a.birthday, a.year, a.sem from tbl_students a INNER JOIN 
                tbl_course b ON a.course_id = b.course_id ORDER BY a.student_name";
                $query_run = mysqli_query($conn, $query);
                $check= mysqli_num_rows($query_run) > 0;
                $ctr = 0;
                if($check)
                {
                  while($row =mysqli_fetch_array($query_run))
                {$ctr++;
                ?>   
        <tr><td><?php echo $row['student_name']." ".$row['student_lastName'];?></td><td><?php echo $row['course_name'];?></td><td><?php echo $row['birthday'];?></td>
        <td><?php echo $row['year'];?></td><td><?php echo $row['sem'];?></td></tr>
                  <?php }
                 }else
                 {
                   echo '<h1>NO SUBJECTS YET</h1>';
                 }
                 ?>
    </table>
   <a href="#" id="addStudent" class="button">Add Students</a>
</div>
    
    <div class = "bg-modal-stud">
<div class="modal-content-stud">
<div class="modal-header-stud">
    <div class = "close-stud">+</div>
    <h1>Add Student</h1>
  </div>
    <div class="modal-body">
             <div class="courseName-subj">  
                                <h4>Select Course:</h4>  
              <div class="custom-select" style="width:200px;">

  <select id="subj" style="margin-left: 2px; height:40px; width: 300px">
      <?php
                $conn = mysqli_connect("localhost", "root", "", "lou_geh_db") or die(mysqli_error());
    
                $query = "Select * from tbl_course";
                $query_run = mysqli_query($conn, $query);
                $check= mysqli_num_rows($query_run) > 0;
                $ctr = 0;
    
                if($check)
                {
                  while($row =mysqli_fetch_array($query_run))
                {$ctr++;
                ?>   
                           <option><?php echo $row['course_name'];?></option>
                  <?php }
                 }else
                 {
                   echo '<option>NO RECORDS YET</option>';
                 }
                 ?>

      </select>
     </div>
    </div>
    <div class="studentName">
   <h4>First Name:</h4>    
  <input type="text" id="studentName" name="studentName" placeholder="Enter Student Name" style="margin-left: 20px; width: 292px">
    </div>
        <div class="studentLastName">         
    <h4>Last Name:</h4>    
  <input type="text" id="studentLastName" name="studentLastName" placeholder="Enter Student Last Name" style="margin-left: 25px; width: 292px">
       </div>
        <div class = "birthday">
            
     <h4>Birthday:</h4>    
  <input type="date" id="birthday" name="birthday" value ="100" style="margin-left: 38px; width: 295px">
        </div>
  <div class="yearClass">
  <h4>Year:</h4>    
  <input type="number" id="years" name="years" min="2000" max="2020" value="2020" style="margin-left: 70px;">
        </div>
    <div class="sem">
  <h4>Sem:</h4>    
  <input type="number" id="sems" name="sems" min="1" max="2" value="1" style="margin-left: 10px;">
        </div>
               <input type="submit" class="button" value="Submit" style="margin-left: 10px; margin-top: 25px; width: 430px" onclick="addStudent()">
    </div>
</div>
</div>
    
    
     <script>
        document.getElementById('addStudent').addEventListener('click', 
        function(){
       document.querySelector('.bg-modal-stud').style.display = 'flex';
        });
         document.querySelector('.close-stud').addEventListener('click',
        function(){
            document.querySelector('.bg-modal-stud').style.display = 'none';
        })
        
        
    </script>
    
</body>
</html>
