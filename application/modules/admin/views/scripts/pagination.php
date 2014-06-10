<?php if ($this->last > 1) { ?>
        <div class="alert alert-info" align="center">    
            <p>    
                <span class="pagination-numero">
                    <?php if (isset($this->previous)): ?>
                        <a href="<?php echo $this->url(array('page' => $this->first)); ?>">D&eacute;but</a> |
                    <?php else: ?>
                        <span class="disabled">D&eacute;but</span> |
                    <?php endif; ?>
                </span>
                <!-- Previous page link -->
                <span class="pagination-numero">
                    <?php if (isset($this->previous)): ?>
                        <a href="<?php echo $this->url(array('page' => $this->previous)); ?>">&lt; Pr&eacute;c&eacute;dente</a> |
                    <?php else: ?>
                        <span class="disabled">&lt; Pr&eacute;c&eacute;dente</span> |
                    <?php endif; ?>
                </span>
                <!-- Numbered page links -->
                <?php foreach ($this->pagesInRange as $page): ?>
                    <span class="pagination-numero">
                        <?php if ($page != $this->current): ?>
                            <a href="<?php echo $this->url(array('page' => $page)); ?>"><?php echo $page; ?></a>
                        <?php else: ?>
                            <span style="font-weight: bold;font-size:125%;"><?php echo $page; ?></span>
                        <?php endif; ?>
                    </span>
                <?php endforeach; ?>
                <!-- Next page link -->
                <span class="pagination-numero"> <?php if (isset($this->next)): ?>
                        | <a href="<?php echo $this->url(array('page' => $this->next)); ?>">Suivante &gt;</a> |
                    <?php else: ?>
                        | <span class="disabled">Suivante &gt;</span> |
                    <?php endif; ?>
                </span>
                <!-- Last page link -->
                <span class="pagination-numero">
                    <?php if (isset($this->next)): ?>
                        <a href="<?php echo $this->url(array('page' => $this->last)); ?>">Fin</a>
                    <?php else: ?>
                        <span class="disabled">Fin</span>
                    <?php endif; ?>
                </span>
            </p>
        </div>
<?php } ?> 