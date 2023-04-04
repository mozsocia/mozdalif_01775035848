<?php

// Load existing blog posts from db.json file
$db = file_get_contents('db.json');

$data = json_decode($db, true);
$posts = $data['blogposts'];



// Get search query from URL
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Filter posts based on search query in title and description
if ($search_query) {
  $posts = array_filter($posts, function ($post) use ($search_query) {
    return strpos($post['title'], $search_query) !== false || strpos($post['description'], $search_query) !== false;
  });
}


// make category array
$categories = array();
foreach ($posts as $post) {
  $categories[] = $post['category'];
}
$categories = array_unique($categories);


// Filter posts by category query
if (isset($_GET['category'])) {

  $category = $_GET['category'];
  $posts = array_filter($posts, function ($post) use ($category) {
    return $post['category'] == $category;
  });
}



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
  <main class="container mt-3">
    <div class="row g-5 ">

      <div class="col-md-8">
        <h3 class="pb-2 fst-italic ">
          All Blogs Post List

        </h3>
        <small class="text-muted mb-4">Here latest is first </small>
        <hr>
        <?php foreach ($posts as $post) : ?>



          <article class="blog-post">



            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-lg-4">
                  <img src="<?php echo $post['image_url'] ?>" class="img-fluid rounded-start h-100" alt="...">
                </div>
                <div class="col-lg-8">
                  <div class="card-body">
                    <h3 class="card-title mb-3"><?php echo $post['title'] ?></h3>
                    <p>Category: <b><?php echo $post['category'] ?></b></p>
                    <p>Author: <i><?php echo $post['author'] ?></i> </p>
                    <p class="card-text"><?php echo substr($post['description'], 0, 150) . "..." ?></p>
                    <p class="card-text"><small class="text-muted">Created at: <?php echo date('F j, Y, g:i a', strtotime($post['created_at'])) ?></small></p>
                    <a href="single.php?id=<?php echo $post['id'] ?>" class="btn btn-outline-primary">Read More</a>
                  </div>
                </div>
              </div>
            </div>

          </article>

        <?php endforeach; ?>



        <!-- <nav class="blog-pagination" aria-label="Pagination">
          <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
          <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>
        </nav> -->
      </div>

      <!-- sidebar  -->
      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers,
              content, or something else entirely. Totally up to you.</p>
          </div>
          <hr>
          <div class="p-4">
            <p>Search Tile or Description</p>
            <form class="d-flex" id="searchform">

              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="<?php echo $search_query ?: "" ?>">
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
          <hr>
          <div class="p-4">
            <h4 class="fst-italic">Categories</h4>
            <ol class="list-unstyled mb-0">
              <li><a  class="btn btn-sm btn-outline-primary mb-2" href="blog.php">All Category</a></li>
              <?php
              foreach ($categories as $category) {
                echo '<li><a class="btn btn-sm btn-outline-primary mb-2" href="blog.php?category=' . $category . '">' . $category . '</a></li>';
              } ?>
            </ol>
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
  <script>
    document.getElementById('searchform').addEventListener('submit', function(e) {
      e.preventDefault(); // prevent form from submitting
      var searchQuery = document.querySelector('input[type="search"]').value;
      window.location.href = 'blog.php?search=' + searchQuery;
    });
  </script>
</body>

</html>