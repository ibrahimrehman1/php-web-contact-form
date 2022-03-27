<?php 

require_once 'vendor\autoload.php';
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $issueType = $_POST['issueType'];
        $userComments = $_POST['userComments'];

        try{

    
            $pdo = new \PDO(
                'mysql:host=localhost;port=3306;dbname=contactformdata',
                'root',
                ''
            );
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // Configure different password hashers via the factory
            $factory = new PasswordHasherFactory([
                'common' => ['algorithm' => 'bcrypt'],
                'memory-hard' => ['algorithm' => 'sodium'],
            ]);
    
            // Retrieve the right password hasher by its name
            $passwordHasher = $factory->getPasswordHasher('common');
    
            // Hash a plain password
            $hashPassword = $passwordHasher->hash($password); // returns a bcrypt hash
    
            $stat = $pdo->prepare(
                'INSERT INTO users VALUES (:username, :emailAddress, :password, :issueType, :userComments)'
            );
    
            $stat->bindValue(':username', $username);
            $stat->bindValue(':emailAddress', $email);
            $stat->bindValue(':password', $hashPassword);
            $stat->bindValue(':issueType', $issueType);
            $stat->bindValue(':userComments', $userComments);
    
            $stat->execute();
    
        }catch(Exception $err){
            echo "Unable to Connect to DB";
        }
    } 

    

?>