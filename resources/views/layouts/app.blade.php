<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/header.css')}}">
        <link rel="stylesheet" href="{{ asset('css/footer.css')}}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <x-jet-banner />

            {{-- @livewire('navigation-menu') --}}

            <!-- Page Heading -->
        <header>
            @auth
                @if ((int)Auth::user()->admin == 1 || (int)Auth::user()->admin == 2)
                    <div class="link-admin"><a href="{{ route('panel-admin') }}">Panel d'administration</a></div>
                @endif
            @endauth
            <div class="blue hide-mob">
                <div>
                    <img src="{{ asset('images/header/delivery-white.svg')}}" alt="">
                    <span>LIVRAISON RAPIDE</span>
                </div>
                <div>
                    <img src="{{ asset('images/header/payment-white.svg')}}" alt="">
                    <span>PAIEMENT SECURISE</span>
                </div>
            </div>
            <nav class="top hide-mob">
                <ul class="left">
                    <li><a href="/"><img src="{{ asset('images/header/logo.svg')}}" alt=""></a></li> <!-- mon logo -->
                    <li>SERV'DRONE</li>
                </ul>
                <ul class="right">

                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('my-cart') }}" class="href-cart"><img src="{{ asset('images/header/basket.svg') }}" alt="">@livewire('cart-counter')</a></li>
                            <li><a href="{{ route('profile.show') }}"><img src="{{ asset('images/header/account.svg') }}" alt=""></a></li>
                        @else
                            <li><a href="{{ route('login') }}"><img src="{{ asset('images/header/account.svg') }}" alt=""></a></li>
                        @endauth
                        <li><a href="{{ route('contact.create') }}"><img src="{{ asset('images/header/contact.svg') }}" alt=""></a></li>

                        @auth
                            <form method="POST" action="{{ route('logout') }}" style="background-image: url('{{ asset('images/header/logout.svg') }}'); background-size: cover; background-repeat: no-repeat; width: 25px; height: 30px;">
                                @csrf
                                <button type="submit" style="width: 100%; height: 100%;">
                                </button>
                            </form>
                        @endauth

                    @endif
                </ul>
            </nav>
            <nav class="bottom hide-mob">
                <ul>
                    <li><a href="{{route('history')}}">HISTOIRE DES DRONES</a></li>
                    <li><a href="{{route('products.index')}}">NOS DRONES</a></li>
                    <li><a href="/events">EVENEMENTS</a></li>
                </ul>
            </nav>

            <nav class="show-mob bottom-mob-nav">
                <ul id="ul-wrap-container">
                    <li class="li-bottom-mobile">
                        <a href="/">
                            <ul class="ul-containers">
                                <li id="svg-home-li" class="li-bottom-mobile">
                                    <svg width="39" height="35" viewBox="0 0 39 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line y1="-0.75" x2="25.4188" y2="-0.75" transform="matrix(0.762636 -0.646828 0.659981 0.751283 1 18.4414)" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <line y1="-0.75" x2="25.4194" y2="-0.75" transform="matrix(0.762589 0.646884 -0.660035 0.751234 18.6155 2)" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <line y1="-0.75" x2="18.338" y2="-0.75" transform="matrix(0.785576 0.618765 -0.63214 0.774854 18.6155 6.76855)" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <line y1="-0.75" x2="17.3602" y2="-0.75" transform="matrix(0.767885 -0.640588 0.653799 0.756668 6.48315 17.8892)" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <line y1="-0.75" x2="17.1826" y2="-0.75" transform="matrix(0.00691402 -0.999976 0.999978 0.00667537 6.82983 34.1685)" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <line y1="-0.75" x2="17.1826" y2="-0.75" transform="matrix(0.00691402 -0.999976 0.999978 0.00667537 33.5208 34.5093)" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <line x1="23.689" y1="33.9478" x2="33.5208" y2="33.9478" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <line x1="5.53784" y1="33.9478" x2="14.9915" y2="33.9478" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></line>
                                        <rect x="15.3633" y="22.8145" width="8.33186" height="11.1332" fill="white" stroke="#00AAA7" stroke-width="1.5" stroke-linejoin="round"></rect>
                                    </svg>
                                </li>
                                <li id="home-li" class="li-bottom-mobile">Accueil</li>
                            </ul>
                        </a>
                    </li>

                    <li class="li-bottom-mobile">
                        <a href="/products">
                            <ul class="ul-containers" id="buy-ul">
                                <li id="img-buy-li" class="li-bottom-mobile">
                                    <?xml version="1.0" encoding="iso-8859-1"?>
                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M278.988,179.722h-45.975c-15.892,0-30.515,7.985-39.118,21.361l13.181,8.478c5.706-8.87,15.402-14.166,25.936-14.166
                                                h45.975c10.535,0,20.23,5.296,25.936,14.166l13.181-8.478C309.503,187.708,294.88,179.722,278.988,179.722z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M120.345,129.909c-4.937-4.937-11.496-7.656-18.468-7.656c-14.404,0-26.122,11.719-26.122,26.122v6.896h15.673v-6.896
                                                c0-5.762,4.687-10.449,10.449-10.449c2.786,0,5.408,1.089,7.383,3.065c1.977,1.977,3.066,4.599,3.066,7.384v6.896H128v-6.896
                                                C128,141.404,125.281,134.845,120.345,129.909z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M428.59,129.909c-4.937-4.937-11.496-7.656-18.468-7.656c-14.404,0-26.122,11.719-26.122,26.122v6.896h15.673v-6.896
                                                c0-5.762,4.687-10.449,10.449-10.449c2.786,0,5.408,1.089,7.383,3.065c1.977,1.977,3.066,4.599,3.066,7.384v6.896h15.673v-6.896
                                                C436.245,141.404,433.526,134.845,428.59,129.909z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <polygon points="131.099,373.029 102.4,346.123 102.4,274.808 144.959,274.808 144.959,259.135 86.727,259.135 86.727,352.913
                                                108.182,373.029 84.637,373.029 84.637,388.702 150.465,388.702 150.465,373.029 		"/>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <polygon points="404.431,373.029 425.273,352.838 425.273,259.135 367.041,259.135 367.041,274.808 409.6,274.808 409.6,346.199
                                                381.905,373.029 360.49,373.029 360.49,388.702 426.318,388.702 426.318,373.029 		"/>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M464.98,218.384h-28.735v-35.095c16.302-2.1,31.307-6.153,43.688-11.932c20.68-9.65,32.067-23.192,32.067-38.133
                                                s-11.387-28.483-32.067-38.134c-18.777-8.763-43.57-13.589-69.811-13.589s-51.034,4.826-69.811,13.589
                                                c-20.68,9.651-32.067,23.193-32.067,38.134s11.387,28.483,32.067,38.134c12.381,5.778,27.387,9.831,43.688,11.932v35.094H128
                                                v-35.095c16.302-2.1,31.307-6.153,43.688-11.932c20.68-9.65,32.067-23.192,32.067-38.133s-11.387-28.483-32.067-38.134
                                                c-18.777-8.763-43.57-13.589-69.811-13.589s-51.034,4.826-69.812,13.589C11.387,104.742,0,118.284,0,133.224
                                                s11.387,28.483,32.066,38.134c12.381,5.778,27.387,9.831,43.689,11.932v35.094H47.02v-24.555H0v64.784h47.02v-24.555h99.133
                                                l24.216,62.155c4.332,11.119,14.842,18.302,26.774,18.302h32.735v16.718h-39.184v99.265h130.612v-99.265h-39.184v-16.718h32.735
                                                c11.933,0,22.442-7.184,26.774-18.303l24.216-62.154h99.133v24.555H512v-64.784h-47.02V218.384z M31.347,242.939H15.673v-33.437
                                                h15.673V242.939z M15.673,133.224c0-17.051,35.403-36.049,86.204-36.049s86.204,18.998,86.204,36.049
                                                s-35.403,36.049-86.204,36.049S15.673,150.275,15.673,133.224z M112.327,218.384H91.429v-33.701
                                                c3.45,0.171,6.935,0.264,10.449,0.264s6.999-0.093,10.449-0.264V218.384z M305.633,346.906v67.918h-99.265v-67.918H305.633z
                                                M245.551,331.233v-16.718h20.898v16.718H245.551z M327.028,290.521c-1.97,5.054-6.747,8.319-12.17,8.319h-32.736h-52.245h-32.735
                                                c-5.424,0-10.201-3.265-12.171-8.319l-21.998-56.464h186.054L327.028,290.521z M323.918,133.224
                                                c0-17.051,35.403-36.049,86.204-36.049s86.204,18.998,86.204,36.049s-35.403,36.049-86.204,36.049
                                                S323.918,150.275,323.918,133.224z M420.571,218.384h-20.898v-33.701c3.45,0.171,6.935,0.264,10.449,0.264
                                                c3.514,0,6.999-0.093,10.449-0.264V218.384z M480.653,209.502h15.673v33.437h-15.673V209.502z"/>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M256,352.131c-15.844,0-28.735,12.89-28.735,28.735S240.156,409.6,256,409.6c15.844,0,28.735-12.89,28.735-28.735
                                                S271.844,352.131,256,352.131z M256,393.927c-7.202,0-13.061-5.859-13.061-13.061c0-7.202,5.859-13.061,13.061-13.061
                                                c7.203,0,13.061,5.859,13.061,13.061C269.061,388.068,263.203,393.927,256,393.927z"/>
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    </svg>

                                </li>
                                <li class="li-bottom-mobile"><a href="{{route('products.index')}}">Nos Drones</a></li>
                            </ul>
                        </a>
                    </li>

                    <li class="li-bottom-mobile">
                        <ul class="ul-containers">
                            <li class="burger li-bottom-mobile" id="burger_icon">
                                <span class="bar"></span>
                            </li>
                            <li class="li-bottom-mobile"><a>Infos</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="top-mob-bar show-mob">
                <img src="{{asset('images/header/logo.svg')}}" alt="">
                <span class="top-mob-span-container"><span>Serv'</span><span style="color: #01B5AC;">Drone</span></span>
            </div>

            <div id="mobile-menu">

                <div id="cross-container">
                    <span id="cross-close-mobile-menu"></span>
                </div>

                <div class="link-mob-container">
                    <span class="separate-ul-spans"></span>

                    <ul id="mobile-first-ul" class="ul-mobile-containers">
                        <li id="li-svg-container-1" class="li-svg-containers">
                            <svg width="31" height="26" viewBox="0 0 31 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.7153 5.62383L18.9026 0.123829C18.743 0.0425953 18.5637 0 18.3814 0C18.1992 0 18.0199 0.0425953 17.8603 0.123829L7.04756 5.62383C6.87803 5.71015 6.73665 5.83698 6.63819 5.99106C6.53973 6.14515 6.48779 6.32085 6.48779 6.49983C6.48779 6.67881 6.53973 6.85451 6.63819 7.0086C6.73665 7.16268 6.87803 7.2895 7.04756 7.37583L17.3002 12.5908V23.3098L14.0174 21.6398L12.9751 23.3908L17.8603 25.8758C18.0199 25.9572 18.1992 25.9999 18.3814 25.9999C18.5637 25.9999 18.743 25.9572 18.9026 25.8758L29.7153 20.3758C29.8849 20.2895 30.0264 20.1627 30.1249 20.0086C30.2234 19.8546 30.2754 19.6788 30.2754 19.4998V6.49983C30.2754 6.32082 30.2234 6.14509 30.1249 5.99101C30.0264 5.83692 29.8849 5.71011 29.7153 5.62383ZM18.3814 2.14183L26.9505 6.49983L18.3814 10.8578L9.81237 6.49983L18.3814 2.14183ZM28.1129 18.9088L19.4627 23.3088V12.5898L28.1129 8.18983V18.9088Z" fill="#002A3A"></path>
                                <path d="M8.65018 13H0V11H8.65018V13Z" fill="#002A3A"></path>
                                <path d="M10.8128 21H2.1626V19H10.8128V21Z" fill="#002A3A"></path>
                                <path d="M12.9754 17H4.3252V15H12.9754V17Z" fill="#002A3A"></path>
                            </svg>
                        </li>
                        <li>Besoin d'aide ?</li>
                        <li><a href="/support" id="mobile-link-contact-us">Contactez-nous</a></li>
                    </ul>


                    <span class="separate-ul-spans"></span>

                    <ul id="mobile-third-ul" class="ul-mobile-containers">

                        <li class="li-svg-containers">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 20H10V22H0V20Z" fill="#1A3442"></path>
                                <path d="M0 14H10V16H0V14Z" fill="#1A3442"></path>
                                <path d="M22 10H2C1.46957 10 0.960859 9.78929 0.585786 9.41421C0.210714 9.03914 0 8.53043 0 8V2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0H22C22.5304 0 23.0391 0.210714 23.4142 0.585786C23.7893 0.960859 24 1.46957 24 2V8C24 8.53043 23.7893 9.03914 23.4142 9.41421C23.0391 9.78929 22.5304 10 22 10ZM2 2V8H22V2H2Z" fill="#1A3442"></path>
                                <path d="M22 24H16C15.4696 24 14.9609 23.7893 14.5858 23.4142C14.2107 23.0391 14 22.5304 14 22V16C14 15.4696 14.2107 14.9609 14.5858 14.5858C14.9609 14.2107 15.4696 14 16 14H22C22.5304 14 23.0391 14.2107 23.4142 14.5858C23.7893 14.9609 24 15.4696 24 16V22C24 22.5304 23.7893 23.0391 23.4142 23.4142C23.0391 23.7893 22.5304 24 22 24ZM16 16V22H22V16H16Z" fill="#1A3442"></path>
                            </svg>
                        </li>

                        <li><a href="{{route('history')}}" id="blog-link">Histoire des drones</a></li>

                    </ul>

                    <span class="separate-ul-spans"></span>

                    <ul id="mobile-fourth-ul" class="ul-mobile-containers">

                        <li id="svg-toggle-information-li-container">
                            <ul id="ul-svg-and-information-lists">
                                <li>
                                    <ul>
                                        <li class="li-svg-containers">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="#1A3442" stroke-width="2"></path>
                                            <path d="M11 6H11.01" stroke="#1A3442" stroke-width="2" stroke-linecap="round"></path>
                                            <path d="M9 10H11V15" stroke="#1A3442" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9 15H13" stroke="#1A3442" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </li>
                                        <li>Informations</li>

                                    </ul>

                                </li>


                                <li id="li-first-container-toggle-span" class="li-container-toggle-spans"><span id="span-info" class="toggle-menu-mobile-spans"></span>
                                </li>

                            </ul>

                        </li>

                        <li id="hidden-info" class="hidden-informations">
                            <ul id="ul-information-links">
                                <li>
                                    <a href="/contact/" style="font-weight: 700;">Nous contacter</a>
                                </li>
                                <li>
                                    <a href="#">Mes commandes</a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                    <span class="separate-ul-spans"></span>

                    <ul id="mobile-social-media" class="ul-mobile-containers">

                        <li>
                            <ul id="ul-container-follow-span-toggle" class="ul-container-title-and-spans">
                                <li>Suivez nous</li>
                                <li id="li-second-container-toggle-span" class="li-container-toggle-spans"><span id="span-follow" class="toggle-menu-mobile-spans"></span></li>
                            </ul>
                        </li>

                        <li id="hidden-social-media" class="hidden-informations">

                            <a href="">
                                <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                    <path d="M50.0001 25.1533C50.0001 11.2596 38.8064 -0.00292969 25.0001 -0.00292969C11.1876 0.000195313 -0.00610352 11.2596 -0.00610352 25.1564C-0.00610352 37.7096 9.13765 48.1158 21.0876 50.0033V32.4252H14.7439V25.1564H21.0939V19.6096C21.0939 13.3064 24.8283 9.8252 30.5376 9.8252C33.2751 9.8252 36.1345 10.3158 36.1345 10.3158V16.5033H32.9814C29.8783 16.5033 28.9095 18.4439 28.9095 20.4346V25.1533H35.8408L34.7345 32.4221H28.9064V50.0002C40.8564 48.1127 50.0001 37.7064 50.0001 25.1533Z" fill="#00ADB5"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="50" height="50" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>

                            <a href="">
                                <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25 0C18.2156 0 17.3625 0.03125 14.6969 0.15C12.0312 0.275 10.2156 0.69375 8.625 1.3125C6.95654 1.94006 5.44529 2.92446 4.19688 4.19688C2.92524 5.44593 1.94096 6.957 1.3125 8.625C0.69375 10.2125 0.271875 12.0312 0.15 14.6875C0.03125 17.3594 0 18.2094 0 25.0031C0 31.7906 0.03125 32.6406 0.15 35.3063C0.275 37.9688 0.69375 39.7844 1.3125 41.375C1.95312 43.0187 2.80625 44.4125 4.19688 45.8031C5.58438 47.1937 6.97813 48.05 8.62187 48.6875C10.2156 49.3063 12.0281 49.7281 14.6906 49.85C17.3594 49.9688 18.2094 50 25 50C31.7906 50 32.6375 49.9688 35.3063 49.85C37.9656 49.725 39.7875 49.3063 41.3781 48.6875C43.0455 48.0596 44.5557 47.0752 45.8031 45.8031C47.1937 44.4125 48.0469 43.0187 48.6875 41.375C49.3031 39.7844 49.725 37.9688 49.85 35.3063C49.9688 32.6406 50 31.7906 50 25C50 18.2094 49.9688 17.3594 49.85 14.6906C49.725 12.0313 49.3031 10.2125 48.6875 8.625C48.0591 6.95695 47.0748 5.44586 45.8031 4.19688C44.5551 2.92399 43.0437 1.93952 41.375 1.3125C39.7812 0.69375 37.9625 0.271875 35.3031 0.15C32.6344 0.03125 31.7875 0 24.9937 0H25.0031H25ZM22.7594 4.50625H25.0031C31.6781 4.50625 32.4688 4.52813 35.1031 4.65C37.5406 4.75938 38.8656 5.16875 39.7469 5.50938C40.9125 5.9625 41.7469 6.50625 42.6219 7.38125C43.4969 8.25625 44.0375 9.0875 44.4906 10.2563C44.8344 11.1344 45.2406 12.4594 45.35 14.8969C45.4719 17.5312 45.4969 18.3219 45.4969 24.9937C45.4969 31.6656 45.4719 32.4594 45.35 35.0938C45.2406 37.5312 44.8313 38.8531 44.4906 39.7344C44.0898 40.8199 43.4501 41.8014 42.6187 42.6063C41.7437 43.4813 40.9125 44.0219 39.7438 44.475C38.8688 44.8188 37.5438 45.225 35.1031 45.3375C32.4688 45.4563 31.6781 45.4844 25.0031 45.4844C18.3281 45.4844 17.5344 45.4563 14.9 45.3375C12.4625 45.225 11.1406 44.8188 10.2594 44.475C9.17343 44.0748 8.19102 43.4362 7.38437 42.6063C6.55235 41.8001 5.91163 40.8177 5.50938 39.7313C5.16875 38.8531 4.75938 37.5281 4.65 35.0906C4.53125 32.4562 4.50625 31.6656 4.50625 24.9875C4.50625 18.3125 4.53125 17.525 4.65 14.8906C4.7625 12.4531 5.16875 11.1281 5.5125 10.2469C5.96563 9.08125 6.50937 8.24687 7.38437 7.37187C8.25937 6.49687 9.09062 5.95625 10.2594 5.50313C11.1406 5.15938 12.4625 4.75313 14.9 4.64062C17.2063 4.53438 18.1 4.50313 22.7594 4.5V4.50625ZM38.3469 8.65625C37.9529 8.65625 37.5628 8.73385 37.1988 8.88461C36.8348 9.03538 36.5041 9.25635 36.2256 9.53493C35.947 9.81351 35.726 10.1442 35.5752 10.5082C35.4245 10.8722 35.3469 11.2623 35.3469 11.6562C35.3469 12.0502 35.4245 12.4403 35.5752 12.8043C35.726 13.1683 35.947 13.499 36.2256 13.7776C36.5041 14.0561 36.8348 14.2771 37.1988 14.4279C37.5628 14.5787 37.9529 14.6562 38.3469 14.6562C39.1425 14.6562 39.9056 14.3402 40.4682 13.7776C41.0308 13.215 41.3469 12.4519 41.3469 11.6562C41.3469 10.8606 41.0308 10.0975 40.4682 9.53493C39.9056 8.97232 39.1425 8.65625 38.3469 8.65625ZM25.0031 12.1625C23.3002 12.1359 21.609 12.4484 20.0281 13.0817C18.4471 13.715 17.0079 14.6565 15.7942 15.8513C14.5806 17.0462 13.6168 18.4705 12.9589 20.0414C12.301 21.6124 11.9622 23.2985 11.9622 25.0016C11.9622 26.7047 12.301 28.3908 12.9589 29.9617C13.6168 31.5326 14.5806 32.957 15.7942 34.1518C17.0079 35.3467 18.4471 36.2881 20.0281 36.9214C21.609 37.5547 23.3002 37.8672 25.0031 37.8406C28.3736 37.788 31.5882 36.4122 33.9531 34.0102C36.3179 31.6081 37.6434 28.3724 37.6434 25.0016C37.6434 21.6307 36.3179 18.395 33.9531 15.993C31.5882 13.5909 28.3736 12.2151 25.0031 12.1625ZM25.0031 16.6656C27.2135 16.6656 29.3334 17.5437 30.8964 19.1067C32.4594 20.6697 33.3375 22.7896 33.3375 25C33.3375 27.2104 32.4594 29.3303 30.8964 30.8933C29.3334 32.4563 27.2135 33.3344 25.0031 33.3344C22.7927 33.3344 20.6728 32.4563 19.1098 30.8933C17.5468 29.3303 16.6688 27.2104 16.6688 25C16.6688 22.7896 17.5468 20.6697 19.1098 19.1067C20.6728 17.5437 22.7927 16.6656 25.0031 16.6656Z" fill="#00ADB5"/>
                                </svg>
                            </a>

                            <a href="">
                                <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.7063 46.8752C34.575 46.8752 44.8969 31.2408 44.8969 17.7065C44.8969 17.269 44.8969 16.8252 44.8781 16.3877C46.8877 14.933 48.6221 13.1319 50 11.069C48.1229 11.8966 46.1336 12.4421 44.0969 12.6877C46.2423 11.4053 47.8491 9.38761 48.6187 7.00959C46.6031 8.20373 44.3969 9.04201 42.0969 9.48771C40.5506 7.84091 38.5044 6.74996 36.2753 6.38383C34.0461 6.0177 31.7585 6.39684 29.7667 7.46252C27.7749 8.52819 26.19 10.2209 25.2577 12.2785C24.3253 14.3361 24.0974 16.6438 24.6094 18.844C20.5304 18.6394 16.5401 17.5798 12.897 15.7338C9.25397 13.8878 6.03964 11.2966 3.4625 8.12834C2.15419 10.388 1.75492 13.0608 2.34577 15.6042C2.93662 18.1475 4.4733 20.3706 6.64375 21.8221C5.01731 21.7668 3.42663 21.3301 2 20.5471V20.6877C2.0028 23.0548 2.82284 25.3484 4.32148 27.1807C5.82013 29.013 7.90546 30.2717 10.225 30.744C9.34457 30.9865 8.43509 31.1074 7.52188 31.1033C6.87807 31.1053 6.23556 31.0456 5.60313 30.9252C6.25871 32.9629 7.53523 34.7445 9.2539 36.0205C10.9726 37.2964 13.0473 38.0029 15.1875 38.0408C11.5517 40.8965 7.06063 42.4452 2.4375 42.4377C1.62288 42.4412 0.808822 42.3942 0 42.2971C4.69223 45.2885 10.1416 46.8769 15.7063 46.8752Z" fill="#00ADB5"/>
                                </svg>
                            </a>

                        </li>

                    </ul>

                    <span class="separate-ul-spans"></span>

                    <ul class="ul-mobile-containers ul-mobile-loggin">
                        @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('my-cart') }}" class="href-cart auth-mob-link"><img src="{{ asset('images/header/basket.svg') }}" alt=""><sup class="sup-cart">{{Cart::content()->count()}}</sup></a></li>
                            <li><a type="button" class="auth-mob-link" href="{{ route('profile.show') }}">Profil</a></li>
                        @else
                            <li><a id="btn-loggin-mob" type="button" href="{{ route('login') }}">Se connecter</a></li>
                            <li><a id="btn-register-mob" type="button" href="{{ route('register') }}">S'inscrire</a></li>
                        @endauth

                        @auth
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="background-image: url('{{ asset('images/header/logout.svg') }}'); background-size: cover; background-repeat: no-repeat; width: 25px; height: 30px;">
                                    @csrf
                                    <button type="submit" style="width: 100%; height: 100%;">
                                    </button>
                                </form>
                            </li>
                        @endauth

                    @endif
                    </ul>

                </div>
            </div>
        </header>
            <!-- Page Content -->

        @yield('content')

            <!-- Page Footer -->

        <footer class="hide-mob">
            <section>
                <div class="footer-container">
                    <ul class="footer-contact">
                        <li>SERV'DRONE</li>
                        <li><a href="{{ route('contact.create') }}">Contact</a></li>
                        <li><a href="./support.html">Support</a></li>
                        <li class="social-links">
                            <a href="#">
                                <img src="{{ asset('images/header/facebook.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{ asset('images/header/instagram.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{ asset('images/header/twitter.svg')}}" alt="">
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>Boutique</li>
                        <li><a href="./produit.html">Produit</a></li>
                        <li><a href="./produit.html">Produit</a></li>
                        <li><a href="./produit.html">Produit</a></li>
                    </ul>
                    @auth
                        <ul>
                            <li>Mon compte</li>
                            <li><a href="{{ route('my-cart')}} ">Panier</a></li>
                            {{-- <li><a href="{{route('my-history')}}">Commandes</a></li> --}}
                        </ul>
                    @endauth
                    <ul>
                        <li>Infos</li>
                        <li><a href="./mentionslegales.html">Mentions légales</a></li>
                        <li><a href="./polconfidentialite.html">Politique de confidentialité</a></li>
                        <li><a href="./cgv.html">CGV</a></li>
                    </ul>
                </div>
                <div> © 2021 Serv'Drone </div>
            </section>
        </footer>

        @livewireScripts

        <script>

            const closeCross = document.getElementById("cross-container");


            const spanFollow = document.getElementById("span-follow");
            const spanSub = document.getElementById("span-sub");
            const spanInfo = document.getElementById("span-info");

            const menuFollow = document.getElementById("hidden-social-media");
            const menuInfo = document.getElementById("hidden-info");

            const spansPlusMinusMobile = document.getElementsByClassName("toggle-menu-mobile-spans");

            const firstLi = document.getElementById("li-first-container-toggle-span");
            const secondLi = document.getElementById("li-second-container-toggle-span");
            const thirdLi = document.getElementById("li-third-container-toggle-span");

            const burgerIcon = document.getElementById("burger_icon");
            const menuMobile = document.getElementById("mobile-menu");

            burgerIcon.addEventListener('click', () =>
            {
                menuMobile.classList.add("active-mobile-menu-display");
                setTimeout(() =>
                {
                    menuMobile.classList.add("active-mobile-menu-transform");
                }, 1)
            })
            closeCross.addEventListener("click", () =>
            {
                menuMobile.classList.remove("active-mobile-menu-transform");
                setTimeout(() =>
                {
                    menuMobile.classList.remove("active-mobile-menu-display");
                }, 520)
            })

            secondLi.addEventListener("click", () =>
            {
            console.log("second li listener");
                if(menuFollow.classList.contains('active-hiddens-transform')){
                    spanFollow.classList.remove("active-toggle-menu-mobile");
                    menuFollow.classList.remove("active-hiddens-transform");

                    setTimeout(() => {
                        menuFollow.classList.remove("active-hiddens-social");
                    }, 500)

                } else {

                    menuFollow.classList.add("active-hiddens-social");

                    setTimeout(() => {
                        spanFollow.classList.add("active-toggle-menu-mobile");
                        menuFollow.classList.add("active-hiddens-transform");
                    }, 1)

                }

            })

            firstLi.addEventListener("click", () =>
            {
                console.log("first li listener");
                if(menuInfo.classList.contains('active-hiddens-transform')){
                    spanInfo.classList.remove("active-toggle-menu-mobile");
                    menuInfo.classList.remove("active-hiddens-transform");

                    setTimeout(() => {
                        menuInfo.classList.remove("active-hiddens-display");
                    }, 500)

                } else {

                    menuInfo.classList.add("active-hiddens-display");

                    setTimeout(() => {
                        spanInfo.classList.add("active-toggle-menu-mobile");
                        menuInfo.classList.add("active-hiddens-transform");
                    }, 1)

                }
            })

            closeCross.addEventListener("click", () =>
            {
                menuMobile.classList.remove("active-mobile-menu");
            })

        </script>

        @stack('modals')

        @yield('script')
    </body>
</html>
