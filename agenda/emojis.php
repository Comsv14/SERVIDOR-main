<?php
    
    function pintar_emojis($emo1,$emo2,$emo3,$emo4, $emo5) {
         echo<<<_END
            <div class="circulo" style="background-color: $emo1"></div>
            <div class="circulo" style="background-color: $emo2"></div>
            <div class="circulo" style="background-color: $emo3"></div>
            <div class="circulo" style="background-color: $emo4"></div>
            <div class="circulo" style="background-color: $emo5"></div>
       _END;
        $arr = [$emo1,$emo2,$emo3,$emo4, $emo5];

        return $arr;
        
    }
?>