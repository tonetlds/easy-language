<?php
   
   // Configurações de idiomas
   include_once( '../easy-language/easy-language.php' );

   // Conexão com o banco
   require 'dbconnection.php';
   

   if(isset($_GET['res_id']) and $_GET['res_id'] != ''){       

      // Monta a query
      $delete = "DELETE FROM itens WHERE res_id = '".$_GET['res_id']."'" or die("Erro na exclusão... " . mysqli_error($link));
      //Executa a query
      $delete = $link->query($delete);

      if($delete){
         //apagou
         $_SESSION['messages'] = array('success' => 'O item foi excluído com sucesso!');
      }else{
         //Deu erro
         $_SESSION['messages'] = array('danger' => 'Erro na exclusão do item');         
      }
      header('Location: index.php');

   }