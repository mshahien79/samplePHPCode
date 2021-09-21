@extends('layouts.home')
<style>
.red   {color: red;}
.green {color: green;}

.panel-heading {
  padding: 0;
	border:0;
}
.panel-title>a, .panel-title>a:active{

	padding:15px;
  color:#555;
  font-size:12px;
  font-weight:bold;
	letter-spacing:1px;
  word-spacing:1px;
	text-decoration:none;
}
.panel-heading  a:before {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   transition: all 0.5s;
}
.panel-heading.active a:before {
	-webkit-transform: rotate(180deg);
	-moz-transform: rotate(180deg);
	transform: rotate(180deg);
}
</style>
<script>
$('.panel-collapse').on('show.bs.collapse', function () {
   $(this).siblings('.panel-heading').addClass('active');
 });

 $('.panel-collapse').on('hide.bs.collapse', function () {
   $(this).siblings('.panel-heading').removeClass('active');
 });
</script>


@section('content')

<section class="content-header">
  <h1>
    Dashboard
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

    <section class="content">

      @if(Session::has('message'))
      <div class="row">'
      <div class="col-xs-12">
        <div class="alert @if(Session::get('messageType') == 1) alert-success @else alert-danger @endif">
          {{ Session::get('message') }}
        </div>
      </div>
      </div>
      @endif

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">


              <p>اضافة زيادة في الاوزان</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <a href="/turkeybreedingjournal/create" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">


              <p>المبيعات</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="/sales/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">


              <p>الموردين</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="/supplier/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">


              <p>العملاء</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="/customers/view" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      {{-- <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Stocks Availability</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <h4 class="text-center loading"> <i class="fa fa-refresh fa-spin"></i> Loading, Please wait...</h4>
              <canvas id="myChart" width="400" height="120"></canvas>
            </div>
          </div>
        </div>
      </div> --}}

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
          <div class="box-header with-bstock_category">
            <h3 class="box-title">المتاح حاليا في العنابر</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div>Today is : <b>{{ date('d-m-Y H:i:s') }}</b> </div>
          <div class="col-xs-12">

          @foreach ($turkeyoperations as $turkeyoperation)

          <table id="table1" class="table table-bordered" data-toggle="table">
            <thead style="background-color:lightgrey">
            <tr>
              <th scope="col">#</th>
              <th scope="col">باتش</th>
              <th scope="col">سن الدخول/أيام</th>
              <th scope="col">السن الحالي/ أيام</th>
              <th scope="col">عدد الايام في العنبر</th>
              <th scope="col">للبيع بعد/ أيام</th>
              <th scope="col">عدد الذكور عند الدخول</th>
              <th scope="col">عدد الاناث عند الدخول</th>
              <th scope="col">عددالذكور</th>
              <th scope="col">عددالاناث</th>
              <th scope="col">متوسط وزن الذكر</th>
              <th scope="col">متوسط وزن الانثى</th>
              <th scope="col">اجمالي وزن الذكور</th>
              <th scope="col">اجمالي وزن الاناث</th>
              <th scope="col">عنبر</th>
              <th scope="col">مزرعة</th>
              <th scope="col">نافق</th>
              <th scope="col">التطعيم القادم بعد/ يوم</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $turkeyoperation->id }}</td>
              <td>{{ $turkeyoperation->BatchName }}</td>
              <td>{{ $turkeyoperation->BatchStartAge }}</td>
              <td>{{ Carbon\Carbon::parse($turkeyoperation -> created_at)->diffInDays(Carbon\Carbon::now())+$turkeyoperation->BatchStartAge }}</td>
              <td>{{ Carbon\Carbon::parse($turkeyoperation -> created_at)->diffInDays(Carbon\Carbon::now()) }}</td>
              @if ((120-(Carbon\Carbon::parse($turkeyoperation -> created_at)->diffInDays(Carbon\Carbon::now())+$turkeyoperation->BatchStartAge)) < 20)
              <td class="red">{{ 100-(Carbon\Carbon::parse($turkeyoperation -> created_at)->diffInDays(Carbon\Carbon::now())+$turkeyoperation->BatchStartAge) }}</td>
              @else
              <td class="green">{{ 100-(Carbon\Carbon::parse($turkeyoperation -> created_at)->diffInDays(Carbon\Carbon::now())+$turkeyoperation->BatchStartAge) }}</td>
              @endif
              <td>{{ $turkeyoperation->StartMaleHeadCount }}</td>
              <td>{{ $turkeyoperation->StartFemaleHeadCount }}</td>
              <td>{{ $turkeyoperation->male_stock_quantity }}</td>
              <td>{{ $turkeyoperation->female_stock_quantity }}</td>
              <td>{{ $turkeyoperation->male_stock_wgt }}</td>
              <td>{{ $turkeyoperation->female_stock_wgt }}</td>
              <td>{{ $turkeyoperation->current_TTL_MaleWeight }}</td>
              <td>{{ $turkeyoperation->current_TTL_FemaleWeight }}</td>
              <td>{{ $turkeyoperation->barn_name }}</td>
              <td>{{ $turkeyoperation->farm_name }}</td>
              <td>{{ $turkeyoperation->BatchMortalities }}</td>
            </tr>


          </tbody>
          </table>
          <!-- begin collapse -->
                            <div class="wrapper center-block">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading active" role="tab" id="headingOne{{ $turkeyoperation->id }}">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $turkeyoperation->id }}" aria-expanded="true" aria-controls="collapseOne">
                  Details ...
                </a>
              </h4>
            </div>
            <div id="{{ $turkeyoperation->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                @foreach ($turkeyoperation->detail as $turkeyoperationDetail)
                <table id="table2" data-toggle="table">
                  <thead class="label-warning collapse">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">نوع العملية</th>
                  <th scope="col">عدد</th>
                  <th scope="col">تاريخ</th>
                </tr>

              </thead>
              <tbody>
                <tr>
                  <td>{{ $turkeyoperationDetail->id }}</td>
                  <td>{{ $turkeyoperationDetail->trans_name_ar }}</td>
                  <td>{{ $turkeyoperationDetail->affected_number }}</td>
                  <td>{{ $turkeyoperationDetail->created_at }}</td>
                </tr>
              </tbody>
              </table>

                @endforeach
                @foreach ($turkeyoperation->WGTdetail as $turkeyoperationWGT)

                <table id="table2" data-toggle="table">
                  <thead class="label-warning">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">م.الوزن الحالي</th>
                  <th scope="col">م. الزيادة في الوزن</th>
                  <th scope="col">نوع العلف</th>
                  <th scope="col">تاريخ</th>
                </tr>

              </thead>
              <tbody>
                <tr>
                  <td>{{ $turkeyoperationWGT->id }}</td>
                  <td>{{ $turkeyoperationWGT->currentAvgWeight }}</td>
                  <td>كجم {{ $turkeyoperationWGT->currentAvgWeight - $turkeyoperation->initialWeightPerHead}}</td>
                  <td>{{ $turkeyoperationWGT->nut_name }}</td>
                  <td>{{ $turkeyoperationWGT->created_at }}</td>

                </tr>
              </tbody>
              </table>

                @endforeach
              </div>
            </div>
          </div>

        </div>
        </div>
        <!-- end collapse -->
          @endforeach
          </div>


                      </div>

                    </div>
                    </div>

                    <!-- /.box-body -->

                    </div>
          </div>

             </section>
              <!-- /.content -->
          @endsection
