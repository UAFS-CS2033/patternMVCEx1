<?php 

    require 'model/ContactDAO.php';

    $method = $_SERVER['REQUEST_METHOD'];

    if($method=='GET'){
        $page = $_GET['page'];

        if($page=="list"){
            $contactDAO = new ContactDAO();
            $contacts=$contactDAO->getContacts();
            include 'listContact.php';
        }

        if($page=='add'){
            include 'addContact.php';
        }

        if($page=='delete'){
            $contactid = $_GET['contactID'];
            include 'delContact.php';
        }

    }

    if($method=='POST'){
        $page = $_POST['page'];

        if($page=='add'){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $contact = new Contact();
            $contact->setUsername($username);
            $contact->setEmail($email);
            $contactDAO = new ContactDAO();
            $contactDAO->addContact($contact);
            header("Location: controller.php?page=list");
            exit;
        }

        if($page=='delete'){
            $contactid=$_POST['contactID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $contactDAO = new ContactDAO();
                $contactDAO->deleteContact($contactid);
            }
            header("Location: controller.php?page=list");
            exit;
        }

    }


?>