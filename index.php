<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.min.js"></script>
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.5/material.indigo-pink.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- 最新編譯和最佳化的 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <!-- 最新編譯和最佳化的 JavaScript -->
        <title>GCM Test</title>
    </head>
    <style>
        .container {
            width: 950px;
            margin: 0 auto;
            padding: 0;
        }

        h1 {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 24px;
            color: #777;
            text-align: center;
        }

        .row {
            border: 1px solid #d3d3d3;
            width: 950px;
            margin: 0 auto;
            padding: 0;
        }
        form{
            padding: 50px;
            margin-right: 100px;
        }
    </style>

    <body>

        <div class="container">
            <h1>Simple GCM Server</h1>
            <hr>
            <div class="row">
                <form class="form-horizontal" method="post" onsubmit="ajaxpush(); return false" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="regID" class="col-sm-2 control-label">regID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="regID" name="regID" placeholder="輸入regID">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mag" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="msg" name="msg" placeholder="輸入訊息">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" id="push">送出</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="complete-dialog" class="modal fade  bs-example-modal-sm" tabindex="-1">
				<div class="modal-dialog modal-sm">
			    	<div class="modal-content">
			    		<div class="modal-header">
			      			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			        		<h4 class="modal-title" >
			        		    <div id="MessageType">

			        		    </div>
			        		</h4>
			      		</div>
			      		<div class="modal-body">
                            <div id="modal_content">

                            </div>
			      		</div>
			      		<div class="modal-footer">
			        		<button class="btn btn-primary" data-dismiss="modal">OK</button>
			      		</div>
			    	</div>
			  	</div>
			</div>
        </div>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script>
    function ajaxpush(){
        $.ajax({
            url: 'push.php',
            type: 'POST',
            dataType: 'json',
            data: {
                regID: $('#regID').val() ,
                msg: $('#msg').val(),
            },
        })
        .done(function(data) {
            $('#MessageType').text(data.Message);
            $('#modal_content').text(data.msg_content);
            $('#complete-dialog').modal();
        });
    }
    </script>
</html>
