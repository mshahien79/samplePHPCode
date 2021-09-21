@extends('layouts.home')

@section('content')
<script type="text/javascript">
  function setbatchName() {


    document.getElementById("BatchName1").value = document.getElementById("BatchName").value;

  }
  function calcnutStock()
  {
    var stock_text = document.getElementById("nut_name").value;  
    var stock_no = "";
    var numb = stock_text.match(/\d/g);
    var res = stock_text.charAt(stock_text.length-1);
    var start_index = "";
    var nut_name1="";

    //alert(numb);
    for (var i = 0; i < stock_text.length; i++) 
    {
      if(stock_text.charAt(i)==":")
      {
        //alert(stock_text.charAt(i));
        start_index = i;
      }
      //res += stock_text.charAt(stock_text.length-i-1);
    }
    //alert(res);
    //stock_no = stock_text.substring(start_index+1,stock_text.length-start_index);
    stock_no = stock_text.substr(start_index+1,(stock_text.length-start_index-1));
    nutname1 = stock_text.substr(0,start_index-6);
    document.getElementById("nut_stock").value = stock_no;
    document.getElementById("nut_name1").value = nutname1;
  } 


  function calcmedStock()
  {
    var stock_text1 = document.getElementById("med_name").value;  
    var stock_no1 = "";
    //var numb1 = stock_text1.match(/\d/g);
    //var res1 = stock_text1.charAt(stock_text1.length-1);
    var start_index1 = "";
    var med_name1="";

    //alert(numb);
    for (var i = 0; i < stock_text1.length; i++) 
    {
      if(stock_text1.charAt(i)==":")
      {
        //alert(stock_text.charAt(i));
        start_index1 = i;
      }
      //res += stock_text.charAt(stock_text.length-i-1);
    }
    //alert(res);
    //stock_no = stock_text.substring(start_index+1,stock_text.length-start_index);
    stock_no1 = stock_text1.substr(start_index1+1,(stock_text1.length-start_index1-1));
    medname1 = stock_text1.substr(0,start_index1-6);
    document.getElementById("med_stock").value = stock_no1;
    document.getElementById("med_name1").value = medname1;
  } 
  function calcvacStock()
  {
    var stock_text1 = document.getElementById("vac_name").value;  
    var stock_no1 = "";
    //var numb1 = stock_text1.match(/\d/g);
    //var res1 = stock_text1.charAt(stock_text1.length-1);
    var start_index1 = "";
    var vac_name1="";

    //alert(numb);
    for (var i = 0; i < stock_text1.length; i++) 
    {
      if(stock_text1.charAt(i)==":")
      {
        //alert(stock_text.charAt(i));
        start_index1 = i;
      }
      //res += stock_text.charAt(stock_text.length-i-1);
    }
    //alert(res);
    //stock_no = stock_text.substring(start_index+1,stock_text.length-start_index);
    stock_no1 = stock_text1.substr(start_index1+1,(stock_text1.length-start_index1-1));
    vac_name1 = stock_text1.substr(0,start_index1-6);
    document.getElementById("vac_stock").value = stock_no1;
    document.getElementById("vac_name1").value = vac_name1;   
  }
function checkifnutoverstock()
{
  var instock = parseInt(document.getElementById("nut_stock").value);
  var requiredstock =parseInt(document.getElementById("nut_quantity_into_barn").value);
  if(requiredstock > instock)
  {
    alert('رصيد علف غير كافي');
    document.getElementById("nut_quantity_into_barn").value = instock;
    if((requiredstock == 0) || (instock == 0))
    {
      document.getElementById("nutsub").disabled = true;
    }
    else
    {
      document.getElementById("nutsub").disabled = false;
    }
    
  }

}
function checkifmedoverstock()
{
  var instock = parseInt(document.getElementById("med_stock").value);
  var requiredstock =parseInt(document.getElementById("med_quantity_into_barn").value);
  if(requiredstock > instock)
  {
    alert('رصيد علف غير كافي');
    document.getElementById("med_quantity_into_barn").value = instock;
    if((requiredstock == 0) || (instock == 0))
    {
      document.getElementById("medsub").disabled = true;
    }
    else
    {
      document.getElementById("medsub").disabled = false;
    }
    
  }

}
function checkifvacoverstock()
{
  var instock = parseInt(document.getElementById("vac_stock").value);
  var requiredstock =parseInt(document.getElementById("vac_quantity_into_barn").value);
  if(requiredstock > instock)
  {
    alert('رصيد علف غير كافي');
    document.getElementById("vac_quantity_into_barn").value = instock;
    if((requiredstock == 0) || (instock == 0))
    {
      document.getElementById("vacsub").disabled = true;
    }
    else
    {
      document.getElementById("vacsub").disabled = false;
    }
    
  }

}
function printrep()
  {
    window.print();
  }


</script>
<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Barn Journal</li>
  </ol>
</section>

<!-- Main content -->

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
      <section class="content">


      <script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
var d = new Date();
document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script> 
<label id="demo"> رقم العنبر </label><br>     
<center><h3 class="box-title" >يومية عنبر : بتاريخ : <b>{{ date('Y-m-d') }}</b></h3></center>

  <div class="col-sm-6 col-sm-offset-3">
          <div class="box">

<div class="box-body">
<form class="form-horizontal create_farm" role="form" method="GET" action="">

  <div class="col-sm-6 col-sm-offset-3">
  <label> رقم العنبر </label><br>
  {!! Form::select('barnocc', $barnocc, null, array('class' => 'selectpicker', 'id' => 'barnocc', 'name' => 'barnocc', "onchange" => "barnocc")) !!}
  <br><input type="hidden" class="barn_id" name="barn_id" id="barn_id01" value="1">
   <div style="overflow: hidden; padding-right: .5em;">

</form> 
  </div>

</div>
</div>
</div>
</div>

<button onclick="printrep()">Print Report</button>




  <!-- weights entry -->
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">أوزان</h3>

        <div class="box-tools pull-right">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#wgt" aria-expanded="false" aria-controls="nut">
              <i class="fa fa-plus"></i>
            </button>
        </div>
      </div>
      <div class="box-body collapse" id="wgt">
        <form class="form-horizontal create_farm" role="form" method="POST" action="{{ url('/barnjournal/storeWghtJournal') }}">

                {{ csrf_field() }}

                <div class="box-body">
                  <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>وزن الذكر</label><br>
                      <input type="text" class="form-control" name="currentAvgWeightMale" placeholder="وزن الذكر" onkeyup="setbatchName()">
                      <input type="hidden" class="barn_id" name="barn_id" id="barn_id02" value="1">

                    </div>
                  </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>وزن الانثى</label><br>
                        <input type="text" class="form-control" name="currentAvgWeightFemale" placeholder="وزن الانثى">
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="reset" class="btn btn-danger pull-left">Reset</button>
                  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                </div>
        </form>
      <!-- /.box-body -->
      </div>

    </div>
  </div>
  </div>
  <!-- Nutition entry -->
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">علف</h3>

            <div class="box-tools pull-right">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#nut" aria-expanded="false" aria-controls="nut">
                  <i class="fa fa-plus"></i>
                </button>
            </div>
          </div>
          <div class="box-body collapse" id="nut">
            <form class="form-horizontal create_farm" role="form" method="POST" action="{{ url('/barnjournal/storeNutJournal') }}">

                    {{ csrf_field() }}

                    <div class="box-body">

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>نوع العلف</label><br>
                          <input type="text" class="form-control get_nut_stock" placeholder="Type here ..." name="nut_name" id="nut_name" onfocusout="calcnutStock()">
                          <span class="help-block search_nut_name_empty" style="display: none;">No Results Found ...</span>
                          <input type="hidden" class="search_nut_id" name="nut_id">
                          <input type="hidden" class="form-control" name="nut_name1" id="nut_name1">
                          <input type="hidden" class="barn_id" name="barn_id" id="barn_id03" value="1">
                        </div>
                      </div>

                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>الموجود بالمخزن\شكارة</label><br>
                            <input type="text" class="form-control" name="nut_stock" id="nut_stock" placeholder="" readonly="True" value="">
                          </div>
                        </div>




                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>مقدار العلف بالشكارة</label><br>
                            <input type="text" class="form-control" name="nut_quantity_into_barn" id="nut_quantity_into_barn" placeholder="مقدار العلف بالشكارة" onkeyup="checkifnutoverstock()">
                          </div>
                        </div>

                      </div>
                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>سعر الشكارة</label><br>
                            <input type="text" class="form-control" name="nut_bag_price" placeholder="سعر الشكارة">
                          </div>
                        </div>

                      </div>




                    </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                      <button type="submit" class="btn btn-primary pull-right" name="nutsub" id="nutsub"><i class="fa fa-plus"></i> Add</button>
                    </div>
            </form>
          <!-- /.box-body -->
          </div>

        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">أدوية</h3>

            <div class="box-tools pull-right">
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#med" aria-expanded="false" aria-controls="med">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="box-body collapse" id="med">
            <form class="form-horizontal create_farm" role="form" method="POST" action="{{ url('/barnjournal/storeMedJournal') }}">

                    {{ csrf_field() }}

                    <div class="box-body">

                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>اسم الدواء</label><br>
                            <input type="text" class="form-control get_med_stock" id="med_name"  placeholder="Type here ..." name="med_name" onfocusout="calcmedStock()">
                            <span class="help-block search_med_name_stock_empty" style="display: none;">No Results Found ...</span>
                            <input type="hidden" class="search_med_id" name="med_id">
                            <input type="hidden" class="barn_id" name="barn_id" id="barn_id04" value="1">
                            <input type="hidden" class="form-control" name="med_name1" id="med_name1">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>الموجود بالمخزن</label><br>
                            <input type="text" class="form-control" name="med_stock" id="med_stock" placeholder="" readonly="True" value="">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>مقدار الدواء المستخدم</label><br>
                            <input type="text" class="form-control" name="med_quantity_into_barn" id="med_quantity_into_barn" placeholder="مقدار الدواء المستخدم" onkeyup="checkifmedoverstock()">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>اسم الدكتور</label><br>
                            <input type="text" class="form-control search_doc_name"  placeholder="Type here ..." name="doc_name">
                            <span class="help-block search_doc_name_empty" style="display: none;">No Results Found ...</span>
                            <input type="hidden" class="search_doc_id" name="doc_id">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>الوصفة الطبية</label><br>
                            <input type="text" class="form-control" name="prescription" placeholder="الوصفة الطبية">
                          </div>
                        </div>

                      </div>


                      </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                      <button type="submit" name="medsub" id="medsub" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                    </div>
            </form>
          <!-- /.box-body -->
          </div>

        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">تحصينات</h3>

            <div class="box-tools pull-right">
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#vac" aria-expanded="false" aria-controls="vac">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="box-body collapse" id="vac">
            <form class="form-horizontal create_farm" role="form" method="POST" action="{{ url('/barnjournal/storeVacJournal') }}">

                    {{ csrf_field() }}
                    <div class="box-body">

                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>اسم التحصينة</label><br>
                            <input type="text" class="form-control get_vac_stock"  placeholder="Type here ..." name="vac_name" id="vac_name"  placeholder="Type here ..." onfocusout="calcvacStock()">
                            <span class="help-block search_vac_name_empty" style="display: none;">No Results Found ...</span>
                            <input type="hidden" class="search_vac_id" name="vac_id">
                            <input type="hidden" class="barn_id" name="barn_id" id="barn_id05" value="1">
                            <input type="hidden" class="form-control" name="vac_name1" id="vac_name1">
                          </div>
                        </div>


                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>الموجود بالمخزن</label><br>
                            <input type="text" class="form-control" name="vac_stock" id="vac_stock" placeholder="" readonly="True" value="">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>مقدار الدواء المستخدم</label><br>
                            <input type="text" class="form-control" name="vac_quantity_into_barn" id="vac_quantity_into_barn" placeholder="مقدار الدواء المستخدم" onkeyup="checkifvacoverstock()">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>اسم الدكتور</label><br>
                            <input type="text" class="form-control search_doc_name"  placeholder="Type here ..." name="doc_name">
                            <span class="help-block search_doc_name_empty" style="display: none;">No Results Found ...</span>
                            <input type="hidden" class="search_doc_id" name="doc_id">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>الوصفة الطبية</label><br>
                            <input type="text" class="form-control" name="prescription" placeholder="الوصفة الطبية">
                          </div>
                        </div>

                      </div>


                      </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                      <button type="submit" name="vacsub" id="vacsub" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                    </div>
            </form>
          <!-- /.box-body -->
          </div>

        </div>
      </div>
      </div>
      <!-- Sawdust -->
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">النشارة</h3>

            <div class="box-tools pull-right">
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#sawdust" aria-expanded="false" aria-controls="sawdust">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="box-body collapse" id="sawdust">
            <form class="form-horizontal create_farm" role="form" method="POST" action="{{ url('/barnjournal/storeSawdustJournal') }}">

                    {{ csrf_field() }}
                    <div class="box-body">

                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>كمية النشارة بالطن</label><br>
                            <input type="text" class="form-control" name="sawdust_quantity_into_barn" id="sawdust_quantity_into_barn">
                            <span class="help-block search_vac_name_empty" style="display: none;">No Results Found ...</span>
                            <input type="hidden" class="barn_id" name="barn_id" id="barn_id06" value="1">
                          </div>
                        </div>


                        
                      </div>

                      </div>

                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                      <button type="submit" name="sawdustsub" id="sawdustsub" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                    </div>
            </form>
          <!-- /.box-body -->
          </div>

        </div>
      </div>
      </div>


      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">نافق</h3>

            <div class="box-tools pull-right">
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#mort" aria-expanded="false" aria-controls="mort">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="box-body collapse" id="mort">
            <form class="form-horizontal create_farm" role="form" method="POST" action="{{ url('/barnjournal/storeMortJournal') }}">

                    {{ csrf_field() }}

                    <div class="box-body">

                      <div class="row">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>عدد النافق</label><br>
                            <input type="text" class="form-control" name="mortality_number" placeholder="عدد النافق">
                            <select name="mort_kind" id="mort_kind">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                            <input type="hidden" class="barn_id" name="barn_id" id="barn_id07" value="1">
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>سبب النفوق</label><br>
                            <input type="text" class="form-control" name="mortality_cause" placeholder="سبب النفوق">
                          </div>
                        </div>


                        </div>
                      </div>


                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                    </div>
            </form>
          <!-- /.box-body -->
          </div>

        </div>
      </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">مذبوح اضطراري</h3>

            <div class="box-tools pull-right">
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#emer_salught" aria-expanded="false" aria-controls="emer_salught">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
          <div class="box-body collapse" id="emer_salught">
            <form class="form-horizontal create_farm" role="form" method="POST" action="{{ url('/barnjournal/storeEmgSlghtJournal') }}">

                    {{ csrf_field() }}

                    <div class="box-body">

                      <div class="row">

                        <div class="col-sm-6">
                          <label>اسم الثلاجة</label><br>
                          <input type="text" class="form-control search_fridge_name"  placeholder="Type here ..." name="fridge_name">
                          <span class="help-block search_fridge_name_empty" style="display: none;">No Results Found ...</span>
                          <input type="hidden" class="search_fridge_id" name="slaugth_fridge_no">

                          <input type="hidden" class="barn_id" name="barn_id" id="barn_id08" value="1">
                        </div>


                        <div class="col-sm-3">
                          <div class="form-group">
                              <label>عدد</label><br>
                              <input type="text" class="form-control" name="slaught_no" placeholder="عدد">

                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-3">
                        <div class="form-group">
                            <label>نوع</label><br>
                            <select name="slaught_type" id="slaught_type">
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-sm-3">
                      <div class="form-group">
                          <label>وزن</label><br>
                          <input type="text" class="form-control" name="slaught_weight" placeholder="وزن">

                      </div>
                    </div>



                      </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Reset</button>
                      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                    </div>
            </form>
          <!-- /.box-body -->
          </div>

        </div>
      </div>
      </div>
      <!-- Barn Journal Details -->
      <!-- Weghts Journal Details-->
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info">
                <div class="box-header with-bsupplier">
                  <h3 class="box-title">متابعة الاوزان</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row" style="width:99%;margin-left:5px">
                            <div class="col-xs-12">
                              <table id="table" class="table table-responsive"
                                     data-toggle="table"
                                     data-url="{{ url('/barnjournal/IndexWgtJournal') }}"
                                     data-pagination="true"
                                     data-side-pagination="server"
                                     data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                                     data-search="true"
                                     data-show-refresh="true"
                                     data-show-toggle="true"
                                     data-sort-name="id"
                                     data-sort-order="desc">
                                  <thead>
                                  <tr>
                                      <th data-field="batch_name" data-align="center" data-sortable="true">اسم الباتش</th>
                                      <th data-field="currentAvgWeightMale" data-align="center" data-sortable="true">الوزن الحالي للذكر</th>
                                      <th data-field="currentAvgWeightFemale" data-align="center" data-sortable="true">الوزن الحالي للانثى</th>
                                      <th data-field="pastAvgWeightMale" data-align="center" data-sortable="true">الوزن السابق للذكر</th>
                                      <th data-field="pastAvgWeightFemale" data-align="center" data-sortable="true">الوزن السابق للانثى</th>
                                      <th data-field="barn_name" data-align="center" data-sortable="true">العنبر</th>
                                      <th data-field="farm_name" data-align="center" data-sortable="true">المزرعة</th>
                                      <th data-field="created_at" data-align="center" data-sortable="true">تاريخ</th>
                                  </tr>
                                  </thead>
                              </table>
                            </div>
                  </div>

                </div>
                </div>
                <!-- /.box-body -->
                </div>
              </div>

      <!-- Barn Journal Details -->
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info">
                <div class="box-header with-bsupplier">
                  <h3 class="box-title">يومية علف</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row" style="width:99%;margin-left:5px">
                            <div class="col-xs-12">
                              <table id="table" class="table table-responsive"
                                     data-toggle="table"
                                     data-url="{{ url('/barnjournal/IndexNutJournal') }}"
                                     data-pagination="true"
                                     data-side-pagination="server"
                                     data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                                     data-search="true"
                                     data-show-refresh="true"
                                     data-show-toggle="true"
                                     data-sort-name="id"
                                     data-sort-order="desc">
                                  <thead>
                                  <tr>
                                      <th data-field="batch_name" data-align="center" data-sortable="true">اسم الباتش</th>
                                      <th data-field="nut_name" data-align="center" data-sortable="true">العلف</th>
                                      <th data-field="nut_quantity_into_barn" data-align="center" data-sortable="true">كمية العلف في العنبر / شكارة</th>
                                      <th data-field="nut_bag_price" data-align="center" data-sortable="true">سعر الشكارة</th>
                                      <th data-field="barn_name" data-align="center" data-sortable="true">العنبر</th>
                                      <th data-field="farm_name" data-align="center" data-sortable="true">المزرعة</th>
                                      <th data-field="created_at" data-align="center" data-sortable="true">تاريخ</th>
                                  </tr>
                                  </thead>
                              </table>
                            </div>
                  </div>

                </div>
                </div>
                <!-- /.box-body -->
                </div>
              </div>

          <!-- Medication Journal Details -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
              <div class="box-header with-bsupplier">
                <h3 class="box-title">يومية أدوية</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row" style="width:99%;margin-left:5px">
                          <div class="col-xs-12">
                            <table id="table" class="table table-responsive"
                                   data-toggle="table"
                                   data-url="{{ url('/barnjournal/IndexMedJournal') }}"
                                   data-pagination="true"
                                   data-side-pagination="server"
                                   data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-toggle="true"
                                   data-sort-name="id"
                                   data-sort-order="desc">
                                <thead>
                                <tr>
                                    <th data-field="batch_name" data-align="center" data-sortable="true">اسم الباتش</th>
                                    <th data-field="med_name" data-align="center" data-sortable="true">الدواء</th>
                                    <th data-field="used_med_quantity" data-align="center" data-sortable="true">الكمية المستخدمة</th>
                                    <th data-field="doc_name_ar" data-align="center" data-sortable="true">الدكتور</th>
                                    <th data-field="prescription" data-align="center" data-sortable="true">الوصفة الطبية</th>
                                    <th data-field="barn_name" data-align="center" data-sortable="true">العنبر</th>
                                    <th data-field="farm_name" data-align="center" data-sortable="true">المزرعة</th>
                                    <th data-field="created_at" data-align="center" data-sortable="true">تاريخ</th>
                                </tr>
                                </thead>
                            </table>
                          </div>
                </div>

              </div>
              </div>
              <!-- /.box-body -->
              </div>
            </div>

          <!-- Vaccinations Journal Details -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
              <div class="box-header with-bsupplier">
                <h3 class="box-title">يومية تحصينات</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row" style="width:99%;margin-left:5px">
                          <div class="col-xs-12">
                            <table id="table" class="table table-responsive"
                                   data-toggle="table"
                                   data-url="{{ url('/barnjournal/IndexVacJournal') }}"
                                   data-pagination="true"
                                   data-side-pagination="server"
                                   data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-toggle="true"
                                   data-sort-name="id"
                                   data-sort-order="desc">
                                <thead>
                                <tr>
                                    <th data-field="batch_name" data-align="center" data-sortable="true">اسم الباتش</th>
                                    <th data-field="vac_name" data-align="center" data-sortable="true">التحصينة</th>
                                    <th data-field="doc_name_ar" data-align="center" data-sortable="true">الدكتور</th>
                                    <th data-field="prescription" data-align="center" data-sortable="true">الوصفة الطبية</th>
                                    <th data-field="barn_name" data-align="center" data-sortable="true">العنبر</th>
                                    <th data-field="farm_name" data-align="center" data-sortable="true">المزرعة</th>
                                    <th data-field="created_at" data-align="center" data-sortable="true">تاريخ</th>
                                </tr>
                                </thead>
                            </table>
                          </div>
                </div>

              </div>
              </div>
              <!-- /.box-body -->
              </div>
            </div>
          <!-- Sawdust Journal Details -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
              <div class="box-header with-bsupplier">
                <h3 class="box-title">يومية نشارة</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row" style="width:99%;margin-left:5px">
                          <div class="col-xs-12">
                            <table id="table" class="table table-responsive"
                                   data-toggle="table"
                                   data-url="{{ url('/barnjournal/IndexSawdustJournal') }}"
                                   data-pagination="true"
                                   data-side-pagination="server"
                                   data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-toggle="true"
                                   data-sort-name="id"
                                   data-sort-order="desc">
                                <thead>
                                <tr>
                                    <th data-field="sawdust_quantity_into_barn" data-align="center" data-sortable="true">كمية النشارة</th>
                                    <th data-field="barn_name" data-align="center" data-sortable="true">العنبر</th>
                                    <th data-field="farm_name" data-align="center" data-sortable="true">المزرعة</th>
                                    <th data-field="created_at" data-align="center" data-sortable="true">تاريخ</th>
                                </tr>
                                </thead>
                            </table>
                          </div>
                </div>

              </div>
              </div>
              <!-- /.box-body -->
              </div>
            </div>  
          <!-- Mortialities Journal Details -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
              <div class="box-header with-bsupplier">
                <h3 class="box-title">يومية النافق</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row" style="width:99%;margin-left:5px">
                          <div class="col-xs-12">
                            <table id="table" class="table table-responsive"
                                   data-toggle="table"
                                   data-url="{{ url('/barnjournal/IndexMortJournal') }}"
                                   data-pagination="true"
                                   data-side-pagination="server"
                                   data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-toggle="true"
                                   data-sort-name="id"
                                   data-sort-order="desc">
                                <thead>
                                <tr>
                                    <th data-field="batch_name" data-align="center" data-sortable="true">اسم الباتش</th>
                                    <th data-field="mortality_number" data-align="center" data-sortable="true">عدد النافق</th>
                                    <th data-field="mort_kind" data-align="center" data-sortable="true">النوع</th>
                                    <th data-field="mortality_cause" data-align="center" data-sortable="true">سبب النفوق</th>
                                    <th data-field="barn_name" data-align="center" data-sortable="true">العنبر</th>
                                    <th data-field="farm_name" data-align="center" data-sortable="true">المزرعة</th>
                                    <th data-field="created_at" data-align="center" data-sortable="true">تاريخ</th>
                                </tr>
                                </thead>
                            </table>
                          </div>
                </div>

              </div>
              </div>
              <!-- /.box-body -->
              </div>
            </div>
          <!-- Sales Journal Details -->
          <!-- Emergency Salughterd Journal Details -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
              <div class="box-header with-bsupplier">
                <h3 class="box-title">يومية المذبوح اضطراريا</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row" style="width:99%;margin-left:5px">
                          <div class="col-xs-12">
                            <table id="table" class="table table-responsive"
                                   data-toggle="table"
                                   data-url="{{ url('/barnjournal/IndexReferigeratorJournal') }}"
                                   data-pagination="true"
                                   data-side-pagination="server"
                                   data-page-list="[10, 20, 30 , 40 , 50, 100, 200]"
                                   data-search="true"
                                   data-show-refresh="true"
                                   data-show-toggle="true"
                                   data-sort-name="id"
                                   data-sort-order="desc">
                                <thead>
                                <tr>
                                    <th data-field="batch_name" data-align="center" data-sortable="true">اسم الباتش</th>
                                    <th data-field="slaught_no" data-align="center" data-sortable="true">عدد المذبوح</th>
                                    <th data-field="slaught_type" data-align="center" data-sortable="true">النوع</th>
                                    <th data-field="slaught_weight" data-align="center" data-sortable="true">الوزن</th>
                                    <th data-field="fridge_name" data-align="center" data-sortable="true">اسم الثلاجة</th>
                                    <th data-field="barn_name" data-align="center" data-sortable="true">العنبر</th>
                                    <th data-field="farm_name" data-align="center" data-sortable="true">المزرعة</th>
                                    <th data-field="created_at" data-align="center" data-sortable="true">تاريخ</th>
                                </tr>
                                </thead>
                            </table>
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
