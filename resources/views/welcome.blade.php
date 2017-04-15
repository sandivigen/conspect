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

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">Home</a>
          <a class="blog-nav-item" href="#">New features</a>
          <a class="blog-nav-item" href="#">Press</a>
          <a class="blog-nav-item" href="#">New hires</a>
          <a class="blog-nav-item" href="#">About</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Установка Laravel</h1>
        <p class="lead blog-description">версия 5.x</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            
            <h2 class="blog-post-title">Установка на сервере при помощи командной строки</h2>
            <p>Убедимся, что версия PHP соответствует требованиям(php5.6) <code>php -v</code></p>
            <p>Так же необходимо включить версию 5.6 в админке timeweb</p>


            <h3>Закачка файлов composter и laravel</h3>
            <p>подробнее на <a href="https://getcomposer.org/download/">getcomposer.org</a></p>
            <p>Выбираю папку сайта на сервере, в которой лежит <mark>public_html</mark></p>
            <p>Загружаю в эту папку файл <mark>composer.phar</mark></p>
            <pre><code class="bash">
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
            </code></pre>
            <p>Закачиваем пустой проект laravel</p>
            <pre><code class="bash">
    php -d memory_limit=-1 composer.phar create-project --prefer-dist laravel/laravel laravel
            </code></pre>

            <button data-toggle="collapse" data-target="#collapse-1" class="btn btn-default btn-sm">Расшифровка кода</button>
            <div id="collapse-1" class="collapse">
                <br>
                <p><code>php</code> раньше использовал /opt/php5.6/bin/php , пока не прописал alias на сервере</p>
                <p>в корне сервера создал файл <mark>.bash_profile</mark> и в него прописал строку <mark>alias php='/opt/php56/bin/php'</mark></p>
                <p><code>-d memory_limit=-1</code> сервер возвращает ошибку нехватки памяти, пока не решил эту проблему делаю так</p>
                <p><code>composer</code> ранее использовал composer.phar, пока не прописал алиас на сервере. И сейчас использую, тк нужно доп алиас для размера памяти писать</p>
                <p><code>--prefer-dist</code> пока не читал, что  это значит</p>
                <p><code>laravel/laravel</code> будет создан проект laravel последней версии (можно указать в ручную другую версию</p>
                <p><code>laravel</code> название папки, в которую будет помещен проект</p>
                <hr>
            </div>
            

            <h3>Порядок на сервере</h3>
            <p>Удаляем папку <mark>public_html</mark></p>
            <pre><code class="bash">
    rm -rf public_html
            </code></pre>
            <p>Делаем ссылку на на публичную папку laravel</p>
            <pre><code class="bash">
    ln -s laravel/public public_html
            </code></pre>
            <p>Перемещаем файл <mark>composer.phar</mark> в корневую папку каталога</p>
            <pre><code class="bash">
    mv composer.phar /home/r/resume/<mark>site_name</mark>/laravel/
            </code></pre>


            <h3>Запуск веб страницы</h3>

            <button data-toggle="collapse" data-target="#collapse-2" class="btn btn-default btn-sm">Если главная страница выдает ошибку 500</button>
            <div id="collapse-2" class="collapse">
                <br>
                <p>Иногда необходимо провести обновление компостера(у меня была 500 ошибка сервера)</p>
                <pre><code class="bash">
    php -d memory_limit=-1 composer.phar update
                </code></pre>
                <p>Почему то на timeweb не подцыпляет php5.6 и выдает ошибку, то необходимо дописать <em>/opt/php5.6/bin/</em> в <mark>composer.json</mark></p>
                <pre><code class="bash">
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "/opt/php5.6/bin/php artisan optimize"
    ]
                </code></pre>
                <hr>
            </div>

            <p>Необходимо проинсталировать ключ. Эту операцию необходимо проводить на сервере</p>
            <pre><code class="bash">
    php artisan key:generate
            </code></pre>
            <p>Проверим версию laracel</p>
            <pre><code class="bash">
    php artisan -V
            </code></pre>

            <button data-toggle="collapse" data-target="#collapse-3" class="btn btn-default btn-sm">На удаление</button>
            <div id="collapse-3" class="collapse">
                <br>
                <p>Раньше не мог ключ установить, так как ставил его на локалке. Искал решение и нашел, что его нужно прописывать в два файла, как оказалось в <mark>.env</mark> он автоматом прописывает, а в <mark>config/app.php</mark> он не добавляет ключ <mark>'key' => env('APP_KEY', 'insert get 32 char key')</mark> в строку. Сейчас сайт прекрасно работает без второй записи, да и в документации про это не указанно.</p>
                <hr>
            </div>

            
            <h3>Объединяем проект с PhpStorm</h3>
            <ol>
                <li>Открывает программу и выбираем <mark>Create New Project</mark></li>
            </ol>
            <h4>Создаем ftp подключение</h4>
            <p>Идем в настройки<mark>Preferences</mark> > <mark>Build, Execution, Deployment</mark> > <mark>Deployment</mark></p>
            <p>Нажимаем на "Плюсик" и вводим название хостинга</p>
            <p>Заполняем поля в вновь созданной настройке подключения, вкладка <strong>Connection</strong></p>
            <p><code>Visible only for this project</code> если необходимо только для этого проекта ставим маркер</p>
            <p><code>Type:</code> выбираем <mark>SSH</mark></p>
            <p><code>FTP host:</code> вносим адресс сервера <mark>ellen.timeweb.ru</mark></p>
            <p><code>Port:</code> вносим порт <mark>21</mark></p>
            <small class="text-muted"><em>Если указать корневую папку, то можно использовать к нескольким проектам</em></small><br>
            <small class="text-muted"><em>Но в окне сервера 'Remote Host' будет все дерево хостинга, что не удобно</em></small>
            <p><code>Root path:</code> вносим путь к папке проекта на сревере <mark>/conspect/laravel</mark></p>
            <p><code>User name:</code> и <code>Password:</code> вносим имя и пароль</p>
            Upload changed filed... -> Always -> Upload external changes
            <p>Далее необходимо указать маршрут для сонхронизации папки проекта, заходим во вкладку <strong>Mappings</strong></p>

            <small class="text-muted"><em>Если я бы делал глобальное(одно для всех проектов на сервере) соединение, то мне необходимо было бы здесь указать <mark>/conspect/laravel</mark></em></small>
            <p>В поле <code>Deployment path on server 'servername':</code> необходимо указать путь к папке проекта на сервере, в моем случае <mark>/</mark></p>
            <p>После успешной настройки файлы проекта в окне сервера подсветятся зеленым цветом</p>

            <p>Настройка автозагрузки файлов, идем <mark>Preferences</mark> > <mark>Build, Execution, Deployment</mark> > <mark>Deployment</mark> > <mark>Options</mark></p>
            <p><code>Upload changed files automatically to the default server</code> выбираем пункт <mark>On wxplicit save action 'S'</mark> - это позволит закачивать при сохранении файла. В каком то случае необходимо менять всегда(если не я меняю а без моего участия меняются файлы), но конкретно когда я сейчас не помню.</p>
            <p><code>Warn when uploading over newer file:</code> выбираем пункт <mark>Compare timestamp</mark>. Это позволит выводить сообщения если на сервере файл был тоже изменен.</p>

            <h4>Синхронизируем проект с локальным проектом</h4>
            <p>Создаем проект в пхп шторм(подробно описать), далее жмем на папке проекта на сервере и выбираем пункт 'Upload here'</p>
            <p>Закачал проект с сервера, но при сохранении файла он опять весь проект заливает на сервер. Опять ждать 25м.</p>

            <h4>Работа с файлами - скачка и закачка</h4>
            <p>Когда на сервере выделяю файл и нажимаю <mark>Upload here</mark>, то будет проведена проверка такого файла на слокалке(или сервере) и если он есть он скачается и заменется</p>
            <p>Если нажать на файле и выбрать <mark>Download from here</mark>, то файл улетит на сервер/локалку и заменит существующий там файл</p>
            <p></p>
            <p>Я открываю файл на сервере и если он есть на локалке мне пишится с верху уведомление <em>The file is identical remote one</em>, означающие, что этот файл имеет такой же на локальной машине</p>
            <p>Если изменить его и закрыть, то выпоадает сообщение: <em>Remote file 'filename.php' was closed, and its changes are not updated. Do you want to reopen editor and proceed?</em> Означающие, что вы не сохранили измененый файл, хотите продолжить редактирование?</p>
            <p>При редактировании файла нам показывается предупреждение: <em>The file has been modified. Upload?</em> - файл был изменен, закачать(обновить) его?</p>
            <p>Нажимаю да и он изменяется на сервере, но не на локалке. </p>
            <p>Открываю файл на локалке, то выдает сообщение <em>File needs to be synchronized with deployed one on 'hostname': base revision is not stored yet.</em> Означает файл отличается с файлом на сервере, его базовая версия не сохранена.  </p>
            <p>У нас есть два варианта действия <em>Merge -> Merge local and deployed versions in local file(объединить файлы оставив версию локального)</em> у меня скачалась версия с сервера</p>
            <p><em>Download</em> -> скачать версию с сервера. Нажал и у меня тоже остались версии с сервера.</p>
            <p>Короче осторожней надо быть, это какое-то объединение а не простая скачка. Лучше пользоваться через контекстное меню</p>
            <p></p>
            <p>Проверил как настраивать мапинги.</p>
            <p>вообщем в настройках соединения это путь, который будет виден в окошке хоста. Неудобно указывать корневую папку, ведь в окне будет весь сервер.</p>
            <p>С другой стороны его (настройки соединения) можно использовать для всех проектов на этом сервере, просто меняя мапинги.</p>
            <p>Мапинг указывает куда будут закачиваться файлы, те папка проекта должна совподать с путем мапинга, чтобы файлы синхронизировались.</p>

            <h2>Второй способ: установка с помощью PhpStorm</h2>
            <p>Настраиваем ftp и прописываем маршруты</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <h4>Настраиваем PhpStorm</h4>
            <p>Добавляем псевдонимы</p>
            <p>Идем в настройки<mark>Preferences</mark> > <mark>Tools</mark> > <mark>Command Line Tool Support</mark></p>
            <p>Нажимаем '+' и выбираем в поле <code>Choose tool:</code> значение <mark>Composer</mark></p>
            <p>В поле<code>Path to PHP executable:</code> указываем путь к исполнительному файлу <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark></p>
            <p>В поле<code>Path to composer.phar or composer</code> указываем путь к файлу компосера <mark>/Users/sandivigen/Documents/PhpStorm/<span class="text-danger">project_name</span>/composer.phar</mark></p>
            
            <p>Нажимаем '+' и выбираем в поле <code>Choose tool:</code> значение <mark>Tool based of symfony console</mark></p>
            <p>В поле<code>Alias:</code> вносим название <em>artisan</em></p>
            <p>В поле<code>Path to PHP executable:</code> указываем путь к исполнительному файлу <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark></p>
            <p>В поле<code>Path to script:</code> указываем путь к артисана <mark>/Users/sandivigen/Documents/PhpStorm/<span class="text-danger">project_name</span>/artisan</mark></p>
            <p>123</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <mark></mark>




    (уже стоит глобальный) Настройка phpstorm:
    1) artisan: Preferences->Command Line Tools Support
    жмем +, добавляем composer(Chose tool -> composer)(путь к локальнопу php, путь к локальному composer.phar) 
    жмем +, добавляем artisan(Chose tool -> Tool based of symfony console)(alias -> artisan, путь к локальнопу php, путь к локальному arti)
    вводим в консоль 'artisan list' - если все норм получим список(у меня не сработал 'php artisan list') 


    Ставим доктрины
    doctrine/dbal - дописывает классы в файлах
    barryvdh/laravel-ide-helper - пояснения к файлам





            <br><br><br><br><br><br><br><br><br><br><br>




            <hr>
            <h2>Разное</h2>
            <p>Код взятый из заметок</p>
            <pre><code class="php">
    &#123;&#123; Debugbar::info($comments) &#125;&#125;
    &#123;&#123;-- This comment will not be in the rendered HTML —&#125;&#125;
    Articles::all()->toArray(); // приведет объект к массиву
            </code></pre>
            <hr>
            <p>Установка composter - второй способ</p>
            <p>Я так понимаю на локальной машине я его устанавливал и заливал на сервер</p>
            <p><mark>curl -sS https://getcomposer.org/installer | php</mark></p>
            <p><mark>/Applications/XAMPP/bin/php-5.6.21 composer.phar  create-project --prefer-dist laravel/laravel project_name "5.2.*"  </mark></p>
            <p><mark>/opt/php5.6/bin/php -d memory_limit=-1 composer.phar  create-project --prefer-dist laravel/laravel project_name "5.2.*"</mark></p>
            <p>Проект создастся версии 5.2</p>
            <hr>
            <p>Путь к php на локальной машине <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark></p>
            <hr>
            <h3>Установка laravel по учебнику(который замудренный оказался). Пытался все по этапно записывать.</h3>
            <p>создаю файл<mark>settings.php </mark>в каталоге config, - пока пустую</p>
            <p><mark>/opt/php5.6/bin/php artisan app:name Corp</mark> — изменяем пространство имен</p>
            <p>изменяю файл <mark>route</mark></p>

             
 





























          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Навигация</h4>
            <ol class="list-unstyled">
              <li><a href="#">Установка Laravel</a></li>
              <li><a href="#">Sublime Text 2</a></li>
              <li><a href="#">PHP ООП</a></li>
              <li><a href="#">JS</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Ресурсы</h4>
            <ol class="list-unstyled">
              <li><a href="https://highlightjs.org/">Highlight.js</a></li>
              <li><a href="https://semantic-ui.com">Semantic UI</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

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
