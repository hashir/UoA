<?php if ($field->isPartial()): ?>
  <?php include_partial('aEventAdmin/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('aEventAdmin', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
      <?php echo $form[$name]->renderLabel($label) ?>

			<div class="a-form-field">
      	<?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
			</div>

			<div class="a-form-error">
    		<?php echo $form[$name]->renderError() ?>
			</div>

      <?php if ($help || $help = $form[$name]->renderHelp()): ?>
        <div class="a-help">
					<?php echo __($help, array(), 'messages') ?>
				</div>
      <?php endif; ?>
  </div>
<?php endif; ?>
