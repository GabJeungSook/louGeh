function addCourse()
{
    
    var courseName = document.getElementById("courseName").value;
    var courseCode = document.getElementById('courseCode').value;
    var points = document.getElementById('creditPoints').value;
    var year = document.getElementById('year').value;
            $.ajax({
                url: "addCourse.php",
                method: "post",
                data: {
                    courseName : courseName,
                       courseCode : courseCode,
                       points : points,
                       year : year,
                     },
                success: function(res)
                {
                alert("Course is added!");
                location.reload();
                }
}); 

}
            
