<?php
function check_all() {
    echo "<p>check_all全部通过</p>";
}
addAction("fbbin","check_all");
//像fbbin插件列表中添加插件，那么之后执行的doAction函数就能在全局变量中找到这个插件了，那么这样子，这个插件便会被执行。
?>