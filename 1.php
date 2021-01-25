<?php
    function findSimple($a, $b){
        for($i=0;$a<=$b;$i++){           
            $simple[]=$a;  
            /*echo $a.'<br>';   */          
                    $a++;
        }
            foreach($simple as $v){
                        for($k=2;$k<7;$k++){
                      if($v%$k==0){
echo $v.'<br>';
                        unset($simple[$v]);}  
                        }
           
                                    
    
    }
    }
        findSimple(5,50);
echo $a.'<br>'; 
?>