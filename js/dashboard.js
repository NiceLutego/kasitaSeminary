$(document).ready(function(){
  function updateWidgets(){
    $.ajax({
      url:'get-dashboard-data.php',
      method:'GET',
      success:function(data){
        $('#total-media').data
      }
    })
  }
})