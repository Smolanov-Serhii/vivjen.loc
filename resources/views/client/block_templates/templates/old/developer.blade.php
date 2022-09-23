<?php
/**
 * @var $block \App\Models\Block
 */
$contents = $block->mappedByKey();
?>
<section class="developer">
    <div class="developer__container main-container">
        <div class="developer__content"> {!!  $contents['developer-description']['value'] ?? '' !!}</div>
    </div>
</section>
