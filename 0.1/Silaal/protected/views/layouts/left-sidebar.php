<div class="span-5" >
      <ul id="left_sidebar">
        <li class="category sidebar_content">
          <h3><?php echo Yep::t('Categories');?></h3>
          <ul id="accordian" class="padding10">
            <?php $this->widget('CategoriesWidget'); ?>
            <li> </li>
          </ul>
        </li>
        <li class="sidebar_content advertise prepend-top"><img src="<?php echo Yii::app()->request->baseUrl;?>/images/buy_canon.jpg" /></li>
        <!-- <li class="sidebar_content popular_tag has_btn prepend-top">
          <h3>Popular tag</h3>
          <div class="padding10">
          <p>Birthday  Cool  Nice  black bones  camera  furniture good  great  green  hip notebook  phone  red sexy  sony  tag  wow  young</p>
          <a href="#" class="btn_ornge"><span>view all</span></a>
          </div>
        </li>
        <li class="sidebar_content news has_btn prepend-top">
          <h3>News</h3>
          <div class="padding10">
          <label>Sign up for our newsletter:</label>
          <input type="text" name="text"/>
          <a href="#" class="btn_ornge"><span>Subscribe</span></a>
          </div>
        </li> -->
      </ul>
    </div>