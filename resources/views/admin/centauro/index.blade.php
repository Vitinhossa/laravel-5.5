@extends('adminlte::page')

@section('title', 'Malware - Centauro')

@section('content_header')
    <h1>Centauro</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Centauro</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
          

<html lang="en"><head>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	

</head>

<body>
	<div id="loading" style="display: none;">
		<div class="loader loader-light loader-large"></div>
	</div>
	 
        <style>
div.erro
{
line-height: 14px;
    margin: auto;
    font-size: 17px;
    padding: 5px;
    text-align: center;
    background: rgba(255, 255, 255, 0);
    border: solid 1px rgba(255,255,255,.15);
    color: #ffffff;
    border-radius: 7px;
    user-select: none;
}
.ocultar {
    background-color: rgba(0,0,0,.3);
    cursor: pointer;
    padding-right: 10px;
    display: inline-block;
    line-height: 68px;
	float: left;
    height: 64px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.ativo, .ocultar:hover {
    background-color: rgba(0,0,0,.3);
}

.ocultar:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

.ativo:after {
    content: "\2212";
}

.panel2 {
    padding: 0 18px;
    background-color: rgba(0,0,0,.4);
    max-height: 0;
    width: 100%;   
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}

.dies2 {
    position: relative;
    border-radius: 0;
    border: 0;
    width: 100%;   
    padding: 4px 3px;
    margin: 0px 0 0;
    font-size: 16px;
    line-height: 21px;
    font-weight: 100;
    overflow: hidden;
}

.btn.violet {
    border-color: #989cff;
}


.btn.green {
    border-color: #00a65a;
}

.btn.red {
    border-color: #f35857;
}

.btn.orange {
    border-color: #ff9c4b;
}

.btn.blue {
    border-color: #1c7dfa;
}

.btn-group .btn.green:active, .btn-group .btn.green:focus, .btn.green.inverse, .btn.green:focus, .dropdown.open .btn.green {
    background-color: #00a65a;
}


.btn-group .btn.red:active, .btn-group .btn.red:focus, .btn.red.inverse, .btn.red:focus, .dropdown.open .btn.red {
    background-color: #f35857;
}





</style>
	 


<div class="wrapper">

		
         <section class="content">

				<div class="row">
					
					<div class="col-md-12">
						<article class="widget">
							<header class="widget__header">
								<div class="widget__title">
									<i class="pe-7s-menu"></i><h3></h3>
								</div>
								<div class="widget__config">
									
        									<a href="#"><i class="pe-7s-diamond" style="font-size: 1.5em;
    display: inline-block;
    padding-top: 20px;"></i></a><a href="#"><i class="pe-7s-close"></i></a>
									

								</div>
							</header>

							<div class="widget__content filled">

                            <div class="row">
		<div class="col-md-12"><br><p> Formato: usuario@example.com|senha </p>
		<textarea class="form-control"  id="list" name="list"  style="width: 100%; border-width: 0.5px; outline: 0; text-align: center; background:rgba(255,255,0, 0.0); color:#FFFFFF; border-radius: 5px;" rows="13"" ></textarea>

		</div>
		
		
	</div>
								<br><Center>

            Status: <span class="btn violet " id="status">Aguardando...</span> | Carregadas: <span class="btn blue " id="carregadas">0</span> | Aprovadas: <span class="btn green" id="cLive">0</span> | Reprovadas: <span class="btn red" id="cDie">0</span> | Testadas: <span class="btn orange" id="total">0</span>
            <p></p><br>
            <button class="waves-effect waves-light btn green inverse" id="start" style="width:320px;"><i class="fa fa-play" aria-hidden="true"></i> Iniciar</button> <button class="waves-effect waves-light btn red inverse" id="stop" style="width:320px;" disabled="disabled" ><i class="fa fa-stop" aria-hidden="true"></i> Parar</a></center>

							</div>
						</article>
					</div>

																 <script>
    var audio = new Audio('blop.mp3');
            $(document).ready(function () {
                $('#start').attr('disabled', null);
                $('#start').click(function () {
					audio.play();
                    var line = $('#list').val().split('\n');
                    var total = line.length;
                    var ap = 0;
                    var rp = 0;
                    var st = 'Aguardando...';
                    $('#carregadas').html(total);
                    $('#status').html(st);
                    line.forEach(function (value) {
                        var ajaxCall = $.ajax({
                           url: '{{route('admin.centauro.api')}}',
                            type: 'GET',
                            data: 'lista=' + value,
                            beforeSend: function () {
                                $('#stop').attr('disabled', null);
                                $('#start').attr('disabled', 'disabled');
                                var st = '<img src="/25.gif" width="10px" /> Testando...';
                                $('#status').html(st);

                            },
							
										success: function(data){
				if(data.indexOf("Aprovada") >= 0){
					$("#lives").val(data + "\n" + $("#lives").val());
					ap = ap + 1;
					document.getElementById("lives").innerHTML += data + "";
					audio.play();
					removelinha();
				}else{
					$("#dies").val(data + "\n" + $("#dies").val());
					rp = rp + 1;
					document.getElementById("dies").innerHTML += data + "";
					removelinha();
				}
				                               var fila = parseInt(ap) + parseInt(rp);
                                $('#cLive').html(ap);
                                $('#cDie').html(rp);
                                $('#total').html(fila);
                                if (fila == total) {
                                    $('#start').attr('disabled', null);
                                    $('#stop').attr('disabled', 'disabled');
									audio.play();
                                    var st = 'Finalizado';
                            $('#status').html(st);

                                }

			}
			
                        });
                        $('#stop').click(function () {
                            ajaxCall.abort();
                            $('#start').attr('disabled', null);
                            $('#stop').attr('disabled', 'disabled');
                            var st = 'Pausado...';
                            $('#status').html(st);

                        });
                    });
                    $('#stop').click(function () {
                        
                    });
                });
            });
            function removelinha() {
                var lines = $("#list").val().split('\n');
                lines.splice(0, 1);
                $("#list").val(lines.join("\n"));
            }
        </script>



				</div> 


				<div class="row">
                <div class="col-md-12">
                
                <article class="widget">
                <header class="widget__header one-btn">
                            <div class="widget__title">
                            <i class="pe-7f-check"></i><h3></h3>
								</div>
								<div class="widget__config">
									<a href="#"><i class="pe-7s-close"></i></a>
								</div>
							</header>

							
							<div class="widget__content" id="livessss">
								
		
								
								
								
								
								
								
								
							</div> 
						</article>
					</div>




					<div class="col-md-12">
<button class="ocultar"><i class="pe-7f-close"></i>  Aprovadas</button>
<div class="panel2">
							<div id="lives">
								

								
							</div> 
						</div>
					</div>
				</div> 


             
		</section> 


        <div class="col-md-12">
<button class="ocultar"><i class="pe-7f-close"></i>  Reprovadas</button>
<div class="panel2">
							<div id="dies">
								

								
							</div> 
						</div>
					</div>


	<script type="text/javascript" src="{{ asset('/api/js/main.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/api/js/amcharts/amcharts.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/api/js/amcharts/serial.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/api/js/amcharts/pie.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/api/js/chart.js') }}"></script>
<script>
var acc = document.getElementsByClassName("ocultar");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("ativo");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</body></html>



  
        </div>
        <div class="box-body">
         
</div>


                
</div>
            
            </div>

     
 
@stop