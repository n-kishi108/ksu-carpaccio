<?php
session_start();
if(isset($_SESSION['id'])):
 ?>
 <p>こんにちは！<?= $_SESSION['id'] ?>さん</p>
<?php else: ?>
 <p>こんにちは！ゲストさん</p>
<?php endif; ?>
<p>パラリラパラリラ</p>
