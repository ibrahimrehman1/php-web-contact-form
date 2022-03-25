<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posted User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>

<main class="container userInfo">
    
    <?php
    require_once 'vendor\autoload.php';
    use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new \PDO(
            'mysql:host=localhost;port=3306;dbname=contactformdata',
            'root',
            ''
        );
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $issueType = $_POST['issueType'];
        $userComments = $_POST['userComments'];

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
            'INSERT INTO contacts VALUES (:username, :emailAddress, :password, :issueType, :userComments)'
        );

        $stat->bindValue(':username', $username);
        $stat->bindValue(':emailAddress', $email);
        $stat->bindValue(':password', $hashPassword);
        $stat->bindValue(':issueType', $issueType);
        $stat->bindValue(':userComments', $userComments);

        $stat->execute();
    }
    ?>
    <h3>
        <span>Username:</span> <?php echo $username; ?>
    </h3>
    <h3>
    <span>Email Address:</span> <?php echo $email; ?>
    </h3>
    <h3>
        <span>Password:</span> <?php echo $password; ?>
    </h3>
    <h3>
        <span>Issue Type:</span> <?php echo $issueType; ?>
    </h3>
    <h3>
        <span>Comments:</span> <?php echo $userComments; ?>
    </h3>


    <a class="btn btn-success btn-lg" href="./index.php">GO BACK</a>
</main>
</body>
</html>

