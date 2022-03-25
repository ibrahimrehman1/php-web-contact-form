<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Web Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <main class="container">
        <h1>Web Contact Form</h1>
        <form enctype="multipart/form-data" method="POST" action="destination.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail2" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="btn-group">
      <label for="issueType" class="form-label">Issue Type</label>
  <select class="form-select" aria-label="Default select example" id="issueType" name="issueType">
  <option selected value="Query">Query</option>
  <option value="Feedback">Feedback</option>
  <option value="Complaint">Complaint</option>
  <option value="Other">Other</option>
</select>
</div>

<div class="form-floating" style="margin-top: 2em;">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="userComments"></textarea>
  <label for="floatingTextarea2">User's Comments</label>
</div>

  <button type="submit" class="btn btn-primary" style="margin-top: 2em;">Submit</button>
</form>
    </main>
</body>
</html>