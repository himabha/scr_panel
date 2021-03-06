<?php 
require_once(BASE_PATH.'/core/BaseController.php');
class Subscription extends BaseController{
	public function __construct($activeRoute){
		$this->activeRoute = $activeRoute;
		$this->model = $this->loadModel('Subscription');
	}
	
	public function index(){
		try{
			$subscriptions = $this->model->getSubscriptions();
			$data = [
				'activeRoute' => $this->activeRoute,
				'title' => 'Subscriptions',
				'subscriptions' => $subscriptions
			];
			$this->loadView("header", $data);
			$this->loadView("subscription/index", $data);
			$this->loadView("footer", $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function search(){
		try{
			$subscription = trim($_POST['searchtext']);
			$data['subscriptions'] = $this->model->getSubscriptions($subscription);				
			$this->loadView('subscription/records', $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function delete($id){
		try{
			$subscription = $this->model->getSubscriptionById($id);
			if($this->model->deleteSubscription($subscription)){
				$this->redirect('subscriptions');
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function edit($id){
		try{
			$subscription = $this->model->getSubscriptionById($id);
			$s_model = $this->loadModel('Student');
			$students = $s_model->getStudents();
			$c_model = $this->loadModel('Course');
			$courses = $c_model->getCourses();
			$data = [
					'activeRoute' => $this->activeRoute,
					'title' => 'Edit Subscription',
					'subscription' => $subscription,
					'students' => $students,
					'courses' => $courses
				];
			$this->loadView("header", $data);
			$this->loadView("subscription/subscribe", $data);
			$this->loadView("footer", $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function save(){
		try{
			if(isset($_POST) && !empty($_POST)){
				if(isset($_POST['subscription_id']) && !empty($_POST['subscription_id'])){
					$subscription = $_POST;
					if($this->model->updateSubscription($subscription)){
						$this->redirect('subscriptions');
					}
				}else{
					$subscription = $_POST;
					if($this->model->saveSubscription($subscription)){
						$this->redirect('subscriptions');
					}
				}
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function subscribe(){
		try{
			$s_model = $this->loadModel('Student');
			$students = $s_model->getStudentsNotSubscribed();
			$c_model = $this->loadModel('Course');
			$courses = $c_model->getCourses();
			$data = [
				'activeRoute' => $this->activeRoute,
				'title' => 'Subscribe to Course',
				'students' => $students,
				'courses' => $courses
			];
			$this->loadView("header", $data);
			$this->loadView("subscription/subscribe", $data);
			$this->loadView("footer", $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function sort(){
		try{
			$searchValue = $_POST['searchValue'];
			$orderBy = $_POST['columnName'];
			$sort = $_POST['sort'];
			$sort = ($sort >= 0) ? 'asc' : 'desc';
			$data = [
				'subscriptions' => $this->model->getSubscriptions($searchValue, $orderBy, $sort),
				'orderBy' => $orderBy,
				'sort' => $sort
			];
			$this->loadView('subscription/records', $data);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
}

?>