<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	protected function beforeAction($action) {
		/* ... Do something common for all child controllers here ... */
		if(isset($_POST['order_status']) and isset($_POST['id']) ){
			$id = $_POST['id'];
			if($_POST['order_status']=='1'){
				$updated = Order::model()->updateByPk($id, array('ordering_done'=>'1'));
				if($updated){
					$order_position = OrderPosition::model()->findAllByAttributes(array('order_id'=>$id)) ;
					if($order_position !== null){
						foreach ($order_position as $op){
							$prod = $op->product;
							$var = $prod->quantity - $op->amount;
							$updated1 = $prod->updateByPk($prod->product_id,array(
									'quantity'=>$var,
							));
						}
					}
				}
		
			}
			else{
				$updated=Order::model()->updateByPk($id, array('ordering_done'=>'0'));
				if($updated){
					$order_position = OrderPosition::model()->findAllByAttributes(array('order_id'=>$id)) ;
					if($order_position !== null){
						foreach ($order_position as $op){
							$prod = $op->product;
							$var = $prod->quantity + $op->amount;
							$updated1 = $prod->updateByPk($prod->product_id,array(
									'quantity'=> $var,
							));
						}
					}
				}
			}
			Yii::app()->user->setFlash("success", "Order Status has been sucessfully changed.");
			$this->redirect(Yii::app()->homeUrl);
		}
		return true;
		
		}
		
	}