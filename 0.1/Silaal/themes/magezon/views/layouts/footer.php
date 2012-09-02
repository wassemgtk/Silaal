<div class="span-24 prepend-top company_info">
      <div class="span-8 about_us">
        <h3><?php echo CHtml::link('About us',array('site/page','view'=>'about'));?></h3>
<!--         <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p> -->
        <?php $this->renderPartial("//site/pages/about");?>
      </div>
      <!--end of about_us-->
      <!--
      <div class="span-8 other_news">
        <h3>other news</h3>
        <ul>
          <li> <span class="date">Friday, June 11, 2010</span>
            <p>he generated Lorem Ipsum is therefore always free from repetition, injected humour</p>
          </li>
          <li> <span class="date">Friday, June 11, 2010</span>
            <p>he generated Lorem Ipsum is therefore always free from repetition, injected humour</p>
          </li>
        </ul>
      </div>
      end of other news-->
      
      <div class="span-8 more_info">
        <h3>More Information</h3>
        <ul>
<!--           <li><a href="#">Site Map</a></li> -->
<!--           <li><a href="#">Search Terms</a></li> -->
<!--           <li><a href="#">Advanced Search</a></li> -->
          <li><?php echo CHtml::link('Contact Us',array('/site/contact'))?></li>
        </ul>
      </div>
      <!--end of more_info-->
      <div class="span-8 web_link last">
        <h3>Web link</h3>
        <ul>
          <li class="fb"><a href="<?php yep::renderLinks('Facebook')?>">Facebook</a></li>
          <li class="utb"><a href="<?php yep::renderLinks('Youtube')?>">Youtube</a></li>
          <li class="twtr"><a href="<?php yep::renderLinks('Twitter')?>">Twitter</a></li>
          <li class="rss"><a href="<?php Yep::renderLinks('RSS');?>">RSS Feeds</a></li>
        </ul>
      </div>
      <!--end of web_link-->
    </div>
    <!--end of company info-->
    <hr />
    <div class="span-24" id="footer">
    <p>&copy; 2010 <a href="<?php yep::renderLinks('Copy');?>">LinkplusOffshore Pvt. Ltd.</a>. All Rights Reserved.</p>
    </div>