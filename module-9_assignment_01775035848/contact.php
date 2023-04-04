<?php
$message = "";
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $data = array(
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
  );

  $json_data = json_encode($data);

  $file = 'db.json';
  $current_data = file_get_contents($file);
  $array_data = json_decode($current_data, true);
  $array_data['contacts'][] = json_decode($json_data, true);
  $final_data = json_encode($array_data);
  file_put_contents($file, $final_data);

  $message = "Your message has been sent. Thank you!";
}
?> 
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Blog Template · Bootstrap v5.2</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">
  <link href="./dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    /* .blog-post img {
      height: 200px;
    } */

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./dist/css/blog.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php include_once './includes/header.php' ?>
  </div>
  <main class="container mt-3  mx-md-auto w-md-75">
    <?php if ($message) : ?>
    <div class="alert alert-success" role="alert">
      <?php echo $message ?>
    </div>
    <?php endif; ?>
    <div class="row g-5">

      <div class="col-md-12">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          Contact Us
        </h3>

        <div class="col-md-10 col-lg-8 col-xl-7">
          <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as
            possible!</p>
          <div class="my-5 card p-4 shadow">

            <form action="contact.php" method="post">
              <div class="mb-3">

                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>

              <div class="mb-3">
                <label for="subject" class="form-label">Subject:</label>
                <input type="text" id="subject" name="subject" class="form-control" required>
              </div>

              <div class="mb-3">

                <label for="message" class="form-label">Message:</label>
                <textarea id="message" name="message" class="form-control" required></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
          </div>
        </div>



      </div>


    </div>
  </main>
  <footer class="blog-footer">
    <p>
      Blog template built for
      <a href="https://getbootstrap.com/">Bootstrap</a>
      by
      <a href="https://twitter.com/mdo">@mdo</a>
      .
    </p>
    <p>
      <a href="#">Back to top</a>
    </p>
  </footer>
  <script src="./dist/js/bootstrap.min.js"></script>
</body>

</html>