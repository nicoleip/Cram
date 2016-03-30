<?php
class Card
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function addCard($front, $back, $deck_id)
	{
		try
		{				

			$stmt = $this->db->prepare("INSERT INTO cards(id, front,back,deck_id)
                                                       VALUES(NULL, :front, :back, :deck_id)");

			$stmt->bindparam(":front", $front);
			$stmt->bindparam(":back", $back);
			$stmt->bindparam(":deck_id", $deck_id);			
			$stmt->execute();

			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	
	public function redirect($url)
	{
		header("Location: $url");
	}

	
}
