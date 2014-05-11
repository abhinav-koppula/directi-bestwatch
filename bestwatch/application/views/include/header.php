<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>BestWatch.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/prettyPhoto.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" media="screen" />
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/skindefault.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/social-buttons.css" rel="stylesheet" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="js/html5shiv.js"></script>
              <link rel="stylesheet" type="text/css" href="css/ie.css" />
            <![endif]-->
        <!-- Jquery - The rest of the scripts at the bottom-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                <?php
                $session_data = array();
                if($this->session->userdata('logged_in')) {
                    $session_data = $this->session->userdata('logged_in');
                }
                ?>
                if($("#show_id").length != 0) {
                    $.fn.raty.defaults.path = '<?php echo base_url(); ?>assets/js/img';
                    <?php
                    if($this->session->userdata('logged_in'))
                    {?>
                    $.ajax({
                        url:'<?php echo base_url();?>ratings/get_rating',
                        type:"POST",
                        data:{show_id:$('#show_id').val()},
                        success:function(data) {
                            $('.star').raty({
                            half: true,
                            number: 5,
                            score: data,
                            click: function(score, evt) {
                            $.post('<?php echo base_url(); ?>ratings/add_rating', {show_id: $('#show_id').val(), user_id: <?php echo $session_data['login_id']; ?>, score: score},
                            function(data) {
                                if(data=="You have already rated")
                                {
                                    $('#ratingExistsModal').modal('show');
                                }
                                else
                                {
                                    $('.star').raty({
                                        readOnly: true,
                                        score: data,
                                        half: true,
                                        number: 5
                                    });
                                    $('#ratingtext').html(data);
                                }
                            });
                            }
                        });  
                        $('#ratingtext').html(data);
                        }
                    });
                    <?php } else { ?>
                    $.ajax({
                        url:'<?php echo base_url();?>ratings/get_rating',
                        type:"POST",
                        data:{show_id:$('#show_id').val()},
                        success:function(data) {
                            $('.star').raty({
                            half: true,
                            number: 5,
                            score: data,
                            readOnly: true
                            });
                            $('#ratingtext').html(data);
                        }
                        });
                    <?php } ?>
                }
                
                $('.gallery').hover(
                        function() {
                            $(this).find('#galleryzoom').show();
                        },
                        function() {
                            $(this).find('#galleryzoom').hide();
                        }
                );

                $("[rel='tooltip']").tooltip();

                $('#shows-thumbnails .thumbnail').hover(
                        function() {
                            $(this).find('.caption').slideDown(250);
                        },
                        function() {
                            $(this).find('.caption').slideUp(250);
                        }
                );

                $('#login_btn').on('click', function() {
                    var btn = $(this);
                    btn.button('loading');
                    $.ajax({
                        url: '<?php echo base_url(); ?>login/checklogin',
                        data: {'username': $('#login_username').val(), 'password': $('#login_password').val()},
                        type: "POST",
                        success: function(data) {
                            if (data == "true")
                            {
                                window.location.href = "<?php echo base_url() . 'explore'; ?>";
                            }
                            else
                            {
                                $('#login_username').css({"background-color": "yellow"});
                                $('#login_password').css({"background-color": "yellow"});
                            }
                        },
                        complete: function() {
                            btn.button('reset');
                        }
                    });

                });
<?php
if ($this->session->userdata('logged_in')) {
    $session_data = $this->session->userdata('logged_in');
    $prof_pic = $session_data['profile_pic'];
    $len = strlen($prof_pic);
    if ($prof_pic[$len - 1] == 'e' && $prof_pic[$len - 2] == 'g' && $prof_pic[$len - 3] == 'r')
        $pic = $prof_pic;
    else
        $pic = base_url() . 'assets/img/temp/profpics/' . $prof_pic;
    ?>

                    $('#save_review_btn').on('click', function()
                    {
                        var btn = $(this);
                        btn.button('loading');
                        $.ajax({
                            url: '<?php echo base_url(); ?>reviews/add',
                            data: {'author_id':<?php echo $session_data['login_id']; ?>, 'show_id': $('#show_id').val(), 'review': $('#review_textarea').val()},
                            type: "POST",
                            success: function(data) {
                                if (data == "true")
                                {
                                    var li_review = '<li class="span4"><div class="testimonial"><h4><img class="avatarspic" src="<?php echo $pic; ?>" alt=""></h4><p>' + $('#review_textarea').val() + '</p></div><div class="author-wrapper"><div class="arrow"></div><div class="testimonial-name"><a href="<?php echo base_url(); ?>user/view_detail/<?php echo $session_data['login_id']; ?>"><?php echo $session_data["name"] ?></a></div></div></li>';
                                    $('#show_reviews').append(li_review).fadeIn();
                                    $('#review_modal').modal('hide');
                                }
                                else
                                {
                                    $('#review_textarea').css({"background-color": "yellow"});
                                }
                            },
                            complete: function() {
                                btn.button('reset');
                            }

                        });
                    });
<?php } ?>
            });
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>

        <!-- Header
        ================================================== -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?php echo base_url(); ?>">Best Watch.</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav" style="padding-right: 100px;">
                            <li <?php if ($this->is_active == 'home'): ?>class="active"<?php endif; ?>><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>

                            <li class="dropdown <?php if ($this->is_active == 'explore'): ?>active<?php endif; ?>">
                                <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Explore <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>explore">All Shows</a></li>
                                    <li class="nav-header">Genre</li>
                                    <?php
                                    foreach ($this->header_explore_menu as $x) {
                                        echo "<li><a href='" . base_url() . "explore/genre/" . $x['id'] . "' >" . ucfirst($x['name']) . "</a></li>";
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                            if ($this->session->userdata('logged_in')) {
                                $session_data = $this->session->userdata('logged_in');
                                $tag = "<li ";
                                if ($this->is_active == 'user')
                                    $tag.='class="active"';
                                $tag.="><a href='" . base_url() . "user/edit'>Welcome, " . $session_data['name'] . "</a></li>";
                                echo $tag;
                                echo "<li><a href='" . base_url() . "login/logout'>Logout</a></li>";
                            } else {
                                ?>
                                <li class = "dropdown">
                                    <a class = "dropdown-toggle" href = "#" data-toggle = "dropdown"> Sign In<strong class = "caret"></strong></a>
                                    <div class="dropdown-menu" style = "padding: 15px; padding-bottom: 0px; float: left;">
                                        <form action="" method="post" accept-charset="UTF-8">
                                            <input id="login_username" style="margin-bottom: 15px;" type="text" name="login_username" size="30" placeholder="Email addresss"/>
                                            <input id="login_password" style="margin-bottom: 15px;" type="password" name="login_password" size="30" placeholder ="Password" />
                                            <button class="btn btn-primary" 
                                                    style="clear: left; width: 100%; height: 32px; font-size: 13px;" 
                                                    type="button" 
                                                    name="login_btn" 
                                                    id="login_btn"
                                                    data-loading-text="Verifying"
                                                    >
                                                Sign In
                                            </button>
                                        </form>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>

                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>