<!-- This is a partial for money -->

<?php
 $total = 0;
 foreach ($money as $value) {
 	$total += $value['amount'];
} ?>

<?php echo CHtml::encode($total); ?>