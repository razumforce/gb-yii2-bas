<?php

?>
<div>
  <h3>Order No: <?= $model->id ?></h3>
  <div>Amount: <?= $model->qty ?></div>
  <div>Owner: <?= $model->user->login ?></div>
</div>
<hr>