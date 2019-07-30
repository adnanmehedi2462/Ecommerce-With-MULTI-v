@extends('admin_layout')
@section('admin_content')



			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update_product',$adnan->product_id)}}" method="post"> 

                      {{csrf_field()}}
                      				
	        <p class="alert-success">
              <?php
                
                $fool=Session::get('fool');
                if($fool){
                    
                    
                    echo $fool;
                    Session::put('fool',null);
                    
                }        
                ?>
                </p>
						  <fieldset>
							<div class="control-group">
							 
							  
							<div class="control-group">
							  <label class="control-label" for="date01">product name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name"  value="{{$adnan->product_name}}">
							  </div>
							</div><div class="control-group">
							  <label class="control-label" for="date01">product size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size"  value="{{$adnan->product_size}}">
							  </div>
							</div>
                          <div class="control-group">
							  <label class="control-label" for="date01">product price</label>
							  <div class="controls">
								<input type="number" class="input-xlarge" name="product_price"  value="{{$adnan->product_price}}">
							  </div>
							</div>   
                          <div class="control-group">
							  <label class="control-label" for="date01">product color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color"  value="{{$adnan->product_color}}">
							  </div>
							</div>

						        
					
                      
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary"> update product</button>
						
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
		
			
				
@endsection