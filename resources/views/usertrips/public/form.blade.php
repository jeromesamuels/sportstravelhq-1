{!! Form::open(array('url'=>'usertrips', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ', 'autocomplete'=>'off' )) !!}

	@if(Session::has('messagetext'))
	   {!! Session::get('messagetext') !!}
	@endif



@if(count($errors->all()))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif




<style type="text/css">
.unstyled {
	list-style: none;
	-webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    padding: 0;
}

.styled-checkbox {
  position: absolute;
  opacity: 0;
}
.styled-checkbox + label {
  position: relative;
  cursor: pointer;
  padding: 0;
}
.styled-checkbox + label:before {
  content: '';
  margin-right: 10px;
  display: inline-block;
  vertical-align: text-top;
  width: 20px;
  height: 20px;
  background: white;
  border: solid #EEE;
}
.styled-checkbox:hover + label:before {
  background: #f35429;
}
.styled-checkbox:focus + label:before {
  box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
}
.styled-checkbox:checked + label:before {
  background: #f35429;
}
.styled-checkbox:disabled + label {
  color: #b8b8b8;
  cursor: auto;
}
.styled-checkbox:disabled + label:before {
  box-shadow: none;
  background: #ddd;
}
.styled-checkbox:checked + label:after {
  content: '';
  position: absolute;
  left: 5px;
  top: 9px;
  background: white;
  width: 2px;
  height: 2px;
  box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
  transform: rotate(45deg);
}




.rs-container *{box-sizing:border-box;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.rs-container{font-family:Arial,Helvetica,sans-serif;height:45px;position:relative}.rs-container .rs-bg,.rs-container .rs-selected{background-color:#eee;border:1px solid #ededed;height:10px;left:0;position:absolute;top:5px;width:100%;border-radius:3px}.rs-container .rs-selected{background-color:#00b3bc;border:1px solid #00969b;transition:all .2s linear;width:0}.rs-container.disabled .rs-selected{background-color:#ccc;border-color:#bbb}.rs-container .rs-pointer{background-color:#fff;border:1px solid #bbb;border-radius:4px;cursor:pointer;height:20px;left:-10px;position:absolute;top:0;transition:all .2s linear;width:30px;box-shadow:inset 0 0 1px #FFF,inset 0 1px 6px #ebebeb,1px 1px 4px rgba(0,0,0,.1)}.rs-container.disabled .rs-pointer{border-color:#ccc;cursor:default}.rs-container .rs-pointer::after,.rs-container .rs-pointer::before{content:'';position:absolute;width:1px;height:9px;background-color:#ddd;left:12px;top:5px}.rs-container .rs-pointer::after{left:auto;right:12px}.rs-container.sliding .rs-pointer,.rs-container.sliding .rs-selected{transition:none}.rs-container .rs-scale{left:0;position:absolute;top:5px;white-space:nowrap}.rs-container .rs-scale span{float:left;position:relative}.rs-container .rs-scale span::before{background-color:#ededed;content:"";height:8px;left:0;position:absolute;top:10px;width:1px}.rs-container.rs-noscale span::before{display:none}.rs-container.rs-noscale span:first-child::before,.rs-container.rs-noscale span:last-child::before{display:block}.rs-container .rs-scale span:last-child{margin-left:-1px;width:0}.rs-container .rs-scale span ins{color:#333;display:inline-block;font-size:12px;margin-top:20px;text-decoration:none}.rs-container.disabled .rs-scale span ins{color:#999}.rs-tooltip{color:#333;width:auto;min-width:60px;height:30px;background:#fff;border:1px solid #00969b;border-radius:3px;position:absolute;transform:translate(-50%,-35px);left:13px;text-align:center;font-size:13px;padding:6px 10px 0}.rs-container.disabled .rs-tooltip{border-color:#ccc;color:#999}


</style>


<div class="row book-hotel-block">
	<legend> Book a hotel now! </legend>

	<div class="col-md-6 left-section" >

		{!! Form::hidden('id', $row['id']) !!}

		  <div class="form-group" >
		  	<h4>Trip Name</h4>
			<label for="Trip Name" class="control-label col-md-8 text-left"> Name this trip </label>
			<div class="col-md-11">
			  <input  type='text' autocomplete='off' name='trip_name' id='trip_name' value='{{ $row['trip_name'] }}' required class='form-control input-sm ' /> 
			 </div> 
		  </div>

		  <div class="form-group" >
		  	<h4>Sports Venue Location</h4>
			<label for="Address 1" class=" control-label col-md-8 text-left"> Address 1 </label>
			<div class="col-md-11">
			  <input  type='text' autocomplete='off' name='from_address_1' id='from_address_1' value='{{ $row['from_address_1'] }}' required class='form-control input-sm ' /> 
			 </div> 
		  </div>

		  <div class="form-group" >
			<label for="City" class=" control-label col-md-3 text-left"> City 
			<input  type='text' autocomplete='off' name='from_city' id='from_city' value='{{ $row['from_city'] }}' required class='form-control input-sm' /> 
			</label>

			<label for="State" class=" control-label col-md-5 text-left"> State 
			<select name='from_state_id' rows='5' id='from_state_id' class='select2 '  ></select> 
			</label>

			<label for="Zip" class=" control-label col-md-3 text-left"> Zip 
			<input  type='text' autocomplete='off' name='from_zip' id='from_zip' value='{{ $row['from_zip'] }}' required class='form-control input-sm ' /> 
			</label>
		  </div>

		  <div class="form-group" >
			<div class="col-md-11">
			    <input class="styled-checkbox" id="between_locations" type="checkbox" value="1">
			    <label for="between_locations">Check here to book a location between two locations</label>
			 </div> 
	 	  </div>


		  <div class="another_location">
			  <div class="form-group" >
				<label for="Address 1" class=" control-label col-md-8 text-left"> Address 1 </label>
				<div class="col-md-11">
				  <input  type='text' autocomplete='off' name='to_address_1' id='to_address_1' value='{{ $row['to_address_1'] }}' class='form-control input-sm' /> 
				 </div> 
			  </div>

			  <div class="form-group" >
				<label for="City" class=" control-label col-md-3 text-left"> City 
				<input type='text' autocomplete='off' name='to_city' id='to_city' value='{{ $row['to_city'] }}' class='form-control input-sm' /> 
				</label>

				<label for="State" class=" control-label col-md-5 text-left"> State 
				<select name='to_state_id' rows='5' id='to_state_id' class='select2' ></select>
				</label>

				<label for="Zip" class=" control-label col-md-3 text-left"> Zip 
				<input  type='text' autocomplete='off' name='to_zip' id='to_zip' value='{{ $row['to_zip'] }}' class='form-control input-sm' /> 
				</label>
			  </div>
		  </div>


		  <div class="form-group" >
		  	<h4>Travel Dates</h4>
			<label for="Check In" class=" control-label col-md-5 text-left"> Check In Date
		  	<input  type='text' autocomplete='off' name='check_in' id='check_in' value='{{ $row['check_in'] }}' required class='form-control input-sm ' data-datepicker="separateRange" /> 
			</label>

			<label for="Check Out" class=" control-label col-md-5 text-left"> Check Out Date
			<input  type='text' autocomplete='off' name='check_out' id='check_out' value='{{ $row['check_out'] }}' required class='form-control input-sm ' data-datepicker="separateRange" /> 
			</label>
		  </div>


		  <div class="form-group" >
		  	<h4>Budget Range - Price per Room</h4>
			<label for="Budget From" class=" control-label col-md-8 text-left">  </label><br /><br />
			<div class="col-md-8 offset-1">
		        <div class="slider-container">
	        	    <input type="text" id="slider3" class="slider" />
		        </div>
				<input type='hidden' name='budget_from' id='budget_from' value='{{ $row['budget_from'] }}' required class='form-control input-sm ' /> 

				<input type='hidden' name='budget_to' id='budget_to' value='{{ $row['budget_to'] }}' required class='form-control input-sm ' /> 

			 </div> 
		  </div>

		  <div class="form-group" >
		  	<h4>Room Types - Select all that apply</h4>
			<label for="Double Queen Rooms" class=" control-label col-md-5 text-left"> Double Queen Rooms 
			<select name='double_queen_qty' rows='5' id='double_queen_qty' class='select2' ></select> 
			</label>

			<label for="Double King Rooms" class=" control-label col-md-5 text-left"> Double King Rooms 
		  	<select name='double_king_qty' rows='5' id='double_king_qty' class='select2' ></select> 
			</label>

		  </div>

		  <div class="form-group" >
		  	<h4>Amenities</h4>
			<div class="col-md-11">
				{!! Helper::showAmenities() !!}  
			 </div> 
		  </div>

		  <div class="form-group" >
		  	<h4>Comments/Needs</h4>
			<label for="Comment" class=" control-label col-md-8 text-left"> Anything we missed? </label>
			<div class="col-md-11">
			  <textarea name='comment' rows='5' id='comment' class='form-control input-sm' >{{ $row['comment'] }}</textarea> 
			 </div> 
		  </div> 

		{!! Form::hidden('added', $row['added']) !!}
		{!! Form::hidden('status', $row['status']) !!}

	  	<div class="form-group">
			<label class="col-sm-4 text-right">&nbsp;</label>
			<div class="col-md-11">
				<button type="submit" name="submit" class="btn btn-default btn-md pull-right" >Finalize </button>
		  	</div>
		</div> 
		<input type="hidden" name="action_task" value="public" />
	 	{!! Form::close() !!}
	</div>

	<div class="col-md-6 right-section">
		
		<br /><br /><br /><br /><br /><br /><br />
		<span>Sports Venue Location </span>
		<p>We'll find the best fit hotel closest to your event(s). </p>

		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<span>Budget Range </span>
		<p>We'll make sure you'll get exactly what was promised. </p>

		<br /><br />
		<span>Room Types  </span>
		<p>We'll make sure you'll get exactly what was promised. </p>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function() { 

		$("#from_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
		{  selected_value : '{{ $row["from_state_id"] }}' });
		
		$("#to_state_id").jCombo("{!! url('usertrips/comboselect?filter=states:id:abbr|name') !!}",
		{  selected_value : '{{ $row["to_state_id"] }}' });
		
		$("#double_queen_qty").jCombo("{!! url('usertrips/comboselect?filter=room_qty:id:title') !!}",
		{  selected_value : '{{ $row["double_queen_qty"] }}' });
		
		$("#double_king_qty").jCombo("{!! url('usertrips/comboselect?filter=room_qty:id:title') !!}",
		{  selected_value : '{{ $row["double_king_qty"] }}' });
		

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});	


	    // In your Javascript (external .js resource or <script> tag)
	    $('.select2').select2();
	





	var separator = ' - ', dateFormat = 'YYYY/MM/DD';
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
	    var boolStart = this.name.match(/check_in/g) == null ? false : true;
	    var boolEnd = this.name.match(/check_out/g) == null ? false : true;

	    var mainName = this.name.replace('check_in', '');
	    if(boolEnd) {
	        mainName = this.name.replace('check_out', '');
	        $(this).closest('form').find('[name=check_out'+ mainName +']').blur();
	    }

	    $(this).closest('form').find('[name=check_in'+ mainName +']').val(picker.startDate.format(dateFormat));
	    $(this).closest('form').find('[name=check_out'+ mainName +']').val(picker.endDate.format(dateFormat));

	    $(this).trigger('change').trigger('keyup');
	})
	.on('show.daterangepicker', function(ev, picker) {
	    var boolStart = this.name.match(/check_in/g) == null ? false : true;
	    var boolEnd = this.name.match(/check_out/g) == null ? false : true;
	    var mainName = this.name.replace('check_in', '');
	    if(boolEnd) {
	        mainName = this.name.replace('check_out', '');
	    }

	    var startDate = $(this).closest('form').find('[name=check_in'+ mainName +']').val();
	    var endDate = $(this).closest('form').find('[name=check_out'+ mainName +']').val();

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
            values: {min: 10, max: 1000},
            step: 10,
            range: true,
            set: [20, 450],
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
