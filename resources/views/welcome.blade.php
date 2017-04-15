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

      <div class="blog-header">
        <h1 class="blog-title">Установка Laravel</h1>
        <p class="lead blog-description">версия 5.x</p>
      </div>
      

<div class="row">

<div class="col-sm-8 blog-main">
  <p>Для начала необходимо включить версию 5.6 в админке timeweb</p>
  <p>Далее необходимо установить(если еще не установлен) псевдоним для php5.6, в корне хостинга содаем файл <mark>.bash_profile</mark>, в него вносим следующие строки:</p>
    <pre><code class="bash">
      alias php='/opt/php56/bin/php'
      alias composer='/opt/php5.6/bin/php /home/r/resume/conspect/laravel/composer.phar'
    </code></pre>
  <div class="blog-post">
    
    <h2>Настройка PhpStorm</h2>

    <h4>Создаем ftp подключение</h4>
    <p>Переходим в настройки <mark>Preferences</mark> > <mark>Build, Execution, Deployment</mark> > <mark>Deployment</mark></p>
    <p>Нажимаем на "+" и вводим название хостинга</p>
    <p>Заполняем поля во вкладке <strong>Connection</strong></p>
    <ul>
        <li><code>Visible only for this project</code> если только для этого проекта ставим маркер</li>
        <li><code>Type:</code> выбираем <mark>SSH</mark></li>
        <li><code>FTP host:</code> вносим адресс сервера <mark>ellen.timeweb.ru</mark></li>
        <li><code>Port:</code> вносим порт <mark>21</mark></li>
        
        <li><code>Root path:</code> вносим путь к папке проекта на сревере <mark>/conspect/laravel</mark></li>
        <li><code>User name:</code> и <code>Password:</code> вносим имя и пароль</li>
        <li>
            <a data-toggle="collapse" href="#collapse-4">примечание</a>
            <div id="collapse-4" class="collapse">
                <small class="text-muted"><em>Для Root path, если указать корневую папку, то можно использовать к нескольким проектам</em></small><br>
                <small class="text-muted"><em>Но в окне сервера 'Remote Host' будет все дерево хостинга, что не удобно</em></small>
                <hr>
            </div>
        </li>
    </ul>

    <p>Указаваем маршрут для сонхронизации папок проекта, во вкладке <strong>Mappings</strong></p>
    <ul>
        <li>Поставить маркер <code>Use this server as default</code>, для автозакачки файлов на сервер</li>
        <li>В поле <code>Deployment path on server 'servername':</code> необходимо указать путь к папке проекта на сервере, в моем случае <mark>/</mark></li>
        <li>
            <a data-toggle="collapse" href="#collapse-5">примечание</a>
            <div id="collapse-5" class="collapse">
                <small class="text-muted"><em>Если я бы делал глобальное(одно для всех проектов на сервере) соединение, то мне необходимо было бы здесь указать <mark>/conspect/laravel</mark></em></small>
                <p>После успешной настройки файлы проекта в окне сервера подсветятся зеленым цветом</p>
                <p>Если не указать проект по умолчанию, то файлы не будет закачиваться на сервер</p>
                <hr>
            </div>
        </li>
    </ul>

    <p>Настройка автозагрузки файлов</p>
    <ul>
        <li>переходим в <mark>Preferences</mark> > <mark>Build, Execution, Deployment</mark> > <mark>Deployment</mark> > <mark>Options</mark></li>
        <li><code>Upload changed files automatically to the default server</code> выбираем пункт <mark>Always</mark></li>
        <li><code>Warn when uploading over newer file:</code> выбираем пункт <mark>Compare timestamp</mark> - выводит сообщение, если на сервере файл был тоже изменен</li>
        <li>
            <a data-toggle="collapse" href="#collapse-6">примечание</a>
            <div id="collapse-6" class="collapse">
                <small class="text-muted"><em>
                        Раньше я ставил On explicit save action 'S', закачивать файлы при сохранении, но допустим если я создаю контроллер или миграцию, то она не появляется на сервере. А так же другие файлы(иконки например).</em></small>
                <hr>
            </div>
        </li>
    </ul>
    </p>
    <p>
    <p></p>

    <h4>Добавляем псевдонимы в PhpStorm</h4>
    <p>Переходим в настройки<mark>Preferences</mark> > <mark>Tools</mark> > <mark>Command Line Tool Support</mark></p>
    <p>Добавляем Composer:</p>
    <ul>
        <li>Нажимаем '+' и выбираем в поле <code>Choose tool:</code> значение <mark>Composer</mark></li>
        <li>В поле<code>Path to PHP executable:</code> указываем путь к исполнительному файлу <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark></li>
        <li>В поле<code>Path to composer.phar or composer</code> указываем путь к файлу компосера <mark>/Users/sandivigen/Documents/PhpStorm/<span class="text-danger">project_name</span>/composer.phar</mark></li>
    </ul>
    <p>Добавляем Artisan:</p>
    <ul>
        <li>Нажимаем '+' и выбираем в поле <code>Choose tool:</code> значение <mark>Tool based of symfony console</mark></li>
        <li>В поле<code>Alias:</code> вносим название <em>artisan</em></li>
        <li>В поле<code>Path to PHP executable:</code> указываем путь к исполнительному файлу <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark></li>
        <li>В поле<code>Path to script:</code> указываем путь к артисана <mark>/Users/sandivigen/Documents/PhpStorm/<span class="text-danger">project_name</span>/artisan</mark></li>
    </ul>


    <h2>Инсталяция laravel</h2>
    <h4>Первый способ: используя командную строку на сервере</h4>
    <p>Убедимся, что версия PHP соответствует требованиям(php5.6) <code>php -v</code></p>
    <p>подробнее на <a href="https://getcomposer.org/download/">getcomposer.org</a></p>
    <p>Выбираю папку сайта на сервере, в которой лежит <mark>public_html</mark></p>
    <p>Загружаю в эту папку файл <mark>composer.phar</mark></p>
    <pre><code class="bash">
      php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
      php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
      php composer-setup.php
      php -r "unlink('composer-setup.php');"
    </code></pre>
    <p>Закачиваем проект laravel</p>
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

    <p>Далее проект необходимо скачать на локальную машину. Для этого создадим пустой проект в PhpStorm</p>
    <ul>
        <li>На панеле кликаем по вкладке <mark>File</mark> > <mark>Create New Project</mark></li>
        <li>Выбираем <mark>Empty Project</mark> и нажимаем <strong>Create</strong></li>
        <li>В <code>Location:</code> вносим путь до папки с проектом <mark>/Users/sandivigen/Documents/PhpStorm/<span class="text-danger">project_name</span></mark></li>
    </ul>
    <p>Далее закачиваем файлы на локальную машину</p>
    <ul>
        <li>Чтобы открыть панель(окно) файлов на хостинге, кликаем <mark>Tools</mark> > <mark>Deployment</mark> > <mark>Browse Remote Host</mark></li>
        <li>Кликаем ПКМ на проекте и выбираем пункт <mark>Download from here</mark></li>
    </ul>
    

    <h4>Второй способ: используя PhpStorm</h4>
    <ul>
        <li>На панеле кликаем по вкладке <mark>File</mark> > <mark>Create New Project</mark></li>
        <li>Выбираем <mark>Composer Project</mark> и нажимаем <strong>Create</strong></li>
        <li>В поле<code>Location:</code> указываем путь к проекту <mark>/Users/sandivigen/Documents/PhpStorm/<span class="text-danger">project_name</span><span class="text-danger">project_name</span>/artisan</mark></li>
        <li>В поле<code>composer.phar</code> указываем путь к местонахождения файла или скачиваем его из интернета</li>
        <li>В поле<code>Package</code> ищим  <mark>Laravel/Laravel</mark>. Нажимаем Create и проект будет создан.</li>
    </ul>
    <p>Далее закачиваем файлы на сервер</p>
    <ul>
        <li>Чтобы открыть панель(окно) файлов на хостинге, кликаем <mark>Tools</mark> > <mark>Deployment</mark> > <mark>Browse Remote Host</mark></li>
        <li>На сервере необходимо создать дерево папок <mark>/ProjectName/Laravel</mark></li>
        <li>Кликаем ПКМ на локальном проекте и выбираем пункт <mark>Deployment</mark> > <mark>Download from host_name</mark></li>
    </ul>


    <h3>Порядок на сервере</h3>
    <p>Удаляем папку <mark>public_html</mark></p>
    <pre><code class="bash">
      rm -rf public_html
    </code></pre>
    <p>Делаем ссылку на на публичную папку laravel</p>
    <pre><code class="bash">
      ln -s laravel/public public_html
    </code></pre>
    <p>Перемещаем файл(если использовали способ установки с сервера) <mark>composer.phar</mark> в корневую папку каталога</p>
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
    <h2>Подключаем базу данных к PhpStorm</h2>
    <p>Создаем БД и добавляем доступ к ней внеся ip адресс того, кто будет к ней подключатся(в данном случае мой домашний)</p>
    <p>Открываем окошко 'Database' (не знаю как его вывести если закрыть), нажимаем <mark>'+'</mark> > <mark>Data Source</mark> > <mark>MySql</mark></p>
    <p>В <code>Host:</code> вносим ip сервера, в моем случае <mark>92.53.98.158</mark>, указываем стандартный порт 3306. Далее вносим наименование базы данных и имя пользователя(в моем случае они одинаковые), а так же указываем параоль.</p>
    <p></p>
    <p></p>
    

    <h2>Подключение Git к проекту</h2>
    <p>Переходим в <mark>Preferences</mark> -> <mark>Version Control</mark> -> <mark>GitHub</mark></p>
    <p>Заполняем поля: в <code>Host:</code> указываем <mark>github.com</mark>, а так же вносим имя и пароль</p>
    <p>Включаем интеграцию: в панеле <mark>VCS</mark> -> <mark>Enable Version Control Integration…</mark>, выбираем в выпадающем поле <mark>git</mark>. Файлы проекте подсветятся красным, это значит, что они не под контролем версии, не закомиченны.</p>
    <p>Настройка исключений: создаем в корне проекта файл .gitignore. Нам будет предложенно добавить его в git, необходимо согласится. Далее прописываем исключения(.idea — папка проекта пхпшторм)</p>
    <p>Добавляем файлы в git: ПКМ на проекте -> <mark>Git</mark> -> <mark>Add</mark>. Файлы подсветятся зеленым цветом, это значит, что они под контролем git</p>
    <p>Вариант, когда мы создаем проект в пхпшторме: <mark>VCS</mark> -> <mark>Import into Version Control</mark> -> <mark>Shere Project on GitHub</mark>. Вводим название нового репозитория, (По умолчанию указывается <mark>Remoute name — origin</mark>, по желанию в description можно добавить описание.</p>
    <p>Добавляем изменения: на панели инструментов зеленая иконка <mark>VCS</mark>. Вносим комментарий в поле <mark>Commit Message</mark>. Нажимаем на кнопку <mark>Commit and push</mark> для коммита и заливки файлов на GitHub</p>
    <p>Для автаматической заливки изменений локального диска на сервер: <mark>Default Settings</mark> -> <mark>Build, Exrcution, Deployment</mark> -> <mark>Deployment</mark> -> <mark>Options</mark> -> <mark>Umpoad changed files automatically to the default server</mark> -> <mark>Always</mark></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <mark></mark>












<hr>





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

     
    <h4>PhpStorm: работа с файлами - скачка и закачка</h4>
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





























          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Путь к php на локальной машине <mark>/usr/local/php5-5.6.19-20160310-141036/bin/php</mark></p>

          </div>
          <div class="sidebar-module">
            <h4>Навигация</h4>
            <ol class="list-unstyled">
              <li><a href="/">Установка Laravel</a></li>
              <li><a href="/laravel2">Настройка Laravel</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Ресурсы</h4>
            <ol class="list-unstyled">
              <li><a href="https://highlightjs.org/">Highlight.js</a></li>
              <li><a href="https://semantic-ui.com">Semantic UI</a></li>
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
