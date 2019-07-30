
                            <?php	
                            
                            
                            $cata=DB::table('category_tbl')
                                ->where('status',1)
                                ->get();
                            ?>
                            


@extends('admin_layout') @section('admin_content')


<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

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
            <form class="form-horizontal" action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="input-xlarge" name="product_name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">prodect catagery</label>
                            <div class="controls">
                                <select id="selectError3" name="category_id">
                                @foreach($cata as $adnan)
									<option value="{{$adnan->category_id}}">{{$adnan->category_name}}</option>
                               @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">brand name</label>
                            <div class="controls">
                                <select id="selectError3" name="manufactur_id">
                                	   <?php	
                            
                            
                            $catas=DB::table('manufactur')
                                ->where('status',1)
                                ->get();
                            ?>
					         @foreach($catas as $v_category )
									<option value="{{$v_category->manufactur_id}}">{{$v_category->manufactur_name}}</option>
							
								@endforeach
								  </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">product short discription</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_short_details" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">product long discription</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_discription" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">product price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_price">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">product image</label>
                            <div class="controls">
                                <input type="file" name="product_image">
                            </div>
                        </div>
                          <div class="control-group">
                            <label class="control-label" for="date01">product size</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_size">
                            </div>
                        </div>  <div class="control-group">
                            <label class="control-label" for="date01">product color</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_color">
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2"> status</label>
                            <div class="controls">
                                <input type="checkbox" name="status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"> Add product</button>

                        </div>
                </fieldset>
            </form>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->



    @endsection
