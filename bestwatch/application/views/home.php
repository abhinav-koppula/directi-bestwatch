<!-- Intro
================================================== -->
<div class="introtitle">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <p>
                    <img src="<?php echo base_url(); ?>/assets/img/temp/TV.jpg" 
                         style="border-bottom-width: 5px; border-bottom-style: solid; border-bottom-color: rgb(204, 204, 204); 
                         opacity: 0.6;" alt="" class="opacity" />
                </p>
            </div>
            <div class="span3">
                <?php
                if($this->session->userdata('logged_in'))
                { ?>
                <h1 class="title">Trending..</h1>
                <ul>
                <?php
                foreach($top_rated as $top)
                { ?>
                    <li><b><a href='<?php echo base_url().'shows/detail/'.$top["id"];?>' style='color:yellow;'><?php echo $top['name'];?></a></b>&nbsp;&nbsp; rated <?php echo $top['rating'];?></li>
                <?php } ?>
                </ul>
                <?php } else {
                ?>
                <h1 class="title"><i class="icon-user"></i>&nbsp;&nbsp;Register</h1>
                <?php echo validation_errors(); ?>
                <?php echo form_open('user/add'); ?>
                <input id="user_name" name="user_name" placeholder="Name" size="30" type="text">
                <input id="user_email" name="user_email" placeholder="Email" size="30" type="text">
                <input id="user_password" name="user_password" placeholder="Password" size="30" type="password">
                <input class="btn btn-large" type="submit" value="Sign Up" />
                </form>

                <h3>Or sign in</h3>
                <a class="btn btn-facebook" href="<?php if (isset($url)) echo $url; ?>"><i class="icon-facebook"></i> | Connect with Facebook</a>
                <br/>
                <?php } ?>
            </div>

        </div>
    </div>

</div>
</div>
<!-- END Intro -->
<div class="container">
    <!-- MASONRY ITEMS START
    ================================================== -->
    <div id="content">	
        <?php
        foreach ($shows as $show) {
            ?>
            <div class="boxportfolio4 gallery" >
                <img src="<?php echo base_url(); ?>assets/img/uploads/<?php echo $show->poster; ?>" alt="" />
                <div id="galleryzoom" style="display: none;">
                    <div class="wrapcaption">
                        <a href="<?php echo base_url();?>shows/detail/<?php echo $show->id;?>"><i class="icon-link captionicons"></i></a>
                        <a data-gal="prettyPhoto[gallery1]" href="<?php echo base_url(); ?>assets/img/uploads/<?php echo $show->poster; ?>" title="<?php echo $show->name;?>"><i class="icon-zoom-in captionicons"></i></a>
                    </div>
                </div>
                
            </div>
        <?php }
        ?>
    </div>
    <!-- next box etc -->
    <!-- MASONRY ITEMS END -->
</div>