<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Subscription extends BaseController{
	public function __construct(){
		$this->model = $this->loadModel('Subscription');
	}
	
	public function index(){
		try{
			$subscriptions = $this->model->getSubscriptions();
			$data = [
				'title' => 'Subscriptions',
				'subscriptions' => $subscriptions
			];
			$this->loadView("header", $data);
			$this->loadView("subscription/index", $data);
			$this->loadView("footer", $data);
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function search(){
		try{
			$subscription = trim($_POST['searchtext']);
			$data['subscriptions'] = $this->model->getSubscriptions($subscription);				
			$this->loadView('subscription/records', $data);
		}
		catch(\Exception $e){
			echo $e->getMessage();
		}
	}
}

?>