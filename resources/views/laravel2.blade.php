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
                /usr/local/php5-5.6.19-20160310-141036/bin/php
            </div>

            <p class="bg-danger">Зачем вообще нужен контроллер? я ведь могу создать страницу во вьюхе, и прописать к ней путь в роуте. Необходимо описать, что вообще это такое. Я так понимаю они будут отвечать за удаление добавление и тд.</p>


            <div class="row">

                <div class="col-sm-8">

                    <h2>Контролеры</h2>

                    <p>Для просмотра всех доступных комманд воспользуемся данноц строчкой:</p>
                    <pre><code class="bash">php artisan make:controller --help</code></pre>

                    <p>Комманда для создания <em>пустого</em> контроллера с именем <mark>MyController</mark> в деректории <mark>/app/Http/Controllers/</mark>. Данный контроллер будет пустым.</p>
                    <pre><code class="bash">php artisan make:controller MyController</code></pre>

                    <p>Данная комманда создаст дерикорию в <mark>/app/Http/Controllers/</mark> и поместит в нее контроллер</p>
                    <pre><code class="bash">php artisan make:controller my_folder/MyController2</code></pre>

                    <p>Данная комманда создаст шаблон ресурса (index, create, update etc.)</p>
                    <pre><code class="bash">php artisan make:controller --resource my_folder/MyController3</code></pre>

                    <p>Удаление контраллера: Если контроллер был только, что создан то его можно просто удалить руками. Если он был создан давно, то необходимо проверить его в route.php</p>


                    <h3>Маршруты(route)</h3>
                    <p>Это своего рода правила, которые мы указываем системе, что ей делать для запрошеного адресса. Эти правила прописываються в файле <mark>/routes/web.php</mark>.</p>

                    <p>Для get запроса мы указываем путь запроса <mark>/about</mark> и шаблон представления <mark>about</mark></p>
<pre><code>Route::get('\about', function () {
    return view('about');
});</code></pre>

                    <p>При создании правила воторым параметром можно так же передовать строку с именем контроллера и его метода</p>
                    <pre><code>Route::get('\', 'MyController@Index');</code></pre>

                    <h4>Присвоение имени маршруту</h4>
                    <p>Так же можно передовать массив с параметрами</p>
                    <pre><code>Route::get('\', ['uses' => 'MyController@Index']);</code></pre>

                    <p>Ключ <code>uses</code> принимает параметр метода контроллера, следующее правило говорит, что должен отрабатывать метод <mark>Index</mark> контреллера <mark>MyController</mark>.
                        При передачи массива можно формировать наши правила для дальнейшего удобного доступа к нему.</p>

                    <pre><code>Route::get('\', ['uses' => 'MyController@Index', 'as' => 'home']);</code></pre>
                    <p>Например назавем роутер для главной <mark>home</mark>, после чего выполним команду в консоле, которая выведет все данные по заданным правилам роутенга</p>
                    <pre><code class="bash">php artisan route:list</code></pre>

                    <p>Теперь мы можем обращаться к маршруту по имени</p>
                    Имя роута можно использовать для получения его url
<pre><code>class MyController extends Controller {
    public function index() {
        return route('home');
    }
}</code></pre>


                    <h2>Представления</h2>
<pre><code>&#123;!! $pagetitle !!&#125; - отключаем экранирование, выводи html теги
&#123;-- $pagetitle --&#125; - закоментировать строку
@&#123;&#123;  скобки не сработают &#125;&#125;
</code></pre>


                    <h2>Миграции (все действия выполняем на сервере)</h2>
                    <p>Migrations - это система контроля версий, только для баз данных. С развитием проета меняется не только сам код, но и за частую структура баз данных, очень важно отслеживать эти изменения и дежать базу в надлежащем состоянии</p>

                    <p>Для начало нужно сконфигурировать базу данных для laravel.
                        Для этого необходимо заполнить файл <mark>.env</mark>, внеся название имя пользователя и пароль.</p>
                    <p>Так же с версии 5.4 у меня при попытке миграции появляется ошибка(SQLSTATE[42000]: Syntax error or access violation:),
                        решается она изменением двух строк в файле <mark>/config/database.php</mark></p>
<pre><code>'charset' => 'utf8',
'collation' => 'utf8_unicode_ci',
</code></pre>





                    <p>Для просмотра всех доступных комманд воспользуемся данной строчкой:</p>
                    <pre><code class="bash">php artisan make:migration --help</code></pre>

                    <p>Создадим файл миграции</p>
                    <pre><code class="bash">php artisan make:migration --create=table_name create_name_table</code></pre>
                    <p>Где <mark>table_name</mark> является названием таблицы, а <mark>create_name_table</mark> является классом миграции(не совсем понимаю на что это влияет).</p>

                    <p>Создадим файл миграции и деректорию для него. Я так понял это чисто для структурирования.</p>
                    <pre><code class="bash">php artisan make:migration --create=messages --path=database/migrations/<mark>new_folder</mark> create_name_table</code></pre>

                    <p>Активировать все миграции</p>
                    <pre><code class="bash">php artisan migrate</code></pre>

                    <p>Активировать все миграции из определенной папки</p>
                    <pre><code class="bash">php artisan migrate  --path=database/migrations/<mark>new_folder</mark></code></pre>

                    <p>Откатывает все миграции(удалит все)</p>
                    <pre><code class="bash">php artisan migrate:reset</code></pre>

                    <p>Откатывает последнюю миграцию</p>
                    <pre><code class="bash">php artisan migrate:rollback</code></pre>

                    <h4>Редактирования файла миграции</h4>

                    <p>Добавляем поля в уже существующую таблицу, после определеного столбца</p>
                    <pre><code>$table->string('email')->after('username');</code></pre>

                    <p>Если создаем добавление столбцев, то необходимо указать удаление именно их при откате, а не всей таблицы</p>
<pre><code>public function up() {
    Schema::table('table_name', function($table) {
        $table->dropColumn('email');
    });
}</code></pre>

                    <p>Что это?</p>
                    <p></p>для того чтобы переименовывать поля нужен пакет
                    <p></p>composer require doctrine/dbal


                    <h2>Модели</h2>
                    Модели отвечает за взаимодействие с дб

                    <p>Создаем модель</p>
                    <pre><code class="bash">php artisan make:model Mymodel</code></pre>

                    <p>Создаем модель и миграцию к ней</p>
                    <pre><code class="bash">php artisan make:model Mymodel -m</code></pre>

                    <p>Создаем модель в декриктории</p>
                    <pre><code class="bash">php artisan make:model my_folder/Message</code></pre>


                    <h4>Добавляем записи в БД с помощью консоли</h4>

                    <p>Данная комманда позволит выполнять php код в консоле</p>
                    <pre><code class="bash">php artisan tinker</code></pre>

<pre><code class="bash">
use App\Models\Message // не помню зачем это
$msg = new Message; // создает новый объект
$msg->name = 'Vasya';
$msg->email = 'Vasya@mail.ru';
$msg->message = 'first message'; // Вносим данные в объект
$msg->save(); // Делаем запись в БД
Message::all()->toArray(); // Получим массив записей

$m = Message::find(1); // Получение записи по id
$m->message = 'Message update'; // Изменяем значение записи
$msg->save(); // Сохраняем измененую запись

$m->delete(); // для удаления записи</code></pre>

                    Еще один способ создовать и обновлять записи, для этого
                    в методы <mark>create</mark> и <mark>update</mark> передается массив
                    <pre><code class="bash">Message::create(['name' => 'John',  'message' => 'Hi']);</code></pre>

                    <p>по умолчанию эта возможность(какая возможеость???) отключена, добавляем в модель <mark>Message</mark>:</p>
                    <pre><code class="bash">protected $fillable = ['name', 'email', 'message'];</code></pre>

                    <p>Для выхода используем команду <code>exit</code> или <code>exit()</code></p>


                    <p></p>use App\Models\Message;
                    <p></p>в файлк контройлеоа



                </div><!-- /.content-block -->

                <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>Инструменты</h4>
                        <p>Путь к php на локальной машине <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark></p>
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
