<?php
$des = ProductDescription::model()->findByAttributes(array('language_id'=>Yii::app()->user->getstate('languageId'),'product_id'=>$model->product_id));
	$this->breadcrumbs=array(
		Yep::t('Products')=>array('index'),
		is_null($des)?$model->title:$des->title,
	);
	
?>
    <div class="span-19" id="main">
      <div class="span-19 last">
        <div class="content product_page">
          <div class="span-8"><?php 
			if($model->images) {
				foreach($model->images as $image) {
					$this->renderPartial('/image/view', array( 'model' => $image));
					echo '<br />'; 
				}
			} else 
			$this->renderPartial('/image/view', array( 'model' => new Image()));
			?></div>
          <div class="span-10 product_info last">
           <h3 class="product_name"><?php echo is_null($des)?$model->title:$des->title; ?></h3>
           <!--  <div class="span-2"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/rating.jpg" /></div> -->
<!--             <div class="span-8 reviews last"><a href="#">1 Review(s)</a>|<a href="#">Add Your Review</a></div> -->
            <!--end of reviews-->
            <div class="availability">
              <label for="availability"><?php echo Yep::t('Availability');?></label>
              : <span class="availability_status"><?php echo Yep::t('In Stock');?></span></div><br>
            <!--end of availability-->
            <!-- <div class="size">
              <label for="size">Size</label>
              : <span class="size_list">
              <select>
                <option selected="selected">Select size</option>
              </select>
              </span> </div> -->
            <!--end of size-->
            <div class="price"><?php printf('<h3 class="price">%s</h3>',
            Yep::priceFormat($model->price));
            
    ?></div>
            <!-- end of price-->
            <div class="adding_to_cart prepend-top">
              <label for="quantity"><?php echo Yep::t('Quantity');?></label>
              <?php $this->renderPartial('/products/addtocart', array(
			'model' => $model)); ?>
             
              <br />
<!--               <a href="#">Add to Wishlist</a> | <a href="#">Add to Compare</a>  -->
              
              </div>
              <br>
            <!--end of adding_to_cart-->
<!--             <div class="quick_overview prepend-top"> -->
<!--               <h4>quick overview</h4> -->
<!--               <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p> -->
<!--             </div> -->
          </div>
          <div class="product_description append-bottom">
            <h4><?php echo Yep::t('Product Description');?></h4>
            <p><?php echo is_null($des)?$data->description:$des->description; ?> </p>
          </div>
          <div class="additional_info append-bottom">
<!--             <h4>Additional Information</h4> -->
            <?php 
			$specs = $model->getSpecifications();
			if($specs) {
				echo '<div class="product-specifications"><table>';
				
				printf ('<tr><td colspan="2"><strong>%s</strong></td></tr>',
						Yep::t('Product Specifications'));
						
				foreach($specs as $key => $spec) {
					if($spec != '')
						printf('<tr> <td> %s: </td> <td> %s </td> </td>',
								Yep::t($key),
								Yep::t($spec));
				}
				
				echo '</table></div>';
			} 
			?>
          </div>
          <!-- <div class="interested_in append-bottom">
            <h4>You may also be interested in the following product(s)</h4>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <ul class="products_display">
          <li class="span-4"> <img src="images/new.jpg" />
            <h3><a href="#">Blackberry-8100-pearl</a></h3>
            <div class="price">$ 320.00</div>
            <input type="button" class="add_to_cart" value="Add To Cart"/><br />
            <div class="paddingstb3"><a href="#">Add to Wishlist</a><br />
            <a href="#">Add to Compare</a></div>
          </li>
          <li class="span-4"> <img src="images/new.jpg" />
            <h3><a href="#">Blackberry-8100-pearl</a></h3>
            <div class="price">$ 320.00</div>
            <input type="button" class="add_to_cart" value="Add To Cart"/><br />
            <div class="paddingstb3"><a href="#">Add to Wishlist</a><br />
            <a href="#">Add to Compare</a></div>
          </li>
          <li class="span-4"> <img src="images/new.jpg" />
            <h3><a href="#">Blackberry-8100-pearl</a></h3>
            <div class="price">$ 320.00</div>
            <input type="button" class="add_to_cart" value="Add To Cart"/><br />
            <div class="paddingstb3"><a href="#">Add to Wishlist</a><br />
            <a href="#">Add to Compare</a></div>
          </li>
          
          <li class="span-4 last"> <img src="images/new.jpg" />
            <h3><a href="#">Blackberry-8100-pearl</a></h3>
            <div class="price">$ 320.00</div>
            <input type="button" class="add_to_cart" value="Add To Cart"/><br />
            <div class="paddingstb3"><a href="#">Add to Wishlist</a><br />
            <a href="#">Add to Compare</a></div>
          </li>
           </ul>
        <div class="clear"></div>
          </div>
          <div class="your_tags">
            <h4>Add Your Tags</h4>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            clogs (1)   |  sandals (2)   |  ugly (1)   |  rubber (1)   |  light (1)   |  favorite (1)   |  sandale (1)   |  brown (1)   |  thongs (1)   |  
sandally (1)   |  teste (1)   |  terry's (1 )   |  Hideous (1)   |   Anashria (1)   |  Womens (1)   |  Premier (1)  
            
        <div class="clear"></div>
          </div>
           -->
        </div>
      </div>
      <!-- end of content-->
    </div>
    <!-- end of main-->
    
