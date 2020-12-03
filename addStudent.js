function addStudent()
{
    var course = document.getElementById('subj').value;    
    var studentName = document.getElementById('studentName').value;
    var studentLastName = document.getElementById('studentLastName').value;
    var birthday = document.getElementById('birthday').value;
    var years = document.getElementById('years').value;
    var sems = document.getElementById('sems').value;
                $.ajax({
                url: "addStudent.php",
                method: "post",
                data: {
                    course : course,
                       studentName : studentName,
                       studentLastName : studentLastName,
                       birthday : birthday,
                       years : years,
                       sems : sems,
                     },
                success: function(res)
                {
                alert("Student is added!");
                location.reload();
                }
});

}
            
