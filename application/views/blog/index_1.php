<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Blog</title>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Eric's Blog</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3";">
                <form>
                    <fieldset class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        <small class="text-muted">We'll never share your email with anyone else.</small>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="exampleTextarea">Leave a comment!</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div id="main">
        <div id="text">
            <?php $this->load->view('blog/menu'); if($query):foreach($query as $post):?>
                <h4><?php echo $post->entry_name;?> <?php $timestamp = strtotime($post->entry_date);
                    $date = date("Y-m-d", $timestamp); $time = date('h:i', $timestamp);
                    echo '<br>'.$date." ".$time?></h4>
                <?php echo $post->entry_body;?>
                <br><br><button class="leaveComment" onclick="comment()">Leave a comment</button><br>
                <span class="fooBar">&nbsp</span>
                <span class="subCom">&nbsp</span>
                <br><br><br><br>
            <?php endforeach; else:?>
            <?php endif;?>
            <?php $this->load->view('blog/menu'); if($o):foreach($o as $post):?>
                <h4><?php echo $post->comment_name;?> (<?php echo $post->comment_date;?>)</h4>
                <?php echo $post->comment_body;?>
            <?php endforeach; else:?>
            <?php endif;?>
        </div>
    </div>
    <div id="popup">
        <div>Enter Password:</div>
        <input id="pass" type="password"/>
        <button id="done" onclick="done()">Done</button>
        <button id="hide" onclick="hide()">Hide</button>
    </div>
    <button id="add" onclick="showPopup()">Add New Entry</button>
    <script src="/javascript/script.js">
    </script>
    <script type="text/javascript" src="/assets/jquery/jquery-2.1.4.min.js"></script>
    </body>
</html>