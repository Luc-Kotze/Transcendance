<?php 

class User {
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($id) {
        global $db;
        $this->id = $id;
        $user = $db->getResult('users', $id);
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->password = $user['password'];
    }

    public function getID() {
        return $this->id;
    } 

    public function getName() {
        return $this->name;
    }  

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function listHTML() {
        ?>
<div class="chat-info" data-user="<?php echo $this->id ?>" data-username="<?php echo $this->name ?>">
    <div class="circle"></div>
    <div class="name-chat">
        <h3><?= $this->getName() ?> </h3>
        <h4>Yo whats up? So ive been working on things today so yeah</h4>
    </div>
</div>
<?php
    }

    public function getUser() {
        global $db;
        if (Users::isLoggedIn()) {
            return $db->getResult('users', $_SESSION['id']);
        }
        return false;
    }

    public static function getUsers() {
        global $db;
        return $db->getResults('users');
    }
    
    public static function isLoggedIn() {
        if (isset($_SESSION['id'])) {
            return true;
        }
        return false;
    }

    public static function signup($name, $email, $password) {
        global $db;
        $user = $db->insert('users', [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    
        $_SESSION['id'] = $user['id'];
        return $user;
    }

    public static function signin($name, $password) {
        global $db;
        $result = false;
        $error = '';
        $user_exists = $db->exists('users', 'name', $name);

        if ($user_exists) {
            $user = $db->getByKey('users', 'name', $name);

            if (password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $result = true;
            } else {
                $error = "Incorrect Password";
            }
            
        } else {
            $error = "Username does not exist";
        }
        return [
            'success' => $result,
            'error' => $error
        ];
    }
}

?>