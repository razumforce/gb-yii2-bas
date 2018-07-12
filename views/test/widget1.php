<?php

use app\widgets\FirstWidget;

?>
<h2>Without parameter</h2>
<?= FirstWidget::widget(); ?>

<h2>With parameter</h2>
<?= FirstWidget::widget([
  'message' => 'Our message'
]); ?>
