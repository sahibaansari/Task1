    <!-- ==================== Start Navbar ==================== -->

    <nav class="navbar navbar-expand-lg">
        <div class="container align-items-center">

            <!-- Logo -->
            <a class="logo w-100px" href="#">
                <img src="{{ asset('client/assets/imgs/logo.png') }}" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"><i class="fas fa-bars"></i></span>
            </button>

            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="false"><span class="rolling-text">Home</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"><span class="rolling-text">About</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Gallery</span></a>
                    
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false"><span class="rolling-text">Blogs</span></a>
                    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="rolling-text">Contact Us</span>
                            <span class="sa-contact-icon-wrapper">
            <img src="{{ asset('client/assets/imgs/icons/contact.png') }}" alt="icon" class="sa-contact-icon-img">
        </span>
                        </a>
                    </li>
                </ul>
            </div>

        
        </div>
    </nav>

    <!-- ==================== End Navbar ==================== -->