function addSubject()
{
        
    var courseName = document.getElementById('subj').value;
    var subjName = document.getElementById('subjName').value;
    var subjCode = document.getElementById('subjCode').value;
    var unit = document.getElementById('unit').value;
    var year = document.getElementById('subYear').value;
    var sem = document.getElementById('sem').value;
            $.ajax({
                url: "addSubject.php",
                method: "post",
                data: {
                    courseName : courseName,
                       subjName : subjName,
                       subjCode : subjCode,
                       unit : unit,
                       year : year,
                       sem : sem,
                     },
                success: function(res)
                {
                alert("Subject is added!");
                location.reload();
                }
});

}
            
