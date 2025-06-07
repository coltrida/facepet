<!DOCTYPE html>
<html lang="en">

<head>
    <title>FaceDog</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="StackBros">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/tiny-slider/dist/tiny-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/dropzone/dist/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/flatpickr/dist/flatpickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/plyr/plyr.css')}}">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/zuck.js/dist/zuck.min.css')}}">--}}

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    @vite(['resources/js/app.js'])

</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">

    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand" href="{{route('home')}}" >
                <img class="light-mode-item navbar-brand-item" src="{{asset('assets/images/logo.svg')}}" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="{{asset('assets/images/logo.svg')}}" alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Nav Search START -->
                <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
                    <div class="nav-item w-100">
                        <form class="rounded position-relative">
                            <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                        </form>
                    </div>
                </div>
                <!-- Nav Search END -->

                <ul class="navbar-nav navbar-nav-scroll ms-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="homeMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demo</a>
                        <ul class="dropdown-menu" aria-labelledby="homeMenu">
                            <li> <a class="dropdown-item active" href="index.html">Home default</a></li>
                            <li> <a class="dropdown-item" href="index-classic.html">Home classic</a></li>
                            <li> <a class="dropdown-item" href="index-post.html">Home post</a></li>
                            <li> <a class="dropdown-item" href="index-video.html">Home video</a></li>
                            <li> <a class="dropdown-item" href="index-event.html">Home event</a></li>
                            <li> <a class="dropdown-item" href="landing.html">Landing page</a></li>
                            <li> <a class="dropdown-item" href="app-download.html">App download</a></li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#" target="_blank">
                                    <i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>Buy Social!
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Nav item 2 Pages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                            <li> <a class="dropdown-item" href="albums.html">Albums</a></li>
                            <li> <a class="dropdown-item" href="celebration.html">Celebration</a></li>
                            <li> <a class="dropdown-item" href="messaging.html">Messaging</a></li>
                            <!-- Dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#!">Profile</a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="my-profile.html">Feed</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-about.html">About</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-connections.html">Connections</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-media.html">Media</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-videos.html">Videos</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-events.html">Events</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-activity.html">Activity</a> </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="events.html">Events</a></li>
                            <li> <a class="dropdown-item" href="events-2.html">Events 2</a></li>
                            <li> <a class="dropdown-item" href="event-details.html">Event details</a></li>
                            <li> <a class="dropdown-item" href="event-details-2.html">Event details 2</a></li>
                            <li> <a class="dropdown-item" href="groups.html">Groups</a></li>
                            <li> <a class="dropdown-item" href="group-details.html">Group details</a></li>
                            <li> <a class="dropdown-item" href="post-videos.html">Post videos</a></li>
                            <li> <a class="dropdown-item" href="post-video-details.html">Post video details</a></li>
                            <li> <a class="dropdown-item" href="post-details.html">Post details</a></li>
                            <li> <a class="dropdown-item" href="video-details.html">Video details</a></li>
                            <li> <a class="dropdown-item" href="blog.html">Blog</a></li>
                            <li> <a class="dropdown-item" href="blog-details.html">Blog details</a></li>

                            <!-- Dropdown submenu levels -->
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">Dropdown levels</a>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                    <!-- dropdown submenu open left -->
                                    <li class="dropdown-submenu dropstart">
                                        <a class="dropdown-item dropdown-toggle" href="#">Dropdown (start)</a>
                                        <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                            <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                            <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                        </ul>
                                    </li>
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Nav item 3 Post -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account </a>
                        <ul class="dropdown-menu" aria-labelledby="postMenu">
                            <li> <a class="dropdown-item" href="create-page.html">Create a page</a></li>
                            <li> <a class="dropdown-item" href="settings.html">Settings</a> </li>
                            <li> <a class="dropdown-item" href="notifications.html">Notifications</a> </li>
                            <li> <a class="dropdown-item" href="help.html">Help center</a> </li>
                            <li> <a class="dropdown-item" href="help-details.html">Help details</a> </li>
                            <!-- dropdown submenu open left -->
                            <li class="dropdown-submenu dropstart">
                                <a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="sign-in.html">Sign in</a> </li>
                                    <li> <a class="dropdown-item" href="sign-up.html">Sing up</a> </li>
                                    <li> <a class="dropdown-item" href="forgot-password.html">Forgot password</a> </li>
                                    <li class="dropdown-divider"></li>
                                    <li> <a class="dropdown-item" href="sign-in-advance.html">Sign in advance</a> </li>
                                    <li> <a class="dropdown-item" href="sign-up-advance.html">Sing up advance</a> </li>
                                    <li> <a class="dropdown-item" href="forgot-password-advance.html">Forgot password advance</a> </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="error-404.html">Error 404</a> </li>
                            <li> <a class="dropdown-item" href="offline.html">Offline</a> </li>
                            <li> <a class="dropdown-item" href="privacy-and-terms.html">Privacy & terms</a> </li>
                        </ul>
                    </li>

                    <!-- Nav item 4 Mega menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('myProfile')}}" >My network</a>
                    </li>
                </ul>
            </div>
            <!-- Main navbar END -->

            <!-- Nav right START -->
            <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                <li class="nav-item ms-2">
                    <a class="nav-link bg-light icon-md btn btn-light p-0" href="messaging.html">
                        <i class="bi bi-chat-left-text-fill fs-6"> </i>
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link bg-light icon-md btn btn-light p-0" href="{{route('settings')}}">
                        <i class="bi bi-gear-fill fs-6"> </i>
                    </a>
                </li>

                <!-- Notification dropdown END -->
                <livewire:component.notification />

                <!-- User Icon -->
                <livewire:component.image-drop-down />

                <!-- Profile START -->

            </ul>
            <!-- Nav right END -->
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- Container START -->
    <div class="container">
        {{ $slot }}
    </div>
    <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Main Chat START -->
<div class="d-none d-lg-block">
    <!-- Button -->
    <a class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-5 mb-5" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasChat">
        <i class="bi bi-chat-left-text-fill"></i>
    </a>
    <!-- Chat sidebar START -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
        <!-- Offcanvas header -->
        <div class="offcanvas-header d-flex justify-content-between">
            <h5 class="offcanvas-title">Messaging</h5>
            <div class="d-flex">
                <!-- New chat box open button -->
                <a href="#" class="btn btn-secondary-soft-hover py-1 px-2">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <!-- Chat action START -->
                <div class="dropdown">
                    <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Chat action menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-check-square fa-fw pe-2"></i>Mark all as read</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat setting </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Disable notifications</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block setting</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-2"></i>Create a group chat</a></li>
                    </ul>
                </div>
                <!-- Chat action END -->

                <!-- Close  -->
                <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </a>

            </div>
        </div>
        <!-- Offcanvas body START -->
        <div class="offcanvas-body pt-0 custom-scrollbar">
            <!-- Search contact START -->
            <form class="rounded position-relative">
                <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
            </form>
            <!-- Search contact END -->
            <ul class="list-unstyled">

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast">
                    <!-- Avatar -->
                    <div class="avatar status-online">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Frances Guerrero </a>
                        <div class="small text-secondary text-truncate">Frances sent a photo.</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> Just now </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast2">
                    <!-- Avatar -->
                    <div class="avatar status-online">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Lori Ferguson </a>
                        <div class="small text-secondary text-truncate">You missed a call form Carolyn🤙</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 1min </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar status-offline">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Samuel Bishop </a>
                        <div class="small text-secondary text-truncate">Day sweetness why cordially 😊</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 2min </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Dennis Barrett </a>
                        <div class="small text-secondary text-truncate">Happy birthday🎂</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 10min </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar avatar-story status-online">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Judy Nguyen </a>
                        <div class="small text-secondary text-truncate">Thank you!</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 2hrs </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar status-online">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Carolyn Ortiz </a>
                        <div class="small text-secondary text-truncate">Greetings from StackBros.</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 1 day </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="flex-shrink-0 avatar">
                        <ul class="avatar-group avatar-group-four">
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="#" alt="avatar">
                            </li>
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="#" alt="avatar">
                            </li>
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="#" alt="avatar">
                            </li>
                            <li class="avatar avatar-xxs">
                                <img class="avatar-img rounded-circle" src="#" alt="avatar">
                            </li>
                        </ul>
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link text-truncate d-inline-block" href="#!">Frances, Lori, Amanda, Lawson </a>
                        <div class="small text-secondary text-truncate">Btw are you looking for job change?</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 4 day </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar status-offline">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Bryan Knight </a>
                        <div class="small text-secondary text-truncate">if you are available to discuss🙄</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 6 day </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Louis Crawford </a>
                        <div class="small text-secondary text-truncate">🙌Congrats on your work anniversary!</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 1 day </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar status-online">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Jacqueline Miller </a>
                        <div class="small text-secondary text-truncate">No sorry, Thanks.</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 15, dec </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Amanda Reed </a>
                        <div class="small text-secondary text-truncate">Interested can share CV at.</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 18, dec </div>
                </li>

                <!-- Contact item -->
                <li class="mt-3 hstack gap-3 align-items-center position-relative">
                    <!-- Avatar -->
                    <div class="avatar status-online">
                        <img class="avatar-img rounded-circle" src="#" alt="">
                    </div>
                    <!-- Info -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0 stretched-link" href="#!">Larry Lawson </a>
                        <div class="small text-secondary text-truncate">Hope you're doing well and Safe.</div>
                    </div>
                    <!-- Chat time -->
                    <div class="small ms-auto text-nowrap"> 20, dec </div>
                </li>
                <!-- Button -->
                <li class="mt-3 d-grid">
                    <a class="btn btn-primary-soft" href="messaging.html"> See all in messaging </a>
                </li>

            </ul>
        </div>
        <!-- Offcanvas body END -->
    </div>
    <!-- Chat sidebar END -->

    <!-- Chat END -->

    <!-- Chat START -->
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container toast-chat d-flex gap-3 align-items-end">

            <!-- Chat toast START -->
            <div id="chatToast" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header bg-mode">
                    <!-- Top avatar and status START -->
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="d-flex">
                            <div class="flex-shrink-0 avatar me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 mt-1">Frances Guerrero</h6>
                                <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- Call button -->
                            <div class="dropdown">
                                <a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                </ul>
                            </div>
                            <!-- Card action END -->
                            <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i class="bi bi-dash-lg"></i></a>
                            <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                    <!-- Top avatar and status END -->

                </div>
                <div class="toast-body collapse show" id="collapseChat">
                    <!-- Chat conversation START -->
                    <div class="chat-conversation-content custom-scrollbar h-200px">
                        <!-- Chat time -->
                        <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                        <!-- Chat message left -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
                                        <div class="small my-2">6:15 AM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message right -->
                        <div class="d-flex justify-content-end text-end mb-1">
                            <div class="w-100">
                                <div class="d-flex flex-column align-items-end">
                                    <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message left -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
                                        <!-- Files START -->
                                        <!-- Files END -->
                                        <div class="small my-2">12:16 PM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message left -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
                                        <div class="small my-2">3:22 PM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message right -->
                        <div class="d-flex justify-content-end text-end mb-1">
                            <div class="w-100">
                                <div class="d-flex flex-column align-items-end">
                                    <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                    <!-- Images -->
                                    <div class="d-flex my-2">
                                        <div class="small text-secondary">5:35 PM</div>
                                        <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat time -->
                        <div class="text-center small my-2">2 New Messages</div>
                        <!-- Chat Typing -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-3 rounded-2">
                                            <div class="typing d-flex align-items-center">
                                                <div class="dot"></div>
                                                <div class="dot"></div>
                                                <div class="dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chat conversation END -->
                    <!-- Chat bottom START -->
                    <div class="mt-2">
                        <!-- Chat textarea -->
                        <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                        <!-- Button -->
                        <div class="d-sm-flex align-items-end mt-2">
                            <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                            <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                            <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                            <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                        </div>
                    </div>
                    <!-- Chat bottom START -->
                </div>
            </div>
            <!-- Chat toast END -->

            <!-- Chat toast 2 START -->
            <div id="chatToast2" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header bg-mode">
                    <!-- Top avatar and status START -->
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="d-flex">
                            <div class="flex-shrink-0 avatar me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 mt-1">Lori Ferguson</h6>
                                <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- Call button -->
                            <div class="dropdown">
                                <a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown2" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown2">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                </ul>
                            </div>
                            <!-- Card action END -->
                            <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat2" role="button" aria-expanded="false" aria-controls="collapseChat2"><i class="bi bi-dash-lg"></i></a>
                            <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                    <!-- Top avatar and status END -->

                </div>
                <div class="toast-body collapse show" id="collapseChat2">
                    <!-- Chat conversation START -->
                    <div class="chat-conversation-content custom-scrollbar h-200px">
                        <!-- Chat time -->
                        <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                        <!-- Chat message left -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
                                        <div class="small my-2">6:15 AM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message right -->
                        <div class="d-flex justify-content-end text-end mb-1">
                            <div class="w-100">
                                <div class="d-flex flex-column align-items-end">
                                    <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message left -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
                                        <!-- Files START -->
                                        <!-- Files END -->
                                        <div class="small my-2">12:16 PM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message left -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
                                        <div class="small my-2">3:22 PM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat message right -->
                        <div class="d-flex justify-content-end text-end mb-1">
                            <div class="w-100">
                                <div class="d-flex flex-column align-items-end">
                                    <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                    <!-- Images -->
                                    <div class="d-flex my-2">
                                        <div class="small text-secondary">5:35 PM</div>
                                        <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat time -->
                        <div class="text-center small my-2">2 New Messages</div>
                        <!-- Chat Typing -->
                        <div class="d-flex mb-1">
                            <div class="flex-shrink-0 avatar avatar-xs me-2">
                                <img class="avatar-img rounded-circle" src="#" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="bg-light text-secondary p-3 rounded-2">
                                            <div class="typing d-flex align-items-center">
                                                <div class="dot"></div>
                                                <div class="dot"></div>
                                                <div class="dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chat conversation END -->
                    <!-- Chat bottom START -->
                    <div class="mt-2">
                        <!-- Chat textarea -->
                        <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                        <!-- Button -->
                        <div class="d-sm-flex align-items-end mt-2">
                            <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                            <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                            <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                            <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                        </div>
                    </div>
                    <!-- Chat bottom START -->
                </div>
            </div>
            <!-- Chat toast 2 END -->

        </div>
    </div>
    <!-- Chat END -->

</div>
<!-- Main Chat END -->

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{asset('assets/vendor/tiny-slider/dist/tiny-slider.js')}}"></script>
<script src="{{asset('assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/vendor/plyr/plyr.js')}}"></script>
<script src="{{asset('assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{asset('assets/vendor/zuck.js/dist/zuck.min.js')}}"></script>
{{--<script src="{{asset('assets/js/zuck-stories.js')}}"></script>--}}

<!-- Theme Functions -->
<script src="{{asset('assets/js/functions.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

