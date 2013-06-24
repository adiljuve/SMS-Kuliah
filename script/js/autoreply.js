$(document).ready(function() {
	$('#example').dataTable( {
		"sPaginationType": "full_numbers"
	} );
} );

function ajax()
{
if (window.XMLHttpRequest)
{
 xmlhttp=new XMLHttpRequest();
}
else
{
 xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.open("GET",autoreply_url);
xmlhttp.send();
setTimeout("ajax()", 3000);//5dtk=5000
}