<div class="">
    <?php if ($recursive_comment): ?>
        <?php foreach ($recursive_comment as $value): ?>
            <div class="media">
                <span class="pull-left" >
                    <?php if ($value['is_admin']): ?>
                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/icon_admin_64.jpg'); ?>" style="width: 32px; height: 32px;border-radius: 32px;">
                        <?php else: ?>
                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/person-icon.png'); ?>" style="width: 32px; height: 32px;">
                    <?php endif ?>
                    
                </span>
                <div class="media-body">
                    <h4 class="media-heading" style="color: #8e0606;font-weight: bold;"><?php echo $value['name'] ?></h4>
                    <div class="">
                        <?php echo $value['content']; ?>
                    </div>
                    <?php if ($value['children']): ?>
                        <?php foreach ($value['children'] as $valueChid1): ?>
                            <div class="media">
                                <span class="pull-left">
                                    <?php if ($valueChid1['is_admin']): ?>
                                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/icon_admin_64.jpg'); ?>" style="width: 32px; height: 32px;border-radius: 32px;">
                                        <?php else: ?>
                                            <img class="media-object" alt="64x64" src="<?php echo base_url('templates/site/images/icon/person-icon.png'); ?>" style="width: 32px; height: 32px;">
                                    <?php endif ?>
                                    
                                </span>
                                <div class="media-body">
                                    <h4 class="media-heading" style="color: #8e0606;font-weight: bold;"><?php echo $valueChid1['name']; ?></h4>
                                    <div class="">
                                        <?php echo $valueChid1['content']; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>