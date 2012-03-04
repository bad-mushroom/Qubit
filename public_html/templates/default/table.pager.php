    <div style="width: 33%; float: left; text-align: center">
        &nbsp;
    </div>

    <div style="width: 33%; float: left; text-align: center">

        <!-- First / Previous Page -->
        <?php if ($this->current_page - 1 >= 1) : ?>

            <a href="/<?php echo Q_CURRENT_URI; ?>/page/<?php echo $this->current_page - 1; ?>">
                <img src="/templates/default/images/icons/arrow-back.png" class="icon" />
            </a>

            <a href="/<?php echo Q_CURRENT_URI; ?>/page/1">
                <img src="/templates/default/images/icons/arrow-skip-back.png" class="icon" />
            </a>

        <?php endif; ?>


        <!-- Next / Last Page -->
        <?php if ($this->current_page + 1 <= $this->total_pages) : ?>

            <a href="/<?php echo Q_CURRENT_URI; ?>/page/<?php echo $this->total_pages; ?>">
                <img src="/templates/default/images/icons/arrow-skip-forward.png" class="icon" />
            </a>

            <a href="/<?php echo Q_CURRENT_URI; ?>/page/<?php echo $this->current_page + 1; ?>">
                <img src="/templates/default/images/icons/arrow-forward.png" class="icon" />
            </a>

        <?php endif; ?>

    </div>

    <div style="width: 33%; float: right; text-align: center">
        Page <strong><?php echo $this->current_page; ?></strong> of <strong><?php echo $this->total_pages; ?></strong>
    </div>
