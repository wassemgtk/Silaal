<div class="span-5 last">
      <ul id="right_sidebar">
        <li class="my_cart sidebar_content">
          <h3><?php echo CHtml::link(Yep::t('Shopping cart'), array(
				'/shoppingcart/view'));?></h3>
          <div class="padding10">
          <?php if(!is_null(Yep::getCartContent()))$this->widget('ShoppingCartWidget');else{ ?>
          <p>You have <span class="no_of_items">no</span> items in your shopping cart.</p>
          <?php }?>
          </div>
        </li>
        <!-- <li class="sidebar_content compare_prod prepend-top">
          <h3>Compare product</h3>
          <div class="padding10"><p>You have no items to compare</p></div>
        </li>
        <li class="sidebar_content has_btn community_poll prepend-top">
          <h3>Community poll</h3>
          <div class="padding10">
          <span class="question">What is your favorite Magento feature?</span>
<form><ul>
<li><input type="radio" name="poll"/><span class="label">Layered Navigation</span></li>
<li><input type="radio" name="poll"/><span class="label">Price Rules</span></li>
<li><input type="radio" name="poll"/><span class="label">Category Management</span></li>
<li><input type="radio" name="poll"/><span class="label">Compare Products</span></li>
</ul>
<a href="#" class="btn_ornge"><span>vote</span></a></form>
          </div>
        </li> -->
        <li class="sidebar_content advertise prepend-top"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/wako.jpg" /></li>
      </ul>
      <!--end of right_sidebar-->
    </div>