<?php
class User
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function register($name, $username, $email, $password)
	{
		try
		{
			
			 
			$stmt = $this->db->prepare("INSERT INTO users(id, name,username,password, email)
                                                       VALUES(NULL, :name, :username, :password, :email)");

			$stmt->bindparam(":name", $name);
			$stmt->bindparam(":username", $username);
			$stmt->bindparam(":email", $email);
			$stmt->bindparam(":password", $password);
			$stmt->execute();
			 
			return $stmt;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function login($username,$password)
	{
		try
		{
			$stmt = $this->db->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
			$stmt->execute(array(':username'=>$username));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				if($password == $userRow['password'])
				{
					$_SESSION['user_session'] = $userRow['id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>