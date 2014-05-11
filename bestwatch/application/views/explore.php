<div class="container">
    <!-- 1st ROW 
    ================================================== -->
    <div class="row-fluid">
        <div class="span12">
            <h3 class="title text-center"><?php echo ucfirst($genre_name); ?> </h3>
            <div class="bordered">
            </div>
        </div>
    </div> 
    <div class="content">
        <ul class="thumbnails" id="shows-thumbnails">
            <?php foreach ($shows as $show) { ?>
                <li class="span4">
                    <article class="thumbnail">
                        <div class="caption">
                            <h4><?php echo $show->name; ?></h4>
                            <p style="text-align: left;padding-right: 15px;">
                            <?php echo $show->summary; ?>
                            </p>
                             <p style="text-align: left;">
                                 <a class="btn btn-success" href="<?php echo base_url();?>shows/detail/<?php echo $show->id;?>">Read More</a>
                             </p>
                            
                        </div>
                        <img src="<?php echo base_url(); ?>assets/img/uploads/<?php echo $show->poster; ?>" class="span12" style="min-height:50px;height:300px;"/>
                    </article>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>