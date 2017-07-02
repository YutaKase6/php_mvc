<html>
<body>
<?php foreach ($view as $v) { ?>
    <p>
    <div><?php echo $v['question']; ?></div>
    <div><?php echo $v['ans']; ?></div>
    <div><?php echo $v['result']; ?></div>
    </p>
<?php } ?>
<a href="/quiz">もどる</a>
</body>
</html>
