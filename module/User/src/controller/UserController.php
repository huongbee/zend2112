<?php
namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use User\Entity\User;
use Zend\View\Model\ViewModel;
use User\Form\UserForm;


class UserController extends AbstractActionController{

    private $entityManager;
    private $userManager ;
    function __construct($entityManager, $userManager ){
        $this->entityManager = $entityManager;
        $this->userManager = $userManager;
    }
    
    function indexAction(){
        
        //$users = $this->entityManager->find(User::class, 10);
        //$users = $this->entityManager->getRepository(User::class)->find(10);

        //$users = $this->entityManager->getRepository(User::class)->findBy([]);
        $users = $this->entityManager->getRepository(User::class)->findAll();

        //$users = $this->entityManager->getRepository(User::class)->findOneByFullname('huong01@gmail.com');
        //print_r($users);
        
        return new ViewModel(['users'=>$users]);
    }

    function addAction(){
        $form = new UserForm('add');

        $request = $this->getRequest();
        if($request->isPost()){
            $data = $this->params()->fromPost();
            $form->setData($data);
            if($form->isValid()){
                $data = $form->getData();
                
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // return false;

                // validate pw vs confirm pw
                if($data['confirm_password']!==$data['password']){
                    $this->flashMessenger()->addErrorMessage('Mật khẩu không giống nhau');
                    return $this->redirect()->toRoute('user',[
                        'controller'=>'user',
                        'action'=>'add'
                    ]);  
                }

                //check Email Exist
                $user = $this->userManager->checkEmailExists($data['email']);

                //var_dump($user); return false;
                if(!$user){
                    $this->flashMessenger()->addErrorMessage('Email đã có người sử dụng');
                    return $this->redirect()->toRoute('user',[
                        'controller'=>'user',
                        'action'=>'add'
                    ]);  
                }

                $user = $this->userManager->insertUser($data);
                $this->flashMessenger()->addSuccessMessage('Đăng kí thành công');
                return $this->redirect()->toRoute('user',[
                    'controller'=>'user',
                    'action'=>'index'
                ]);

            }
        }
        return new ViewModel(['form'=>$form]);
    }

    function editAction(){
        $id = $this->params()->fromRoute('id',0);
        $user = $this->userManager->findUserByid($id);
        
        if($id==0 || !$user){
            $this->flashMessenger()->addWarningMessage('Không tìm thấy user');
            return $this->redirect()->toRoute('user',[
                'controller'=>'user',
                'action'=>'index'
            ]);
        }
        $form = new UserForm('edit');

        $request = $this->getRequest();
        if($request->isPost()){
            $data = $this->params()->fromPost();
            $form->setData($data);
            if($form->isValid()){
                $data = $form->getData();
                $check = $this->userManager->checkEmailExists($data['email'],$id);

                // print_r($user);
                // return false;
                if($check){
                    $user = $this->userManager->updateUser($user, $data);
                    $this->flashMessenger()->addSuccessMessage('Cập nhật thành công');
                    return $this->redirect()->toRoute('user',[
                        'controller'=>'user',
                        'action'=>'index'
                    ]);
                }
                $this->flashMessenger()->addErrorMessage('Email đã có người sử dụng');
                return $this->redirect()->toRoute('user',[
                    'controller'=>'user',
                    'action'=>'edit',
                    'id'=>$id
                ]);  
            }
            
        }

        $data = [
            'fullname'=>$user->getFullname(),
            'email' => $user->getEmail(),
            'birthdate' => $user->getBirthdate(),
            'gender'=>$user->getGender(),
            'address' => $user->getAddress(),
            'phone' => $user->getPhone()
        ];
        $form->setData($data);

        return new ViewModel(['form'=>$form,'user'=>$user]);
    }
    function deleteAction(){
        $id = $this->params()->fromRoute('id');
        $user = $this->userManager->findUserByid($id);
        if($user == false){
            echo "error";
        }
        else{
            $this->userManager->removeUser($user);
            echo "success";
        }
        return false;
        
    }
}
?>