
//when button pressed, generate and display data using AJAX for predictions
$('#predictButton').click(function() {
        var value = $("#prediction").val();
        console.log(value);
        
        $.ajax({url: "Welcome/predict/" + value, success: function(result) {
                $("#predictResult").html(result);
        }});
});
