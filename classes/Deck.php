<?php
class Deck
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function addDeck($title, $description, $category_id, $user_id)
	{
		try
		{				

			$stmt = $this->db->prepare("INSERT INTO decks(id, title, description, category_id, user_id)
                                                       VALUES(NULL, :title, :description, :category_id, :user_id)");

			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":description", $description);
			$stmt->bindparam(":category_id", $category_id);	
			$stmt->bindparam(":user_id", $user_id);
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
