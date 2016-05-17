<?php

class Application_Model_Rss extends Zend_Db_Table_Abstract
{
	protected $_name = "paths";

	function addPath($data)
	{
		$row = $this->createRow();
		$row->path=$data['path'];
		return $row->save();
	}

	function deletePath($id)
	{
		return $this->delete("id=$id");
	}

	// function edit($data,$id)
	// {
	// 	return $this->update($data,'id='.$id);
	// }

	function listAll()
	{
		return $this->fetchAll()->toArray();
	}

	// function courseById($id)
	// {
	// 	return $this->find($id)->toArray();
	// }
}

