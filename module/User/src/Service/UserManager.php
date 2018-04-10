<?php
namespace User\Service;
use User\Entity\User;
use Zend\Crypt\Password\Bcrypt;
use Zend\Math\Rand;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

class UserManager {

    private $entityManager;
    
    function __construct($entityManager){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->entityManager = $entityManager;
    }
    function insertUser($data = []){
        $user = new User;
        $user->setEmail($data['email']);
        $user->setFullname($data['fullname']);

        $birthdate = new \DateTime($data['birthdate']);
        $birthdate->format('Y-m-d');
        $user->setBirthdate($birthdate);

        $user->setGender($data['gender']);
        $user->setAddress($data['address']);
        $user->setPhone($data['phone']);
        $user->setRole(0);

        //pw
        $bcrypt = new Bcrypt();
        $securePass = $bcrypt->create($data['password']);
        $user->setPassword($securePass);
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    function checkEmailExists($email,$id = 0){
        if($id==0) {
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($email);
            
        }
        else  {
            //echo $id;
            $user = $this->entityManager
                    ->createQuery("SELECT u FROM User\Entity\User u WHERE u.id <> $id AND u.email = '$email'")
                    ->getResult();
        }
        return empty($user) ? true : false;
    }
    function findUserByid($id){
        $user = $this->entityManager->getRepository(User::class)->find($id);
        return $user!==null ? $user : false;
    }
    function findUserByEmail($email){
        $user = $this->entityManager->getRepository(User::class)->findOneByEmail($email);
        return $user!==null ? $user : false;
    }

    function updateUser($user, $data = []){
        $user->setEmail($data['email']);
        $user->setFullname($data['fullname']);

        $birthdate = new \DateTime($data['birthdate']);
        $birthdate->format('Y-m-d');
        $user->setBirthdate($birthdate);

        $user->setGender($data['gender']);
        $user->setAddress($data['address']);
        $user->setPhone($data['phone']);
        $user->setRole(0);

        $this->entityManager->flush();
        return $user;
    }
    function removeUser($user){
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    function verifyPassword($oldPassword,$securePass){
        $bcrypt = new Bcrypt();
        if ($bcrypt->verify($oldPassword, $securePass)) 
            return true;
        return false;
    }
    function changePassword($user, $password){
        $bcrypt = new Bcrypt();
        $securePass = $bcrypt->create($password);
        $user->setPassword($securePass);

        $this->entityManager->flush();
        return $user;
    }


    function updateToken($user){
        //update token for user
        $token = Rand::getString(40,"0987654321wertyuioplkgfdsazxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM");
        $user->setToken($token);
        //31l4Fpf6v0fOYys2l2T1cxUxJan0KlNReerBkCc2

        $tokenDate = new \DateTime(date('Y-m-d H:i:s'));
        $tokenDate->format('Y-m-d H:i:s');
        $user->setTokenDate($tokenDate);

        $this->entityManager->flush();
        return $user;
    }

    function sendMailWithToken($user){
        $token = $user->getToken();
        $http = isset($_SERVER['https']) ? 'https://': "http://";
        $domail = $_SERVER['HTTP_HOST'];
        $link = $http.$domail.'/zend2112/public/set-password/'.$token;

        $messageBody = "Chào bạn ".$user->getFullname(). ',\n';
        $messageBody.="Bạn vui lòng chọn vào link dưới để đặt lại mật khẩu:\n";
        $messageBody.=$link;
        $messageBody.=".\nThanks and Best Regards!";

        $html = new MimePart($messageBody);
        $html->type = "text/html";

        $body = new MimeMessage();
        $body->setParts(array($html));


        $message = new Message();
        $message->setEncoding("UTF-8");
        $message->addFrom('huonghuong08.php@gmail.com', 'Zend2112 - Forget Password');
        $message->addTo($user->getEmail());
        $message->setSubject('Forget Password');
        $message->setBody($body);

        // Setup SMTP transport
        $transport = new SmtpTransport();
        $options   = new SmtpOptions([
            'name' => 'smtp.gmail.com',
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'connection_class'=>'login',
            'connection_config'=>[
                'username' =>'huonghuong08.php@gmail.com',
                'password' => '01234567890000',
                'ssl'      => 'tls',
            ]
        ]);
        $transport->setOptions($options);
        $transport->send($message);
    }


    function findUserByToken($token){
        if($token==null) return false;
        $user = $this->entityManager->getRepository(User::class)->findOneByToken($token);
        return $user!==null ? $user : false;
    }

    function checkResetPasswordToken($token){
        $user = $this->findUserByToken($token);
        //return $user;
        if(!$user) return false;
        $tokenDate = $user->getTokenDate();
        $tokenDate = $tokenDate->getTimestamp();

        $now = new \DateTime('now');
        $now = $now->getTimestamp();
        if($now - $tokenDate > 86400) //24*60*60
            return false;
        return true;
    }

    function deleteToken($user){
        $user->setTokenDate(null);
        $user->setToken(null);
        $this->entityManager->flush();
        return $user;
    }

}


?>