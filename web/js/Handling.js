
$("#search").autocomplete({
        source: "search.php",
        minLength: 2,
        select: function (event, ui){
       window.location = "productView.php?id=" +ui.item.value; 
         }
    });

