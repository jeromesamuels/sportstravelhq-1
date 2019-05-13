@extends('layouts.app')
@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
<style>
    .tab-content>.active {
    opacity: 1 !important;
    }
    .modal-header {
    display: block;
    }
    .modal-dialog {
    max-width: 800px;
    top: 20%;
    margin: 2.75rem auto;
    position: relative;
    }
    .theme-deep-purple .navbar, .navbar-header {
    background-color:#289dcc!important;
    }
    .nav>li>a{
    margin: 15px auto 0px;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: #fff;
    background-color: #0b0c0c;
    margin: 15px auto 0px;
    }
</style>
@if(Session::has('message'))
{!! Session::get('message') !!}
@endif
<section class="page-header row" style="margin-top: 30px;">
    <h1>Dashboard </h1>
    <span style="padding: 10px 15px;font-size: 16px;"><i class="fa fa-home" aria-hidden="true"></i> - BlackOut Dates </span>
</section>



<div class="page-content row">
    <div class="page-content-wrapper no-margin">
        <div class="sbox" style="border-top: none">
            <div class="sbox-content dashboard-container">
                <div id="pages" >
                    <div id="information" class="page"  >
                        <div class="body">
                            <img alt="" src="http://13.92.240.159/demo/public/uploads/users/{{ $hotels->property }}" id="div_hotel_img"  class="img-responsive" />
                            <div class="hotel-info-section">
                                <h5 style="color:#000;margin-top: 30px;" id="div_hotel_name">{{ $hotels->name }}</h5>
                                <p id="div_hotel_adress">{{ $hotels->address }}</p>
                                <p id="div_hotel_rating">
                                    @for ($i = 0; $i < $hotels->rating; $i++)
                                    <span class="fa fa-star" style="color:#a9a902"></span>
                                    @endfor
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#myModal" role="button" class="btn btn-info btn-lg" data-toggle="modal">Create blackout dates</a>
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('hotelmanager.blackoutStore') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel" style="text-transform: uppercase;">Add blackout dates Steps</h3>
                                    <p>View the all steps and then submitted</p>
                                </div>
                                <div class="modal-body" id="myWizard">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 70%;">
                                            Step 1 of 3
                                        </div>
                                    </div>
                                    <div class="navbar">
                                        <div class="navbar-inner">
                                            <ul class="nav nav-pills">
                                                <li class="active"><a href="#step1" data-toggle="tab" data-step="1">Step 1</a></li>
                                                <li><a href="#step2" data-toggle="tab" data-step="2">Step 2</a></li>
                                                <li><a href="#step3" data-toggle="tab" data-step="3">Step 3</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="step1">
                                            <div class="form-group" >
                                                <h4 style=" margin: 30px auto;">Blackout Dates</h4>
                                                <label for="Check In" class=" control-label col-md-5 text-left"> Start Date
                                                <input  type='text' autocomplete='off' name='start' id='start' value='' required class='form-control input-sm ' data-datepicker="separateRange" /> 
                                                </label>
                                                <label for="Check Out" class=" control-label col-md-5 text-left"> End Date
                                                <input  type='text' autocomplete='off' name='end' id='end' value='' required class='form-control input-sm ' data-datepicker="separateRange" /> 
                                                </label>
                                            </div>
                                            <a class="btn btn-default next" href="#">Continue</a>
                                        </div>
                                        <div class="tab-pane fade" id="step2">
                                            <div class="form-group">
                                                <h4 style=" margin: 30px auto;">Select reason</h4>
                                                <select class="form-control  input-lg" name="blackout_reason">
                                                    <option value="" >Please select reason for Blackout</option>
                                                    <option value="Spring Break" >Spring Break</option>
                                                    <option value="Sporting Event">Sporting Event</option>
                                                    <option value="Sporting Event">General</option>
                                                </select>
                                                <br>
                                                <label>Enter Response</label>
                                                <input class="form-control input-lg">
                                            </div>
                                            <a class="btn btn-default next" href="#">Continue</a>
                                        </div>
                                        <div class="tab-pane fade" id="step3">
                                            <div class="form-group">
                                                <h4 style="margin: 30px auto;">Step 3</h4>
                                                You're Done!
                                            </div>
                                            <a class="btn btn-success first" href="#">Start over</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                    <button class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $hotels->id }}" name="hotel_id">
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() { 
                    
                      
                        $('.removeCurrentFiles').on('click',function(){
                            var removeUrl = $(this).attr('href');
                            $.get(removeUrl,function(response){});
                            $(this).parent('div').empty();  
                            return false;
                        }); 
                    
                    
                        // In your Javascript (external .js resource or <script> tag)
                        $('.select2').select2();
                    
                    
                    
                    var separator = ' - ', dateFormat = 'MM/DD/YYYY';
                    var options = {
                        autoUpdateInput: false,
                        autoApply: true,
                        locale: {
                            format: dateFormat,
                            separator: separator,
                        },
                        //minDate: moment().add(1, 'days'),
                        //maxDate: moment().add(359, 'days'),
                        opens: "right"
                    };
                    
                    
                    $('[data-datepicker=separateRange]')
                    .daterangepicker(options)
                    .on('apply.daterangepicker' ,function(ev, picker) {
                        var boolStart = this.name.match(/start/g) == null ? false : true;
                        var boolEnd = this.name.match(/end/g) == null ? false : true;
                    
                        var mainName = this.name.replace('start', '');
                        if(boolEnd) {
                            mainName = this.name.replace('end', '');
                            $(this).closest('form').find('[name=start'+ mainName +']').blur();
                        }
                    
                        $(this).closest('form').find('[name=start'+ mainName +']').val(picker.startDate.format(dateFormat));
                        $(this).closest('form').find('[name=end'+ mainName +']').val(picker.endDate.format(dateFormat));
                    
                        $(this).trigger('change').trigger('keyup');
                    })
                    .on('show.daterangepicker', function(ev, picker) {
                        var boolStart = this.name.match(/start/g) == null ? false : true;
                        var boolEnd = this.name.match(/end/g) == null ? false : true;
                        var mainName = this.name.replace('start', '');
                        if(boolEnd) {
                            mainName = this.name.replace('end', '');
                        }
                    
                        var startDate = $(this).closest('form').find('[name=start'+ mainName +']').val();
                        var endDate = $(this).closest('form').find('[name=end'+ mainName +']').val();
                    
                        $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
                        $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');
                        
                        if(boolEnd) {
                            $('[name=daterangepicker_end]').focus();
                        }
                    });
                    
                    
                    });
                    
                    (function () {
                       'use strict';
                    
                       var init = function () {                
                           var slider3 = new rSlider({
                               target: '#slider3',
                               values: {min: 10, max: 550},
                               step: 10,
                               range: true,
                               set: [70, 350],
                               scale: true,
                               labels: false,
                               onChange: function (vals) {
                                   console.log(vals);
                                   var result = vals.split(',');
                    
                                   $("#budget_from").val(result[0]);
                                   $("#budget_to").val(result[1]);
                               }
                           });
                       };
                       window.onload = init;
                    
                    
                       $(".another_location").hide("slow");
                       $("#between_locations").on("click", function() {
                        $(".another_location").toggle("slow");
                       });
                    })();
                    
                    
                    
                    !function(){"use strict";var t=function(t){this.input=null,this.inputDisplay=null,this.slider=null,this.sliderWidth=0,this.sliderLeft=0,this.pointerWidth=0,this.pointerR=null,this.pointerL=null,this.activePointer=null,this.selected=null,this.scale=null,this.step=0,this.tipL=null,this.tipR=null,this.timeout=null,this.valRange=!1,this.values={start:null,end:null},this.conf={target:null,values:null,set:null,range:!1,width:null,scale:!0,labels:!0,tooltip:!0,step:null,disabled:!1,onChange:null},this.cls={container:"rs-container",background:"rs-bg",selected:"rs-selected",pointer:"rs-pointer",scale:"rs-scale",noscale:"rs-noscale",tip:"rs-tooltip"};for(var i in this.conf)t.hasOwnProperty(i)&&(this.conf[i]=t[i]);this.init()};t.prototype.init=function(){return"object"==typeof this.conf.target?this.input=this.conf.target:this.input=document.getElementById(this.conf.target.replace("#","")),this.input?(this.inputDisplay=getComputedStyle(this.input,null).display,this.input.style.display="none",this.valRange=!(this.conf.values instanceof Array),!this.valRange||this.conf.values.hasOwnProperty("min")&&this.conf.values.hasOwnProperty("max")?this.createSlider():console.log("Missing min or max value...")):console.log("Cannot find target element...")},t.prototype.createSlider=function(){return this.slider=i("div",this.cls.container),this.slider.innerHTML='<div class="rs-bg"></div>',this.selected=i("div",this.cls.selected),this.pointerL=i("div",this.cls.pointer,["dir","left"]),this.scale=i("div",this.cls.scale),this.conf.tooltip&&(this.tipL=i("div",this.cls.tip),this.tipR=i("div",this.cls.tip),this.pointerL.appendChild(this.tipL)),this.slider.appendChild(this.selected),this.slider.appendChild(this.scale),this.slider.appendChild(this.pointerL),this.conf.range&&(this.pointerR=i("div",this.cls.pointer,["dir","right"]),this.conf.tooltip&&this.pointerR.appendChild(this.tipR),this.slider.appendChild(this.pointerR)),this.input.parentNode.insertBefore(this.slider,this.input.nextSibling),this.conf.width&&(this.slider.style.width=parseInt(this.conf.width)+"px"),this.sliderLeft=this.slider.getBoundingClientRect().left,this.sliderWidth=this.slider.clientWidth,this.pointerWidth=this.pointerL.clientWidth,this.conf.scale||this.slider.classList.add(this.cls.noscale),this.setInitialValues()},t.prototype.setInitialValues=function(){if(this.disabled(this.conf.disabled),this.valRange&&(this.conf.values=s(this.conf)),this.values.start=0,this.values.end=this.conf.range?this.conf.values.length-1:0,this.conf.set&&this.conf.set.length&&n(this.conf)){var t=this.conf.set;this.conf.range?(this.values.start=this.conf.values.indexOf(t[0]),this.values.end=this.conf.set[1]?this.conf.values.indexOf(t[1]):null):this.values.end=this.conf.values.indexOf(t[0])}return this.createScale()},t.prototype.createScale=function(t){this.step=this.sliderWidth/(this.conf.values.length-1);for(var e=0,s=this.conf.values.length;e<s;e++){var n=i("span"),l=i("ins");n.appendChild(l),this.scale.appendChild(n),n.style.width=e===s-1?0:this.step+"px",this.conf.labels?l.innerHTML=this.conf.values[e]:0!==e&&e!==s-1||(l.innerHTML=this.conf.values[e]),l.style.marginLeft=l.clientWidth/2*-1+"px"}return this.addEvents()},t.prototype.updateScale=function(){this.step=this.sliderWidth/(this.conf.values.length-1);for(var t=this.slider.querySelectorAll("span"),i=0,e=t.length;i<e;i++)t[i].style.width=this.step+"px";return this.setValues()},t.prototype.addEvents=function(){var t=this.slider.querySelectorAll("."+this.cls.pointer),i=this.slider.querySelectorAll("span");e(document,"mousemove touchmove",this.move.bind(this)),e(document,"mouseup touchend touchcancel",this.drop.bind(this));for(var s=0,n=t.length;s<n;s++)e(t[s],"mousedown touchstart",this.drag.bind(this));for(var s=0,n=i.length;s<n;s++)e(i[s],"click",this.onClickPiece.bind(this));return window.addEventListener("resize",this.onResize.bind(this)),this.setValues()},t.prototype.drag=function(t){if(t.preventDefault(),!this.conf.disabled){var i=t.target.getAttribute("data-dir");return"left"===i&&(this.activePointer=this.pointerL),"right"===i&&(this.activePointer=this.pointerR),this.slider.classList.add("sliding")}},t.prototype.move=function(t){if(this.activePointer&&!this.conf.disabled){var i=("touchmove"===t.type?t.touches[0].clientX:t.pageX)-this.sliderLeft-this.pointerWidth/2;return(i=Math.round(i/this.step))<=0&&(i=0),i>this.conf.values.length-1&&(i=this.conf.values.length-1),this.conf.range?(this.activePointer===this.pointerL&&(this.values.start=i),this.activePointer===this.pointerR&&(this.values.end=i)):this.values.end=i,this.setValues()}},t.prototype.drop=function(){this.activePointer=null},t.prototype.setValues=function(t,i){var e=this.conf.range?"start":"end";return t&&this.conf.values.indexOf(t)>-1&&(this.values[e]=this.conf.values.indexOf(t)),i&&this.conf.values.indexOf(i)>-1&&(this.values.end=this.conf.values.indexOf(i)),this.conf.range&&this.values.start>this.values.end&&(this.values.start=this.values.end),this.pointerL.style.left=this.values[e]*this.step-this.pointerWidth/2+"px",this.conf.range?(this.conf.tooltip&&(this.tipL.innerHTML=this.conf.values[this.values.start],this.tipR.innerHTML=this.conf.values[this.values.end]),this.input.value=this.conf.values[this.values.start]+","+this.conf.values[this.values.end],this.pointerR.style.left=this.values.end*this.step-this.pointerWidth/2+"px"):(this.conf.tooltip&&(this.tipL.innerHTML=this.conf.values[this.values.end]),this.input.value=this.conf.values[this.values.end]),this.values.end>this.conf.values.length-1&&(this.values.end=this.conf.values.length-1),this.values.start<0&&(this.values.start=0),this.selected.style.width=(this.values.end-this.values.start)*this.step+"px",this.selected.style.left=this.values.start*this.step+"px",this.onChange()},t.prototype.onClickPiece=function(t){if(!this.conf.disabled){var i=Math.round((t.clientX-this.sliderLeft)/this.step);return i>this.conf.values.length-1&&(i=this.conf.values.length-1),i<0&&(i=0),this.conf.range&&i-this.values.start<=this.values.end-i?this.values.start=i:this.values.end=i,this.slider.classList.remove("sliding"),this.setValues()}},t.prototype.onChange=function(){var t=this;this.timeout&&clearTimeout(this.timeout),this.timeout=setTimeout(function(){if(t.conf.onChange&&"function"==typeof t.conf.onChange)return t.conf.onChange(t.input.value)},500)},t.prototype.onResize=function(){return this.sliderLeft=this.slider.getBoundingClientRect().left,this.sliderWidth=this.slider.clientWidth,this.updateScale()},t.prototype.disabled=function(t){this.conf.disabled=t,this.slider.classList[t?"add":"remove"]("disabled")},t.prototype.getValue=function(){return this.input.value},t.prototype.destroy=function(){this.input.style.display=this.inputDisplay,this.slider.remove()};var i=function(t,i,e){var s=document.createElement(t);return i&&(s.className=i),e&&2===e.length&&s.setAttribute("data-"+e[0],e[1]),s},e=function(t,i,e){for(var s=i.split(" "),n=0,l=s.length;n<l;n++)t.addEventListener(s[n],e)},s=function(t){var i=[],e=t.values.max-t.values.min;if(!t.step)return console.log("No step defined..."),[t.values.min,t.values.max];for(var s=0,n=e/t.step;s<n;s++)i.push(t.values.min+s*t.step);return i.indexOf(t.values.max)<0&&i.push(t.values.max),i},n=function(t){return!t.set||t.set.length<1?null:t.values.indexOf(t.set[0])<0?null:!t.range||!(t.set.length<2||t.values.indexOf(t.set[1])<0)||null};window.rSlider=t}();
                    
                    
                </script>
                <hr>
            </div>
        </div>
    </div>
</div>

@endsection