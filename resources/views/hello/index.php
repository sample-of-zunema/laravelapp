<!-- 3-1.PHPのテンプレートを作成 -->
<html>
  <head>
    <title>Hello/Index</title>
    <style>
      body { font-size:16pt; color:#999; }
      h1 {
        font-size:100pt;
        text-align:right;
        color:#f6f6f6;
        margin:-50px 0px -100px 0px;
      }
    </style>
  </head>
  <body>
    <h1>Index</h1>
    <p><?php echo $msg; ?></p>
    <p><?php echo date("Y年n月j日"); ?></p>
    <p><?php echo $int; ?></p>
    <?php var_dump($value); ?>
    <p><?php echo $value; ?></p>
  </body>
</html>