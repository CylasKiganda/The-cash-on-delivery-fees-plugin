<?php
 if( $_POST['submit'] ){

     
    update_option('rule_enable_switch',$_POST['rule_enable_switch']); 
    $added_rules= array();
    if( isset($_POST["rule_format"])){
        $number = count($_POST["rule_format"]);  
        
    if($number > 0)  
    {  
        
         for($i=0; $i<$number; $i++)  
         {  
            $_rule= array();
              if(trim($_POST["rule_format"][$i] != ''))  
              {  
                if($_POST["rule_format"][$i] == "is_R"){
                    $_rule["rule_format"]=$_POST["rule_format"][$i];
                    $_rule["rule_amount_from"]=$_POST["rule_amount_from"][$i];
                    $_rule["rule_amount_to"]=$_POST["rule_amount_to"][$i];
                    $_rule["rule_fee"]=$_POST["rule_fee"][$i]; 
              }  
              else{
                $_rule["rule_format"]=$_POST["rule_format"][$i];
                $_rule["rule_amount"]=$_POST["rule_amount"][$i]; 
                $_rule["rule_fee"]=$_POST["rule_fee"][$i]; 
              }
              array_push($added_rules,$_rule);
            }
            
         }    
         
    }

    }
     update_option('belo_cod_rules_data',$added_rules); 
    
} 
  