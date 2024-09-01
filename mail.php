<?php
    if(isset($_POST['message'])) {
        $message="Envoi depuis la page Contact du site contact@exemplesite.fr 
        Nom : ".$_POST['name']." 
        Email : ".$_POST['email']." 
        Subject:".$_POST['subject']." 
        Phone:".$_POST['number']." 
        Message : ".$_POST['message'];

        $retour=mail("etudsouleymane90@gmail.com", $_POST['subject'], $message,
        "From:souleymanekamara4@gmail.com"."\r\n"."Reply-to:". $_POST['email']);
        if($retour){
        echo "<script> 
                alert('your message has been sent successfully');
                document.location.href = 'contact.html';
              </script>";
    }else{
        echo "<script> 
                alert('your message was not sent');
                document.location.href = 'contact.html';
              </script>"; 
    }
    }
    ?>