<?php
class Newsletter
{
    private static $email;
    private static $name;
    private static $datetime = null;

    private static $valid = true;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function register($email) {
        if (!empty($_POST)) {
            self::$name     =$_POST['signup-name'];
            self::$email    = $_POST['signup-email'];
            self::$datetime = date('Y-m-d H:i:s');

            if (empty(self::$email)) {
                $status  = "error";
                $message = "The email address field must not be blank";
                self::$valid = false;

            }else if (empty(self::$name)) {
                $status  = "error";
                $message = "The name field must not be blank";
                self::$valid = false;
            
            }else if (!filter_var(self::$email, FILTER_VALIDATE_EMAIL)) {
                $status  = "error";
                $message = "You must fill the field with a valid email address";
                self::$valid = false;
            }

            if (self::$valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $existingSignup = $pdo->prepare("SELECT COUNT(*) FROM newsletter WHERE signup_email_address='$email'");
                $existingSignup->execute();
               // $name_exists = ($existingSignup->fetchColumn() >0) ? true : false;
                $data_exists = ($existingSignup->fetchColumn() > 0) ? true : false;

                if (!$data_exists) {
                    $sql = "INSERT INTO newsletter (signup_email_address,signup_name, signup_date) VALUES ( :email,:name, :datetime)";
                    $q = $pdo->prepare($sql);

                    $q->execute(
                        array(':name' => self::$name,':email' => self::$email, ':datetime' => self::$datetime));

                    if ($q) {
                        $status  = "success";
                        $message = "You have been successfully subscribed";
                    } else {
                        $status  = "error";
                        $message = "An error occurred, please try again";
                    }
                } else {
                    $status  = "error";
                    $message = "This email is already subscribed";
                }
            }

            $data = array(
                'status'  => $status,
                'message' => $message
            );

            echo json_encode($data);

            Database::disconnect();
        }
    }
}