<html>
<body>
<form action="/quiz/answer" method="post">
    <?php foreach ($view as $v) { ?>
        <p>
        <div><?php echo $v['question']; ?></div>
        <input type="text" name="<?php echo $v['name']; ?>">
        </p>
    <?php } ?>
    <input type="submit" value="解答完了">
</form>
</body>
</html>

