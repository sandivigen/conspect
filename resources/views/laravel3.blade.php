<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- JQuery Core JavaScript -->
    <script src="/assets/jquery/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Highlight.js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/styles/agate.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.10.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <style type="text/css">
        pre {
            padding: 0;
        }

        /*
         * Masthead for nav
         */

        .blog-masthead {
            background-color: #428bca;
            -webkit-box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
            box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
        }

        /* Nav links */
        .blog-nav-item {
            position: relative;
            display: inline-block;
            padding: 10px;
            font-weight: 500;
            color: #cdddeb;
        }
        .blog-nav-item:hover,
        .blog-nav-item:focus {
            color: #fff;
            text-decoration: none;
        }

        /* Active state gets a caret at the bottom */
        .blog-nav .active {
            color: #fff;
        }
        .blog-nav .active:after {
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 0;
            margin-left: -5px;
            vertical-align: middle;
            content: " ";
            border-right: 5px solid transparent;
            border-bottom: 5px solid;
            border-left: 5px solid transparent;
        }




        /* Sidebar modules for boxing content */
        .sidebar-module {
            padding: 15px;
            margin: 0 -15px 15px;
        }
        .sidebar-module-inset {
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 4px;
        }
        .sidebar-module-inset p:last-child,
        .sidebar-module-inset ul:last-child,
        .sidebar-module-inset ol:last-child {
            margin-bottom: 0;
        }





    </style>

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif
</div>
    <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <a class="blog-nav-item" href="#">Home</a>
                <a class="blog-nav-item active" href="#">Laravel</a>
                <a class="blog-nav-item" href="#">PHP</a>
                <a class="blog-nav-item" href="#">JavaScript</a>
                <a class="blog-nav-item" href="#">About</a>
            </nav>
        </div>
    </div>

        <div class="container">

            <div>
                <h1>Разработка проекта на Laravel</h1>
                <p>версия 5.x</p>
            </div>

            <div class="row">

                <div class="col-sm-8">

                    <h2>Настройка аутиндификации</h2>

                    <p>Необходимо выполнить инсталяцию файллов необходимых для аут-ции</p>
                    <pre><code>php artisan make:auth</code></pre>
                    <p>После этого создадутся файлы в папках <mark>views/auth/login, register, /passwords/email, reset.blade.php</mark> и <mark>layouts/app.blade.php, home.blade.php, welcome.blade.php</mark></p>
                    <p>А так же создастся контреллер <mark>HomeController</mark>. И допишится файл routes/web.php</p>
                    <p>Так же мы можем просмотреть новые маршруты воспользовавшись командой:</p>
                    <pre><code>php artisan route:list</code></pre>
                    <p>Далее нам необходимо сделать две стандартных миграции(выполнить на сервере)</p>


                    <h2>Выносим части кода в отдельные файлы</h2>

                </div><!-- /.content-block -->

                <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>Инструменты</h4>
                        <p>Путь к php на локальной машине <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark>. &#123;!! $pagetitle !!&#125;</p>
                    </div>
                    <div class="sidebar-module">
                        <h4>Навигация</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">Установка Laravel</a></li>
                            <li><a href="#">Разработка на Laravel</a></li>
                        </ol>
                    </div>
                    <div class="sidebar-module">
                        <h4>Ресурсы</h4>
                        <ol class="list-unstyled">
                            <li><a href="https://highlightjs.org/">Highlight.js</a></li>
                            <li><a href="https://semantic-ui.com">Semantic UI</a></li>
                        </ol>
                    </div>
                </div><!-- /.sidebar-block -->
            </div><!-- /.row -->
        </div><!-- /.container -->

    <footer class="blog-footer">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </footer>

</body>
</html>
