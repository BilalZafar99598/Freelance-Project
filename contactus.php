<?php include('includes/header.php'); ?>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">SOLAR</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase"></ul>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto text-uppercase">
                        <li class="nav-item"><a class="nav-link" href="index.php">home&nbsp;</a></li>
                        <li class="nav-item"><a class="nav-link" href="aboutus.php">about us</a></li>
                        <li class="nav-item"><a class="nav-link active" href="contactus.php">contact us</a></li>
                        <li class="nav-item"><a class="nav-link" href="calculator.php">Calculator</a></li>
                        <li class="nav-item"></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section id="contact" style="background-image:url('assets/img/map-image.png?h=dde716a63e31eca254a82a274d4f56c0');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Contact Us</h2>
                    <h3 class="text-muted section-subheading"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Your Name *" required>
                                    <small class="form-text text-danger flex-grow-1 help-block lead"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Your Email *" required>
                                    <small class="form-text text-danger help-block lead"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="tel" name="tel" id="tel" placeholder="Your Phone *" required>
                                    <small class="form-text text-danger help-block lead"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <textarea class="form-control" name="message" id="message" placeholder="Your Message *" required></textarea>
                                    <small class="form-text text-danger help-block lead"></small>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center mt-3">
                                <input class="btn btn-primary btn-lg text-uppercase" id="sendMessageButton" name="submit" type="submit" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 
        if(isset($_POST['submit'])){
            getData();
        }
    ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© SOLAR 2022</span></div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1-full.jpg?h=5dd7d2e943b04419fd49b39ac9311e2d">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal2">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2-full.jpg?h=8487e77cde92f4bcc127db1b8ed0c4c1">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3-full.jpg?h=0eaf4d52e6cf4453f60193427500852f">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal4">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4-full.jpg?h=721f69d0590c03962b69f832824a646b">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal5">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5-full.jpg?h=789d8002c11f19a550179c6c003234ad">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal6">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="text-muted item-intro">Lorem ipsum dolor sit amet consectetur.</p><img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6-full.jpg?h=f423a081dafbc490942c47688d79210f">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                    repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                    nostrum, reiciendis facere nemo!</p>
                                <ul class="list-unstyled">
                                    <li>Date: January 2017</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul><button class="btn btn-primary" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i><span>&nbsp;Close Project</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>