<?php
include ('config.php');
include ('function.php');
$tab= array("email"=>"","password"=>"","message"=>"","emailError"=>"","gError"=>"","passwordError"=>"","isSuccess"=>false);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tab['email']= verifyInput($_POST['email']);
    $tab['password']= verifyInput($_POST['password']);
    $tab['isSuccess']= true ;

    // verification email
    if (empty($tab['email'])) {
        $tab['emailError'] = 'ton email stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (!isEmail($tab['email'])) {
            $tab['emailError'] = " ce n'est pas un email ";
            $tab['isSuccess']= false ;
        } else {
            $tab['email'] ;
        }
        
    }
    //verification mot de passe 
    if (empty($tab['password'])) {
        $tab['passwordError'] = 'ton password stp !!';
        $tab['isSuccess']= false ;
    } else {
        if (lengthPass($tab['password']) != 6 ) {
            $tab['passwordError'] = "le password doit contenir 6 caracteres ";
            $tab['isSuccess']= false ;
        } else {
            $tab['password'] ;
        }
        
    }
      
    // mise en route de la base de donnée
    if ($tab["isSuccess"]) {
        $tab['password']=hashPass($tab['password']);
        $user_verify =$bdd->prepare('SELECT * FROM admin WHERE email=? AND password=?');
        $user_verify->execute(array($tab['email'],$tab['password']));
        $rows=$user_verify->rowCount();
        $tab['message']=  $rows;
        if ($rows==1) {
          $data=$user_verify->fetch();
          $_SESSION['id']=$data['id'];
         //$tab['message']=$data['id'];
          //header('Location:../pages/dashboard.html');

        }
        else{
            $tab['gError']='Ce '. $tab['email']."n'existe pas ";
        }


    }

  echo json_encode($tab);
}

?>