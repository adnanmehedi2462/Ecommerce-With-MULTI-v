@extends('admin_layout')
@section('admin_content')


       <p class="alert-success">
              <?php
                
                $fool=Session::get('fool');
                if($fool){
                    
                    
                    echo $fool;
                    Session::put('fool',null);
                    
                }
                
                
                
                ?>
                </p>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2> 
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>product id</th>
								  <th>product name</th>
<!--								  <th>product discription</th>-->
								  <th>product image</th>
								  <th>product price</th>
								  <th>category name</th>
								  <th>brand name</th>
								
							
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  
						      @foreach($adnan as $v_category)
						      
						          
						  <tbody>
						
							<tr>
								<td>{{$v_category->product_id}}</td>
								<td>{{$v_category->product_name}}</td>
<!--								<td class="center">{{$v_category->product_short_details}}</td>-->
								<td><img src="{{URL::to($v_category->product_image)}}" style="hight:80px; width:80px;"</td>
						         <td>{{$v_category->product_price}}</td>
						         <td>{{$v_category->category_name}}</td>
						         <td>{{$v_category->manufactur_name}}</td>
								<td class="center">
									@if($v_category->status==1)
									<span class="label label-success">active</span>
									@else
										<span class="label label-danger">unactive</span>
										@endif
								</td>
							
								<td class="center">
								@if($v_category->status==1)
									<a class="btn btn-success" href="{{URL::to('/unactive_product/'.$v_category->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@else
									<a class="btn btn-danger" href="{{URL::to('/active_product/'.$v_category->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/edit_product/'.$v_category->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{URL::to('/delete_product/'.$v_category->product_id)}}">
										<i class="halflings-icon white trash"  ></i> 
									</a>
								</td>
							</tr>
                            </tbody>
					@endforeach
			
			</div><!--/row-->

	
			
				
@endsection