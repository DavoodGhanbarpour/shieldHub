<!DOCTYPE html>
<html lang="fa-IR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard | Login Page</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon"/>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/"/>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&amp;display=swap" rel="stylesheet"/>
    <!-- Iconly icon css-->
    <link rel="stylesheet" href="{{asset('css/vendors/iconly.css')}}"/>
    <!-- App css-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style-rtl.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}"/>
</head>

<body class="h-screen bg-primaryLight" dir="ltr">
<main class="h-full">
    <div class="flex items-center justify-center h-full p-[15px]">
        <div
            class="grid grid-cols-12 gap-0 w-full max-w-[70%] xl:max-w-[50%] md:max-w-[70%] sm:max-w-[80%] 2sm:max-w-[100%]  shadow-2xl bg-white dark:bg-mode-300">
            <div class="relative z-10 col-span-5 bg-white 2xl:col-span-6 dark:bg-mode-300 xl:col-span-12">
                <div class="p-8 px-20 6xl:px-8 2xl:p-7 2sm:px-[15px] h-full w-full flex items-center">
                    <div class="w-full">
                        <a class="block mb-8 2xl:mb-6">
                            <img class="w-[100px] 2xl:w-[90px]" src="{{asset('images/logo/logo-dark.svg')}}"
                                 alt="logo"/>
                        </a>
                        <div class="mb-5">
                            <h1 class="mb-1 text-2xl font-semibold">Login</h1>
                            <p class="text-sm text-gray-500 2xl:text-xs">A manager tool, for everyone</p>
                        </div>
                        <div>
                            <form action="{{route('auth.authenticate')}}" method="post">
                                @csrf
                                <div class="grid grid-cols-2 gap-5">
                                    <div class="form-control col-span-2">
                                        <label class="label pt-0 mt-[-2px]" for="email">
                                            <span class="label-text text-gray-500">
                                              Email
                                            </span>
                                        </label>
                                        <input class="input w-full border-light dark:bg-mode-200" id="email"
                                               name="email" type="email" required="required"
                                               placeholder="Enter your email"/>
                                    </div>
                                    <div class="form-control col-span-2">
                                        <label class="label pt-0 mt-[-2px]" for="password">
                                            <span class="label-text text-gray-500">
                                              Password
                                            </span>
                                        </label>
                                        <div class="relative">
                                            <input
                                                class="input w-full border-light pr-10 rtl:pr-4 rtl:pl-10 dark:bg-mode-200"
                                                id="password" name="password" type="password" required="required"
                                                placeholder="Enter your password"/>
                                            <img
                                                class="dark:invert-[40%] showHidePassword absolute w-5 h-5 top-1/2 -translate-y-1/2 right-4 rtl:left-4 rtl:right-unset"
                                                src="{{asset('images/icons/eye-1.svg')}}" alt="eye"/>
                                        </div>
                                    </div>
                                    <div class="form-control col-span-1">
                                        <label class="label cursor-pointer p-0 flex items-center gap-2 justify-start">
                                            <input class="checkbox-sm checkbox checkbox-accent" type="checkbox"
                                                   checked="checked"/>
                                            <span class="label-text text-dark 3sm:text-2xs">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="form-control col-span-1 text-end">
                                        <a class="text-xs text-gray-500 hover:text-primary 3sm:text-2xs"
                                           href="forgot-password.html">
                                            Forget password ?
                                        </a>
                                    </div>
                                    <div class="col-span-2">
                                        <button class="w-full btn btn-primary">Login</button>
                                    </div>
                                    <!-- <div class="col-span-2 text-xs text-gray-500">
                                      Not registered yet? <a class="text-xs text-primary" href="register.html"> Create an Account </a>
                                    </div> -->
                                </div>
                            </form>
                            <!-- <div class="divider text-gray-500 my-5 whitespace-nowrap"> or Sign in with </div> -->
                            <!-- <div class="flex item-center gap-3 flex-wrap"> <a
                                class="btn flex-[1_1_0] leading-none text-xs flex-nowrap group btn-primary btn-outline gap-1 text-dark flex items-center justify-center"
                                href="https://accounts.google.com/">
                                <svg class="w-4 h-4 group-hover:fill-white fill-primary">
                                  <use href="../../assets/images/icons/sprite.svg#icon-google"> </use>
                                </svg>Google </a><a
                                class="btn group text-xs leading-none flex-[1_1_0] flex-nowrap btn-primary btn-outline gap-1 text-dark flex items-center justify-center"
                                href="https://www.facebook.com/login/">
                                <svg class="w-4 h-4 group-hover:fill-white fill-primary">
                                  <use href="../../assets/images/icons/sprite.svg#icon-facebook"> </use>
                                </svg>Facebook </a><a
                                class="btn group text-xs leading-none flex-[1_1_0] flex-nowrap btn-primary btn-outline gap-1 text-dark flex items-center justify-center"
                                href="https://www.instagram.com/accounts/login/">
                                <svg class="w-4 h-4 group-hover:fill-white fill-primary">
                                  <use href="../../assets/images/icons/sprite.svg#icon-instagram"> </use>
                                </svg>Instagram</a>
                              </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-7 2xl:col-span-6 xl:fixed xl:inset-0">
                <div class="h-full relative overflow-hidden">
                    <img class="w-full h-full" src="{{asset('images/login-banner/bg.jpg')}}" alt="bg image"/>

                    <!-- <img class="md:hidden w-[115px] h-[115px] 2xl:w-20 2xl:h-20 2xl:left-[15px] rtl:2xl:left-unset rtl:2xl:right-[15px] 2xl:top-[42%] xl:top-[35%] xl:left-[10%] rtl:xl:right-[10%] rtl:xl:left-unset absolute -translate-y-2/4 top-2/4 rtl:left-unset rtl:right-[34px] left-[34px]  animate__animated animate__slow animate__infinite animate__tada"
                      src="../../assets/images/login-banner/google.png" alt="google" /> -->
                    <!-- <img class="md:hidden w-[100px] h-[100px] 2xl:w-[70px] 2xl:h-[70px] xl:top-[2%] lg:top-0  absolute -translate-y-2/4 top-[10%] left-[40%] rtl:left-unset rtl:right-[40%] animate__animated animate__slow animate__infinite animate__tada"
                      src="../../assets/images/login-banner/twitter.png" alt="twitter" /> -->
                    <!-- <img class="md:hidden w-[100px] h-[100px] 2xl:w-[70px] 2xl:h-[70px] xl:right-[6%] xl:top-[25%]  absolute -translate-y-2/4 right-[22%] rtl:right-unset rtl:left-[22%]  top-[26%]  animate__animated animate__slow animate__infinite animate__tada"
                      src="../../assets/images/login-banner/facebook.png" alt="facebook" /> -->
                    <!-- <img class="md:hidden w-[100px] h-[100px] 2xl:w-[70px] 2xl:h-[70px] 2xl:right-[9%] rtl:2xl:right-unset rtl:2xl:left-[9%] 2xl:bottom-[28%] xl:right-[16%] rtl:xl:right-unset rtl:xl:left-[16%] xl:bottom-[18%] absolute -translate-y-2/4 bottom-[18%] right-[6%] rtl:right-unset rtl:left-[6%]  animate__animated animate__slow animate__infinite animate__tada"
                      src="../../assets/images/login-banner/insta.png" alt="instagram" /> -->
                    <!-- <img class="md:hidden w-[100px] h-[100px] 2xl:w-[70px] 2xl:h-[70px] 2xl:left-[22%] rtl:2xl:left-unset rtl:2xl:right-[22%] xl:left-[2%] rtl:xl:left-unset rtl:xl:right-[2%] 2xl:bottom-[14%] absolute -translate-y-2/4 bottom-[3%] left-[30%] rtl:left-unset rtl:right-[30%] animate__animated animate__slow animate__infinite animate__tada"
                      src="../../assets/images/login-banner/linkdin.png" alt="linkedin" /> -->

                    <!-- <div class="absolute bottom-0 right-0 inline-block xl:hidden p-7">
                      <p class="text-3xl 5xl:text-2xl 2xl:text-lg max-w-[41%] 2xl:max-w-[50%] font-medium text-white ml-auto">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                        <img class="inline-block w-12 h-auto" src="../../assets/images/login-banner/line.svg" alt="line" />
                      </p>
                    </div> -->

                    <!-- <div class="absolute text-center xl:hidden top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4">
                      <div class="relative flex items-center justify-center w-4/5 mx-auto 2xl:w-[90%]">
                        <img class="w-3/4" src="../../assets/images/login-banner/center.png" alt="center widgets" />
                        <img class="absolute w-4/5 bottom-[-20%] rtl:left-unset rtl:right-[-27%] left-[-27%]  animate__animated animate__slow animate__infinite animate__bounce-1"
                          src="../../assets/images/login-banner/left.png" alt="right widgets" />
                        <img class="absolute w-[70%] right-[-30%] rtl:right-unset rtl:left-[-30%] top-[11%]   animate__animated animate__slow animate__infinite animate__bounce-1"
                          src="../../assets/images/login-banner/right.png" alt="left widgets" />
                      </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/helper.js')}}"></script>
<!-- custom script   -->
<script src="{{asset('js/script.js')}}"></script>

<script src="{{asset('js/toastr.min.js')}}"></script>

</body>

</html>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error(`{{$error}}`);
        </script>
    @endforeach
@endif
