<div class="container">
    <input type="hidden" value="<?php echo $show_id; ?>" id="show_id"/>
    <div class="content">
        <div class="row-fluid spacetop">
            <div class="span3">
                <p><img class='span12' style='min-height:50px;height:300px;' src='<?php echo base_url(); ?>assets/img/uploads/<?php echo $poster; ?>'</p>
            </div>
            <div class="span6">
                <div class="span6">
                    <h3 style="padding-left: 10px;">
                        <?php echo $name; ?>
                    </h3>
                </div>
                <div class="span6">
                    <strong><p style="float:right; margin-bottom:0px;" id="ratingtext"></p></strong>
                    <br/>
                    <div id= "rating" class="star" style="float: right;">
                    </div>
                </div>
                <div class="span12">
                    <p><?php echo $summary; ?></p>
                    Genres: 
                    <?php
                    foreach ($genres as $genre) {
                        echo "<a href='" . base_url() . "explore/genre/" . $genre['id'] . "'>" . ucfirst($genre['name']) . ' ' . "</a>";
                    }
                    ?>
                </div>
            </div>
            <div class="span3">
                <h4>Facts</h4>
                <p>
                    <span class="badge badge-success"><?php echo $reviews_count;?></span>
                    Reviews
                </p>
                <p>
                    <span class="badge badge-info"><?php echo $ratings_count;?></span>
                    Ratings
                </p>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row-fluid spacetop">
            <h3>Reviews for <?php echo $name; ?>
                <?php if ($this->session->userdata('logged_in')) { ?>
                    <a type="button" class="btn btn-success" href="#review_modal" data-toggle="modal" id="add_review_btn">Add Review</a>
                    <!-- Modal -->
                    <div class="modal hide fade" id="review_modal" tabindex="-1" role="dialog" aria-labelledby="review_modal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Add Review for <?php echo $name; ?></h4>
                                </div>
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="control-group">  
                                            <label class="control-label" for="review_textarea">What do you think?</label>  
                                            <div class="controls">  
                                                <textarea class="input-xlarge" id="review_textarea" rows="5" style="width:400px;"></textarea>  
                                            </div>  
                                        </div>  
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" data-loading-text="Saving" id="save_review_btn">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal hide fade" id="ratingExistsModal" tabindex="-1" role="dialog" aria-labelledby="ratingExistsModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Information</h4>
                                </div>
                                <div class="modal-body">
                                    <p>You have already rated for this show.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                <?php } ?>
            </h3>

        </div>
    </div>

    <div class="content">
        <ul class="thumbnails" id="show_reviews">
            <?php foreach ($reviews as $review) { ?>
                <li class="span4">
                    <div class="testimonial">
                        <h4><img class="avatarspic" src="
                            <?php
                            $p = $review->profile_pic;
                            $len = strlen($p);
                            if ($p[$len - 1] == 'e' && $p[$len - 2] == 'g' && $p[$len - 3] == 'r')
                                echo $p;
                            else
                                echo base_url() . "assets/img/temp/profpics/" . $p;
                            ?>" alt=""></h4>
                        <p><?php echo $review->review; ?></p>
                    </div>

                    <div class="author-wrapper">
                        <div class="arrow">
                        </div>
                        <div class="testimonial-name">
                            <a href="<?php echo base_url(); ?>user/view_detail/<?php echo $review->user_id; ?>" class="testimonial-name"><?php echo $review->user_name; ?></a>
                        </div>
                    </div>
                </li>
            <?php }
            ?>

        </ul>
    </div>
</div>
