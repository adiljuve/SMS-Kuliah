function onDelete()  
{  
	var boxes = document.getElementsByTagName('input');
	
	for (var i in boxes)
	{
		if (boxes[i].type == 'checkbox' && boxes[i].checked)
		{
			return confirm('Anda yakin ingin menghapus?');
		}
	}
	
	//alert("Please select an item.");
	return false;
}  

function pilihan()
{
 // membaca jumlah komponen dalam form bernama 'myform'
 var jumKomponen = document.myform.length;

 // jika checkbox 'Pilih Semua' dipilih   
 if (document.myform[0].checked == true)
 {
	// semua checkbox pada data akan terpilih
	for (i=1; i<=jumKomponen; i++)
	{
		if (document.myform[i].type == "checkbox") 
			document.myform[i].checked = true;
	}
 }
 // jika checkbox 'Pilih Semua' tidak dipilih
 else if (document.myform[0].checked == false)
	{
		// semua checkbox pada data tidak dipilih
		for (i=1; i<=jumKomponen; i++)
		{
		   if (document.myform[i].type == "checkbox") 
		   document.myform[i].checked = false;
		} 
	}
}