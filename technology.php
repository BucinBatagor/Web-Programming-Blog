<?php
// Sertakan koneksi database
include 'assets/php/koneksi.php';

// Define how many articles to display per page
$articlesPerPage = 5; // Change this value to your preference

// Get the current page from the query string, defaulting to 1
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, $currentPage); // Ensure the page number is at least 1

// Calculate the starting row for the current page
$startFrom = ($currentPage - 1) * $articlesPerPage;

// Get total articles in the Technology category
$totalArticlesQuery = "SELECT COUNT(*) as total FROM artikel WHERE kategori = 'Teknologi'";
$totalArticlesResult = mysqli_query($conn, $totalArticlesQuery);
$totalArticlesRow = mysqli_fetch_assoc($totalArticlesResult);
$totalArticles = $totalArticlesRow['total'];

// Calculate total pages
$totalPages = ceil($totalArticles / $articlesPerPage);

// Mengambil data artikel dari kategori Teknologi dengan limit dan offset
$query = "SELECT * FROM artikel WHERE kategori = 'Teknologi' LIMIT $startFrom, $articlesPerPage"; // Adjust as needed
$result = mysqli_query($conn, $query);

// Memeriksa apakah kueri berhasil
if (!$result) {
    die("Kueri database gagal: " . mysqli_error($conn));
}
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Web Programming - Final Semester Exam</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
    <header class="w3l-header">
        <!--/nav-->
        <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span class="fa fa-pencil-square-o"></span> Design Blog</a>
                <!-- if logo is image enable this   
						<a class="navbar-brand" href="#index.html">
							<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
						</a> -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item @@home__active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item active" href="technology.php">Teknologi</a>
                                <a class="dropdown-item @@ls__active" href="lifestyle.php">Gaya Hidup</a>
                            </div>
                        </li>
                        <li class="nav-item @@contact__active">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                    </ul>

                    <!--/search-right-->
                    <div class="search-right mt-lg-0 mt-2">
                        <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                        <!-- search popup -->
                        <div id="search" class="pop-overlay">
                            <div class="popup">
                                <h3 class="hny-title two">Search here</h3>
                                <form action="#" method="Get" class="search-box">
                                    <input type="search" placeholder="Search for blog posts" name="search"
                                        required="required" autofocus="">
                                    <button type="submit" class="btn">Search</button>
                                </form>
                                <a class="close" href="#close">×</a>
                            </div>
                        </div>
                        <!-- /search popup -->
                    </div>
                    <!--//search-right-->
                    <!-- author -->
                    <!-- <div class="header-author d-flex ml-lg-4 pl-2 mt-lg-0 mt-3">
                        <a class="img-circle img-circle-sm" href="#author">
                            <img src="assets/images/author.jpg" class="img-fluid" alt="...">
                        </a>
                        <div class="align-self ml-3">
                            <a href="#author">
                                <h5>Alexander</h5>
                            </a>
                            <span>Blog Writer</span>
                        </div>
                    </div> -->
                    <!-- // author-->

                </div>

                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </div>
        </nav>
        <!--//nav-->
    </header>
    <!-- //header -->

    <?php
    // Database connection (assuming it's established and stored in $conn)

    // Pagination setup
    $articles_per_page = 6;
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $articles_per_page;

    // Total articles query
    $total_query = "SELECT COUNT(*) as total FROM artikel WHERE kategori = 'Technology'";
    $total_result = mysqli_query($conn, $total_query);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_articles = $total_row['total'];
    $total_pages = ceil($total_articles / $articles_per_page);

    // Fetch articles for the current page
    $article_query = "SELECT * FROM artikel WHERE kategori = 'Technology' ORDER BY count DESC LIMIT $offset, $articles_per_page";
    $article_result = mysqli_query($conn, $article_query);
    ?>
    <nav id="breadcrumbs" class="breadcrumbs">
        <div class="container page-wrapper">
            <a href="index.php">Home</a> / Categories /<span class="breadcrumb_last" aria-current="page">Technology</span>
        </div>
    </nav>
    <div class="w3l-searchblock w3l-homeblock1 py-5">
        <div class="container py-lg-4 py-md-3">
            <!-- block -->
            <div class="row">
                <div class="col-lg-8 most-recent">
                    <h3 class="section-title-left">Technology</h3>

                    <div class="row">
                        <?php
                        // Check if any articles were found
                        if ($result && mysqli_num_rows($result) > 0) {
                            $first = true; // Flag for the first article
                            // Inside your loop to display articles
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($first) {
                                    // Display the first article spanning two columns
                                    echo '<div class="col-md-12 item">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="assets/php/article2.php?id=' . $row['id'] . '">
                            <img class="card-img-bottom d-block radius-image" src="assets/images/' . $row['gambar'] . '" alt="Card image cap" style="width: 100%;">
                        </a>
                    </div>
                    <div class="card-body p-0 blog-details">
                        <a href="assets/php/article2.php?id=' . $row['id'] . '" class="blog-desc">' . $row['judul'] . '</a>
                        <p>' . substr($row['konten'], 0, 100) . '...</p>
                        <div class="author align-items-center mt-3 mb-1">
                            <a href="#author">' . $row['penulis'] . '</a> in <a href="#url">' . $row['kategori'] . '</a>
                        </div>
                        <ul class="blog-meta">
                            <li class="meta-item blog-lesson">
                                <span class="meta-value">' . date('F d, Y', strtotime($row['created_at'])) . '</span>
                            </li>
                            <li class="meta-item blog-students">
                                <span class="meta-value">' . $row['count'] . ' reads</span>  <!-- Displaying the read count -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>';
                                    $first = false; // Set the flag to false after the first article
                                } else {
                                    // Display the second and third articles side by side
                                    echo '<div class="col-md-6 item">
                <div class="card">
                    <div class="card-header p-0 position-relative">
                        <a href="assets/php/article2.php?id=' . $row['id'] . '">
                            <img class="card-img-bottom d-block radius-image" src="assets/images/' . $row['gambar'] . '" alt="Card image cap">
                        </a>
                    </div>
                    <div class="card-body p-0 blog-details">
                        <a href="assets/php/article2.php?id=' . $row['id'] . '" class="blog-desc">' . $row['judul'] . '</a>
                        <p>' . substr($row['konten'], 0, 100) . '...</p>
                        <div class="author align-items-center mt-3 mb-1">
                            <a href="#author">' . $row['penulis'] . '</a> in <a href="#url">' . $row['kategori'] . '</a>
                        </div>
                        <ul class="blog-meta">
                            <li class="meta-item blog-lesson">
                                <span class="meta-value">' . date('F d, Y', strtotime($row['created_at'])) . '</span>
                            </li>
                            <li class="meta-item blog-students">
                                <span class="meta-value">' . $row['count'] . ' reads</span>  <!-- Displaying the read count -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>';
                                    // After displaying two articles, break the loop if there are more articles
                                    if (mysqli_num_rows($result) == 2) break;
                                }
                            }
                        } else {
                            echo '<p>No articles found in the Technology category.</p>';
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper mt-5">
                        <ul class="page-pagination">
                            <?php if ($currentPage > 1): ?>
                                <li><a class="prev" href="?page=<?php echo $currentPage - 1; ?>"><span class="fa fa-angle-left"></span></a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li>
                                    <a class="page-numbers <?php echo ($i === $currentPage) ? 'current' : ''; ?>" href="?page=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($currentPage < $totalPages): ?>
                                <li><a class="next" href="?page=<?php echo $currentPage + 1; ?>"><span class="fa fa-angle-right"></span></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- // Pagination -->

                </div>
                <div class="col-lg-4 trending mt-lg-0 mt-5 mb-lg-5">
                    <div class="pos-sticky">
                        <h3 class="section-title-left">Trending - Technology</h3>

                        <div class="grids5-info">
                            <?php
                            // Fetch trending articles from the database for the Technology category
                            $trending_query = "SELECT * FROM artikel WHERE kategori = 'teknologi' ORDER BY count DESC LIMIT 5"; // Fetch top 5 by reads
                            $trending_result = mysqli_query($conn, $trending_query); // Assume $conn is your database connection

                            if ($trending_result && mysqli_num_rows($trending_result) > 0) {
                                $rank = 1; // Initialize ranking
                                while ($trending_row = mysqli_fetch_assoc($trending_result)) {
                                    echo '<h4>' . str_pad($rank, 2, '0', STR_PAD_LEFT) . '.</h4>'; // Display ranking
                                    echo '<div class="blog-info">
                            <a href="assets/php/article2.php?id=' . $trending_row['id'] . '" class="blog-desc1">' . $trending_row['judul'] . '</a>
                            <div class="author align-items-center mt-2 mb-1">
                                <a href="#author">' . $trending_row['penulis'] . '</a> in <a href="#url">' . $trending_row['kategori'] . '</a>
                            </div>
                            <ul class="blog-meta">
                                <li class="meta-item blog-lesson">
                                    <span class="meta-value">' . date('F d, Y', strtotime($trending_row['created_at'])) . '</span>
                                </li>
                                <li class="meta-item blog-students">
                                    <span class="meta-value">' . $trending_row['count'] . ' reads</span>
                                </li>
                            </ul>
                        </div>';
                                    $rank++; // Increment ranking
                                }
                            } else {
                                echo '<p>No trending articles found in the Technology category.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- //block -->

        <!-- ad block -->
        <div class="ad-block text-center mt-5">
            <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
        </div>
        <!-- //ad block -->
    </div>
    </div>





    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-content py-lg-5 py-4 text-center">
            <div class="container">
                <div class="copy-right">
                    <h6>© 2020 Design Blog . Made with <span class="fa fa-heart" aria-hidden="true"></span>, Designed by <a
                            href="https://w3layouts.com">W3layouts</a> </h6>
                </div>
                <ul class="author-icons mt-4">
                    <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a> </li>
                    <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                    <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
                    <li><a class="linkedin" href="#url"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                    <li><a class="github" href="#url"><span class="fa fa-github" aria-hidden="true"></span></a></li>
                    <li><a class="dribbble" href="#url"><span class="fa fa-dribbble" aria-hidden="true"></span></a></li>
                </ul>
                <button onclick="topFunction()" id="movetop" title="Go to top">
                    <span class="fa fa-angle-up"></span>
                </button>
            </div>
        </div>

        <!-- move top -->
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- //move top -->
    </footer>
    <!-- //footer -->

    <!-- Template JavaScript -->
    <script src="assets/js/theme-change.js"></script>

    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>