<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="..//css/style.css" rel="stylesheet">
    <script src="../bootstrap/js/jquery-2.1.4.min.js" ></script>
    <script src="../bootstrap/js/bootstrap.min.js" ></script>
    <script type="text/JavaScript">
        $(document).ready(function (){

           // $('#exampleModal').model('show');
            $('#exampleModal').on('show.bs.modal', function (e) {
                // do something...
                alert("do something");
            })

            //alert($.fn.tooltip.Constructor.VERSION);
//            $('#exampleModal').on('show.bs.modal', function (event) {
//                var button = $(event.relatedTarget) // Button that triggered the modal
//                var recipient = button.data('test') // Extract info from data-* attributes
//                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//                var modal = $(this)
//                modal.find('.modal-title').text('New message to ' + recipient)
//                modal.find('.modal-body input').val(recipient)
//            })
        })
    </script>


</head>

<body>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-test="@mdo">Open modal for @mdo</button>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>


<div class="container">


    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" stype="z-index:-1; position:absolute" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox" >
            <div class="item active">
                <img src="../img/company/slide1.jpg" width="100%" height="300px">
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <img src="../img/company/slide2.jpg" width="100%"  height="300px">
                <div class="carousel-caption">

                </div>
            </div>

            <div class="item">
                <img src="../img/company/slide3.jpg" width="100%" height="300px">
                <div class="carousel-caption">

                </div>
            </div>

        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">.col-xs-12 .col-sm-6 .col-md-8</div>
        <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="clearfix visible-xs-block"></div>
        <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
    </div>
    <del>This line of text is meant to be treated as deleted text.</del>

    <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    </blockquote>

    <dl class="dl-horizontal">
        <dt>CTO </dt>
        <dd>Jacky wang graduates from the The Universitu of Sydney </dd>
    </dl>
    To switch directories, type <kbd>cd</kbd> followed by the name of the directory.<br>
    To edit settings, press <kbd><kbd>ctrl</kbd> + <kbd>,</kbd></kbd>

    <table class="table table-striped table-bordered table-hover table-responsive">
       <tr class="warning">
           <th>#</th>
           <th>First name</th>
           <th>Last name</th>
           <th>User name</th>
       </tr>
        <tr>
            <td>1</td>
            <td>Jacky</td>
            <td>wang</td>
            <td>Jwan3453</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Jacky</td>
            <td>wang</td>
            <td>Jwan3453</td>
        </tr>
    </table>
    <div class="form-group has-success has-feedback">
        <label class="control-label" for="inputSuccess2">Input with success</label>
        <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status">
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputSuccess2Status" class="sr-only">(success)</span>
    </div>
    <div class="form-group has-warning has-feedback">
        <label class="control-label" for="inputWarning2">Input with warning</label>
        <input type="text" class="form-control" id="inputWarning2" aria-describedby="inputWarning2Status">
        <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
        <span id="inputWarning2Status" class="sr-only">(warning)</span>
    </div>
    <div class="form-group has-error has-feedback">
        <label class="control-label" for="inputError2">Input with error</label>
        <input type="text" class="form-control" id="inputError2" aria-describedby="inputError2Status">
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="inputError2Status" class="sr-only">(error)</span>
    </div>
    <div class="form-group has-success has-feedback">
        <label class="control-label" for="inputGroupSuccess1">Input group with success</label>
        <div class="input-group">
            <span class="input-group-addon">@</span>
            <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
        </div>
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
    </div>

    <button type="button" class="btn btn-danger  btn-block">（危险）Danger</button>

    <p></p>
    <div class="row">
        <div class="col-md-4">
            <img src="../img/cofounder/ming.png" alt="..." class="img-circle" height="140px" width="140px">
            <dl class="dl-horizontal">
                <dt>CEO </dt>
                <dd> Yuming FU</dd>
            </dl>

        </div>
        <div class="col-md-4">
            <img src="../img/cofounder/hong.png" alt="..." class="img-circle" height="140px" width="140px">
            <dl class="dl-horizontal">
                <dt>CFO </dt>
                <dd>QingHong Li</dd>
            </dl>
        </div>
        <div class="col-md-4">
            <img src="../img/cofounder/jie.png" alt="..." class="img-circle" height="140px" width="140px">
            <dl class="dl-horizontal">
                <dt>CTO </dt>
                <dd>Jiewen Wang</dd>
            </dl>
        </div>
    </div>


    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

    <button type="button" class="btn btn-default" aria-label="Left Align">
        <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
    </button>
    <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        Enter a valid email address
    </div>


    <!--   -->
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Dropdown
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a href="#">Separated link</a></li>
        </ul>
    </div>

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default">Left</button>
        <button type="button" class="btn btn-default">Middle</button>
        <button type="button" class="btn btn-default">Right</button>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
    </div>

    <ul class="nav nav-pills nav-justified">
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="#">Profile</a></li>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Dropdown <span class="caret"></span>
            </a>
        </li>
    </ul>
    <p></p>
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
            <span class="sr-only">45% Complete</span>
        </div>
    </div>

    <div class="media">
        <div class="media-left media-middle">
            <a href="#">
                <img class="media-object" src="../img/cofounder/jie.png" height="64px" width="64px">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">Middle aligned media   </h4>
            <p>this isjust a  one of the media text we are talking about nothing much</p>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge" style="backgound:red;">14</span>
            Cras justo odio
        </li>
    </ul>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
        </div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>


</div>


<div id="header">

</div>
<div id="content">

    <div class="alert alert-success" role="alert">well done aaas sasdas sasds</div>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> Better check yourself, you're not looking too good.
    </div>

    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="50" aria-valuemax="100" style="width: 60%;">
            60%
        </div>
    </div>

    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>



    @yield('content')

</div>
<div id="footer">
    <hr/>
    <h3>&copy; Opulent trip, copy right 2015</h3>
</div>

</body>
</html>
