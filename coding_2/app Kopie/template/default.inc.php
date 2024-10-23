<?php
if(!defined('APP_ROOT') || !($this instanceof AppController)){
	die('only included please..');
}
/** @var AppController */
$PKC = $this;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print $browser_title; ?></title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">

    
    <!-- DummyApp specific -->
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600' rel='stylesheet' type='text/css'>
    <link href="/css/dummyapp.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body role="document">
  	<!-- Fixed navbar -->
    <div class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><i class="glyphicon glyphicon-home"></i> </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	<?php
          	if(is_array($PKC->registry) && count($PKC->registry)>0){
          		foreach($PKC->registry as $page_id => $page_data){
          			if($page_data['label']){
									print '<li class="'.($PKC->getCurrentPage()===$page_id?'active':'').'"><a href="/'.$page_id.'">'.$page_data['label'].'</a></li>';
								}
          		}
						}
          	?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

  <div class="container" role="main">
  	<?php
  		if($page_messages){
				?>
				<div class="page-flash"><?php print $page_messages; ?></div>
				<?php	
  		}
  	?>
  	<?php
  		if($page_title){
				?>
				<div class="page-header"><h1><?php print $page_title; ?></h1></div>
				<?php	
  		}
  	?>
    
    <?php print $page_content; ?>
	</div>
    <script type="text/javascript">
    $('.jqte').jqte();//TextEditor
		$('.confirm-reset').on('click', function(e) {
		    e.preventDefault();
		    var id = $(this).data('id'), removeBtn = $('#modal-from-dom').find('.btn-danger');
		    removeBtn.attr('href', removeBtn.attr('href').replace(/(&|\?)ref=\d*/gi, '$1ref=' + id));
		    $('#modal-from-dom').data('id', id).modal('show');
		});
		$('.confirm-delete').on('click', function(e) {
		    e.preventDefault();
		    var id = $(this).data('id'), removeBtn = $('#modal-from-dom2').find('.btn-danger');
		    removeBtn.attr('href', removeBtn.attr('href').replace(/(&|\?)ref=\d*/gi, '$1ref=' + id));
		    $('#modal-from-dom2').data('id', id).modal('show');
		});
		$('a').tooltip();
		</script>
  </body>
</html>