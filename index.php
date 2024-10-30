<?php
// Include the database connection
include 'assets/php/koneksi.php';

// Query to fetch the most recent posts
$query = "SELECT * FROM artikel ORDER BY created_at DESC LIMIT 5"; // Adjust the limit as needed
$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
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
                    <span class="fa fa-pencil-square-o"></span> Web Programming Blog</a>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown @@category__active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item @@cp__active" href="technology.php">Teknologi</a>
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

    <div class="w3l-homeblock1">
        <div class="container pt-lg-5 pt-md-4">
            <!-- block -->
            <div class="row">
                <div class="col-lg-9 most-recent">
                    <h3 class="section-title-left">Most Recent posts</h3>
                    <?php
                    // Assuming you have already established a database connection
                    $itemsPerPage = 5; // Number of items per page
                    $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1; // Get current page or default to 1

                    // Calculate offset
                    $offset = ($currentPage - 1) * $itemsPerPage;

                    // Fetch total articles count for pagination
                    $countQuery = "SELECT COUNT(*) as total FROM artikel";
                    $countResult = mysqli_query($conn, $countQuery);
                    $totalArticles = mysqli_fetch_assoc($countResult)['total'];
                    $totalPages = ceil($totalArticles / $itemsPerPage); // Total pages

                    // Fetch articles for the current page
                    $query = "SELECT * FROM artikel ORDER BY created_at DESC LIMIT $itemsPerPage OFFSET $offset";
                    $result = mysqli_query($conn, $query); // $conn is your database connection

                    // Check if there are any results
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="grids5-info img-block-mobile mt-5">';
                            echo '<div class="blog-info align-self">';
                            echo '<span class="category">' . htmlspecialchars($row['kategori']) . '</span>';
                            echo '<a href="assets/php/article.php?id=' . htmlspecialchars($row['id']) . '" class="blog-desc mt-0">' . htmlspecialchars($row['judul']) . '</a>';
                            echo '<p>' . htmlspecialchars($row['konten']) . '</p>'; // Show a summary if needed
                            echo '<div class="author align-items-center mt-3 mb-1">';
                            echo '<a href="#author">' . htmlspecialchars($row['penulis']) . '</a>';
                            echo '</div>';
                            echo '<ul class="blog-meta">';
                            echo '<li class="meta-item blog-lesson">';
                            echo '<span class="meta-value">' . date("F j, Y", strtotime($row['created_at'])) . '</span>'; // Format the date
                            echo '</li>';
                            echo '<li class="meta-item blog-students">';
                            echo '<span class="meta-value">' . htmlspecialchars($row['count']) . ' read</span>'; // Read count
                            echo '</li>';
                            echo '</ul>';
                            echo '</div>';
                            echo '<a href="article.php?id=' . htmlspecialchars($row['id']) . '" class="d-block zoom mt-md-0 mt-3">';
                            echo '<img src="assets/images/' . htmlspecialchars($row['gambar']) . '" alt="" class="img-fluid radius-image news-image post-image">';
                            echo '</a>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No posts available.</p>'; // Message if no posts exist
                    }
                    ?>

                    <!-- pagination -->
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
                    <!-- //pagination -->
                </div>

                <div class="col-lg-3 trending mt-lg-0 mt-5 mb-lg-5">
                    <div class="pos-sticky">
                        <h3 class="section-title-left">Trending</h3>

                        <?php
                        // Fetch trending articles by read count
                        $trendingQuery = "SELECT * FROM artikel ORDER BY count DESC LIMIT 5"; // Only order by count
                        $trendingResult = mysqli_query($conn, $trendingQuery);

                        if (mysqli_num_rows($trendingResult) > 0) {
                            $rank = 1; // Initialize ranking
                            while ($trendingRow = mysqli_fetch_assoc($trendingResult)) {
                                echo '<div class="grids5-info">';
                                echo '<h4>' . $rank . '.</h4>'; // Display the rank
                                echo '<div class="blog-info">';
                                echo '<a href="article.php?id=' . htmlspecialchars($trendingRow['id']) . '" class="blog-desc1">' . htmlspecialchars($trendingRow['judul']) . '</a>';
                                echo '<div class="author align-items-center mt-2 mb-1">';
                                echo '<a href="#author">' . htmlspecialchars($trendingRow['penulis']) . '</a>';
                                echo '</div>';
                                echo '<ul class="blog-meta">';
                                echo '<li class="meta-item blog-lesson">';
                                echo '<span class="meta-value">' . date("F j, Y", strtotime($trendingRow['created_at'])) . '</span>';
                                echo '</li>';
                                echo '<li class="meta-item blog-students">';
                                echo '<span class="meta-value">' . htmlspecialchars($trendingRow['count']) . ' reads</span>';
                                echo '</li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                                $rank++; // Increment the rank for the next article
                            }
                        } else {
                            echo '<p>No trending articles available.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-content py-lg-5 py-4 text-center">
            <div class="container">
                <div class="copy-right">
                    <h6>© 2024 Web Programming Blog . Made by <i>Nizar Khawarizmi </i> with <span class="fa fa-heart" aria-hidden="true"></span><br>Designed by
                        <a href="https://w3layouts.com">W3layouts</a>
                    </h6>
                </div>
                <ul class="author-icons mt-4">
                    <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                    </li>
                    <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                    <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                    </li>
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