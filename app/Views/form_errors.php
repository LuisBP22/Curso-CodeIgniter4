<?php if (session("error")) : ?>
<div class="alert alert-danger">
    <?=session("error")?>
</div>
<?php endif;?>