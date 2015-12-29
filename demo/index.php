<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<?php

define('SRC_DIR', __DIR__ . '/../src/');

require_once __DIR__ . '/../vendor/autoload.php';

\Tracy\Debugger::enable(\Tracy\Debugger::DEVELOPMENT, __DIR__ . '/log');
\Tracy\Debugger::$strictMode = TRUE;

require_once SRC_DIR . 'Mesour/Icon/IIcon.php';
require_once SRC_DIR . 'Mesour/UI/Icon.php';

?>

<div class="container">
    <hr>

    <h2>Demo - default</h2>

    <div class="jumbotron">
        <?php

        $icon = new \Mesour\UI\Icon;

        echo $icon->render();

        ?>
    </div>

    <hr>

    <h2>Demo - pencil</h2>

    <div class="jumbotron">
        <?php

        $icon = new \Mesour\UI\Icon;

        $icon->setType('pencil');

        echo $icon->render();

        ?>
    </div>

    <hr>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>