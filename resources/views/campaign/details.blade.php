@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" type="text/css" href="/assets/css/print.css">
@endsection

@section('content')

<div class="am-content">
  
  <div class="page-head">
    <div class="row">
      <div class="col-md-8">
        <h2>{{$campaignSelected->name}}</h2>
        <p> Here you can see the data from <strong>{{$campaignSelected->name}}</strong> campaign</p>
      </div>

      <div class="col-md-4">
        <br><br>
        <div class="btn-group btn-hspace pull-right">
          <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle" aria-expanded="false">Select a campaign <span class="caret"></span></button>
          <ul role="menu" class="dropdown-menu">
          @foreach($campaigns as $campaign)
           <li><a href="{{url('/campaign')}}/{{$campaign->id}}">{{$campaign->name}}</a></li>
          @endforeach
          </ul>
        </div>

        <a href="{{url('campaign/')}}/{{$campaignSelected->id}}/generatepdf" class="btn btn-space btn-success pull-right" id="download_pdf"><i class="icon icon-left s7-cloud-download"></i> Download PDF</a>
        <!-- <button type="type" class="btn btn-space btn-success pull-right" id="download_pdf"><i class="icon icon-left s7-cloud-download"></i> Download PDF</button> -->
      </div>

    </div>
    
  </div>
  
  <div class="main-content front">

    <div class="row overview">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title text-center">Engagement Overview</span>
          </div>
          <div class="panel-body">
            <div class="row chart-info">
              <div class="col-md-3 text-center">
                <h1 class="superbig-text"><span data-toggle="counter" data-end="{{$ev->opens_total}}" class="number">0</span></h1><br>
                <span class="title">Opens</span>
              </div>
              <div class="col-md-3 text-center">
                <h1 class="superbig-text"><span data-toggle="counter" data-end="{{$ev->clicks_total}}" class="number">0</span></h1><br>
                <span class="title">Clicked</span>
              </div>
              <div class="col-md-3 text-center">
                <h1 class="superbig-text"><span data-toggle="counter" data-end="{{$ev->hard_bounce}}" class="number">0</span></h1><br>
                <span class="title">Bounced</span>
              </div>
              <div class="col-md-3 text-center">
                <h1 class="superbig-text"><span data-toggle="counter" data-end="{{$ev->unsubscribe}}" class="number">0</span></h1><br>
                <span class="title">Unsubscribed</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end overview  -->

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Top 5 Most Engaged Users</span>
          </div>
          
          <div class="panel-body">
            <!-- display data here -->
            <ol>
              @foreach($top5->name as $list)
                <li>{{$list->name}}</li>
              @endforeach
            </ol>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Top 5 Least Engaged Users</span>
          </div>
          <div class="panel-body">
            <ol>
              @foreach($top5->least as $list)
                <li>{{$list->name}}</li>
              @endforeach
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Gender User Engagement</span>
          </div>
          <div class="panel-body">
              <div id="genderEngagement"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Top 5 Age Engagement</span>
          </div>
          <div class="panel-body">
            <!-- display data here -->
            <ol>

              @foreach($top5->age as $list)
                <li>{{$list->age}}</li>
              @endforeach

            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Top 5 Citites</span>
            
          </div>
          <div class="panel-body">
            <!-- display data here -->
            <ol>

              @foreach($top5->city as $list)
                <li>{{$list->city}}</li>
              @endforeach
    
            </ol>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Top 5 States</span>  
          </div>
          <div class="panel-body">
            <!-- display data here -->
            <ol>

              @foreach($top5->state as $list)
                <li>{{$list->state}}</li>
              @endforeach

            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Top 5 Country</span>
          </div>
          <div class="panel-body">
            <!-- display data here -->
            <ol>

              @foreach($top5->country as $list)
                <li>{{$list->country}}</li>
              @endforeach

            </ol>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <span class="title">Open Rate per day</span>
          </div>
          <div class="panel-body">
            <div id="open-rate-per-day" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          </div>
        </div>
      </div>
    </div>
        
  </div><!-- end main-content  -->

</div>

<!-- ============ PRINT VIEW ============ -->

<!-- ============ END PRINT VIEW ============ -->

@endsection


@section('javascripts')


<script src="/assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
<script src="/assets/lib/chartjs/Chart.min.js" type="text/javascript"></script>
<script src="/assets/js/app-dashboard.js" type="text/javascript"></script>
<script src="/assets/lib/highcharts.js"></script>
<script src="/assets/js/charts.js" type="text/javascript"></script>
<script src="/assets/js/jspdf.min.js"></script>
<script src="/assets/js/html2canvas.min.js"></script>
<script src="/assets/js/pdf.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    //initialize the javascript
    App.init();
    
    counter();

    genderEngagement({{($top5['gender']['male']/$top5['gender']['total'])*100}},{{($top5['gender']['female']/$top5['gender']['total'])*100}});
    // var day ={mon:[],tue:[],wed:[],thur:[],fri:[],sat:[],sun:[]};
    // alert(day);
    
    var data = {!!json_encode($top5->days->toArray())!!};
    // var label = ['10/16/16','10/14/16'];
    openRatePerDay(data);

    });//end document ready
    
</script>

@endsection