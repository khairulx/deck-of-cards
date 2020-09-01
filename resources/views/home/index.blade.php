<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Playing Card Test</title>

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
        }
    </style>
</head>

<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-sm-8 py-2">
         <div class="container">
          <div class="row text-center">
            <div class="col-md-2">
              
            </div>
            <div class="col-md-8 mb-4">
                <p><img src="{{ asset('img/dealer.png') }}"></p>
            </div>
            <div class="col-md-2 mt-4">
                <p><button type="button" class="btn btn-warning reset-btn">Reset</button></p>
            </div>

        </div>
      </div>
        <div id='loader' style='display: none;' class="text-center">
            <img src="{{ asset('img/loading.gif') }}" width='200px' height='200px'>
        </div>
            <div class="container">
                <div class="row" id="beforeStart" >
                  <div class="col-md-4">
                 </div>
                 <div class="col-md-6 text-center ">
                    <div class="card text-center " style="width:300px">
                        <img class="img-fluid img-thumbnail" src="{{ asset('img/pokerHand.png') }}" >
                        <div class="card-body">
                          <h5 class="card-title">Awaiting Cards...</h5>
                      
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                <div class="row" id="result" >
     
                  </div>
              </div>
        </div>
      
        <div class="col offset-2 bg-info offset-sm-9 col-3 h-100 py-2 fixed-top" id="left">
            <form class="form" id="form">

                <div class="text-center mb-4">
                 
                    <p><img src="{{ asset('img/pokerHand.png') }}"></p>
                </div>

                <div class="text-center mb-4">
                    <h1 class="h3 mb-3 font-weight-normal">Playing Card Test</h1>
                    <p>Enter number of player below and submit to start card distribution</p>
                </div>

                <div class="form-label-group">
                    <input type="number" id="player" name="player" class="form-control" placeholder="No. of Player" min="1" max="52" required autofocus>
                </div>
                <br/>
                <button class="btn btn-lg btn-secondary btn-block" type="submit">Submit</button>

                <br/>
                <div id="error" class="alert alert-danger" role="alert" style="display: none;">
                    This is a danger alert—check it out!
                </div>
            </form>
           
        </div>
    </div>
</div>

<script src="{{ asset('jquery/jquery-3.4.1.min.js') }}"></script>

<script>
    $(document).ready(function() {

    $(".reset-btn").click(function(){
    $('#beforeStart').show();
    $('#result').hide();
    $(".form-control").val("player");
        $(".form-control").on("focus", function() {
            $(".form-control").val("");
        });
    });
        $('#form').submit(function(e) {
            e.preventDefault();
            jQuery('#result').html('');
            $.ajax({
                type: "GET",
                url: "{{ route('playCard') }}",
                data: $(this).serialize(),
                success: function(response)
                {
                 $('#beforeStart').hide();
                 $( "#loader" ).show();
                 setTimeout(
                    function() 
                    {
                    if (response.status)
                    {
                        $('#error').empty().hide();
                        $('#result tbody').empty();
                        
                        var trHTML = '';
                       
                        $.each(response.result, function (i, item) {
                            if (item.cards.length) {
                                trHTML += '<div class="col-md-4 mb-2"><div class="card" style="width: 18rem;"><img src="{{ asset('img/pokerHand.png') }}"  class="img-fluid img-thumbnail"><div class="card-body"><h5 class="card-title">Player ' + item.player + '</h5>  <p class="card-text">'  + item.cards + ' </p></div></div></div>';
                            }  

                        });
                        $( "#loader" ).hide();
                        $('#result').append(trHTML);
                    }
                    else {
                        $('#error').empty().append("<b>Opss...</b><br/>" + response.result.player).show();
                    }

                }, 5000);

                }
            });

            
        });
    });




</script>

</body>
</html>
