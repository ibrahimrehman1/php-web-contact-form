<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Web Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
  <?php 
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $emailAddress = $_POST['emailAddress'];
        $password = $_POST['password'];
        $issueType = $_POST['issueType'];
        $userComments = $_POST['userComments'];

  }
  
  ?>

    <main class="container">
        <h1>Web Contact Form</h1>
        <form enctype="multipart/form-data" method="POST" action="destination.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required value="<?php echo isset($username) ? $username : '' ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail2" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="email" required value="<?php echo isset($emailAddress) ? $emailAddress : '' ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required value="<?php echo isset($password) ? $password : '' ?>">
  </div>
      <label for="issueType" class="form-label">Issue Type</label>
  <select class="form-select" aria-label="Default select example" id="issueType" name="issueType" required>
  <option value="Query">Query</option>
  <option value="Feedback">Feedback</option>
  <option value="Complaint">Complaint</option>
  <option value="Other">Other</option>
</select>

<label for="floatingTextarea2" style="margin-top: 2em;">Comments</label>
  <textarea id="summernote" placeholder="Leave a comment here" style="height: 100px" name="userComments" required></textarea>

  <div class="btn-grp">

    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    
    <button type="button" class="btn btn-danger btn-lg" onclick="resetFields()">Reset</button>
  </div>
</form>
    </main>

    <script>
      let userComments = "<?php echo isset($userComments) ? $userComments : ''; ?>";
      let issueType = "<?php echo isset($issueType) ? $issueType : ''; ?>";
      console.log(userComments);
      console.log(issueType);

      function resetFields(){
        console.log("Hello")
        document.querySelector("[name='username']").value = "";
        document.querySelector("[name='email']").value = "";
        document.querySelector("[name='password']").value = "";
        document.querySelector(".note-editable").innerText = "";
        document.querySelector(".form-select").selectedIndex = 0;
      }
    </script>

</body>
<script>
  const ISSUES = {"Query": 0, "Feedback": 1, "Complaint": 2, "Other": 3};
  $(document).ready(function() {
  $('#summernote').summernote({height: 200});

  document.querySelector(".note-editable").innerText = userComments;
  document.querySelector(".form-select").selectedIndex = ISSUES[issueType];
});
</script>
</html>