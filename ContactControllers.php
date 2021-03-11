<?php 
    include "model/ContactDAO.php";
    include "ControllerAction.php";

    class ContactList implements ControllerAction{

        function processGET(){
            $contactDAO = new ContactDAO();
            $contacts=$contactDAO->getContacts();
            include 'listContact.php';
        }

        function processPOST(){
            return;
        }

    }

    class ContactAdd implements ControllerAction{

        function processGET(){
            include 'addContact.php';
        }

        function processPOST(){
            return;
        }

    }

    class ContactDelete implements ControllerAction{

        function processGET(){
            $contactid = $_GET['contactID'];
            include 'delContact.php';
        }

        function processPOST(){
            return;
        }

    }




?>