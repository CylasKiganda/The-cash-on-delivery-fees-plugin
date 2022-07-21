<?php
 if( $_POST['submit'] ){

    print_r($_POST['rule_enable_switch']); 
    print_r($_POST); 
    if( isset($_POST["rule_format"])){
        $number = count($_POST["rule_format"]);  
        print_r($number);    
    if($number > 0)  
    {  
        $added_rules= array();
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
         print_r($added_rules);    
    }
    }
     
    
} 
  