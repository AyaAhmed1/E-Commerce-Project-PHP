
$(function () {
$('.addCart').click(function () {
    //alert('Added');
    this.innerHTML='added';
    this.disabled=true;
    var prodID=$(this).attr('id');
   // alert(prodID);
    $.ajax({
	url: '/ay7aga.php',
	type: 'post',
        data:{text: prodID},
	success: function (response) {
           
            //console.log(response);
            //console.log(JSON.parse(response));
              
            }
        });
    


});

$('.removeCart').click(function () {
    //alert('removed');
    //this.innerHTML='added';
    $(this).parent().remove();
    var prodID=$(this).attr('id');
    var prodPrice=$(this).attr('price');
    //alert(prodID);
    $.ajax({
	url: '/ay7aga2.php',
	type: 'post',
        data:{text: prodID,
        price: prodPrice},
	success: function (response) {
            //console.log("mn l ajax 2");
            //if (response.success == true) {
            //console.log(response);
            //console.log(response.price);
            $('#tot').text("Total="+JSON.parse(response)+"L.E");
            //console.log(JSON.parse(response));
              
            //}
   
   }
        });
    


});

    $('.deleted').click(function () {
   
        $(this).parent().remove();
       // window.location = "/addProduct.php"
    });

});
//}