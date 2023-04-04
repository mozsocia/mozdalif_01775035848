<?php

// Load existing blog posts from db.json file
$db = file_get_contents('db.json');

$data = json_decode($db, true);
$posts = $data['blogposts'];





// Sort blog posts by latest created_at date
usort($posts, function ($a, $b) {
  return strtotime($b['created_at']) - strtotime($a['created_at']);
});

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

  <main class="container min-vh-100">
    <div class="p-4 p-md-5 mb-4 rounded mx-auto ">

      <h2 class="text-primary mb-4">Featured latest Blog post</h2>
      <hr>
      <div class="card">
        <img src="<?php echo $posts[0]['image_url'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h1 class="card-title"><?php echo $posts[0]['title'] ?></h1>
          <p class="card-text"><?php echo substr($posts[0]['description'], 0, 150) . "..." ?></p>
          <p class="card-text"><small class="text-muted">Created at: <?php echo date('F j, Y, g:i a', strtotime($posts[0]['created_at'])) ?></small></p>
          <a href="single.php?id=<?php echo $posts[0]['id'] ?>" class="btn btn-outline-secondary">Read More</a>
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