<div class="container">
    <div class="row-fluid spacetop">
        <div class="span3">
            <img src="<?php 
                $len = strlen($profile_pic);
                if($profile_pic[$len-1]=='e' && $profile_pic[$len-2]=='g' && $profile_pic[$len-3]=='r')
                    echo $profile_pic;
                else
                    echo base_url()."assets/img/temp/profpics/".$profile_pic;
                ?>" 
                width="150" height="150" class="img-circle" style="width:150px;height:150px;" alt="">
            <?php
            if (isset($edit_flag) && $edit_flag == 1) {
                if(isset($error)) echo $error;
                
                echo form_open_multipart('user/upload_profpic'); ?>
            
                <input type="file" class="btn btn-info" name="userfile" size="20" />
                <br/>
                <input type="submit" class="btn btn-success" value="upload" />
                </form>
                
                <?php
            }
            ?>
        </div>
        <div class="span6 blogbox">
            <h1><?php echo $name; ?></h1>
            <h3>Email: <?php echo $email; ?></h3>
            <h3>Role: Reviewer</h3>
        </div>
        <div class="span3">
            <div class="sidebar">
                <div class="widget">
                    <h1>Recent Activity</h1>
                </div>
            </div>
        </div>
    </div>
</div>