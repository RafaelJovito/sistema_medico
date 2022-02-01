<?php

/*
 * Get the rows of a table
 */

  
 function getItensTable($mysql_conn,$tableName)
{
	$table=null;
	$result	= mysqli_query($mysql_conn,"select * from $tableName");

	for($i=0; $i<mysqli_num_rows($result); $i++)
	{
		$table[$i] = mysqli_fetch_array($result);
	}
	return $table;
}

function getItemFromTable($mysql_conn, $tableName, $itenId)
{
	$result = mysqli_query($mysql_conn, "select * from ".$tableName." where id=".$itenId);
	$item	= mysqli_fetch_array($result);
	
	return $item;
}

