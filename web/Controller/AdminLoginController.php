<?php
include_once dirname(__FILE__).'/../Model/AdminLoginModel.php';

class AdminLoginController{
    public function loginData ($userName, $sessionId, $password) {
        if(empty($userName)){
            $responseDate['errorCode'] = "404";
            $responseDate['message'] = "Username Cannot Blank";
        } else if(empty($password)){
            $responseDate['errorCode'] = "404";
            $responseDate['message'] = "Password Cannot Blank";
        } else if(empty($sessionId)){
             $responseDate['errorCode'] = "404";
             $responseDate['message'] = "Something went wrong";
        } else{
           //$password = md5(sha1($password));
            $adminLoginModel = new AdminLoginModel();
            $adminLoginModelData = $adminLoginModel->checkUserIdExists($userName);
            if($adminLoginModelData){
                $adminLoginModelDataFetchData = $adminLoginModel->fetchDataByUserName($userName);
               // echo $adminLoginModelDataFetchData->userName;
                if($adminLoginModelDataFetchData){
                    
                        if($adminLoginModelDataFetchData->stat == 0){

                            if($adminLoginModelDataFetchData->password == $password ){

                                $ip = get_client_ip();
                                $lastLoginTime = date('Y-m-d H:i:s');
                                $adminLoginModelDataUpdateSession = $adminLoginModel->updateSession($userName, $sessionId, $ip, $lastLoginTime);

                                if($adminLoginModelDataUpdateSession){
									
									$_SESSION['userName'] = $adminLoginModelDataFetchData->userName;
									$_SESSION['userMobileNumber'] = $adminLoginModelDataFetchData->mobileNo;
									$_SESSION['userEmail'] = $adminLoginModelDataFetchData->email;
									$_SESSION['userLevel'] = $adminLoginModelDataFetchData->userLevel;
									$_SESSION['name'] = $adminLoginModelDataFetchData->name;

                                    $responseDate['errorCode'] = "200";
                                    $responseDate['message'] = "Logged In Successfully";

                                }else{
                                    $responseDate['errorCode'] = "404";
                                    $responseDate['message'] = "Something went wrong";

                                }
   
                            }else{

                                $responseDate['errorCode'] = "404";
                                $responseDate['message'] = "Incorrect credential";

                            }

                        }else if ($adminLoginModelDataFetchData->stat == 1){

                            $responseDate['errorCode'] = "404";
                            $responseDate['message'] = "User Id is Deactive";

                        }else if ($adminLoginModelDataFetchData->stat == 2){

                            $responseDate['errorCode'] = "404";
                            $responseDate['message'] = "User Id is Deleted";

                        }else if ($adminLoginModelDataFetchData->stat == 3){

                            $responseDate['errorCode'] = "404";
                            $responseDate['message'] = "User Id is Blocked";

                        }else{

                            $responseDate['errorCode'] = "404";
                            $responseDate['message'] = "Something went wrong ";

							}
				}else{

						$responseDate['errorCode'] = "404";
						$responseDate['message'] = "Something went wrong";
					 }   
			}else{
				
				$responseDate['errorCode'] = "404";
                $responseDate['message'] = "User Id does not exists";
			}
		}
        return((object)$responseDate);
    }

    public function checkLoggedIn($sessionId){

        if(empty($sessionId)){

            $responseDate['errorCode'] = "404";
			$responseDate['message'] = "Something went wrong";

        }else{

            $adminLoginModel = new AdminLoginModel();
            $adminLoginModelData = $adminLoginModel->checkSessionExists($sessionId);
            if($adminLoginModelData){
                return $adminLoginModelData;

            }else{
                return FALSE;
            }

        }
    }
}
