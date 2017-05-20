
function editData(editableObj,name,id){
  $.ajax({
  url:"adminpage.php",
  type:"POST",
  data:'name='+name+editableObj.innerHTML+'&id='+id,
  success:funciton(data){
    $(editableObj).css("background","#FDFDFD");
  }

});

}
