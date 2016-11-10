$(function(){


    var specialElementHandlers = {
      '#download_pdf': function(element, renderer){
       		return true;
    	}
    };

	$('#download_pdf').click(function(){
		var doc = new jsPDF();
		var html=$(".main-content.front").html();
         doc.fromHTML(html,1,1, {
            'width': 500,
            'elementHandlers': specialElementHandlers
         });
      doc.save("Test.pdf");
	});
});