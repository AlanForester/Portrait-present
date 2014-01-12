<!doctype html>
<html>
<head>

  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

  <!-- Use title if it's in the page YAML frontmatter -->
  <title><?= 'Ошибка' ?></title>

</head>

<body>

<div class="navbar navbar-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container-fluid">

      <a class="brand" href="<?=Yii::app()->baseUrl?>"><?=$this->pageTitle=Yii::app()->name?></a>

      <!-- the new toggle buttons -->

      <ul class="nav pull-right">

        <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>

        <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>

      </ul>

      

    </div>
  </div>
</div>
<div class="container">
  
<div class="row-fluid">
  <div class="span8 offset2">
    <div class="error-box">
      <div class="message-small">Ого! Что здесь происходит?</div>
      <div class="message-small"><?php echo CHtml::encode($message); ?></div>
      <div class="message-big"><?php echo $code; ?></div>

      <div style="margin-top: 50px">
        </a>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>
