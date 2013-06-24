<?php

/*

Written by TuTToWeB  | |   Email: valeriogiuffrida@hotmail.com

Edited by Fahmi Basya Kartapura || Email: fahmibasya@gmail.com

*/

class Csv2sql{

var $csvfile,$delimitatore,$nometable;

var $_FIELD;

function csv2sql($cf='',$del='',$nt='')  {

$this->csvfile = $cf;

$this->delimitatore = $del;

$this->nometable = $nt;

}
function Export()  {

$csvhandle = file($this->csvfile);

$field = explode($this->delimitatore,$csvhandle[0]);

$kolom = "";

foreach ($field as $array_kolom)    {

$kolom .= "'".trim($array_kolom)."',";

}

$kolom = trim(substr($kolom,0,-1));

for ($i=1;$i<count($csvhandle);$i++)                {

$valori = explode($this->delimitatore,$csvhandle[$i]);

$values = "";

foreach ($valori as $val)      {

$val=trim($val);

if (eregi("NULL",$val) == 0)

$values .= "'".addslashes($val)."',";

else

$values .= "NULL,";

}

$values = trim(substr($values,0,-1));

$query = "INSERT INTO '".$this->nometable."' (".$kolom.") VALUES (".trim($values).");";

$QUERY[]=$query;

return $QUERY;

}

}

?>