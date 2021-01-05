<script>
    function checke(){
        //var no=;
        const rbs = document.querySelectorAll('input[name="time"]');
            var no=0;
            for (const rb of rbs) {
                if (rb.checked) {
                    no++;
                }
            }

            if(no>0){
                return true;
            }else{
                var load=document.getElementById("wrapper");
      load.style.display='none';
                var al = document.getElementById("werefaAlert");
                    al.style.display = "block";
                    $("#mesage").html("Choose time!");
                return false;
            }

       
         
     }
</script>

<link rel="stylesheet" href="css/boxraidobtn.css">  


                        <form id="forms" action="/cinemmap" method="post" onsubmit="return checke();"> 
                        @csrf
                        @foreach($movieinfos as $movieinfo)
                            <?php 
                                $days=json_decode( $movieinfo->Schedule, true);
                            ?>
                            @foreach($days as $day=>$time)

                            <a data-toggle="collapse" href="#{{$day}}">
                                <div
                                    style="width: 70%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px; margin-left: 15%;">
                                    <h3 align="center" style="color: white;">{{$day}}</h3>
                                </div>
                            </a>
                            <div style=" margin-left: 15%; width: 70%; background-color: white;" id="{{$day}}" class="panel-collapse collapse">
                                <div class="suschedule">
                                    <h3 align="center">Time schedule</h3>
                                </div>
                               
                                <div class="container">
                                        <div class="row">
                            <?php $size=count($time);?>
                            @for($i=0; $i<$size; $i++)       
                                        <div style=" margin-left: 15px; margin-bottom: 15px; width:20%; background-color:black; color:white; border-radius: 0.8rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1);" class="">
                                                
                                                <label>
                                                <input type="radio" name="time"	value="{{$time[$i][0]}},{{$time[$i][1]}},{{$day}}" class="card-input-element" />

                                                    <div  class="  card-input">
                                                    <div style="width: 100%;" class="panel-body">
                                                    {{$time[$i][0]}}
                                                    </div>
                                                    </div>

                                                </label>  
                                            </div>     
                            @endfor
                            </div> 
                                </div>
                            <input onclick="load();" value="Selecte seat" type="submit" class="btn-success" 
                                    style="margin-bottom: 5%; margin-right: 5%; float: right; "/><br><br>
                                
                            </div>
                            
                            @endforeach
                        @endforeach
                        </form>