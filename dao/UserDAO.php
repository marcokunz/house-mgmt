<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 08.12.17
 * Time: 12:06
 */

namespace dao;

use domain\Mieter;
use database\Database;
use dao\KostenDAO;
use domain\Kosten;
use domain\Einnahme;
use domain\user;


class UserDAO extends BasicDAO {


    public function create(User $user) {
        $stmt = $this->pdoInstance->prepare('
        INSERT INTO "User" (name, email, password)
          SELECT :name,:email,:password
          WHERE NOT EXISTS (
            SELECT email FROM "User" WHERE email = :emailExist
        );');
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':emailExist', $user->getEmail());
        $stmt->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
        $stmt->execute();
    }



    public function readAll(User $user){
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM "User" WHERE email = :email');
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $userDB = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
            $epasswort = $user->getPassword();
            $upasswort = $userDB["password"];
            if (password_verify($epasswort, $upasswort)) {
                $_SESSION["userLogin"]["name"] = $userDB["name"];
                $_SESSION["userLogin"]["email"] = $user->getEmail();
                $_SESSION["userLogin"]["id"] = $userDB["id"];
                if (password_needs_rehash($userDB["password"], PASSWORD_DEFAULT)) {
                    $stmt = $this->pdoInstance->prepare('
                UPDATE "User" SET password=:password WHERE id = :id;');
                    $stmt->bindValue(':id', $userDB["id"]);
                    $stmt->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));
                    $stmt->execute();
                }
            }
        }

    }
}
?>